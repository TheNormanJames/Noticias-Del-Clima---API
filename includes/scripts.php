<?php
function nnj_assets()
{
 wp_register_style("google-font", "https://fonts.googleapis.com/css2?family=ADLaM+Display", array(), false, 'all');
 wp_register_style("google-font-2", "https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap", array(), false, 'all');

 wp_enqueue_style("estilos", get_stylesheet_directory_uri() . "/assets/css/style.css", array("google-font"));


 if (!is_page_template('plantilla-sobre-nosotros.php')) {
  // wp_enqueue_script("clima-js", get_template_directory_uri() . "/assets/js/script.js", array(), '1.0.0', true);
  // wp_script_add_data('clima-js', 'type', 'module');


  wp_enqueue_script(
   'script_clima_js',
   get_template_directory_uri() . "/assets/js/script.js",
   array(),
   null,
   true
  );
  add_filter('script_loader_tag', function ($tag, $handle) {
   if ($handle === 'script_clima_js') {
    return str_replace('<script ', '<script type="module" ', $tag);
   }
   return $tag;
  }, 10, 2);
  // Main script como módulo
  // wp_enqueue_script(
  //     'nnj-main-js',
  //     get_template_directory_uri() . '/assets/js/main.js',
  //     array(), // Sin dependencias
  //     '1.0.0',
  //     true
  // );

  // // Marcar como módulo
  // wp_script_add_data('nnj-main-js', 'type', 'module');
 } else {
  wp_enqueue_style("sobre_nosotros", get_stylesheet_directory_uri() . "/assets/css/sobre_nosotros.css", array("google-font"));
  //  wp_enqueue_style("about", get_stylesheet_directory_uri() . "/assets/css/wenas.css");
 }
 // wp_enqueue_script("clima-js", get_stylesheet_directory_uri() . "/assets/js/script.js", array(), '1.0.0', true);
 // wp_script_add_data('clima-js', 'type', 'module');






}

add_action("wp_enqueue_scripts", "nnj_assets", 20);
