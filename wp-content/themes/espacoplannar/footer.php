    <!-- abre footer -->
    <footer>
      <h3 class="titulo">Navegação</h3>

      <nav class="footer-menu">
        <ul>
          <li><a href="#">Início</a></li>
          <li><a href="#quem-sou">Quem sou</a></li>
          <li><a href="#servicos">Serviços</a></li>
          <li><a href="#contato">Contato</a></li>
        </ul>
      </nav>

      <ul class="footer-social">
        <li>
          <a href="https://wa.me/+55<?php echo get_post_meta(get_the_ID(), 'whatsapp', true); ?>" target="_blank">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/whatsapp.svg" alt="whatsapp" class="icon" />/
            <?php echo get_post_meta(get_the_ID(), 'whatsapp', true); ?>
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com<?php echo get_post_meta(get_the_ID(), 'instagram', true); ?>" target="_blank"
            ><img
              src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/instagram.svg"
              alt="instagram"
              class="icon"
            /><?php echo get_post_meta(get_the_ID(), 'instagram', true); ?></a
          >
        </li>
        <li>
          <a href="https://fb.com/<?php echo get_post_meta(get_the_ID(), 'facebook', true); ?>/" target="_blank">
            <img
              src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/facebook.svg"
              alt="facebook"
              class="icon"
            /><?php echo get_post_meta(get_the_ID(), 'facebook', true); ?></a
          >
        </li>
      </ul>

      <ul class="footer-ctt">
        <li>
          <a href="mailto:<?php echo get_post_meta(get_the_ID(), 'email', true); ?>" target="_blank">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/email.svg" alt="email" class="icon" />
            <?php echo get_post_meta(get_the_ID(), 'email', true); ?></a
          >
        </li>
        <li>
          <img
            src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/clock.svg"
            alt="horário de atendimento"
            class="icon"
          />
          <p><?php echo get_post_meta(get_the_ID(), 'atendimento', true); ?></p>
        </li>
        <li><p>2021 - Todos os direitos reservados</p></li>
      </ul>

      <a
        href="https://www.instagram.com/_9venta/"
        target="_blank"
        class="footer-logo"
      >
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo  b.svg" alt="9venta por cento" class="logo"
      /></a>
    </footer>
    
    <!-- scripts js -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins/splide.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/script.js"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer=""></script>    
    <?php wp_footer(); ?>
  </body>
</html>
    <!-- fecha footer -->