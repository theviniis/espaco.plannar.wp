<?php
namespace Bookly\Backend\Modules\Calendar;

use Bookly\Lib;
use Bookly\Lib\Config;
use Bookly\Lib\Entities\Staff;
use Bookly\Lib\Utils\DateTime;
use Bookly\Lib\Utils\Common;

/**
 * Class Ajax
 * @package Bookly\Backend\Modules\Calendar
 */
class Ajax extends Page
{
    /**
     * @inheritDoc
     */
    protected static function permissions()
    {
        return array( '_default' => array( 'staff', 'supervisor' ) );
    }

    /**
     * Get data for Event Calendar
     */
    public static function getStaffAppointments()
    {
        $result     = array();
        $one_day    = new \DateInterval( 'P1D' );
        $start_date = new \DateTime( self::parameter( 'start' ) );
        $end_date   = new \DateTime( self::parameter( 'end' ) );
        $location_ids = self::parameter( 'location_ids', '' );
        if ( $location_ids ) {
            $location_ids = array_map( 'intval', explode( ',', $location_ids ) );
        }

        // Determine display time zone
        $display_tz = Common::getCurrentUserTimeZone();

        // Due to possibly different time zones of staff members expand start and end dates
        // to provide 100% coverage of the requested date range
        $start_date->sub( $one_day );
        $end_date->add( $one_day );

        // Load staff members
        $query = Staff::query()->whereNot( 'visibility', 'archive' );
        if ( Config::proActive() ) {
            if ( Common::isCurrentUserSupervisor() ) {
                $query->whereIn( 'id', explode( ',', self::parameter( 'staff_ids' ) ) );
            } else {
                $query->where( 'wp_user_id', get_current_user_id() );
            }
        } else {
            $query->limit( 1 );
        }
        /** @var Staff[] $staff_members */
        $staff_members = $query->find();

        if ( ! empty ( $staff_members ) ) {
            // Load special days.
            $special_days = array();
            $staff_ids = array_map( function ( $staff ) { return $staff->getId(); }, $staff_members );
            $schedule  = Lib\Proxy\SpecialDays::getSchedule( $staff_ids, $start_date, $end_date ) ?: array();
            foreach ( $schedule as $day ) {
                if ( $location_ids == '' || in_array( $day['location_id'], $location_ids ) ) {
                    $special_days[ $day['staff_id'] ][ $day['date'] ][] = $day;
                }
            }

            foreach ( $staff_members as $staff ) {
                $result = array_merge( $result, self::_getAppointmentsForCalendar( $staff->getId(), $start_date, $end_date, $display_tz ) );

                // Schedule
                $schedule = array();
                $items = $staff->getScheduleItems();
                $day   = clone $start_date;
                // Find previous day end time.
                $last_end = clone $day;
                $last_end->sub( $one_day );
                $end_time = $items[ (int) $last_end->format( 'w' ) + 1 ]->getEndTime();
                if ( $end_time !== null ) {
                    $end_time = explode( ':', $end_time );
                    $last_end->setTime( $end_time[0], $end_time[1] );
                } else {
                    $last_end->setTime( 24, 0 );
                }
                // Do the loop.
                while ( $day < $end_date ) {
                    $start = $last_end->format( 'Y-m-d H:i:s' );
                    // Check if $day is Special Day for current staff.
                    if ( isset ( $special_days[ $staff->getId() ][ $day->format( 'Y-m-d' ) ] ) ) {
                        $sp_days = $special_days[ $staff->getId() ][ $day->format( 'Y-m-d' ) ];
                        $end     = $sp_days[0]['date'] . ' ' . $sp_days[0]['start_time'];
                        if ( $start < $end ) {
                            $schedule[] = array(
                                'start' => $start,
                                'end'   => $end,
                            );
                        }
                        // Breaks.
                        foreach ( $sp_days as $sp_day ) {
                            if ( $sp_day['break_start'] ) {
                                $break_start = date(
                                    'Y-m-d H:i:s',
                                    strtotime( $sp_day['date'] ) + DateTime::timeToSeconds( $sp_day['break_start'] )
                                );
                                $break_end = date(
                                    'Y-m-d H:i:s',
                                    strtotime( $sp_day['date'] ) + DateTime::timeToSeconds( $sp_day['break_end'] )
                                );
                                $schedule[] = array(
                                    'start' => $break_start,
                                    'end'   => $break_end,
                                );
                            }
                        }
                        $end_time = explode( ':', $sp_days[0]['end_time'] );
                        $last_end = clone $day;
                        $last_end->setTime( $end_time[0], $end_time[1] );
                    } else {
                        $item = $items[ (int) $day->format( 'w' ) + 1 ];
                        if ( $item->getStartTime() && ! $staff->isOnHoliday( $day ) ) {
                            $end = $day->format( 'Y-m-d ' . $item->getStartTime() );
                            if ( $start < $end ) {
                                $schedule[] = array(
                                    'start' => $start,
                                    'end'   => $end,
                                );
                            }
                            $last_end = clone $day;
                            $end_time = explode( ':', $item->getEndTime() );
                            $last_end->setTime( $end_time[0], $end_time[1] );

                            // Breaks.
                            foreach ( $item->getBreaksList() as $break ) {
                                $break_start = date(
                                    'Y-m-d H:i:s',
                                    $day->getTimestamp() + DateTime::timeToSeconds( $break['start_time'] )
                                );
                                $break_end = date(
                                    'Y-m-d H:i:s',
                                    $day->getTimestamp() + DateTime::timeToSeconds( $break['end_time'] )
                                );
                                $schedule[] = array(
                                    'start' => $break_start,
                                    'end'   => $break_end,
                                );
                            }
                        }
                    }

                    $day->add( $one_day );
                }

                if ( $last_end->format( 'Ymd' ) != $day->format( 'Ymd' ) ) {
                    $schedule[] = array(
                        'start' => $last_end->format( 'Y-m-d H:i:s' ),
                        'end'   => $day->format( 'Y-m-d 24:00:00' ),
                    );
                }

                // Add schedule to result,
                // with appropriate time zone shift if needed
                $staff_tz = $staff->getTimeZone();
                $convert_tz = $staff_tz && $staff_tz !== $display_tz;
                foreach ( $schedule as $item ) {
                    if ( $convert_tz ) {
                        $item['start'] = DateTime::convertTimeZone( $item['start'], $staff_tz, $display_tz );
                        $item['end']   = DateTime::convertTimeZone( $item['end'], $staff_tz, $display_tz );
                    }
                    $result[] = array(
                        'start'      => $item['start'],
                        'end'        => $item['end'],
                        'display'    => 'background',
                        'resourceId' => $staff->getId(),
                    );
                }
            }
        }

        wp_send_json( $result );
    }

