<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php 
    $currentId = get_the_ID();
    $translated_ids = pll_get_post_translations($currentId);
    $countNumber = tutCount($currentId);
  ?>
  <main id="primary" class="bg-white dark:bg-dark-lg">
    <div class="container pt-24 lg:pt-32" itemscope itemtype="http://schema.org/Article">
      <div class="flex flex-col lg:flex-row flex-wrap lg:-mx-4">
        <div class="w-full lg:w-8/12 lg:px-4 mb-8">
          <article>
            <!-- Хлебные крошки -->
            <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
              <ul class="flex items-center flex-wrap">
                <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-8 pl-8">
                  <a itemprop="item" href="<?php echo home_url(); ?>" class="text-blue-700 dark:text-blue-400">
                    <span itemprop="name"><?php _e( 'Главная', 'web-g' ); ?></span>
                  </a>                        
                  <meta itemprop="position" content="1">
                </li>
                <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
                  <a itemprop="item" href="<?php echo get_page_url('templates/tpl_posts'); ?>" class="text-blue-700 dark:text-blue-400">
                    <span itemprop="name"><?php _e( 'Все записи', 'web-g' ); ?></span>
                  </a>                        
                  <meta itemprop="position" content="2">
                </li>
                <?php 
                  $post_categories = get_the_terms( get_the_ID(), 'category' ); 
                  foreach (array_slice($post_categories, 0, 1) as $post_item): 
                ?>
                <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
                  <a itemprop="item" href="<?php echo get_term_link($post_item->term_id, 'category') ?>" class="text-blue-700 dark:text-blue-400">
                    <span itemprop="name"><?php echo $post_item->name; ?></span>
                  </a>                        
                  <meta itemprop="position" content="3">
                </li>
                <?php endforeach; ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
                  <span itemprop="name"><?php the_title(); ?></span>
                  <meta itemprop="position" content="4" />
                </li>
              </ul>
            </div>
            <!-- END Хлебные крошки -->
            <!-- Категории -->
            <div class="flex items-center mb-6">
              <?php foreach ($post_categories as $post_category){ ?>
                <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="inline-block bg-gray-100 dark:bg-dark-md text-black dark:text-gray-200 rounded px-2 lg:px-4 py-2 mr-2 mb-2 lg:mb-0"><?php echo $post_category->name; ?></a> 
              <?php } ?>
            </div>
            <!-- END Категории -->
            <h1 itemprop="headline" class="text-3xl lg:text-4xl font-black text-gray-800 dark:text-gray-200 tracking-wide lg:leading-12 mb-6"><?php the_title(); ?></h1>  
            <!-- Meta -->
            <div class="flex flex-col lg:flex-row lg:items-center text-gray-800 dark:text-gray-200 opacity-75 mb-6">
              <div class="mb-2 lg:mb-0 mr-6">
                <span class="mr-2">🗓️</span> <?php _e('Обновлено', 'web-g'); ?>: <?php echo get_the_modified_time('d.m.Y'); ?>
              </div>
              <div class="mb-2 lg:mb-0 mr-6">
                <span class="mr-2">💬</span><?php _e('Комментариев', 'web-g'); ?>: 
                <?php 
                  $post__in_array = array();
                  $translation_id = pll_get_post_translations(get_the_ID());
                  foreach ($translation_id as $tr_id) {
                    array_push($post__in_array, $tr_id);
                  }
                  $args = array(
                    'type' => 'comment',
                    'post__in' => $post__in_array,
                    'status' => 'approve'
                  );

                  $comments = get_comments( $args );
                  echo count($comments);
                ?>
              </div>
              <div>
                <span class="mr-2">👁️</span><?php _e('Просмотров', 'web-g'); ?>: <?php echo $countNumber; ?>
              </div>
            </div>
            <!-- END Meta -->
            <!-- Автор -->
            <div class="flex items-center mb-3">
              <div class="mr-4">
                <?php 
                    $avatar_url = carbon_get_user_meta(get_the_author_meta( 'ID' ), 'crb_user_ava'); 
                  ?>
                <?php if ($avatar_url): ?>
                  <img src="<?php echo $avatar_url; ?>" alt="" class="w-12 h-12 rounded-full">
                <?php else: ?>
                  <?php 
                    $avatar = get_avatar(
                      get_the_author_meta('ID'), '', '', '',
                      array( 'class' => array( 'w-12', 'h-12', 'rounded-full' ) )
                    );
                  ?>
                  <?php if ($avatar): ?>
                    <?php echo $avatar; ?>
                  <?php else: ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/user.svg" width="35">
                  <?php endif; ?>
                <?php endif; ?>
                
              </div>
              <div>
                <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
                  <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
                  <div class="flex items-center text-sm">
                    <!-- instagram -->
                    <?php if (carbon_get_the_post_meta('crb_post_author_instagram')): ?>
                      <div class="italic pr-3"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_instagram'); ?>" class="text-indigo-500">Instagram</a></div>
                    <?php endif; ?>
                    <!-- facebook --> 
                    <?php if (carbon_get_the_post_meta('crb_post_author_facebook')): ?>
                      <div class="italic"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_facebook'); ?>" class="text-indigo-500">Facebook</a></div>
                    <?php endif; ?>
                  </div>

                <?php else: ?>
                  <div class="mb-4">
                    <a href="#" class="font-semibold text-gray-800 dark:text-gray-200"><?php echo get_the_author(); ?></a> 
                  </div>
                  <div class="flex items-center">
                    <?php if(!empty(get_the_author_meta('facebook'))) { ?>
                    <div class="mr-3">
                      <a href="<?php the_author_meta('facebook'); ?>">Facebook</a>
                    </div>
                    <?php } ?>
                    <?php if(!empty(get_the_author_meta('instagram'))) { ?>
                    <div>
                      <a href="<?php the_author_meta('instagram'); ?>">Instagram</a>
                    </div>
                    <?php } ?>
                  </div>
                <?php endif; ?>
                
              </div>
            </div>
            <hr>
            <!-- END Автор -->
            <div class="content mb-10">
              <?php the_content(); ?>
            </div>
          </article>

          <!-- Оценка -->
          <div class="text-gray-800 dark:text-gray-200 mb-12 js-post-vote" data-post-id="<?php echo $currentId; ?>" data-local-translate-id="<?php foreach( $translated_ids as $id) {echo $id;} ?>">
            <div class="text-xl text-center font-semibold mb-6"><?php _e('Статья была полезной?', 'web-g'); ?></div>
            <div class="flex justify-center items-center text-md lg:text-lg -mx-2 lg:-mx-4">
              <!-- Up -->
              <div class="w-1/2 lg:w-auto cursor-pointer px-2 lg:px-4 js-vote-item" data-vote-item="meta_up_">
                <div class="flex justify-center items-center bg-gray-200 dark:bg-dark-md rounded text-center px-3 lg:px-6 py-2">
                  <div class="mr-4">👍</div>
                  <div><?php _e('Да', 'web-g'); ?> - <span class="js-vote-result"><?php echo get_vote_count($currentId, 'meta_up_'); ?></span></div>
                </div>  
              </div>
              <!-- END Up -->

              <!-- Down -->
              <div class="w-1/2 lg:w-auto cursor-pointer px-2 lg:px-4 js-vote-item" data-vote-item="meta_down_">
                <div class="flex justify-center items-center bg-gray-200 dark:bg-dark-md rounded text-center px-3 lg:px-6 py-2">
                  <div class="mr-4">👎</div>
                  <div><?php _e('Нет', 'web-g'); ?> - <span class="js-vote-result"><?php echo get_vote_count($currentId, 'meta_down_'); ?></span></div>
                </div>  
              </div>
              <!-- END Down -->
            </div>
          </div>
          <!-- END Оценка -->

          <!-- Рекомендуемые статьи -->
          <div class="mb-12">
            <div class="bg-gray-100 dark:bg-dark-md rounded-lg relative p-6">
              <div class="absolute top-0 right-0 text-blue-800 lg:translate-x-4 -translate-y-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
              </div>
              <div class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6"><?php _e('Рекомендуем к прочтению', 'web-g'); ?></div>

              <?php if (carbon_get_the_post_meta('crb_similar_links')): ?>
                <!-- Cами выбираем ссылки -->
                <?php 
                $similar_links = carbon_get_the_post_meta('crb_similar_links');
                foreach ($similar_links as $link):
                ?>
                  <?php $link_id = $link['id']; ?>
                  <div class="flex text-xl text-blue-800 dark:text-blue-400 font-light mb-4 last-of-type:mb-0">
                    <div class="w-4 min-w-[1rem] h-4 min-h-4 rounded-full bg-gray-400 mr-4 translate-y-[0.4rem]"></div>
                    <a href="<?php echo get_the_permalink($link_id); ?>" class=""><?php echo get_the_title($link_id); ?></a>
                  </div>
                <?php endforeach; ?>
                <!-- END Cами выбираем ссылки -->

              <?php else: ?>

                <!-- Автоматом вставляются ссылки -->
                <?php 
                  $current_id = get_the_ID();
                  $other_query = new WP_Query( array( 
                    'post_type' => 'post', 
                    'posts_per_page' => 3,
                    'post__not_in' => array($current_id),
                    'orderby' => 'rand',
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'category',
                        'terms' => $post_item,
                        'field' => 'term_id',
                        'include_children' => true,
                        'operator' => 'IN'
                      )
                    ),
                  ) );
                if ($other_query->have_posts()) : while ($other_query->have_posts()) : $other_query->the_post(); ?>
                  <div class="flex text-xl text-blue-800 dark:text-blue-400 font-light mb-4 last-of-type:mb-0">
                    <div class="w-4 min-w-[1rem] h-4 min-h-4 rounded-full bg-gray-400 dark:bg-yellow-100 mr-4 translate-y-[0.45rem]"></div>
                    <a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a>
                  </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
                <!-- END Автоматом вставляются ссылки -->
              <?php endif; ?>
            </div>
          </div>
          <!-- Рекомендуемые статьи -->

          <!-- Комментарии -->
          <div>
            <div class="text-2xl bg-indigo-200 dark:bg-slate-600 text-gray-800 dark:text-gray-200 rounded px-6 py-2 mb-6"><span class="mr-2">💬</span><?php _e('Комментарии', 'web-g'); ?>: </div>
            <?php comments_template(); ?>
          </div>
          <!-- END Комментарии -->
        </div>
        <div class="w-full lg:w-4/12 lg:px-4">
          <div>
            <?php get_template_part('template-parts/sidebar/sidebar-posts'); ?>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer();