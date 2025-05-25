<?php
function nnj_theme_customizer($wp_customize)
{
 // Sección para el Header
 $wp_customize->add_section('nnj_header_section', array(
  'title' => 'Header',
  'priority' => 30,
 ));

 // Campo para el subtítulo
 $wp_customize->add_setting('nnj_header_subtitle', array(
  'default' => 'Descubre las condiciones climáticas de tu ciudad y mantente preparado con datos precisos y actualizados.',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_header_subtitle_control', array(
  'label' => 'Subtítulo del Header',
  'section' => 'nnj_header_section',
  'settings' => 'nnj_header_subtitle',
  'type' => 'textarea',
 ));

 // Carga de Imagen
 $wp_customize->add_setting('nnj_heroImage', array(
  'default' => '',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control(new WP_Customize_Image_Control(
  $wp_customize,
  'nnj_logo_control',
  array(
   'label' => 'Subir Hero Image',
   'section' => 'nnj_header_section',
   'settings' => 'nnj_heroImage',
  )
 ));

 //*------------------------------------------------*/
 //#region //* Selector de Menú Desplegable (Estilo del Banner)


 // $wp_customize->add_setting('nnj_banner_style', array(
 //  'default' => 'estiloClasico',
 //  'transport' => 'refresh',
 // ));

 // $wp_customize->add_control('nnj_banner_style_control', array(
 //  'label' => 'Estilo del Banner',
 //  'section' => 'nnj_header_section',
 //  'settings' => 'nnj_banner_style',
 //  'type' => 'select',
 //  'choices' => array(
 //   'estiloClasico' => 'Estilo Clásico',
 //   'estiloModerno' => 'Estilo Moderno',
 //   'estiloMinimalista' => 'Estilo Minimalista',
 //  ),
 // ));

 //#endregion //! Selector de Menú Desplegable (Estilo del Banner)


 //*------------------------------------------------*/
 //#region //* Show Social Media

 $wp_customize->add_setting('nnj_show_social_icons', array(
  'default' => true,
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_show_social_icons_control', array(
  'label' => 'Mostrar Íconos Sociales',
  'section' => 'nnj_header_section',
  'settings' => 'nnj_show_social_icons',
  'type' => 'checkbox',
 ));

 //#endregion //! Show Social Media

 //*------------------------------------------------*/
 //#region //* Button

 // URL
 $wp_customize->add_setting('nnj_cta_url', array(
  'default' => '#',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_cta_url_control', array(
  'label' => 'URL del Botón',
  'section' => 'nnj_header_section',
  'settings' => 'nnj_cta_url',
  'type' => 'url',
 ));
 // Text value
 // Campo para el subtítulo
 $wp_customize->add_setting('nnj_header_btntext', array(
  'default' => 'Ver API',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_header_btntext_control', array(
  'label' => 'Texto Del Botón',
  'section' => 'nnj_header_section',
  'settings' => 'nnj_header_btntext',
  'type' => 'textarea',
 ));

 //#endregion //! url Button

}
add_action('customize_register', 'nnj_theme_customizer');

function nnj_heroImg_custom_background_css()
{
 $logo_url = get_theme_mod('nnj_heroImage');

 if ($logo_url) {
?>
  <style>
   .header {
    background: linear-gradient(147deg, color-mix(in srgb, var(--color-azul-100) 50%, transparent), color-mix(in srgb, var(--color-azul-800) 100%, transparent)), url('<?php echo esc_url($logo_url); ?>') center / cover;
   }
  </style>
<?php
 }
}
add_action('wp_head', 'nnj_heroImg_custom_background_css');


//*------------------------------------------------*/
//#region //* Footer
function nnj_theme_customizer_footer($wp_customize)
{
 // Sección para el Footer
 $wp_customize->add_section('nnj_footer_section', array(
  'title' => 'Footer',
  'priority' => 30,
 ));

 // Campo para el subtítulo
 $wp_customize->add_setting('nnj_footer_subtitle', array(
  'default' => '¿Listo para explorar el clima con nosotros?',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_footer_subtitle_control', array(
  'label' => 'Subtítulo del Footer',
  'section' => 'nnj_footer_section',
  'settings' => 'nnj_footer_subtitle',
  'type' => 'textarea',
 ));
 // Campo para el Título
 $wp_customize->add_setting('nnj_footer_title', array(
  'default' => 'Conoce más de la api',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_footer_title_control', array(
  'label' => 'Título del Footer',
  'section' => 'nnj_footer_section',
  'settings' => 'nnj_footer_title',
  'type' => 'textarea',
 ));


 //*------------------------------------------------*/
 //#region //* Button

 // URL
 $wp_customize->add_setting('nnj_cta_url_footer', array(
  'default' => '#',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_cta_url_footer_control', array(
  'label' => 'URL del Botón',
  'section' => 'nnj_footer_section',
  'settings' => 'nnj_cta_url_footer',
  'type' => 'url',
 ));
 // Text value
 // Campo para el subtítulo
 $wp_customize->add_setting('nnj_footer_btntext', array(
  'default' => 'Pruébalo gratis',
  'transport' => 'refresh',
 ));

 $wp_customize->add_control('nnj_footer_btntext_control', array(
  'label' => 'Texto Del Botón',
  'section' => 'nnj_footer_section',
  'settings' => 'nnj_footer_btntext',
  'type' => 'textarea',
 ));

 //#endregion //! url Button

}
add_action('customize_register', 'nnj_theme_customizer_footer');


//#endregion //! Footer