<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php $countNumber = tutCount(get_the_ID()); ?>
  <main id="primary" class="bg-white dark:bg-dark-lg">
    <div class="container">
      <!-- Все вопросы -->
      <div class="relative mb-6">
        <a href="<?php echo get_post_type_archive_link('questions'); ?>" class="absolute-link"></a>
        <div class="flex flex-wrap items-center text-gray-800 dark:text-gray-200">
          <div class="w-10 h-10 flex items-center justify-center bg-gray-200 dark:bg-dark-md rounded p-2 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
            </svg>
          </div>
          <div class="lg:text-lg">
            <?php _e('Все вопросы', 'web-g'); ?>
          </div>
        </div>
      </div>
      <!-- END Все вопросы -->
      <div>
        <h1 class="text-gray-800 dark:text-gray-200 text-2xl lg:text-3xl font-semibold tracking-wide mb-6"><?php the_title(); ?></h1>
        <!-- Meta -->
        <div class="flex items-center text-gray-800 dark:text-gray-200 opacity-75  mb-6">
          <div class="mr-6">
            <span class="mr-2">🗓️</span> <?php _e('Вопрос задан', 'web-g'); ?>: <?php echo get_the_date('d.m.Y'); ?>
          </div>
          <div class="mr-6">
            <span class="mr-2">💬</span><?php _e('Ответов', 'web-g'); ?>: <?php echo get_comments_number(); ?>
          </div>
          <div>
            <span class="mr-2">👁️</span><?php _e('Просмотров', 'web-g'); ?>: <?php echo $countNumber; ?>
          </div>
        </div>
        <!-- END Meta -->
      </div>
      <hr>
      <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4 pb-12">
        <div class="w-full lg:w-2/3 lg:px-4">
          <div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4">
            <div class="content text-gray-800 dark:text-gray-200 mb-6">
              <?php the_content(); ?>
            </div>
            <h2 class="text-gray-800 dark:text-gray-200 text-xl font-semibold mb-6"><?php _e('Ответы', 'web-g'); ?>:</h2>
            <div>
              <?php comments_template(); ?>
            </div>
          </div>
          
        </div>
        <div class="w-full lg:w-1/3 lg:px-4">
          <?php get_template_part('template-parts/sidebar/sidebar-posts'); ?>
        </div>
    </div>
    
  </main><!-- #main -->
<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
