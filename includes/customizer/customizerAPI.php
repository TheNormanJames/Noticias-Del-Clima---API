<?php
function nnj_weather_customizer($wp_customize)
{
 $wp_customize->add_section('nnj_weather_section', array(
  'title' => 'Ajustes del Clima',
  'priority' => 30,
 ));

 $wp_customize->add_setting('nnj_weather_city', array(
  'default' => 'bogota',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_city_control', array(
  'label' => 'Ciudad principal',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_city',
 ));

 $wp_customize->add_setting('nnj_weather_country', array(
  'default' => 'Colombia',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_country_control', array(
  'label' => 'País principal',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_country',
 ));

 /* Otras ciudades */
 $wp_customize->add_setting('nnj_weather_city_two', array(
  'default' => 'madrid',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_city_two_control', array(
  'label' => 'Ciudad Opción 1',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_city_two',
 ));

 $wp_customize->add_setting('nnj_weather_country_two', array(
  'default' => 'España',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_country_two_control', array(
  'label' => 'País Opción 1',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_country_two',
 ));
 $wp_customize->add_setting('nnj_weather_city_third', array(
  'default' => 'london',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_city_third_control', array(
  'label' => 'Ciudad Opción 2',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_city_third',
 ));

 $wp_customize->add_setting('nnj_weather_country_third', array(
  'default' => 'United Kingdom',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_country_third_control', array(
  'label' => 'País Opción 2',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_country_third',
 ));
 $wp_customize->add_setting('nnj_weather_city_four', array(
  'default' => 'oslo',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_city_four_control', array(
  'label' => 'Ciudad Opción 3',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_city_four',
 ));

 $wp_customize->add_setting('nnj_weather_country_four', array(
  'default' => 'norway',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_country_four_control', array(
  'label' => 'País Opción 3',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_country_four',
 ));
 $wp_customize->add_setting('nnj_weather_city_five', array(
  'default' => 'new york',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_city_five_control', array(
  'label' => 'Ciudad Opción 4',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_city_five',
 ));

 $wp_customize->add_setting('nnj_weather_country_five', array(
  'default' => 'United States',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_weather_country_five_control', array(
  'label' => 'País Opción 4',
  'section' => 'nnj_weather_section',
  'settings' => 'nnj_weather_country_five',
 ));
}
add_action('customize_register', 'nnj_weather_customizer');
