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

<!-- Біржі посилань -->
<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg mb-6">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 py-2 lg:py-4"><?php _e('Наш рейтинг', 'web-g'); ?></div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🏆</span><?php _e('Лучшие биржи ссылок', 'web-g'); ?></div>
  <div class="px-2 lg:px-4 py-2 lg:py-4">
    <!-- collaborator -->
    <div class="flex items-center justify-between mb-2">
      <div class="flex items-center">
        <div class="h-8 w-8 flex justify-center items-center bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded mr-4">1</div>
        <div class="text-gray-800 dark:text-gray-200"><a href="https://collaborator.pro/?ref=Ujyp1z" target="_blank" class="js-analytics" data-analytics-category="Клик" data-analytics-action="Біржі (сайдбар - Collaborator)">Collaborator</a></div>
      </div>
      <div class="text-gray-800 dark:text-gray-200 opacity-75">4.8</div>
    </div>
    <!-- end collaborator -->
    <!-- Prnews -->
    <div class="flex items-center justify-between mb-2">
      <div class="flex items-center">
        <div class="h-8 w-8 flex justify-center items-center bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded mr-4">2</div>
        <div class="text-gray-800 dark:text-gray-200"><a href="https://prnews.io/ru/sites?i=3718944" target="_blank" class="js-analytics" data-analytics-category="Клик" data-analytics-action="Біржі (сайдбар - Prnews)">Prnews</a></div>
      </div>
      <div class="text-gray-800 dark:text-gray-200 opacity-75">4.0</div>
    </div>
    <!-- end Prnews -->
    <!-- Whitepress -->
    <div class="flex items-center justify-between mb-2">
      <div class="flex items-center">
        <div class="h-8 w-8 flex justify-center items-center bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded mr-4">3</div>
        <div class="text-gray-800 dark:text-gray-200"><a href="https://www.whitepress.com/6lizz" target="_blank" class="js-analytics" data-analytics-category="Клик" data-analytics-action="Біржі (сайдбар - Whitepress)">Whitepress</a></div>
      </div>
      <div class="text-gray-800 dark:text-gray-200 opacity-75">3.8</div>
    </div>
    <!-- end Whitepress -->
    <!-- GoGetLinks -->
    <div class="flex items-center justify-between mb-2">
      <div class="flex items-center">
        <div class="h-8 w-8 flex justify-center items-center bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded mr-4">4</div>
        <div class="text-gray-800 dark:text-gray-200">GoGetLinks</div>
      </div>
      <div class="text-gray-800 dark:text-gray-200 opacity-75">3.5</div>
    </div>
    <!-- end GoGetLinks -->
    <!-- Miralinks -->
    <div class="flex items-center justify-between mb-2">
      <div class="flex items-center">
        <div class="h-8 w-8 flex justify-center items-center bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded mr-4">5</div>
        <div class="text-gray-800 dark:text-gray-200">Miralinks</div>
      </div>
      <div class="text-gray-800 dark:text-gray-200 opacity-75">3.5</div>
    </div>
    <!-- end Miralinks -->
  </div>
  <div>
    <a href="<?php $birgi_current_lang = pll_current_language(); $birgi_post_id = pll_get_post("3668"); echo get_the_permalink($birgi_post_id); ?>" class="block bg-indigo-600 text-gray-200 text-center rounded px-6 py-3"><?php _e("Где купить ссылки на сайт?", "web-g"); ?></a>
  </div>
</div>
<!-- END Біржі посилань -->

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
<div class="hidden">
<?php get_template_part('template-parts/components/sidebar-courses'); ?>
</div>
<!-- END Курсы -->

<!-- Опрос -->
<?php get_template_part('template-parts/components/sidebar-vote'); ?>
<!-- END Опрос -->

<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 mb-2"><?php _e('Наш выбор', 'web-g'); ?></div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🧑‍🎓</span><?php _e('Рекомендуем к прочтению', 'web-g'); ?></div>
  <div>
    <?php 
    $now_posts = new WP_Query( array( 
      'post_type' => 'post', 
      'posts_per_page' => 10,
      'orderby' => 'rand',
      'meta_query' => array(
        array(
          'key' => '_crb_post_keywords',
          'value' => '',
          'compare' => '='
        ),
      ),
      'tax_query' => array(
        array(
          'taxonomy'  => 'category',
          'field'     => 'term_id',
          'terms'     => array( 52, 50, 595, 597, 32, 6 ),
        )
      ),
    ) );
    if ($now_posts->have_posts()) : while ($now_posts->have_posts()) : $now_posts->the_post(); 
    ?>
    <div class="w-full relative cursor-pointer mb-2">
      <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
      <div class="flex items-center justify-between text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-dark-md rounded px-4 py-3">
        <div class="w-1/3">
          <?php if (get_the_post_thumbnail_url()): ?>
            <img  src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" class="object-cover aspect-video">
          <?php else: ?>
            <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-image.jpg" alt="<?php the_title(); ?>" class="object-cover aspect-video">
          <?php endif; ?>
        </div>
        <div class="w-2/3"><div class="text-sm ml-4"><?php the_title(); ?></div></div>
      </div>
    </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</div>

<div class="bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-4 py-2 lg:py-4 lg:pb-2 mb-6">
  <div class="text-center text-lg text-indigo-600 dark:text-indigo-400 mb-2">Peach Fuzz</div>
  <div class="text-xl text-gray-800 dark:text-gray-200 text-center mb-4"><span class="mr-2">🤔</span><?php _e('Цвет 2024 года', 'web-g'); ?></div>
  <div class="text-gray-800 dark:text-gray-200">
    <div class="mb-2"><?php _e('Исследовательский институт Pantone выбрал главный цвет 2024 года. Им стал нежный бархатистый персиковый оттенок, получивший название Peach Fuzz (Персиковый пух).', 'web-g'); ?></div>
  </div>
  <div class="aspect-square mb-2" style="background-color: #febe98;"></div>

  <div class="flex items-center justify-center bg-gray-300 dark:bg-dark-md dark:text-gray-200 rounded text-center p-2 mb-2" data-q-css="1">
    <div class="w-4 h-4 mr-2" style="background-color: #febe98;"></div>
    <div>#febe98</div>
  </div>
</div>
