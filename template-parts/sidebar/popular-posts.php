<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 mb-2"><?php _e('Что читают?', 'web-g'); ?></div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🏆</span><?php _e('Популярные записи', 'web-g'); ?></div>
  <div>
    <?php
      $new_posts = new WP_Query( array( 
        'post_type' => 'post', 
        'posts_per_page' => 5,
        'meta_key' => 'post_count',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
      ) );
      if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post();
    ?>
      <div class="relative bg-gray-100 dark:bg-dark-md rounded p-3 mb-2">
        <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
        <div class="text-gray-800 dark:text-gray-200" >
          <div class="text-light"><?php the_title(); ?></div>
          <div class="text-sm opacity-50">
            <?php _e("Просмотров", "web-g"); ?>: <?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?>
          </div>
        </div>
      </div> 
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</div>