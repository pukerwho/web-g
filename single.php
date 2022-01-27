<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php 
    $currentId = get_the_ID();
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
                    <span itemprop="name"><?php _e( 'Главная', 'restx' ); ?></span>
                  </a>                        
                  <meta itemprop="position" content="1">
                </li>
                <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item mr-8">
                  <a itemprop="item" href="<?php echo get_post_type_archive_link('post'); ?>" class="text-blue-700 dark:text-blue-400">
                    <span itemprop="name"><?php _e( 'Все записи', 'restx' ); ?></span>
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
                  <meta itemprop="position" content="2">
                </li>
                <?php endforeach; ?>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
                  <span itemprop="name"><?php the_title(); ?></span>
                  <meta itemprop="position" content="3" />
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
                <span class="mr-2">🗓️</span> Обновлено: <?php echo get_the_date('d.m.Y'); ?>
              </div>
              <div class="mb-2 lg:mb-0 mr-6">
                <span class="mr-2">💬</span>Комментариев: <?php echo get_comments_number(); ?>
              </div>
              <div>
                <span class="mr-2">👁️</span>Просмотров: <?php echo $countNumber; ?>
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
                    <img src="<?php bloginfo('template_part'); ?>/img/user.svg" width="35px">
                  <?php endif; ?>
                <?php endif; ?>
                
              </div>
              <div>
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
              </div>
            </div>
            <hr>
            <!-- END Автор -->
            <div class="content mb-10">
              <?php the_content(); ?>
            </div>
          </article>

          <!-- Оценка -->
          <?php
            $up_meta = 'meta_up_'.$currentId;
            $down_meta = 'meta_down_'.$currentId;

            $up_post_meta = get_post_meta( $currentId, $up_meta, true );
            $up_meta_relust = $up_post_meta ? $up_post_meta : '0';
            $down_post_meta = get_post_meta( $currentId, $down_meta, true );
            $down_meta_relust = $down_post_meta ? $down_post_meta : '0';
          ?>
          <div class="text-gray-800 dark:text-gray-200 mb-12 js-post-vote" data-post-id="<?php echo $currentId; ?>">
            <div class="text-xl text-center font-semibold mb-6">Статья была полезной?</div>
            <div class="flex justify-center items-center text-md lg:text-lg -mx-2 lg:-mx-4">
              <!-- Up -->
              <div class="w-1/2 lg:w-auto cursor-pointer px-2 lg:px-4 js-vote-item" data-vote-item="<?php echo $up_meta; ?>">
                <div class="flex justify-center items-center bg-gray-200 dark:bg-dark-md rounded text-center px-3 lg:px-6 py-2">
                  <div class="mr-4">👍</div>
                  <div>Да - <span class="js-vote-result"><?php echo $up_meta_relust; ?></span></div>
                </div>  
              </div>
              <!-- END Up -->

              <!-- Down -->
              <div class="w-1/2 lg:w-auto cursor-pointer px-2 lg:px-4 js-vote-item" data-vote-item="<?php echo $down_meta; ?>">
                <div class="flex justify-center items-center bg-gray-200 dark:bg-dark-md rounded text-center px-3 lg:px-6 py-2">
                  <div class="mr-4">👎</div>
                  <div>Нет - <span class="js-vote-result"><?php echo $down_meta_relust; ?></span></div>
                </div>  
              </div>
              <!-- END Down -->
            </div>
          </div>
          <!-- END Оценка -->

          <!-- Комментарии -->
          <div>
            <div class="text-2xl bg-indigo-200 dark:bg-slate-600 text-gray-800 dark:text-gray-200 rounded px-6 py-2 mb-6"><span class="mr-2">💬</span> Комментарии: </div>
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