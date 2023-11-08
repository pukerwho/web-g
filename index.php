<?php get_header(); ?>

	<main id="primary" class="bg-white dark:bg-dark-lg">
    <div class="container">
      <div class="flex flex-wrap lg:-mx-4 mb-16">
        <div class="w-full lg:w-2/3 lg:px-4 mb-6 lg:mb-0">
          <div class="h-full">
            <?php 
              $top_post = new WP_Query( array( 
                'post_type' => 'post', 
                'posts_per_page' => 1,
                'meta_query' => array(
                  array(
                    'key' => '_crb_post_mainhide',
                    'value' => 'yes',
                    'compare' => '!='
                  ),
                ),
                'tax_query' => array(
                  array(
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => array( 52, 50 ),
                    'operator' => 'NOT IN',
                  )
                ),
              ) );
              if ($top_post->have_posts()) : while ($top_post->have_posts()) : $top_post->the_post(); 
            ?>
              <div class="h-[450px] lg:h-full relative">
                <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
                <?php 
                  $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                  $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                ?>
                <img 
                class="w-full h-full object-cover rounded-lg" 
                alt="<?php the_title(); ?>" 
                src="<?php echo $medium_thumb; ?>" 
                srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" 
                loading="lazy" 
                data-src="<?php echo $medium_thumb; ?>" 
                data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
                <div class="w-full h-full absolute left-0 top-0 bg-gradient-to-b from-transparent to-black/80 rounded-lg "></div>
                <div class="absolute left-4 bottom-4 right-4 lg:left-10 lg:bottom-8 lg:right-10">
                  <div class="mb-2">
                    <?php
                    $post_categories = get_the_terms( $top_post->ID, 'category' );
                    foreach ($post_categories as $post_category){ ?>
                      <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="inline-block text-red-500 mr-2"><?php echo $post_category->name; ?></a> 
                    <?php } ?>
                  </div>
                  <div class="text-xl lg:text-2xl text-gray-100 mb-4"><?php the_title(); ?></div>
                  <div class="block italic text-gray-200"><?php echo get_the_modified_time('F, n') ?></div>
                </div>
              </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
        </div>
        <div class="w-full lg:w-1/3 lg:px-4">
          <?php get_template_part("template-parts/sidebar/popular-posts"); ?>
        </div>
      </div>

      <div class="flex flex-wrap -mx-2 mb-16">
        <?php $home_categories = get_terms( array( 
          'taxonomy' => 'category', 
          'parent' => 0, 
          'hide_empty' => false,
          'meta_query' => array(
            array(
              'key'       => '_crb_category_home_show',
              'value'     => 'yes',
              'compare'   => '='
            )
          )
        ));
        foreach ( array_slice($home_categories, 0, 4) as $home_category ): ?>
        <div class="w-1/2 lg:w-1/4 mb-4 lg:mb-0 px-2">
          <div class="relative">
            <img src="<?php echo carbon_get_term_meta($home_category->term_id, 'crb_category_img' ); ?>" alt="<?php echo $home_category->name ?>" loading="lazy" class="w-full h-[250px] min-h-[250px] lg:h-[350px] lg:min-h-[350px] object-cover rounded-t-lg">
            <a href="<?php echo get_term_link($home_category); ?>" class="absolute-link"></a>
            <div class="bg-dark-xl text-gray-200 text-center text-base lg:text-lg rounded-b-lg px-1 py-4"><?php echo $home_category->name ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- Blog and Sidebar -->
      <h2 class="relative text-4xl font-black text-gray-800 dark:text-gray-200 text-center mb-4">
        <span class="sketch-underline"><?php _e('Новые записи', 'web-g'); ?></span>
      </h2>
      <div class="w-full lg:w-1/2 mx-auto mb-12">
        <p class="text-center opacity-75 text-gray-800 dark:text-gray-200 font-regular dark:font-light"><?php _e('Публикации, написанные участниками сообщества. Главная цель - поделиться знаниями в той или иной области.', 'web-g'); ?></p>
      </div>
      <div class="flex flex-wrap lg:-mx-4 mb-16">
        <!-- Поток -->
        <div class="w-full lg:w-2/3 lg:px-4">
          <?php 
            $new_posts = new WP_Query( array( 
              'post_type' => 'post', 
              'posts_per_page' => 10,
              'meta_query' => array(
                array(
                  'key' => '_crb_post_mainhide',
                  'value' => 'yes',
                  'compare' => '!='
                ),
              ),
              'tax_query' => array(
                array(
                  'taxonomy' => 'category',
                  'field'    => 'term_id',
                  'terms'    => array( 52, 50 ),
                  'operator' => 'NOT IN',
                )
              ),
            ) );
            if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
          ?>
          <div class="flex flex-wrap flex-col mb-6">
            <!-- Post item -->
              <?php get_template_part('template-parts/posts/post-item'); ?>
            <!-- END Post item -->
          </div>	
          <?php endwhile; endif; wp_reset_postdata(); ?>
          <div class="flex justify-center">
            <div><a href="<?php echo get_page_url('templates/tpl_posts'); ?>" class="inline-flex items-center text-center text-blue-500 bg-blue-100 dark:bg-slate-800 dark:text-sky-300 hover:bg-blue-500 hover:text-gray-200 dark:hover:bg-slate-700 dark:hover:text-sky-200 rounded px-5 py-2">
              <span class="mr-2"><?php _e('Все записи', 'web-g'); ?></span>
              <span class="mt-[2px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                  <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </span>
            </a></div>
          </div>
        </div>
        <!-- END Поток -->

        <!-- Сайдбар -->
        <div class="w-full lg:w-1/3 lg:px-4">
          <?php get_template_part('template-parts/sidebar/sidebar-posts'); ?>
        </div>
        <!-- END Сайдбар -->
      </div>
      <!-- Blog and Sidebar -->
    </div>
		
		<!-- Help -->
		<div class="help relative pb-20">
			<!-- Декоративная линия -->
			<div class="hidden lg:block absolute bottom-0 left-0 z-0">
				<svg width="822.2px" height="301.9px" viewBox="0 0 822.2 301.9">
					<path fill="#f7c32e" d="M752.5,51.9c-4.5,3.9-8.9,7.8-13.4,11.8c-51.5,45.3-104.8,92.2-171.7,101.4c-39.9,5.5-80.2-3.4-119.2-12.1 c-32.3-7.2-65.6-14.6-98.9-13.9c-66.5,1.3-128.9,35.2-175.7,64.6c-11.9,7.5-23.9,15.3-35.5,22.8c-40.5,26.4-82.5,53.8-128.4,70.7 c-2.1,0.8-4.2,1.5-6.2,2.2L0,301.9c3.3-1.1,6.7-2.3,10.2-3.5c46.1-17,88.1-44.4,128.7-70.9c11.6-7.6,23.6-15.4,35.4-22.8 c46.7-29.3,108.9-63.1,175.1-64.4c33.1-0.6,66.4,6.8,98.6,13.9c39.1,8.7,79.6,17.7,119.7,12.1C634.8,157,688.3,110,740,64.6 c4.5-3.9,9-7.9,13.4-11.8C773.8,35,797,16.4,822.2,1l-0.7-1C796.2,15.4,773,34,752.5,51.9z"></path>
				</svg>
			</div>
			<!-- END Декоративная линия -->

			<div class="container relative">
				<!-- Декоративные элементы -->
				<div class="absolute -top-8 lg:top-0 right-4 lg:right-20 z-0">
					<svg width="21.5px" height="21.5px" viewBox="0 0 21.5 21.5">
						<polygon fill="#d7403e" points="21.5,14.3 14.4,9.9 18.9,2.8 14.3,0 9.9,7.1 2.8,2.6 0,7.2 7.1,11.6 2.6,18.7 7.2,21.5 11.6,14.4 18.7,18.9 "></polygon>
					</svg>
				</div>
				<div class="absolute top-20 bottom-auto lg:top-32 right-2 lg:right-32 z-0">
					<svg width="27px" height="27px">
						<path fill="#6f42c1" d="M13.122,5.946 L17.679,-0.001 L17.404,7.528 L24.661,5.946 L19.683,11.533 L26.244,15.056 L18.891,16.089 L21.686,23.068 L15.400,19.062 L13.122,26.232 L10.843,19.062 L4.557,23.068 L7.352,16.089 L-0.000,15.056 L6.561,11.533 L1.582,5.946 L8.839,7.528 L8.565,-0.001 L13.122,5.946 Z"></path>
					</svg>
				</div>
				<div class="absolute top-24 lg:top-20 left-4 lg:left-20 z-0">
					<svg width="22px" height="22px" viewBox="0 0 22 22">
						<polygon fill="#f17c30" points="22,8.3 13.7,8.3 13.7,0 8.3,0 8.3,8.3 0,8.3 0,13.7 8.3,13.7 8.3,22 13.7,22 13.7,13.7 22,13.7 "></polygon>
					</svg>
				</div>
				<!-- END Декоративные элементы -->
				<h2 class="relative text-4xl font-black text-gray-800 dark:text-gray-200 text-center mb-4">
					<span class="sketch-underline"><?php _e('Помогииите!!!', 'web-g'); ?></span>
				</h2>
				<div class="w-full lg:w-1/2 mx-auto mb-4">
					<p class="text-center opacity-75 text-gray-800 dark:text-gray-200 font-regular dark:font-light"><?php _e('Задавай вопрос, получай ответ!', 'web-g'); ?></p>
				</div>
				<div class="flex justify-center scale-mirror mb-6">
					<svg height="70">
						<path fill="#57bd87" d="m181.6 6.7c-0.1 0-0.2-0.1-0.3 0-2.5-0.3-4.9-1-7.3-1.4-2.7-0.4-5.5-0.7-8.2-0.8-1.4-0.1-2.8-0.1-4.1-0.1-0.5 0-0.9-0.1-1.4-0.2-0.9-0.3-1.9-0.1-2.8-0.1-5.4 0.2-10.8 0.6-16.1 1.4-2.7 0.3-5.3 0.8-7.9 1.3-0.6 0.1-1.1 0.3-1.8 0.3-0.4 0-0.7-0.1-1.1-0.1-1.5 0-3 0.7-4.3 1.2-3 1-6 2.4-8.8 3.9-2.1 1.1-4 2.4-5.9 3.9-1 0.7-1.8 1.5-2.7 2.2-0.5 0.4-1.1 0.5-1.5 0.9s-0.7 0.8-1.1 1.2c-1 1-1.9 2-2.9 2.9-0.4 0.3-0.8 0.5-1.2 0.5-1.3-0.1-2.7-0.4-3.9-0.6-0.7-0.1-1.2 0-1.8 0-3.1 0-6.4-0.1-9.5 0.4-1.7 0.3-3.4 0.5-5.1 0.7-5.3 0.7-10.7 1.4-15.8 3.1-4.6 1.6-8.9 3.8-13.1 6.3-2.1 1.2-4.2 2.5-6.2 3.9-0.9 0.6-1.7 0.9-2.6 1.2s-1.7 1-2.5 1.6c-1.5 1.1-3 2.1-4.6 3.2-1.2 0.9-2.7 1.7-3.9 2.7-1 0.8-2.2 1.5-3.2 2.2-1.1 0.7-2.2 1.5-3.3 2.3-0.8 0.5-1.7 0.9-2.5 1.5-0.9 0.8-1.9 1.5-2.9 2.2 0.1-0.6 0.3-1.2 0.4-1.9 0.3-1.7 0.2-3.6 0-5.3-0.1-0.9-0.3-1.7-0.8-2.4s-1.5-1.1-2.3-0.8c-0.2 0-0.3 0.1-0.4 0.3s-0.1 0.4-0.1 0.6c0.3 3.6 0.2 7.2-0.7 10.7-0.5 2.2-1.5 4.5-2.7 6.4-0.6 0.9-1.4 1.7-2 2.6s-1.5 1.6-2.3 2.3c-0.2 0.2-0.5 0.4-0.6 0.7s0 0.7 0.1 1.1c0.2 0.8 0.6 1.6 1.3 1.8 0.5 0.1 0.9-0.1 1.3-0.3 0.9-0.4 1.8-0.8 2.7-1.2 0.4-0.2 0.7-0.3 1.1-0.6 1.8-1 3.8-1.7 5.8-2.3 4.3-1.1 9-1.1 13.3 0.1 0.2 0.1 0.4 0.1 0.6 0.1 0.7-0.1 0.9-1 0.6-1.6-0.4-0.6-1-0.9-1.7-1.2-2.5-1.1-4.9-2.1-7.5-2.7-0.6-0.2-1.3-0.3-2-0.4-0.3-0.1-0.5 0-0.8-0.1s-0.9 0-1.1-0.1-0.3 0-0.3-0.2c0-0.4 0.7-0.7 1-0.8 0.5-0.3 1-0.7 1.5-1l5.4-3.6c0.4-0.2 0.6-0.6 1-0.9 1.2-0.9 2.8-1.3 4-2.2 0.4-0.3 0.9-0.6 1.3-0.9l2.7-1.8c1-0.6 2.2-1.2 3.2-1.8 0.9-0.5 1.9-0.8 2.7-1.6 0.9-0.8 2.2-1.4 3.2-2 1.2-0.7 2.3-1.4 3.5-2.1 4.1-2.5 8.2-4.9 12.7-6.6 5.2-1.9 10.6-3.4 16.2-4 5.4-0.6 10.8-0.3 16.2-0.5h0.5c1.4-0.1 2.3-0.1 1.7 1.7-1.4 4.5 1.3 7.5 4.3 10 3.4 2.9 7 5.7 11.3 7.1 4.8 1.6 9.6 3.8 14.9 2.7 3-0.6 6.5-4 6.8-6.4 0.2-1.7 0.1-3.3-0.3-4.9-0.4-1.4-1-3-2.2-3.9-0.9-0.6-1.6-1.6-2.4-2.4-0.9-0.8-1.9-1.7-2.9-2.3-2.1-1.4-4.2-2.6-6.5-3.5-3.2-1.3-6.6-2.2-10-3-0.8-0.2-1.6-0.4-2.5-0.5-0.2 0-1.3-0.1-1.3-0.3-0.1-0.2 0.3-0.4 0.5-0.6 0.9-0.8 1.8-1.5 2.7-2.2 1.9-1.4 3.8-2.8 5.8-3.9 2.1-1.2 4.3-2.3 6.6-3.2 1.2-0.4 2.3-0.8 3.6-1 0.6-0.2 1.2-0.2 1.8-0.4 0.4-0.1 0.7-0.3 1.1-0.5 1.2-0.5 2.7-0.5 3.9-0.8 1.3-0.2 2.7-0.4 4.1-0.7 2.7-0.4 5.5-0.8 8.2-1.1 3.3-0.4 6.7-0.7 10-1 7.7-0.6 15.3-0.3 23 1.3 4.2 0.9 8.3 1.9 12.3 3.6 1.2 0.5 2.3 1.1 3.5 1.5 0.7 0.2 1.3 0.7 1.8 1.1 0.7 0.6 1.5 1.1 2.3 1.7 0.2 0.2 0.6 0.3 0.8 0.2 0.1-0.1 0.1-0.2 0.2-0.4 0.1-0.9-0.2-1.7-0.7-2.4-0.4-0.6-1-1.4-1.6-1.9-0.8-0.7-2-1.1-2.9-1.6-1-0.5-2-0.9-3.1-1.3-2.5-1.1-5.2-2-7.8-2.8-1-0.8-2.4-1.2-3.7-1.4zm-64.4 25.8c4.7 1.3 10.3 3.3 14.6 7.9 0.9 1 2.4 1.8 1.8 3.5-0.6 1.6-2.2 1.5-3.6 1.7-4.9 0.8-9.4-1.2-13.6-2.9-4.5-1.7-8.8-4.3-11.9-8.3-0.5-0.6-1-1.4-1.1-2.2 0-0.3 0-0.6-0.1-0.9s-0.2-0.6 0.1-0.9c0.2-0.2 0.5-0.2 0.8-0.2 2.3-0.1 4.7 0 7.1 0.4 0.9 0.1 1.6 0.6 2.5 0.8 1.1 0.4 2.3 0.8 3.4 1.1z"></path>
					</svg>
				</div>
				<div class="flex flex-wrap lg:-mx-4">
					<!-- Поток -->
					<div class="w-full lg:w-7/12 lg:px-4">
						<div class="w-full bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
							<div class="text-gray-800 dark:text-gray-200 text-xl font-semibold border-b border-gray-200 dark:border-gray-600 pb-3 mb-6"><span class="mr-2">🔥</span><?php _e('Популярные вопросы', 'web-g'); ?></div>
							<?php 
								$q_list = new WP_Query( array( 
									'post_type' => 'questions', 
									'posts_per_page' => 5,
								) );
								if ($q_list->have_posts()) : while ($q_list->have_posts()) : $q_list->the_post(); 
							?>
							<!-- Item -->
								<?php get_template_part('template-parts/posts/q-item'); ?>
							<!-- END Item -->
							<?php endwhile; endif; wp_reset_postdata(); ?>

						</div>
						<div class="flex justify-center mb-6 lg:mb-0">
							<div><a href="<?php echo get_post_type_archive_link('questions'); ?>" class="inline-flex items-center text-center text-blue-500 bg-blue-100 dark:bg-slate-800 dark:text-sky-300 hover:bg-blue-500 hover:text-gray-200 dark:hover:bg-slate-700 dark:hover:text-sky-200 rounded px-5 py-2">
								<span class="mr-2"><?php _e('Все вопросы', 'web-g'); ?></span>
								<span class="mt-[2px]">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
										<path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
									</svg>
								</span>
							</a></div>
						</div>
					</div>

					<!-- END Поток -->

					<!-- Задать вопрос -->
					<div class="w-full lg:w-5/12 lg:px-4">
						<?php get_template_part('template-parts/components/q-form'); ?>
					</div>
					<!-- END Задать вопрос -->
			</div>
		</div>
		<!-- END Help -->
	</main><!-- #main -->

<?php
get_footer();