    /**
     * Update calendar refresh rate.
     */
    public static function updateCalendarRefreshRate()
    {
        $rate = (int) self::parameter( 'rate', 0 );
        update_user_meta( get_current_user_id(), 'bookly_calendar_refresh_rate', $rate );

        wp_send_json_success();
    }

    /**
     * Get appointments for Event Calendar
     *
     * @param int $staff_id
     * @param \DateTime $start_date
     * @param \DateTime $end_date
     * @param string $display_tz
     * @return array
     */
    private static function _getAppointmentsForCalendar( $staff_id, \DateTime $start_date, \DateTime $end_date, $display_tz )
    {
        $query = Lib\Entities\Appointment::query( 'a' )
            ->where( 'st.id', $staff_id )
            ->whereLt( 'a.start_date', $end_date->format( 'Y-m-d H:i:s' ) )
            ->whereRaw( 'DATE_ADD(a.end_date, INTERVAL IF(ca.extras_consider_duration, a.extras_duration, 0) SECOND) >= \'%s\'', array( $start_date->format( 'Y-m-d H:i:s' ) ) );

        $service_ids = array_filter( explode( ',', self::parameter( 'service_ids' ) ) );

        if ( !empty( $service_ids ) && !in_array( 'all', $service_ids ) ) {
            $raw_where = array();
            if ( in_array( 'custom', $service_ids ) ) {
                $raw_where[] = 'a.service_id IS NULL';
            }

            $service_ids = array_filter( $service_ids, 'is_numeric' );
            if ( !empty( $service_ids ) ) {
                $raw_where[] = 'a.service_id IN (' . implode( ',', $service_ids ) . ')';
            }

            if ( $raw_where ) {
                $query->whereRaw( implode( ' OR ', $raw_where ), array() );
            }
        }

        Proxy\Shared::prepareAppointmentsQueryForCalendar( $query, $staff_id, $start_date, $end_date );

        return self::buildAppointmentsForCalendar( $query, $staff_id, $display_tz );
    }
}