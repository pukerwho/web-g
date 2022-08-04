<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make( 'Treba Telegram CSS Block' )
	->add_fields( array(
		Field::make( 'separator', 'crb_separator_telegramcss', 'TELEGRAM CSS -- Це автоматичний блок' )
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		?>

    <div class="block mb-6">
      <div class="overflow-hidden relative bg-dark-lg dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2">
        <div class="w-20 h-20 bg-dark-md rounded-full absolute -top-8 -right-8"></div>
        <div class="flex items-center lg:-mx-4">
          <div class="w-full lg:w-1/2 lg:px-4">
            <div class="text-gray-200 text-xl mb-4">CSS Головоломки в <span class="text-blue-300">Telegram</span></div>
            <div class="text-gray-200 opacity-75 mb-4"><?php _e('Подписывайся и не пропускай', 'web-g'); ?>:</div>
            <div class="mb-4">
              <div class="flex items-center mb-2">
                <div class="text-green-500 mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="text-gray-200"><?php _e('Актуальные новости', 'web-g'); ?></div>
              </div>
              <div class="flex items-center mb-2">
                <div class="text-green-500 mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="text-gray-200"><?php _e('Интересные задачки', 'web-g'); ?></div>
              </div>
              <div class="flex items-center">
                <div class="text-green-500 mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="text-gray-200"><?php _e('Полезные подборки', 'web-g'); ?></div>
              </div>
            </div>
            <div class="mb-2 js-analytics" data-analytics-category="Клик" data-analytics-action="Telegram-канал (Block)">
              <a href="https://t.me/css_golovolomki" class="block not-content bg-indigo-600 text-gray-200 text-center rounded px-6 py-3" target="_blank"><?php _e('Перейти в Telegram', 'web-g'); ?></a>
            </div>
          </div>
          <div class="hidden lg:block w-full lg:w-1/2 lg:px-4">
            <div class="flex items-center justify-center">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/telegram-css-ava.png" alt="Telegram CSS" loading="lazy" class="not-content h-[200px] rounded-full">
            </div>
          </div>
        </div>
        
      </div>
    </div>

		<?php
	} );