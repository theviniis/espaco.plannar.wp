<!DOCTYPE html>
<html lang="pt-BR" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Titulo -->
    <title><?php bloginfo('name'); ?></title>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/icon/favicon.ico" />

    <script type="module">
      document.documentElement.classList.remove("no-js");
      document.documentElement.classList.add("js");
    </script>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <!-- css -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/plugins/splide-default.min.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/plugins/splide-custom.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/plugins/hamburguer.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/global.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css" />

    <?php wp_head(); ?>
  </head>

  <body>
    <!-- inicio do header -->
    <header class="header">
      <nav>
        <a href="#"
          ><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-timbrado.svg" alt="Espaço Plannar" class="logo"
        /></a>
        <button
          class="hamburger hamburger--collapse"
          id="hamburger-icon"
          type="button"
        >
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>

        <ul class="menu">
          <li><a href="#">Início</a></li>
          <li><a href="#quem-sou">Quem sou</a></li>
          <li><a href="#servicos">Serviços</a></li>
          <li><a href="#contato">Contato</a></li>

          <ul class="menu-social">
            <li>
              <a href="https://wa.me/+5511977812979"
                ><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/whatsapp.svg" alt="whatsapp" class="icon"
              /></a>
            </li>
            <li>
              <a href="https://www.instagram.com/espacoplannar/"
                ><img
                  src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/instagram.svg"
                  alt="instagram"
                  class="icon"
              /></a>
            </li>
            <li>
              <a href="https://fb.com/espacoplannar/"
                ><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/facebook.svg" alt="facebook" class="icon"
              /></a>
            </li>
          </ul>

          <a href="#" class="__logo"
            ><img
              src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-timbrado.svg"
              alt="Logo Espaço Plannar"
              class="logo"
          /></a>
        </ul>
      </nav>
    </header>
    <!-- final do header -->