<?php
class NNJ_Logo_In_Menu_Walker extends Walker_Nav_Menu
{
 public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
 {
  // Obteniendo el número total de items
  $menu_items = wp_get_nav_menu_items($args->menu);
  $total_items = count($menu_items);
  $middle_index = floor($total_items / 2);

  // Insertar el logo después del item del medio (middle_index)
  if ($this->get_item_position($item->ID, $menu_items) == $middle_index) {
   $output .= '<li class="mainNav__item logo-item">';
   $output .= '<a href="' . esc_url(home_url('/')) . '">';
   $output .= '<img class="mainNav__logo" src="' . esc_url(get_template_directory_uri() . '/assets/logo.png') . '" alt="Logo">';
   $output .= '</a>';
   $output .= '</li>';
  }

  // Items de la navegación normales del menú
  $output .= '<li class="mainNav__item">';
  $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
  $output .= '</li>';
 }

 private function get_item_position($item_id, $menu_items)
 {
  foreach ($menu_items as $index => $menu_item) {
   if ($menu_item->ID == $item_id) {
    return $index;
   }
  }
  return -1;
 }
}

class Mobile_Menu_Walker extends Walker_Nav_Menu
{
 function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
 {
  $output .= '<li class="mainNav__item">';
  $output .= '<a href="' . $item->url . '">' . $item->title . '</a>';
 }

 function end_el(&$output, $item, $depth = 0, $args = array())
 {
  $output .= '</li>';
 }
}
