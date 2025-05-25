<?php

/**
 * Template Name: Sobre Nosotros
 * Description: Diseño exclusivo para la página "Sobre Nosotros"
 */; ?>


<?php get_header(); ?>


<header class="header aboutHeader">
 <div class="header__content">
  <h1 class="header__title"> <?php echo the_title(); ?></h1>
  <p class="header_subtitle">
   <!-- Descubre las condiciones climáticas de tu ciudad y mantente preparado -->
   <!-- con datos precisos y actualizados. -->
   <?php echo get_theme_mod('nnj_header_subtitle', 'Texto por defecto si no hay valor.'); ?>
  </p>
 </div>
</header>

<main class="pagina-sobre-nosotros">
 <section class="section nuestraHistoria">
  <div class="container-pcL">

   <div class="nuestraHistoria__textContent">

    <p class="nuestraHistoria__subTitle">Nuestra Historia</p>
    <h2 class="nuestraHistoria__title">De una Idea a una Solución Global</h2>
    <p class="nuestraHistoria__description">Fundada en 2020 por un grupo de ingenieros y meteorólogos apasionados, Weather Insights nació como respuesta a la falta de herramientas climáticas intuitivas para el público general. Hoy, servimos a más de 500 mil usuarios mensuales en 30 países</p>
   </div>
   <div class="nuestraHistoria__cite">
    <p class="nuestraHistoria__citeText">
     "Nuestro primer prototipo se desarrolló durante una tormenta histórica en Barcelona, ¡y eso nos inspiró a crear alertas en tiempo real!"
    </p>
   </div>
  </div>
 </section>
 <section class="section mision">
  <div class="container-pcL">
   <div class="mision_data">
    <h2 class="mision__title">Más que Datos, Impacto Real</h2>
    <p class="mision__description">En 2023, lanzamos el primer mapa interactivo de huella de carbono por ciudad en España.</p>
    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/coffe.jpg' alt='Imagen descrptiva de los datos'>
   </div>
   <div class="mision__values">
    <article class="mision_value">
     <h3 class="mision__valueTitle">Sostenibilidad</h3>
     <p class="mision__valueDescription">Promovemos la conciencia ambiental en cada informe.</p>
    </article>
    <article class="mision_value">
     <h3 class="mision__valueTitle">Transparencia</h3>
     <p class="mision__valueDescription">Fuentes de datos verificadas y metodologías abiertas.</p>
    </article>
    <article class="mision_value">
     <h3 class="mision__valueTitle">Innovación</h3>
     <p class="mision__valueDescription">Usamos IA para predicciones 20% más exactas que el promedio.</p>
    </article>
   </div>
  </div>
 </section>
 <section class="section testimonials">
  <!-- <div class="container-pcL"> -->

  <div class="testimonials__sliderArea">
   <div class="testimonials__slider">
    <article class="testimonials__sliderItem">
     <img class="testimonials__sliderTestimonio" src='<?php echo get_template_directory_uri(); ?>/assets/images/testimonio1.jpg' alt='Testimonio 1'>
     <p class="testimonials__sliderTitle">María López</p>
     <p class="testimonials__sliderPosition">(Fundadora & Meteoróloga)</p>
     <p class="testimonials__sliderDescription">"Ex investigadora del Instituto Nacional de Meteorología con 10 años de experiencia."</p>
    </article>
    <article class="testimonials__sliderItem">
     <img class="testimonials__sliderTestimonio" src='<?php echo get_template_directory_uri(); ?>/assets/images/testimonio1.jpg' alt='Testimonio 1'>
     <p class="testimonials__sliderTitle">María López</p>
     <p class="testimonials__sliderPosition">(Fundadora & Meteoróloga)</p>
     <p class="testimonials__sliderDescription">"Ex investigadora del Instituto Nacional de Meteorología con 10 años de experiencia."</p>
    </article>
    <article class="testimonials__sliderItem">
     <img class="testimonials__sliderTestimonio" src='<?php echo get_template_directory_uri(); ?>/assets/images/testimonio1.jpg' alt='Testimonio 1'>
     <p class="testimonials__sliderTitle">María López</p>
     <p class="testimonials__sliderPosition">(Fundadora & Meteoróloga)</p>
     <p class="testimonials__sliderDescription">"Ex investigadora del Instituto Nacional de Meteorología con 10 años de experiencia."</p>
    </article>
   </div>
   <img
    class="testimonials__slider__arrows testimonials__slider__arrowsLeft"
    src="<?php echo get_template_directory_uri(); ?>/assets/icons/Arrow.svg"
    alt="flecha del slider interactivo" />
   <img
    class="testimonials__slider__arrows testimonials__slider__arrowsRight"
    src="<?php echo get_template_directory_uri(); ?>/assets/icons/Arrow.svg"
    alt="flecha del slider interactivo" />
  </div>
  <!-- </div> -->
 </section>
 <?php wp_enqueue_script("aboutjs", get_stylesheet_directory_uri() . "/assets/js/about.js", array(), '1.0.0', true); ?>

 <?php get_footer(); ?>