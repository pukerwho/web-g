<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
  ->where( 'term_taxonomy', '=', 'category' )
  ->add_fields( array(
    Field::make( 'image', 'crb_category_img', 'Заглавная картинка' )->set_value_type( 'url'),
    Field::make( 'checkbox', 'crb_category_home_show', 'Показывать на главной?' ),
  ));
}

?>
