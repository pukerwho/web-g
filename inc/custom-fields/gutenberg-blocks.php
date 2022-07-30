<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( 'Treba Important Block' )
	->add_fields( array(
		Field::make( 'text', 'crb_block_important_title', 'Заголовок блока' ),
		Field::make( 'rich_text', 'crb_block_important_content', 'Контент блока' ),
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		?>

    <div class="block">
      <div class="border rounded p-6"> 
        <?php if ($fields['crb_block_important_title']): ?>
          <div class="text-gray-800 dark:text-gray-200 text-xl font-bold mb-4"><?php echo esc_html( $fields['crb_block_important_title'] ); ?></div>
        <?php endif; ?>
        <div class="content">
          <?php echo apply_filters( 'the_content', $fields['crb_block_important_content'] ); ?>
        </div>
      </div>
    </div>

		<?php
	} );