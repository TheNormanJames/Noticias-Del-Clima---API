<?php get_header(); ?>

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
<main class="main">

 <?php get_footer(); ?>