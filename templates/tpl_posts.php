<?php
/*
Template Name: Все записи
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<main id="primary" class="bg-white dark:bg-dark-lg">
  <div class="container pt-24 lg:pt-32">
    <h1 class="text-4xl font-black text-gray-800 dark:text-gray-200 text-center mb-12">
      <span class="sketch-underline">Все записи</span>
    </h1>
    <div class="mb-12">
      <?php get_template_part('template-parts/components/top-category'); ?>  
    </div>
    <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4">
      <div class="w-full lg:w-2/3 lg:px-4">
        <div class="flex flex-wrap flex-col mb-6">
          <?php 
            global $wp_query, $wp_rewrite;  
            $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

            $posts_list = new WP_Query( array( 
              'post_type' => 'post', 
              'posts_per_page' => 10,
              'order'    => 'DESC',
              'paged' => $current,
            ) );
            if ($posts_list->have_posts()) : while ($posts_list->have_posts()) : $posts_list->the_post(); 
          ?>
          <!-- Post item -->
            <?php get_template_part('template-parts/posts/post-item'); ?>
          <!-- END Post item -->
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>  
        <div class="mb-6">
          <div class="flex items-center -mr-3">
            <?php 
              $big = 9999999991; // уникальное число
              echo paginate_links( array(
                'format'  => 'page/%#%',
                'total' => $posts_list->max_num_pages,
                'current' => $current,
                'prev_next' => true,
                'next_text' => ('>'),
                'prev_text' => ('<'),
              )); 
            ?>
          </div>
          
        </div>
      </div>
      <div class="w-full lg:w-1/3 lg:px-4">
        <?php get_template_part('template-parts/sidebar/sidebar-posts'); ?>
      </div>
      
    </div>
  </div>
  
</main><!-- #main -->

<?php endwhile; else: ?>
  <p><?php _e('Ничего не найдено'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
