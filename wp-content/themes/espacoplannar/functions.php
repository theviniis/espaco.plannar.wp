<?php 
  function get_field($key, $page_id = 0) {
    $id = $page_id !== 0 ? $page_id : get_the_ID();
    return get_post_meta($id, $key, $page_id, true);
  }
  function the_field($key, $page_id = 0) {
    echo get_field($key, $page_id);
  }

  add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
 
  function cmb2_sample_metaboxes() {
      $cmb = new_cmb2_box( [
          'id'            => 'home_box_1',
          'title'         => __( 'Banners', 'cmb2' ),
          'object_types'  =>  ['page'], // Post type
          'context'       => 'normal',
          'priority'      => 'high',
          'show_names'    => true, // Show field names on the left
          // 'cmb_styles' => false, // false to disable the CMB stylesheet
       ] );
          
        $banners = $cmb->add_field([
            'id' => 'banners',
            'type' => 'group',
            'repeteable' => true, 
            'options' => [
              'group_title' => 'Banner {#}',
              'add_button' => 'Adicionar Banner',
              'sortable' => true
            ]
      ]);
      $cmb->add_group_field($banners, [
        'name' => 'Banner',
        'id' => 'banner',
        'type' => 'file',
        'options' => [
          'url' => false,
        ],
      ]);
      $cmb->add_group_field($banners, [
        'name' => 'Banner Mobile',
        'id' => 'mobile',
        'type' => 'file',
        'options' => [
          'url' => false,
        ],
      ]);

      // Quem Sou
      $cmb = new_cmb2_box( [
        'id'            => 'home_box_2',
        'title'         => __( 'Quem Sou', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
       ] );
      $quem_sou = $cmb->add_field([
        'name' => 'Título',
        'id' => 'quem_sou_titulo',
        'type' => 'text',
      ]);
      $quem_sou = $cmb->add_field([
        'name' => 'Conteúdo',
        'id' => 'quem_sou_conteudo',
        'type' => 'textarea',
      ]);
      $quem_sou = $cmb->add_field([
        'name' => 'Foto',
        'id' => 'quem_sou_foto',
        'type' => 'file',
        'options' => [
          'url' => false,
        ],
      ]);

      // quote
      $cmb = new_cmb2_box( [
        'id'            => 'home_box_3',
        'title'         => __( 'Quote', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
      ] );
      $quote = $cmb->add_field([
        'name' => 'Quote',
        'id' => 'quote_conteudo',
        'type' => 'textarea',
      ]);
      $quote = $cmb->add_field([
        'name' => 'Citação',
        'id' => 'quote_cite',
        'type' => 'text',
      ]);
   

      //Depoimentos
      $cmb = new_cmb2_box( [
        'id'            => 'home_box_4',
        'title'         => __( 'Depoimentos', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
      ] );
      $depoimentos = $cmb->add_field([
        'name' => 'Título',
        'id' => 'depoimentos_titulo',
        'type' => 'text',
      ]);
      $depoimentos = $cmb->add_field([
        'id' => 'depoimentos',
        'type' => 'group',
        'repeatable' => true,
        'options' => [
          'group_title' => 'Depoimento {#}',
          'add_button' => 'Adicionar Depoimento',
          'sortable' => true
        ]
      ]);
      $cmb->add_group_field($depoimentos, [
        'name' => 'Depoimento',
        'id' => 'depoimento',
        'type' => 'textarea',
      ]);
      $cmb->add_group_field($depoimentos, [
        'name' => 'Citação',
        'id' => 'cite',
        'type' => 'text',
      ]);

      // apresentacao
      $cmb = new_cmb2_box( [
        'id'            => 'home_box_5',
        'title'         => __( 'Apresentação', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
      ] );
      $apresentacao = $cmb->add_field([
        'name' => 'Título',
        'id' => 'apresentacao_titulo',
        'type' => 'text',
      ]);
      $apresentacao = $cmb->add_field([
        'name' => 'Conteúdo',
        'id' => 'apresentacao_conteudo',
        'type' => 'textarea',
      ]);

      // servicos
      $cmb = new_cmb2_box( [
        'id'            => 'home_box_6',
        'title'         => __( 'Serviços', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
      ] );
      $servicos = $cmb->add_field([
        'name' => 'Título',
        'id' => 'servicos_titulo',
        'type' => 'text',
      ]);
      $servicos = $cmb->add_field([
        'id' => 'servico_1',
        'type' => 'group',
        'repeatable' => false,
        'options' => [
          'group_title' => 'Serviço 1',
          'sortable' => true
        ]
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Título',
        'id' => 'titulo',
        'type' => 'text',
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Conteúdo',
        'id' => 'conteudo',
        'type' => 'textarea',
      ]);

      $servicos = $cmb->add_field([
        'id' => 'servico_2',
        'type' => 'group',
        'repeatable' => false,
        'options' => [
          'group_title' => 'Serviço 2',
          'sortable' => true
        ]
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Título',
        'id' => 'titulo',
        'type' => 'text',
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Conteúdo',
        'id' => 'conteudo',
        'type' => 'textarea',
      ]);

      $servicos = $cmb->add_field([
        'id' => 'servico_3',
        'type' => 'group',
        'repeatable' => false,
        'options' => [
          'group_title' => 'Serviço 3',
          'sortable' => true
        ]
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Título',
        'id' => 'titulo',
        'type' => 'text',
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Conteúdo',
        'id' => 'conteudo',
        'type' => 'textarea',
      ]);

      $servicos = $cmb->add_field([
        'id' => 'servico_4',
        'type' => 'group',
        'repeatable' => false,
        'options' => [
          'group_title' => 'Serviço 4',
          'sortable' => true
        ]
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Título',
        'id' => 'titulo',
        'type' => 'text',
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Conteúdo',
        'id' => 'conteudo',
        'type' => 'textarea',
      ]);

      $servicos = $cmb->add_field([
        'id' => 'servico_5',
        'type' => 'group',
        'repeatable' => false,
        'options' => [
          'group_title' => 'Serviço 5',
          'sortable' => true
        ]
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Título',
        'id' => 'titulo',
        'type' => 'text',
      ]);
      $cmb->add_group_field($servicos, [
        'name' => 'Conteúdo',
        'id' => 'conteudo',
        'type' => 'textarea',
      ]);

      // crescimento pessoal
      $cmb = new_cmb2_box( [
        'id'            => 'home_box_7',
        'title'         => __( 'Crescimento Pessoal', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
      ] );
      $crescimento = $cmb->add_field([
        'name' => 'Título',
        'id' => 'crescimento_titulo',
        'type' => 'text',
      ]);
      $crescimento = $cmb->add_field([
        'name' => 'Sub-título',
        'id' => 'crescimento_sub',
        'type' => 'text',
      ]);
      $crescimento = $cmb->add_field([
        'name' => 'Conteúdo',
        'id' => 'crescimento_conteudo',
        'type' => 'textarea',
      ]);
      $crescimento = $cmb->add_field([
        'name' => 'Lista de Documentos',
        'id' => 'lista_de_documentos',
        'type' => 'group',
        'repeteable' => true,
        'options' => [
          'group_title' => 'Documento {#}',
          'add_button' => 'Adicionar Documento',
          'sortable' => false
        ],
      ]);
      $cmb->add_group_field($crescimento, [
        'id' => 'documento',
        'type' => 'text',
      ]);

      // contato
      $cmb = new_cmb2_box( [
        'id'            => 'home_box_8',
        'title'         => __( 'Contato', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
      ] );
      $contato = $cmb->add_field([
        'name' => 'Título',
        'id' => 'contato_titulo',
        'type' => 'text',
      ]);
      $contato = $cmb->add_field([
        'name' => 'Endereço',
        'id' => 'endereco',
        'type' => 'textarea',
      ]);

    // footer
    $cmb = new_cmb2_box( [
      'id'            => 'home_box_9',
      'title'         => __( 'Rodapé', 'cmb2'),
      'object_types'  => array( 'page', ), // Post type
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true,
    ] );
    $footer = $cmb->add_field( [
        'name' => 'Whatsapp',
        'id' => 'whatsapp',
        'description' => 'Coloque o numero do whatsapp',
        'type' => 'text',
    ]);
    $footer = $cmb->add_field( [
      'name' => 'Instagram',
      'id' => 'instagram',
      'description' => 'Coloque o link do instagram',
      'type' => 'text',
    ]);
    $footer = $cmb->add_field( [
      'name' => 'Facebook',
      'id' => 'facebook',
      'description' => 'Coloque o link do facebook',
      'type' => 'text',
    ]);
    $footer = $cmb->add_field( [
      'name' => 'E-mail',
      'id' => 'email',
      'description' => 'Coloque o e-mail de atendimento',
      'type' => 'text',
    ]);
    $footer = $cmb->add_field( [
      'name' => 'Horário de atendimento',
      'id' => 'atendimento',
      'description' => 'Coloque o horário de atendimento',
      'type' => 'text',
    ]);
  }

  function easyit_travel_shortcode($atts, $content = NULL){
    global $post;
    $atts=shortcode_atts(array(
      'title'=>'Travel List',
      'count'=>10,
      'category'=>'all'
    ),$atts);
  
    if($atts['category']=='all'){
      $terms='';
    }else{
      $terms=array(
        array(
          'taxonomy'=>'category',
          'fiels'	  =>'slug',
          'terms'	  =>$atts['category']	
        )
      );
    }
  
    $args=array(
    'post_type'=>'travels',
    'post_status'=>'publish',
    'orderby'	=>'due_date',
    'order'		=>'ASC',
    'posts_per_page'=>$atts['count'],
    'tax_query'		=>$terms	
      );
  
    $travels=new WP_Query($args);
    //$output="";
  
    if($travels->have_posts()){
  
      while($travels->have_posts()){
      
      $travels->the_post();
      $start_input=get_post_meta($post->ID,'start_input',true);
      $end_input=get_post_meta($post->ID,'end_input',true);
      $datepicker=get_post_meta($post->ID,'datepicker',true);
      ob_start();	?>
       <ul> 
       <li> <?php echo $start_input;?> </li>
       <li> <?php echo $end_input;?> </li>
       <li> <?php echo $datepicker;?> </li>
      </ul> 
    <?php }
    wp_reset_postdata(); 
    $content=ob_get_clean();
    return $content;
    
    }
  }
  
  add_shortcode('travels','easyit_travel_shortcode'); 
?>