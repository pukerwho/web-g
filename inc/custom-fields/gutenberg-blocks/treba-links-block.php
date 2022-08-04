<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( 'Treba Links Block' )
	->add_fields( array(
		Field::make( 'text', 'crb_block_links_title', 'Заголовок блока' ),
		Field::make( 'complex', 'crb_block_links_list', 'Список посилань' )->set_layout('tabbed-horizontal')->add_fields( array(
      Field::make( 'text', 'crb_block_links_list_text', 'Анкор' ),
      Field::make( 'text', 'crb_block_links_list_href', 'Посилання' ),
    )),
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		?>

    <div class="block mb-12">
      <div class="bg-gray-100 dark:bg-dark-md rounded-lg relative p-6">
        <div class="absolute top-0 right-0 text-blue-800 lg:translate-x-4 -translate-y-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
          </svg>
        </div>
        <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6"><?php echo esc_html( $fields['crb_block_links_title'] ); ?></div>
        <?php 
          $similar_links = $fields['crb_block_links_list'];
          foreach ($similar_links as $link):
          ?>
            <?php $link_id = $link['id']; ?>
            <div class="flex text-xl text-blue-800 dark:text-blue-400 font-light mb-4 last-of-type:mb-0">
              <div class="w-4 min-w-[1rem] h-4 min-h-4 rounded-full bg-gray-400 mr-4 translate-y-[0.4rem]"></div>
              <a href="<?php echo $link['crb_block_links_list_href']; ?>" class=""><?php echo $link['crb_block_links_list_text']; ?></a>
            </div>
          <?php endforeach; ?>
      </div>
    </div>

		<?php
	} );