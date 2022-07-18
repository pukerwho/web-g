<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package G-Info
 */

?>

<footer class="bg-gray-200 dark:bg-dark-md border-t-8 border-gray-600 dark:border-dark-xl py-12 lg:py-20">
  <div class="container">
    <div class="flex flex-wrap flex-col lg:flex-row lg:-mx-4">
      <div class="w-full lg:w-4/6 lg:px-4 mb-4 lg:mb-0">
        <div class="logo text-2xl dark:text-gray-200 font-semibold text-gray-800 tracking-wide mb-4">
          <a href="<?php echo home_url(); ?>">
            <span class="text-red-500">[</span>WEB<span class="text-red-500">]</span> Головоломки
          </a>
        </div>
        <div class="w-full lg:w-3/4 text-gray-800 dark:text-gray-200 opacity-75 prose-a:text-blue-700 prose-a:font-semibold">
          <?php _e('Ресурс WEB Головоломки создан для того, чтобы делиться накопленным опытом и знаниями. Мы надеемся, что наши статьи будут полезны новичкам - тем, которые только решили вникнуть в мир web-разработки.', 'web-g'); ?> <br><?php _e('На сайте вы найдете публикации по разным направлениям и темам', 'web-g'); ?>: <a href="<?php echo get_category_link( '3' ); ?>">tilda</a>, <a href="<?php echo get_category_link( '4' ); ?>">wordpress</a>, <a href="<?php echo get_category_link( '3' ); ?>">верстка</a>, <a href="<?php echo get_category_link( '2' ); ?>">seo-продвижение</a>.
        </div>
      </div>
      <div class="w-full lg:w-2/6 lg:px-4 mb-4 lg:mb-0">
        <div class="text-gray-800 dark:text-gray-200 font-bold uppercase mb-2"><?php _e('Навигация', 'web-g'); ?></div>
        <div class="text-sm text-blue-700">
          <?php wp_nav_menu([
            'theme_location' => 'footer_info',
            'container' => 'div',
          ]); ?> 
        </div>
      </div>
    </div>
  </div>
</footer>

<div class="modal-bg hidden"></div>

<!-- not use -->
<div class="current-lang"></div>
<!-- END not use -->

<?php wp_footer(); ?>

</body>
</html>
