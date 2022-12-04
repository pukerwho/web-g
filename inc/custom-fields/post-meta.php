<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      Field::make( 'text', 'crb_post_title', 'Title' ),
      Field::make( 'textarea', 'crb_post_description', 'Description' ),
      Field::make( 'html', 'crb_heading_author', __( 'INFO Heading' ) )->set_html( sprintf( '<b>АВТОР</b>' ) ),
      Field::make( 'text', 'crb_post_author', 'Автор' ),
      Field::make( 'text', 'crb_post_author_instagram', 'Інстаграм автора' ),
      Field::make( 'text', 'crb_post_author_facebook', 'Фейсбук автора' ),
      Field::make( 'association', 'crb_similar_links', 'Похожие ссылки')
      ->set_types( array(
        array(
          'type'      => 'post',
          'post_type' => 'post',
        )
      ) )
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'questions' )
    ->add_fields( array(
      Field::make( 'checkbox', 'crb_q_solved', 'Решено?' ),
  ) );  
}

?>