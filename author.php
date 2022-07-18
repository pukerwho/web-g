<?php get_header(); ?>

<main id="primary" class="bg-white dark:bg-dark-lg">
  <div class="container pt-24 lg:pt-32">
    <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-6">
      <div class="w-full lg:w-4/12 lg:px-6 mb-6 lg:mb-0">
        <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg mb-6">
          <div class="p-3 mb-6">
            <?php 
            $avatar_url = carbon_get_user_meta(get_the_author_meta( 'ID' ), 'crb_user_ava'); 
            if ($avatar_url): ?>
              <div class="w-full mr-2">
                <img src="<?php echo $avatar_url; ?>" alt="" loading="lazy" class="aspect-square rounded">
              </div>
            <?php else: ?>
              net avatarki
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-8/12 lg:px-6">
        <!-- Описание -->
        <div class="mb-12">
          <div class="text-xl text-gray-800 dark:text-gray-200"><?php _e('Привет, меня зовут', 'web-g'); ?></div>
          <div class="text-3xl text-gray-800 dark:text-gray-200 font-bold mb-6"><?php echo get_the_author(); ?></div>
          <div class="text-gray-800 dark:text-gray-200 opacity-75">
            <?php 
              $author_content = carbon_get_user_meta(get_the_author_meta( 'ID' ), 'crb_user_content');
              echo apply_filters( 'the_content', $author_content  );
            ?>
          </div>
        </div>
        <!-- Описание -->
        <hr>
        <!-- Публикации -->
        <div>
          <div class="text-2xl lg:text-3xl text-gray-800 dark:text-gray-200 mb-6"><?php _e('Все публикации', 'web-g'); ?></div>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <!-- Post item -->
            <?php get_template_part('template-parts/posts/post-item'); ?>
          <!-- END Post item -->
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <!-- END Публикации -->
      </div>
    </div>
  </div>
  
</main><!-- #main -->

<?php get_footer();