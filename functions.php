<?php
/**
 * elising functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elising
 */

if ( ! function_exists( 'elising_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function elising_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on elising, use a find and replace
		 * to change 'elising' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'elising', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'elising' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'elising_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'elising_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elising_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'elising_content_width', 640 );
}
add_action( 'after_setup_theme', 'elising_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elising_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'elising' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'elising' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'elising_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elising_scripts() {
	wp_enqueue_style( 'gfont', 'https://fonts.googleapis.com/css?family=Rubik|Roboto:300,400,500&amp;subset=cyrillic' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/fonts/icomoon.css' );
	wp_enqueue_style( 'elising-style', get_stylesheet_uri() );
	wp_enqueue_script( 'elising-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20181003', true );
	wp_enqueue_script( 'elising-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20181003', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'elising-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '20181003', true );
	wp_enqueue_script( 'elising-masked', get_template_directory_uri() . '/js/maskedinput.js', array('jquery'), '20181003', true );
	wp_enqueue_script( 'elising-esqu', get_template_directory_uri() . '/js/eskju.jquery.scrollflow.js', array('jquery'), '20181011', true );
	wp_enqueue_script( 'elising-wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), '20181008', true );
	wp_enqueue_script( 'elising-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '20181003', true );
}
add_action( 'wp_enqueue_scripts', 'elising_scripts' );

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

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//remove Wordpress unusual for us tag 
function remove_wpress_tag() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'feed_links', 2 );	
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7);
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}
add_action('get_header','remove_wpress_tag');

// add options page of acf plugin
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Опции темы',
		'menu_title' 	=> 'Опции темы',
		'menu_slug' 	=> 'option',
		'redirect' 	=> false
	));
}