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
 <!-- <link rel="stylesheet" href="style.css" /> -->
 <!-- <link rel="stylesheet" href="style.css" /> -->
 <!-- <title>Noticias Del Clima - API</title> -->
 <meta name="description" content="<?php bloginfo('description'); ?>">
 <?php wp_head(); ?>
</head>

<body>

 <nav class="mainNav">
  <ul class="mainNav__list textShadow noMobile">

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
  </ul>
  <div class="mainNav__mobile noPc">
   <a href="#SobreNosotros"><img
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
   <li class="mainNav__item">
    <a href="/">Inicio</a>
   </li>
   <li class="mainNav__item">
    <a href="/sobreNosotros">Sobre Nosotros</a>
   </li>
   <li class="mainNav__item"><a href="#Blog">Blog</a></li>
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