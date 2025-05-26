<!DOCTYPE html>
<html lang="es">

<head>
 <meta charset="UTF-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="preconnect" href="https://fonts.googleapis.com" />
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
 <link
  href="https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Afacad:ital,wght@0,400..700;1,400..700&display=swap"
  rel="stylesheet" />
 <!-- <title>Noticias Del Clima - API</title> -->
 <meta name="description" content="<?php bloginfo('description'); ?>">
 <?php wp_head(); ?>
</head>

<body>

 <nav class="mainNav">
  <!-- <ul class="mainNav__list textShadow noMobile">

   <li class="mainNav__item">
    <a href="#SobreNosotros">Sobre Nosotros</a>
   </li>
   <li class="mainNav__item">
    <a href="#SobreNosotros"><img
      class="mainNav__logo"
      src="<?php echo get_template_directory_uri(); ?>/assets/logo.png"
      alt="Logo principal del proyecto" /></a>
   </li>
   <li class="mainNav__item"><a href="#Blog">Blog</a></li>
  </ul> -->
  <?php
  wp_nav_menu(array(
   'container' => false,
   'menu_class' => 'mainNav__list textShadow noMobile',
   'theme_location' => 'menu-principal',
   'walker' => new NNJ_Logo_In_Menu_Walker(),
  )); ?>
  <div class="mainNav__mobile noPc">
   <a href="<?php echo home_url(); ?>"><img
     class="mainNav__logo"
     src="<?php echo get_template_directory_uri(); ?>/assets/logo.png"
     alt="Logo principal del proyecto" /></a>
   <img
    class="mainNav__hamburger"
    src="<?php echo get_template_directory_uri(); ?>/assets/icons/hamburger.svg"
    alt="Icono de Hamburguesa"
    id="mainNav__hamburger" />
  </div>
  <ul id="mainNav__list__mobile" class="mainNav__list textShadow noPc">
   <?php
   wp_nav_menu(array(
    'theme_location' => 'menu-responsive',
    'container' => false,
    'items_wrap' => '%3$s', //removiendo el ul
    'walker' => new Mobile_Menu_Walker()
   ));
   ?>
   <!-- <li class="mainNav__item">
    <a href="/">Inicio</a>
   </li>
   <li class="mainNav__item">
    <a href="/sobreNosotros">Sobre Nosotros</a>
   </li>
   <li class="mainNav__item"><a href="#Blog">Blog</a></li> -->
   <div class="socialMedia">
    <div class="socialMedia__icon">
     <img src="<?php echo get_template_directory_uri(); ?>/assets/Facebook.svg" alt="icono de Facebook" />
    </div>
    <div class="socialMedia__icon">
     <img src="<?php echo get_template_directory_uri(); ?>/assets/WhatsApp.svg" alt="icono de WhatsApp" />
    </div>
    <div class="socialMedia__icon">
     <img src="<?php echo get_template_directory_uri(); ?>/assets/Instagram.svg" alt="icono de Instagram" />
    </div>
    <div class="socialMedia__icon">
     <img src="<?php echo get_template_directory_uri(); ?>/assets/Linkedin.svg" alt="icono de Linkedin" />
    </div>
   </div>
  </ul>
  <!-- <div class="mainNav__mobile__slider">
      </div> -->
 </nav>

 <?php
 $is_homepage = is_front_page();
 ?>

 <?php if ($is_homepage): ?>
  <header class="header">
   <div class="header__content">
    <?php if (get_theme_mod('nnj_show_social_icons', true)): ?>
     <div class="socialMedia">
      <div class="socialMedia__icon">
       <img src="<?php echo get_template_directory_uri(); ?>/assets/Facebook.svg" alt="icono de Facebook" />
      </div>
      <div class="socialMedia__icon">
       <img src="<?php echo get_template_directory_uri(); ?>/assets/WhatsApp.svg" alt="icono de WhatsApp" />
      </div>
      <div class="socialMedia__icon">
       <img src="<?php echo get_template_directory_uri(); ?>/assets/Instagram.svg" alt="icono de Instagram" />
      </div>
      <div class="socialMedia__icon">
       <img src="<?php echo get_template_directory_uri(); ?>/assets/Linkedin.svg" alt="icono de Linkedin" />
      </div>
     </div>
    <?php endif; ?>
    <h1 class="header__title"> <?php echo the_title(); ?></h1>
    <p class="header_subtitle">
     <!-- Descubre las condiciones climáticas de tu ciudad y mantente preparado -->
     <!-- con datos precisos y actualizados. -->
     <?php echo get_theme_mod('nnj_header_subtitle', 'Texto por defecto si no hay valor.'); ?>
    </p>
    <a class="btn" href="<?php echo esc_url(get_theme_mod('nnj_cta_url', '#')); ?>" target="_blank" rel="noopener noreferrer"><button type="button"><?php echo get_theme_mod('nnj_header_btntext', 'Ver API'); ?></button></a>
   </div>
  </header>


 <?php else: ?>

  <header class="header otherPages">
   <div class="container-pcL">

    <div class="header__content">
     <h1 class="header__title"> <?php
                                if (is_home()) {
                                 echo get_the_title(get_option('page_for_posts'));
                                } else {
                                 the_title();
                                }
                                ?></h1>
     <p class="header_subtitle">
      <?php echo get_theme_mod('nnj_header_subtitle', 'Texto por defecto si no hay valor.'); ?>
     </p>
    </div>
   </div>
  </header>
 <?php endif; ?>