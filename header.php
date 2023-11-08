<?php

$current_title = wp_get_document_title();
if ( is_singular() ) {
	//Название заведения
	if (carbon_get_the_post_meta('crb_post_title')) {
		$single_title = carbon_get_the_post_meta('crb_post_title');
	} else {
		$single_title = get_the_title();
	}
	if (carbon_get_the_post_meta('crb_post_description')) {
		$single_description = carbon_get_the_post_meta('crb_post_description');
	}
} else {
	$single_title = wp_get_document_title();
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo $single_title; ?></title>
	<?php if ($single_description): ?>
	<meta name="description" content="<?php echo $single_description; ?>" />
	<?php endif; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <header class="bg-dark-md text-gray-200 py-4 mb-6 lg:mb-12">
    <div class="container">
      <div class="flex items-center justify-between">
        <div class="logo text-xl text-gray-200 font-semibold tracking-wide py-2 lg:py-0">
          <a href="<?php echo home_url(); ?>">
            <span class="text-red-500">{</span>WEB<span class="text-red-500">}</span> Головоломки
          </a>
        </div>
        <div>
          <div class="hidden lg:flex items-center">
            <div class="header_menu text-gray-200">
              <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => 'div',
                'menu_class' => 'flex'
              ]); ?> 
            </div>
            <div class="cursor-pointer ml-8">
              <div class="hidden dark:block text-gray-200 js-toggle-light" data-light="off">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </div>
              <div class="block dark:hidden dark:text-gray-200 js-toggle-light" data-light="on">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
              </div>
            </div>
            <!-- Languages -->
            <div class="ml-8">
              <div class="flex items-center text-gray-200 -mx-1">
                <?php if (function_exists('pll_the_languages')) {
                  pll_the_languages(); 
                } ?>
              </div>
            </div>	
            <!-- END Languages -->
          </div>
          
          <!-- Гамбургер -->
          <div class="hamburger-toggle w-7 h-6 relative flex flex-col justify-center lg:hidden mt-1">
            <span class="w-7 h-0.5 absolute bg-gray-200 top-0 right-0"></span>
            <span class="w-7 h-0.5 absolute bg-gray-200 top-2 right-0"></span>
            <span class="w-7 h-0.5 absolute bg-gray-200 top-4 right-0"></span>
          </div>
          <!-- END Гамбургер -->
        </div>
      </div>
      
    </div>
  </header>

	<div class="mobile-menu hidden h-full w-full fixed left-0 top-16 py-4 px-2">
		<div class="custom-shadow bg-white rounded-lg p-4">
			<?php wp_nav_menu([
	      'theme_location' => 'mobile',
	      'container' => 'div',
	      'menu_class' => 'flex flex-col'
	    ]); ?> 
		</div>
	</div>

