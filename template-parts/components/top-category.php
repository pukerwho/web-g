<div class="flex flex-wrap lg:-mx-4">
  <div class="w-full lg:w-1/4 items-center lg:px-4 mb-6 lg:mb-0">
    <div class="relative flex items-center bg-white dark:bg-dark-xl dark:text-gray-200 rounded-lg shadow-md p-3">
      <a href="<?php echo get_category_link( '3' ); ?>" class="absolute-link"></a>
      <div class="text-gray-900 dark:text-gray-200 mr-4">
        <svg  width="40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve">
        <g>
          <path fill="currentColor" d="M157.3,133.1v104h-19.4V125.8L157.3,133.1z"/>
          <path fill="currentColor" d="M79.8,123.4c0-26.6,14.5-41.1,31.5-41.1s19.4,2.4,38.7,12.1s24.2,12.1,33.9,12.1c9.7,0,14.5-7.3,14.5-21.8h16.9
            c2.4,29-14.5,41.1-31.5,41.1s-21.8-2.4-38.7-12.1s-21.8-12.1-31.5-12.1s-14.5,7.3-16.9,24.2L79.8,123.4z"/>
          <path fill="currentColor" d="M150,300C67.3,300,0,232.7,0,150C0,67.3,67.3,0,150,0c82.7,0,150,67.3,150,150C300,232.7,232.7,300,150,300z M150,9.7
            C72.6,9.7,9.7,72.6,9.7,150S72.6,290.3,150,290.3S290.3,227.4,290.3,150S227.4,9.7,150,9.7z"/>
        </g>
        </svg>
      </div>
      <div>
        <div class="text-xl font-semibold">Tilda</div>
        <div class="text-sm opacity-75">
          <?php 
            $tilda_category = get_category('3');
            $tilda_category_count = $tilda_category->category_count;
          ?>
          <?php echo $tilda_category_count; ?> <?php _e('записей', 'web-g'); ?>
        </div>
      </div>  
    </div>
  </div>

  <div class="w-full lg:w-1/4 items-center lg:px-4 mb-6 lg:mb-0">
    <div class="relative flex items-center bg-white dark:bg-dark-xl dark:text-gray-200 rounded-lg shadow-md p-3">
      <a href="<?php echo get_category_link( '5' ); ?>" class="absolute-link"></a>
      <div class="mr-4">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/CSS3_logo.svg" alt="CSS3" width="40">
      </div>
      <div>
        <div class="text-xl font-semibold">HTML, CSS, JS</div>
        <div class="text-sm opacity-75">
          <?php 
            $css_category = get_category('5');
            $css_category_count = $css_category->category_count;
          ?>
          <?php echo $css_category_count; ?> <?php _e('записей', 'web-g'); ?>
        </div>
      </div>  
    </div>
  </div>

  <div class="w-full lg:w-1/4 items-center lg:px-4 mb-6 lg:mb-0">
    <div class="relative flex items-center bg-white dark:bg-dark-xl dark:text-gray-200 rounded-lg shadow-md p-3">
      <a href="<?php echo get_category_link( '4' ); ?>" class="absolute-link"></a>
      <div class="text-gray-900 dark:text-gray-200 mr-4">
        <svg width="40" viewBox="0 0 122.52 122.523" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path d="m8.708 61.26c0 20.802 12.089 38.779 29.619 47.298l-25.069-68.686c-2.916 6.536-4.55 13.769-4.55 21.388z"/><path d="m96.74 58.608c0-6.495-2.333-10.993-4.334-14.494-2.664-4.329-5.161-7.995-5.161-12.324 0-4.831 3.664-9.328 8.825-9.328.233 0 .454.029.681.042-9.35-8.566-21.807-13.796-35.489-13.796-18.36 0-34.513 9.42-43.91 23.688 1.233.037 2.395.063 3.382.063 5.497 0 14.006-.667 14.006-.667 2.833-.167 3.167 3.994.337 4.329 0 0-2.847.335-6.015.501l19.138 56.925 11.501-34.493-8.188-22.434c-2.83-.166-5.511-.501-5.511-.501-2.832-.166-2.5-4.496.332-4.329 0 0 8.679.667 13.843.667 5.496 0 14.006-.667 14.006-.667 2.835-.167 3.168 3.994.337 4.329 0 0-2.853.335-6.015.501l18.992 56.494 5.242-17.517c2.272-7.269 4.001-12.49 4.001-16.989z"/><path d="m62.184 65.857-15.768 45.819c4.708 1.384 9.687 2.141 14.846 2.141 6.12 0 11.989-1.058 17.452-2.979-.141-.225-.269-.464-.374-.724z"/><path d="m107.376 36.046c.226 1.674.354 3.471.354 5.404 0 5.333-.996 11.328-3.996 18.824l-16.053 46.413c15.624-9.111 26.133-26.038 26.133-45.426.001-9.137-2.333-17.729-6.438-25.215z"/><path d="m61.262 0c-33.779 0-61.262 27.481-61.262 61.26 0 33.783 27.483 61.263 61.262 61.263 33.778 0 61.265-27.48 61.265-61.263-.001-33.779-27.487-61.26-61.265-61.26zm0 119.715c-32.23 0-58.453-26.223-58.453-58.455 0-32.23 26.222-58.451 58.453-58.451 32.229 0 58.45 26.221 58.45 58.451 0 32.232-26.221 58.455-58.45 58.455z"/></g></svg>
      </div>
      <div>
        <div class="text-xl font-semibold">WordPress</div>
        <div class="text-sm opacity-75">
          <?php 
            $wp_category = get_category('4');
            $wp_category_count = $wp_category->category_count;
          ?>
          <?php echo $wp_category_count; ?> <?php _e('записей', 'web-g'); ?>
        </div>
      </div>  
    </div>
  </div>

  <div class="w-full lg:w-1/4 items-center lg:px-4">
    <div class="relative flex items-center bg-white dark:bg-dark-xl dark:text-gray-200 rounded-lg shadow-md p-3">
      <a href="<?php echo get_category_link( '2' ); ?>" class="absolute-link"></a>
      <div class="text-gray-900 dark:text-gray-200 mr-4">
        <svg width="40" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
      </div>
      <div>
        <div class="text-xl font-semibold">SEO</div>
        <div class="text-sm opacity-75">
          <?php 
            $seo_category = get_category('2');
            $seo_category_count = $seo_category->category_count;
          ?>
          <?php echo $seo_category_count; ?> <?php _e('записей', 'web-g'); ?>
        </div>
      </div>  
    </div>
  </div>

</div>