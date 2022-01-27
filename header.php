<?php

$current_title = wp_get_document_title();
if ( is_singular( 'places' ) ) {
	//Название заведения
	$place_title = get_the_title();
	//Город
	$current_cities = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
  foreach (array_slice($current_cities, 0,1) as $city) {
	  if ($city) {
	  	$current_city = $city->name;
	  }	
  } 
  //SEO
  if (get_locale() === 'ru_RU') {
  	$after_title = 'Отзывы, контакты, телефоны';
  } else {
  	$after_title = 'Відгуки, контакти, телефони';
  }
	
	$current_title = $place_title . ' (' . $current_city . ') - ' . $after_title;
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo $current_title; ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="header w-full z-10">
		<div class="container">
			<div class="flex justify-between items-center">

				<div class="logo text-xl dark:text-gray-200 font-semibold text-gray-800 tracking-wide py-2 lg:py-0">
					<a href="<?php echo home_url(); ?>">
						<span class="text-red-500">{</span>WEB<span class="text-red-500">}</span> Головоломки
					</a>
				</div>	

				<div class="hidden lg:flex items-center">
					<div class="header_menu text-gray-800 dark:text-gray-200">
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
					<div class="ml-8">
						<a href="#" class="block bg-indigo-600 hover:bg-blue-500 text-white rounded px-4 py-2">Tilda + SEO = ❤️</a>
					</div>	
				</div>
				
				<!-- Гамбургер -->
				<div class="hamburger-toggle w-7 h-6 relative flex flex-col justify-center lg:hidden mt-1">
					<span class="w-7 h-0.5 absolute bg-gray-600 top-0 right-0"></span>
					<span class="w-7 h-0.5 absolute bg-gray-600 top-2 right-0"></span>
					<span class="w-7 h-0.5 absolute bg-gray-600 top-4 right-0"></span>
				</div>
				<!-- END Гамбургер -->
				
			</div>
		</div>
	</header><!-- #masthead -->

	<div class="mobile-menu hidden h-full w-full fixed left-0 top-16 py-4 px-2">
		<div class="custom-shadow bg-white rounded-lg p-4">
			<?php wp_nav_menu([
	      'theme_location' => 'mobile',
	      'container' => 'div',
	      'menu_class' => 'flex flex-col'
	    ]); ?> 
		</div>
	</div>

