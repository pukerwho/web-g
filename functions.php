<?php
/**
 * G-Info functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package G-Info
 */

if ( ! defined( 'TAILWINDWP_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TAILWINDWP_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tailwind_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tailwind_wp_setup() {
		load_theme_textdomain( 'web-g', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		// add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'header' => esc_html__( 'Header', 'web-g' ),
        'mobile' => esc_html__( 'Mobile', 'web-g' ),
        'footer_info' => esc_html__( 'Footer info', 'web-g' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ginfo_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'tailwind_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tarakan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tarakan_content_width', 640 );
}
add_action( 'after_setup_theme', 'tarakan_content_width', 0 );

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
    require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/page-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/term-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/user-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/gutenberg-blocks.php';
}

require_once get_template_directory() . '/inc/share-buttons.php';
require_once get_template_directory() . '/inc/template-functions/post-vote.php';

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tarakan_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tarakan' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tarakan' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tarakan_widgets_init' );

include('inc/enqueues.php');

/**
 * Enqueue scripts and styles.
 */
function tailwindwp_scripts() {
	wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/tailwind.css', false, time() );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/style.css', false, time() );
	// wp_enqueue_script( 'jquery' );
 //  wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/scripts.js', '','',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tailwindwp_scripts' );

function ghub_child_setup() {
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
  
	// Enqueue editor styles.
	add_editor_style( get_stylesheet_directory_uri() . '/build/tailwind.css' );
}
// add_action( 'after_setup_theme', 'ghub_child_setup' );

//GUTENBERG
add_action('init', function() {
  wp_register_script('treba-gutenberg-filters-js', get_template_directory_uri() . '/gutenberg/js/gutenberg-filters.js', array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-edit-post', 'wp-components', 'wp-plugins', 'wp-data' ));

  register_block_type( 'treba/code-block', [
    'editor_script' => 'treba-gutenberg-filters-js',
  ] );
});

function gutenberg_custom_scripts() {
  
}
add_action('enqueue_block_editor_assets', 'gutenberg_custom_scripts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/comments-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


// ?????????????? ?????????? ?????? ???????????? - ????????????????????
function create_post_type() {
  register_post_type( 'questions',
    array(
      'labels' => array(
          'name' => __( '??????????????' ),
          'singular_name' => __( '????????????' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => false,
      'menu_icon' => 'dashicons-megaphone',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions' ),
    )
  );
}
add_action( 'init', 'create_post_type' );

function region_register_taxonomy() {
  
  $args = array (
    'label' => '??????????????',
    'labels' => array(
      'menu_name' => '????????????',
      'all_items' => esc_html__( 'All ??????????????', 'text-domain' ),
      'edit_item' => esc_html__( 'Edit ????????????', 'text-domain' ),
      'view_item' => esc_html__( 'View ????????????', 'text-domain' ),
      'update_item' => esc_html__( 'Update ????????????', 'text-domain' ),
      'add_new_item' => esc_html__( 'Add new ????????????', 'text-domain' ),
      'new_item_name' => esc_html__( 'New ????????????', 'text-domain' ),
      'parent_item' => esc_html__( 'Parent ????????????', 'text-domain' ),
      'parent_item_colon' => esc_html__( 'Parent ????????????:', 'text-domain' ),
      'search_items' => esc_html__( 'Search ????????????', 'text-domain' ),
      'popular_items' => esc_html__( 'Popular ????????????', 'text-domain' ),
      'separate_items_with_commas' => esc_html__( 'Separate ???????????? with commas', 'text-domain' ),
      'add_or_remove_items' => esc_html__( 'Add or remove ????????????', 'text-domain' ),
      'choose_from_most_used' => esc_html__( 'Choose most used ????????????', 'text-domain' ),
      'not_found' => esc_html__( 'No ???????????? found', 'text-domain' ),
      'name' => '??????????????',
      'singular_name' => '????????????',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'slug' => 'region',
      'with_front'    => true,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'region', array( 'hotels' ), $args );
}
add_action( 'init', 'region_register_taxonomy');

add_action('init', 'create_taxonomy');
function create_taxonomy(){
  register_taxonomy('city', array('hotels'), array(
    'label'                 => '', // ???????????????????????? ???????????????????? $labels->name
    'labels'                => array(
      'name'              => '????????????',
      'singular_name'     => '??????????',
      'search_items'      => '?????????? ????????????',
      'all_items'         => '?????? ????????????',
      'view_item '        => '???????????????????? ??????????',
      'parent_item'       => '???????????????????????? ??????????',
      'parent_item_colon' => '???????????????????????? ??????????:',
      'edit_item'         => '?????????????????????????? ??????????',
      'update_item'       => '???????????????? ??????????',
      'add_new_item'      => '????????????????',
      'new_item_name'     => '??????????',
      'menu_name'         => '????????????',
    ),
    'description'           => '', // ???????????????? ????????????????????
    'public'                => true,
    'publicly_queryable'    => null, // ?????????? ?????????????????? public
    'show_in_nav_menus'     => true, // ?????????? ?????????????????? public
    'show_ui'               => true, // ?????????? ?????????????????? public
    'show_in_menu'          => true, // ?????????? ?????????????????? show_ui
    'show_tagcloud'         => true, // ?????????? ?????????????????? show_ui
    'show_in_rest'          => true, // ???????????????? ?? REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    //'query_var'             => $taxonomy, // ???????????????? ?????????????????? ??????????????
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback ??????????????. ???????????????? ???? html ?????? ?????????????????? (?? ???????????? 3.8): post_categories_meta_box ?????? post_tags_meta_box. ???????? ?????????????? false, ???? ???????????????? ?????????? ???????????????? ????????????
    'show_admin_column'     => false, // ?????????????????? ?????? ?????? ????????-???????????????? ?????????????? ???????????????????? ?? ?????????????? ???????????????????????????????? ???????? ????????????. (?? ???????????? 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // ???? ?????????????????? ???????????????? show_ui
  ) );
}

// ?????????????? ?????????????? ?????? ??????????????
function tutCount($post_id) {
  
  if ( metadata_exists( 'post', $post_id, 'post_count' ) ) {
    $count_value = get_post_meta( $post_id, 'post_count', true );
    $count_value = $count_value + 1;
    update_post_meta( $post_id, 'post_count', $count_value );
  } else {
    $rand_post_count = mt_rand(50, 144);
    add_post_meta( $post_id, 'post_count', $rand_post_count, true);
  }
  $post_count = get_post_meta( $post_id, 'post_count', true );
  return $post_count;
  
}

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}

//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}
