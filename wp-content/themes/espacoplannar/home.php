<?php 
  //Template Name: Home
?>
<?php get_header(); ?>
<?php if(have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- abre banner -->
    <div class="banner splide" id="image-slider" data-aos="fade-up">
      <article class="splide__track">
        <ul class="splide__list">
          <?php 
            $banners = get_post_meta(get_the_ID(), 'banners', true);
            if(isset($banners)) { foreach($banners as $banner) {
          ?>
            <li class="splide__slide banner_item">
              <picture>
                <img
                  src="<?php echo $banner['banner'] ?>"
                />
                <source
                  srcset="<?php echo $banner['mobile'] ?>"
                  media="(max-width: 600px)"
                /> 
              </picture>
            </li>
          <?php } } ?>
        </ul>
      </article>
    </div>
    <!-- fecha banner -->

    <!-- abre quebra -->
    <svg
      xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 0 1920 179"
      class="quebra"
    >
      <defs>
        <style>
          .quebra .cls-1 {
            fill: #fff;
            stroke: #707070;
          }
          .quebra .cls-3 {
            fill: none;
            stroke: #127e7b;
            stroke-miterlimit: 10;
            stroke-width: 6px;
          }
        </style>
      </defs>
      <g id="linha-quebra" class="cls-2" transform="translate(0 -1164)">
        <path
          id="Elementos_site_Prancheta_1_cópia_2"
          data-name="Elementos site_Prancheta 1 cópia 2"
          class="cls-3 quebra-1"
          d="M2.94,977.24S23.588,682.677,391.99,779.1,915.07,909.036,1002.257,759.73c16.873-46.715-22.5-68.321-56.248-56.486-51.233,17.946-6.951,101.683,39.839,129.855,54.844,33.025,166.946,35.737,245.137-12.977,73.121-45.521,178.79-22.241,329.98,15.766,97.027,24.4,162.925-3.555,166.387,26.187,1.649,14.053-37.181,21.865-43.818-37.048s10.9-106.212-17.582-106.212c-24.369,0-35.668,26.355-32.574,38.164,1.172,4.464,9.377,6.242,12.907-.1,4.171-7.487-24.288-39.773-53.154-19.465-27.968,19.737-2.044,92.924,105.382,82.218s254.419-37.035,428.643,14.274c260.607,76.755,686.2,80.194,663.749-300.169S2803.989,21.012,2897.731,12.24"
          transform="translate(-339.306 467.576)"
        ></path>
      </g>
    </svg>
    <!-- fecha quebra -->

    <!-- abre quem sou -->
    <section class="quem-sou" id="quem-sou" data-aos="fade-up">
      <h3 class="titulo full-bleed"><?php echo get_post_meta(get_the_ID(), 'quem_sou_titulo', true); ?></h3>
      <article class="quem-sou-content">
        <p><?php echo get_post_meta(get_the_ID(), 'quem_sou_conteudo', true); ?></p>
        <img src="<?php echo get_post_meta(get_the_ID(), 'quem_sou_foto', true); ?>" class="quem-sou-img" />
      </article>
    </section>
    <!-- fecha quem sou -->

    <!-- abre quote -->
    <article class="quote" data-aos="fade-up">
      <blockquote><?php echo get_post_meta(get_the_ID(), 'quote_conteudo', true); ?></blockquote>
      <cite><?php echo get_post_meta(get_the_ID(), 'quote_cite', true); ?></cite>
    </article>
    <!-- fecha quote -->

    <!-- abre depoimentos -->
    <div class="splide depoimentos" data-aos="fade-up">
      <h3>
      <?php echo get_post_meta(get_the_ID(), 'depoimentos_titulo', true); ?>
      </h3>
      <div class="splide__track">
        <ul class="splide__list">
          <?php 
            $depoimentos =  get_post_meta(get_the_ID(), 'depoimentos', true);
            if(isset($depoimentos)) {foreach($depoimentos as $depoimento) {
          ?>
            <li class="splide__slide">
              <div class="depoimento">
                <p><?php echo $depoimento['depoimento'] ?></p>
                <cite><?php echo $depoimento['cite'] ?></cite>
              </div>
            </li>
          <?php }} ?>
        </ul>
      </div>
    </div>
    <!-- fecha depoimentos -->

    <!-- abre apresentacao -->
    <section class="apresentacao" id="apresentacao" data-aos="fade-up">
      <div
        class="apresentacao-img"
        data-aos="fade-right"
        data-aos-easing="ease-in-sine"
        data-aos-delay="200"
        data-aos-duration="600"
      ></div>
      <div class="apresentacao-conteudo">
        <h3>
          <?php echo get_post_meta(get_the_ID(), 'apresentacao_titulo', true); ?></h3>
        <p>
          <?php echo get_post_meta(get_the_ID(), 'apresentacao_conteudo', true); ?>
        </p>
      </div>
      <div
        id="container"
        class="container"
        data-aos="slide-right"
        data-aos-easing="ease-in-sine"
        data-aos-delay="400"
        data-aos-duration="650"
      >
        <div id="scene" class="scene">
          <img
            src="<?php echo get_stylesheet_directory_uri(); ?>/img/passaro-1.png"
            alt="Beija Flor Verde"
            class="apresentacao-passaro"
            id="apresentacao-passaro"
            data-depth="0.2"
          />
        </div>
      </div>
    </section>
    <!-- fecha -->

    <!-- abre servicos -->
    <section class="servicos splide" id="servicos" data-aos="fade-up">
      <h3 class="titulo"><?php echo get_post_meta(get_the_ID(), 'servicos_titulo', true); ?></h3>
      <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">
              <img
                src="<?php echo get_stylesheet_directory_uri(); ?>/img/servicos-1.svg"
                alt="Orientação Profissional"
                class="livro"
              />
              <?php
                $servicos_1 = get_post_meta(get_the_ID(), 'servico_1', true);
                if(isset($servicos_1)) {foreach($servicos_1 as $servico_1) {
              ?>
                <h3>
                  <?php echo $servico_1['titulo']; ?>
                </h3>
                <p>
                  <?php echo $servico_1['conteudo']; ?> 
                </p>
              <?php }} ?>
            </li>
            <li class="splide__slide">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/servicos-2.svg" alt="Plantão Psicológico" />
              <?php 
                $servicos_2 = get_post_meta(get_the_ID(), 'servico_2', true);
                if(isset($servicos_2)) {foreach($servicos_2 as $servico_2) {
              ?>
                <h3>
                  <?php echo $servico_2['titulo']; ?>
                </h3>
                <p>
                  <?php echo $servico_2['conteudo']; ?> 
                </p>
              <?php }} ?>
            </li>
            <li class="splide__slide">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/servicos-3.svg" alt="Consultoria empresarial" />
              <?php 
                $servicos_3 = get_post_meta(get_the_ID(), 'servico_3', true);
                if(isset($servicos_3)) {foreach($servicos_3 as $servico_3) {
              ?>
                <h3>
                  <?php echo $servico_3['titulo']; ?>
                </h3>
                <p>
                  <?php echo $servico_3['conteudo']; ?> 
                </p>
              <?php }} ?>
            </li>
            <li class="splide__slide">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/servicos-4.svg" alt="Webnário" />
              <?php 
                $servicos_4 = get_post_meta(get_the_ID(), 'servico_4', true);
                if(isset($servicos_4)) {foreach($servicos_4 as $servico_4) {
              ?>
                <h3>
                  <?php echo $servico_4['titulo']; ?>
                </h3>
                <p>
                  <?php echo $servico_4['conteudo']; ?> 
                </p>
              <?php }} ?>
            </li>
            <li class="splide__slide">
              <img
                src="<?php echo get_stylesheet_directory_uri(); ?>/img/servicos-5.svg"
                alt="Terapia fora das quatro paredes"
              />
              <?php 
                $servicos_5 = get_post_meta(get_the_ID(), 'servico_5', true);
                if(isset($servicos_5)) {foreach($servicos_5 as $servico_5) {
              ?>
                <h3>
                  <?php echo $servico_5['titulo']; ?>
                </h3>
                <p>
                  <?php echo $servico_5['conteudo']; ?> 
                </p>
              <?php }} ?>
            </li>
        </ul>
      </div>
      <button class="btn">Agende sua consulta</button>
    </section>
    <!-- fecha servicos -->

  
    <!-- abre modal -->
    <div class="modal_bg">
      <div class="modal_agendamento">
        <?php echo apply_filters( 'the_content', $post->post_content ); ?>
        <span class="material-icons"> close </span>
      </div>

    </div>
    <!-- abre modal -->

    <!-- instagram feed -->
    <div class="instagram_feed"  data-aos="fade-up">
      <h3 class="titulo">Nos siga no Instagram!</h3>
      <div class="elfsight-app-632fc714-4590-4555-b555-88f10f647ec9"></div>

    </div>
    <!-- instagram feed -->

    <!-- abre investimento -->
    <section class="investimento" data-aos="fade-up">
      <div
        class="container"
        data-aos="slide-left"
        data-aos-easing="ease-in-sine"
        data-aos-delay="400"
        data-aos-duration="650"
      >
        <div id="investimento-scene" class="scene">
          <img
            src="<?php echo get_stylesheet_directory_uri(); ?>/img/passaro-2.png"
            alt="Beija flor verde"
            class="passar]o-2"
            data-depth="0.2"
          />
        </div>
      </div>
      <h3 style="grid-area: titulo">
        <?php echo get_post_meta(get_the_ID(), 'crescimento_titulo', true); ?>
      </h3>
      <h3 style="grid-area: subtitulo">
        <?php echo get_post_meta(get_the_ID(), 'crescimento_sub', true); ?>
      </h3>
      <div class="col-2" style="grid-area: conteudo">
        <p>
          <?php echo get_post_meta(get_the_ID(), 'crescimento_conteudo', true); ?>
        </p>
        <button class="btn">Ver Documentos</button>
      </div>
    </section>
    <!-- fecha investimento -->

    <!-- abre contato -->
    <section class="contato" id="contato" data-aos="fade-up">
      <h3 class="titulo" style="grid-area: titulo">Contato</h3>

      <p class="endereco" style="grid-area: end">
        <span style="font-weight: bold">Endereço:</span> <?php echo get_post_meta(get_the_ID(), 'endereco', true); ?>
      </p>

      <form class="formphp formulario" 
        style="grid-area: contato" 
        action="<?php echo get_stylesheet_directory_uri(); ?>/eviar.php"
        method="POST"
        name="form">
        <div>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ctt-nome.svg" alt="borda do formulário" />
          <input
            name="nome"
            id="nome"
            type="text"
            placeholder="nome"
            class="nome"
            required
          />
        </div>
        <div>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ctt-email.svg" alt="borda do formulário" />
          <input
            type="email"
            name="email"
            id="email"
            placeholder="e-mail"
            class="email"
            required
          />
        </div>
        <div>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ctt-msg.svg" alt="borda do formulário" />
          <textarea
            name="mensagem"
            id="mensagem"
            placeholder="mensagem"
            class="mensagem"
            cols="2"
            rows="5"
            maxlength="500"
            required
          ></textarea>
          <button id="enviar"
          type="submit"
          class="btn">enviar</button>
        </div>
      </form>

      <img
        src="<?php echo get_stylesheet_directory_uri(); ?>/img/ctt-path.svg"
        alt="Borda do formulário"
        class="ctt-path full-bleed"
      />

      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="Espaço Plannar" class="logo full-bleed" />
    </section>
    <!-- fecha contato -->

    <!-- abre whatsapp-btn -->
    <a
      href="https://wa.me/+5511977812979"
      target="_blank"
      class="whatsapp-btn"
      data-aos="fade-up"
      ><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/whatsapp-btn.png" alt="Fale conosco pelo Whatsapp"
    /></a>
    <!-- fecha whatsapp-btn -->

    <div class="modal">
      <span class="material-icons"> close </span>
      <h3 class="titulo">Documentos</h3>
      <ul>
        <?php 
        $documentos = get_post_meta(get_the_ID(), 'lista_de_documentos', true);
        if(isset($documentos)) {foreach($documentos as $documento) {
        ?>
          <li><?php echo $documento['documento'] ?></li>
        <?php }}?>
      </ul>
    </div>

    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php get_footer(); ?>
