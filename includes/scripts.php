<?php
function nnj_assets()
{
 wp_register_style("google-font", "https://fonts.googleapis.com/css2?family=ADLaM+Display", array(), false, 'all');
 wp_register_style("google-font-2", "https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&display=swap", array(), false, 'all');

 wp_enqueue_style("estilos", get_stylesheet_directory_uri() . "/assets/css/style.css", array("google-font"));


 if (!is_page_template('plantilla-sobre-nosotros.php')) {
  wp_enqueue_script("clima-js", get_stylesheet_directory_uri() . "/assets/js/script.js", array(), '1.0.0', true);
  wp_script_add_data('clima-js', 'type', 'module');
 } else {
  wp_enqueue_style("sobre_nosotros", get_stylesheet_directory_uri() . "/assets/css/sobre_nosotros.css", array("google-font"));
  //  wp_enqueue_style("about", get_stylesheet_directory_uri() . "/assets/css/wenas.css");
 }
 // wp_enqueue_script("clima-js", get_stylesheet_directory_uri() . "/assets/js/script.js", array(), '1.0.0', true);
 // wp_script_add_data('clima-js', 'type', 'module');
}

add_action("wp_enqueue_scripts", "nnj_assets", 20);
