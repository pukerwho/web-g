<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('Штаб') )
  ->add_tab( __('YouTube'), array(
    Field::make( 'image', 'crb_youtube_new_cover', 'Обложка для ютуба' ),
    Field::make( 'text', 'crb_youtube_new_link', 'Ссылка на новое видео' ),
  ))
  ->add_tab( __('Cайдбар'), array(
    Field::make( 'complex', 'crb_best_hosters', 'Рейтинг хостеров' )->set_layout( 'tabbed-vertical' )->add_fields( array(
      Field::make( 'text', 'crb_best_hoster_name', 'Название хостера' ),
      Field::make( 'text', 'crb_best_hoster_link', 'Ссылка на хостера' ),
      Field::make( 'text', 'crb_best_hoster_rating', 'Рейтинг хостера' ),
    )),
    Field::make( 'complex', 'crb_best_courses', 'Лучшие курсы' )->set_layout( 'tabbed-vertical' )->add_fields( array(
      Field::make( 'text', 'crb_best_course_name', 'Название курса' ),
      Field::make( 'text', 'crb_best_course_link_ua', 'Ссылка на UA' ),
      Field::make( 'text', 'crb_best_course_link_ru', 'Ссылка на RU' ),
    )),
  ))
  ->add_tab( __('Скрипты'), array(
    Field::make( 'textarea', 'crb_google_analytics', 'Google Analytics' ),
    Field::make( 'footer_scripts', 'crb_footer_scripts', 'Скрипты в футере' )
  ));
}

?>