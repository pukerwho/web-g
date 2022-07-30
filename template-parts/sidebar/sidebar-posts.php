<div class="hidden bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">

  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">✏️</span><?php _e('Наши авторы', 'web-g'); ?></div>
  <div>
    <?php 
    $authors = get_users();
    foreach ($authors as $author): ?>
      <div class="flex items-center mb-6">
        <div class="w-1/6 mr-2">
          <?php 
            $avatar_url = carbon_get_user_meta($author->ID, 'crb_user_ava'); 
          ?>
          <?php if ($avatar_url): ?>
            <img src="<?php echo $avatar_url; ?>" alt="" class="w-12 h-12 rounded-full">
          <?php else: ?>
            <?php 
              $avatar = get_avatar(
                $author->ID, '', '', '',
                array( 'class' => array( 'w-12', 'h-12', 'rounded-full' ))
              );
            ?>
            <?php if ($avatar): ?>
              <?php echo $avatar; ?>
            <?php else: ?>
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/user.svg" width="35px">
            <?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="w-5/6">
          <div class="text-gray-800 dark:text-gray-200 font-semibold"><?php echo $author->display_name; ?></div>
          <div class="text-gray-800 dark:text-gray-200 font-light opacity-75"><?php _e('Публикаций', 'web-g'); ?>: <?php echo count_user_posts($author->ID); ?></div>
        </div>
      </div>
      
       <!-- echo $user->ID;
       echo $user->display_name;
       the_author_image($user->ID);
       echo $user->description; -->
      
    <?php endforeach; ?>
  </div>
</div>

<?php get_template_part('template-parts/components/telegram-css'); ?> 

<div class="hidden bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 mb-2"><?php _e('Вступай в клуб', 'web-g'); ?></div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🧑‍💻</span><?php _e('Присоединяйся к сообществу!', 'web-g'); ?></div>
  <div class="bg-red-500 flex flex-col items-center justify-center p-5 mb-4">
    <div class="flex items-start mb-2">
      <div class="w-3 h-16 bg-gray-900 mr-2"></div>
      <div class="w-12 h-12 bg-white rounded-full"></div>
    </div>
    <div class="text-2xl uppercase font-bold text-gray-800">Patreon</div>
  </div>
  <div class="js-analytics" data-analytics-category="Клик" data-analytics-action="Patreon (сайдбар)">
    <a href="https://www.patreon.com/webgolovolomki" target="_blank" class="block border border-indigo-500 text-gray-800 dark:text-gray-200 text-center rounded px-4 py-2"><?php _e('Перейти на Patreon', 'web-g'); ?></a>
  </div>
</div>

<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 mb-2"><?php _e('Наш рейтинг', 'web-g'); ?></div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🏆</span><?php _e('Лучший хостинг для сайта', 'web-g'); ?></div>
  <div>
    <?php
    $number_hosting = 0;
    $best_hosters = carbon_get_theme_option('crb_best_hosters'); 
    foreach ($best_hosters as $best_hoster): 
    $number_hosting++;
    ?>
    <!-- item -->
    <div class="flex items-center justify-between mb-2">
      <div class="flex items-center">
        <div class="h-8 w-8 flex justify-center items-center bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded mr-4"><?php echo $number_hosting; ?></div>
        <div class="text-gray-800 dark:text-gray-200"><a href="<?php echo $best_hoster['crb_best_hoster_link']; ?>" target="_blank" class="js-analytics" data-analytics-category="Клик" data-analytics-action="Хостинг (сайдбар)"><?php echo $best_hoster['crb_best_hoster_name']; ?></a></div>
      </div>
      <div class="text-gray-800 dark:text-gray-200 opacity-75"><?php echo $best_hoster['crb_best_hoster_rating']; ?></div>
    </div>
    <!-- end item -->
    <?php endforeach; ?>
  </div>
</div>

<!-- Курсы -->
<?php get_template_part('template-parts/components/sidebar-courses'); ?>
<!-- END Курсы -->

<!-- Популярні дописи -->
<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">
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
      <div class="bg-gray-100 dark:bg-dark-md rounded p-3 mb-2">
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
<!-- END Популярні дописи -->

<!-- Опрос -->
<?php get_template_part('template-parts/components/sidebar-vote'); ?>
<!-- END Опрос -->

<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 mb-2">Very Peri</div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🤔</span><?php _e('Цвет 2022 года', 'web-g'); ?></div>
  <div class="text-gray-800 dark:text-gray-200">
    <div class="mb-2"><?php _e('Институт цвета Pantone объявил цвет 2022 года. Это сиреневый оттенок под названием 17-3938 Very Peri.', 'web-g'); ?></div>
  </div>
  <div class="aspect-square mb-2" style="background-color: #6667ab;"></div>

  <div class="flex items-center justify-center bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded text-center p-2 mb-2" data-q-css="1">
    <div class="w-4 h-4 mr-2" style="background-color: #6667ab;"></div>
    <div>#6667ab</div>
  </div>
</div>
