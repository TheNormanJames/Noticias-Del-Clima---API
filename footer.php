<section class="section newsletter">
 <div class="container-pcL">
  <h3 class="newsletter__title">News letter</h3>
  <input
   type="email"
   id="newsletterInput"
   class="newsletterInput"
   placeholder="Ingresa tu correo Electrónico" />
 </div>
</section>
</main>
<footer class="footer">
 <div class="container-pcL">
  <div class="footer__textContent">
   <p class="footer__subTitle">
    <?php echo get_theme_mod('nnj_footer_subtitle', '¿Listo para explorar el clima con nosotros?'); ?>
   </p>
   <h3 class="footer__title"><?php echo get_theme_mod('nnj_footer_title', 'Conoce más de la api'); ?></h3>
   <!-- <button type="button" class="btn">Pruébalo gratis</button> -->
   <a class="btn" href="<?php echo esc_url(get_theme_mod('nnj_cta_url_footer', '#')); ?>" target="_blank" rel="noopener noreferrer"><button type="button"><?php echo get_theme_mod('nnj_footer_btntext', 'Pruébalo gratis'); ?></button></a>
  </div>
  <img
   src="<?php echo get_template_directory_uri(); ?>/assets/undraw_woman_computer.svg"
   alt="woman sitting front computer"
   class="footer__img" />
 </div>
 <div class="footer__bottomBanner">
  <div class="container-pcL">
   <nav class="footer__menu">

    <?php wp_nav_menu(array(
     'container' => false,
     'menu_class' => 'footer__menuList',
     'theme_location' => 'menu-footer',
    )); ?>
    <!-- <ul class="footer__menuList">
     <li class="footer__menuItem">
      <a href="#Inicio">Inicio</a>
     </li>
     <li class="footer__menuItem">
      <a href="#Sobre Nosotros">Sobre Nosotros</a>
     </li>
     <li class="footer__menuItem"><a href="#Blog">Blog</a></li>
    </ul> -->
   </nav>
   <p class="footer__rights">
    2025© - <a href="<?php echo esc_url(get_theme_mod('nnj_footer_rights', '#')); ?>" class="rights">derechos reservados </a>
   </p>
  </div>
 </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>