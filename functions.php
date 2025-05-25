<?php
foreach (glob(get_template_directory() . '/includes/*.php') as $archivo) {
 require_once $archivo;
}
