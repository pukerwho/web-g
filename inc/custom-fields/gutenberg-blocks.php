<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( 'Treba Important Block' )
	->add_fields( array(
		Field::make( 'text', 'crb_block_important_title', 'Заголовок блока' ),
		Field::make( 'rich_text', 'crb_block_important_content', 'Контент блока' ),
    Field::make( 'select', 'crb_block_important_style', 'Стиль' )
    ->add_options( array(
      'notice' => 'Notice',
      'info' => 'Info',
      'list' => 'List',
      'danger' => 'Danger',
    ) ),
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		?>

    <div class="block">
      <?php
      $get_border_style = esc_html( $fields['crb_block_important_style'] );
      switch ($get_border_style) {
        case 'notice':
          $border_style = 'bg-green-100 dark:bg-dark-xl border-green-300 dark:border-green-200 border-2';
          $block_icon = 'notice-icon';
          break;
        case 'list':
          $border_style = 'bg-yellow-100 dark:bg-dark-xl border-yellow-300 dark:border-yellow-200 border-2';
          $block_icon = 'list-icon';
          break;
        case 'danger':
          $border_style = 'bg-red-100 dark:bg-dark-xl border-red-300 dark:border-red-200 border-2';
          $block_icon = 'danger-icon';
          break;
        case 'info':
          $border_style = 'bg-sky-100 dark:bg-dark-xl border-sky-300 dark:border-sky-200 border-2';
          $block_icon = 'info-icon';
          break;
      }
      ?>
      <div class="border rounded-lg p-6 <?php echo $border_style; ?>"> 
        <div class="flex items-center mb-4">
          <div class="hidden text-gray-800 dark:text-gray-200 mr-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/<?php echo $block_icon; ?>.svg" class="not-content">
          </div>
          <?php if ($fields['crb_block_important_title']): ?>
            <div class="text-gray-800 dark:text-gray-200 text-xl font-bold"><?php echo esc_html( $fields['crb_block_important_title'] ); ?></div>
          <?php endif; ?>
        </div>
        <div class="content">
          <?php echo apply_filters( 'the_content', $fields['crb_block_important_content'] ); ?>
        </div>
      </div>
    </div>

		<?php
	} );