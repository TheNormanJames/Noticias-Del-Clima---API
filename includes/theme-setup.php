<?php
function nnj_theme_supports()
{
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
 add_theme_support(
  'custom-logo',
  array(
   "width" => 170,
   "height" => 35,
   "flex-width" => true,
   "flex-height" => true,
  )
 );
}

add_action("after_setup_theme", "nnj_theme_supports");


function plz_add_menus()
{
 register_nav_menus(
  array(
   'menu-principal' => "Menu principal",
   'menu-responsive' => "Menu responsive",
   'menu-footer' => "Menu Footer"
  )
 );
}

add_action("after_setup_theme", "plz_add_menus");
