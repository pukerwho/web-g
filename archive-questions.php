<?php get_header(); ?>

<main id="primary" class="relative bg-white dark:bg-dark-lg pt-24 lg:pt-32">
  <!-- Декоративная линия -->
  <div class="hidden lg:block absolute bottom-0 left-0 z-0">
    <svg width="822.2px" height="301.9px" viewBox="0 0 822.2 301.9">
      <path fill="#f7c32e" d="M752.5,51.9c-4.5,3.9-8.9,7.8-13.4,11.8c-51.5,45.3-104.8,92.2-171.7,101.4c-39.9,5.5-80.2-3.4-119.2-12.1 c-32.3-7.2-65.6-14.6-98.9-13.9c-66.5,1.3-128.9,35.2-175.7,64.6c-11.9,7.5-23.9,15.3-35.5,22.8c-40.5,26.4-82.5,53.8-128.4,70.7 c-2.1,0.8-4.2,1.5-6.2,2.2L0,301.9c3.3-1.1,6.7-2.3,10.2-3.5c46.1-17,88.1-44.4,128.7-70.9c11.6-7.6,23.6-15.4,35.4-22.8 c46.7-29.3,108.9-63.1,175.1-64.4c33.1-0.6,66.4,6.8,98.6,13.9c39.1,8.7,79.6,17.7,119.7,12.1C634.8,157,688.3,110,740,64.6 c4.5-3.9,9-7.9,13.4-11.8C773.8,35,797,16.4,822.2,1l-0.7-1C796.2,15.4,773,34,752.5,51.9z"></path>
    </svg>
  </div>
  <!-- END Декоративная линия -->
  <div class="container relative">
    <!-- Декоративные элементы -->
    <div class="absolute -top-8 lg:top-8 right-4 lg:right-32 z-0">
      <svg width="22px" height="22px" viewBox="0 0 22 22">
        <polygon fill="#f17c30" points="22,8.3 13.7,8.3 13.7,0 8.3,0 8.3,8.3 0,8.3 0,13.7 8.3,13.7 8.3,22 13.7,22 13.7,13.7 22,13.7 "></polygon>
      </svg>
    </div>
    <div class="absolute top-20 bottom-auto lg:top-10 left-2 lg:-left-4 z-0">
      <svg width="27px" height="27px">
        <path fill="#6f42c1" d="M13.122,5.946 L17.679,-0.001 L17.404,7.528 L24.661,5.946 L19.683,11.533 L26.244,15.056 L18.891,16.089 L21.686,23.068 L15.400,19.062 L13.122,26.232 L10.843,19.062 L4.557,23.068 L7.352,16.089 L-0.000,15.056 L6.561,11.533 L1.582,5.946 L8.839,7.528 L8.565,-0.001 L13.122,5.946 Z"></path>
      </svg>
    </div>
    <div class="absolute top-16 lg:-top-4 right-4 left-auto lg:right-auto lg:left-32 z-0">
      <svg width="21.5px" height="21.5px" viewBox="0 0 21.5 21.5">
        <polygon fill="#d7403e" points="21.5,14.3 14.4,9.9 18.9,2.8 14.3,0 9.9,7.1 2.8,2.6 0,7.2 7.1,11.6 2.6,18.7 7.2,21.5 11.6,14.4 18.7,18.9 "></polygon>
      </svg>
    </div>
    <!-- END Декоративные элементы -->
    <h1 class="text-4xl font-black text-gray-800 dark:text-gray-200 text-center mb-12">
      <span class="sketch-underline"><?php _e('Вопросы и ответы', 'web-g'); ?></span>
    </h1>
    <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4">
      
      <div class="w-full lg:w-7/12 lg:px-4 mb-6">
        <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
          <div class="text-gray-800 dark:text-gray-200 text-xl font-semibold border-b border-gray-200 dark:border-gray-600 pb-3 mb-6">
            <span class="mr-2">🔥</span><?php _e('Популярные вопросы', 'web-g'); ?>
          </div>
          
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

        <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
          <div class="text-gray-800 dark:text-gray-200 text-xl font-semibold border-b border-gray-200 dark:border-gray-600 pb-3 mb-6">
            <span class="mr-2">🗓️</span> <?php _e('Новые вопросы', 'web-g'); ?>
          </div>
          
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
      </div>
      
      <!-- Задать вопрос -->
      <div class="w-full lg:w-5/12 lg:px-4">
        <?php get_template_part('template-parts/components/q-form'); ?>
        <?php get_template_part('template-parts/sidebar/sidebar-posts'); ?>
      </div>
      <!-- END Задать вопрос -->
    </div>
  </div>
</main>


<?php get_footer(); ?>
