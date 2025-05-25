<?php
foreach (glob(get_template_directory() . '/includes/*.php') as $archivo) {
 require_once $archivo;
}

function nnj_enqueue_scripts()
{
 wp_enqueue_script('nnj-script', get_template_directory_uri() . '/js/script.js', array(), null, true);


 $main_city = get_theme_mod('nnj_weather_city', 'bogota');
 $main_country = get_theme_mod('nnj_weather_country', 'Colombia');

 $others = array(
  array(
   'city' => get_theme_mod('nnj_weather_city_two', 'madrid'),
   'country' => get_theme_mod('nnj_weather_country_two', 'España'),
  ),
  array(
   'city' => get_theme_mod('nnj_weather_city_third', 'london'),
   'country' => get_theme_mod('nnj_weather_country_third', 'United Kingdom'),
  ),
  array(
   'city' => get_theme_mod('nnj_weather_city_four', 'oslo'),
   'country' => get_theme_mod('nnj_weather_country_four', 'Norway'),
  ),
  array(
   'city' => get_theme_mod('nnj_weather_city_five', 'new york'),
   'country' => get_theme_mod('nnj_weather_country_five', 'United States'),
  ),
 );




 wp_localize_script('nnj-script', 'nnjWeatherSettings', array(
  'search' => array(
   'city' => $main_city,
   'country' => $main_country,
  ),
  'othersCitys' => $others,
 ));
}
add_action('wp_enqueue_scripts', 'nnj_enqueue_scripts');
