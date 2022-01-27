<?php 
  //Полезных голосов
  $currentId = get_the_ID();
  $up_meta = 'meta_up_'.$currentId;
  $up_post_meta = get_post_meta( $currentId, $up_meta, true );
  $up_meta_relust = $up_post_meta ? $up_post_meta : '0';
?>

<div class="w-full bg-white dark:bg-dark-xl custom-shadow rounded-lg px-2 lg:px-6 py-2 lg:py-4 mb-6">
  <div class="flex lg:justify-between lg:items-center flex-col-reverse lg:flex-row text-sm lg:text-md mb-2 lg:mb-6">
    <div class="flex items-center">
      <?php
      $post_categories = get_the_terms( $new_posts->ID, 'category' );
      foreach ($post_categories as $post_category){ ?>
        <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="inline-block bg-gray-100 dark:bg-dark-md text-black dark:text-gray-200 rounded px-2 lg:px-4 py-2 mr-2 mb-2 lg:mb-0"><?php echo $post_category->name; ?></a> 
      <?php } ?>
    </div>
    <div class="flex items-center mb-4 lg:mb-0">
      <div class="mr-3">👍</div> 
      <div class="text-gray-800 dark:text-gray-200">
        Полезно - <span class="w-6 h-6 inline-flex justify-center items-center bg-green-500 text-white rounded"><?php echo $up_meta_relust; ?></span></div>
    </div>
  </div>
  <div class="text-lg lg:text-2xl text-gray-800 dark:text-gray-200 font-bold mb-4 lg:mb-6">
    <a href=<?php the_permalink(); ?>><?php the_title(); ?></a>
  </div>
  <div class="text-sm text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-600 pb-3 lg:pb-6 mb-3 lg:mb-6">
    <?php 
      $content_text = wp_strip_all_tags( get_the_content() );
      echo mb_strimwidth($content_text, 0, 200, '...');
    ?>
  </div>
  <div class="flex lg:justify-between lg:items-center flex-col lg:flex-row">
    <div class="flex items-center mb-3 lg:mb-0">
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
      <div><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>" class="font-light text-gray-800 dark:text-gray-200"><?php echo get_the_author(); ?></a></div>
    </div>
    <div class="flex justify-center mb-2 lg:mb-0">
      <a href="<?php the_permalink(); ?>" class="bg-dark-md rounded-lg text-white text-center px-4 py-2 lg:py-3">Читать дальше</a>
    </div>
  </div>
</div>