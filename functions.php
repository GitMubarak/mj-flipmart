<?php
/**
 * Flipmart Mamurjor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Flipmart_Mamurjor
 */

if ( ! function_exists( 'flipmart_mamurjor_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function flipmart_mamurjor_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Flipmart Mamurjor, use a find and replace
		 * to change 'flipmart-mamurjor' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'flipmart-mamurjor', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'flipmart-mamurjor' ),
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
		add_theme_support( 'custom-background', apply_filters( 'flipmart_mamurjor_custom_background_args', array(
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
add_action( 'after_setup_theme', 'flipmart_mamurjor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flipmart_mamurjor_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'flipmart_mamurjor_content_width', 640 );
}
add_action( 'after_setup_theme', 'flipmart_mamurjor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function flipmart_mamurjor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'flipmart-mamurjor' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'flipmart-mamurjor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'flipmart_mamurjor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function flipmart_mamurjor_scripts() {
	wp_enqueue_style( 'flipmart-mamurjor-style', get_stylesheet_uri() );
	wp_enqueue_style( 'flipmart-mamurjor-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', '1.0', true );
	wp_enqueue_style( 'flipmart-mamurjor-main', get_template_directory_uri() . '/assets/css/main.css', '1.0', true );
	wp_enqueue_style( 'flipmart-mamurjor-blue', get_template_directory_uri() . '/assets/css/blue.css', '1.0', true );
	wp_enqueue_style( 'flipmart-mamurjor-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', '1.0', true );
	wp_enqueue_style( 'flipmart-mamurjor-owl-transitions', get_template_directory_uri() . '/assets/css/owl.transitions.css', '1.0', true );
	wp_enqueue_style( 'flipmart-mamurjor-animate', get_template_directory_uri() . '/assets/css/animate.min.css', '1.0', true );
	wp_enqueue_style( 'flipmart-mamurjor-rateit', get_template_directory_uri() . '/assets/css/rateit.css', '1.0', true );
	wp_enqueue_style( 'flipmart-mamurjor-bootstrap-select', get_template_directory_uri() . '/assets/css/bootstrap-select.min.css', '1.0', true );
	wp_enqueue_style( 'flipmart-mamurjor-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', '1.0', true );

	wp_enqueue_style( 'flipmart-mamurjor-googleapis-roboto', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700' );
	wp_enqueue_style( 'flipmart-mamurjor-googleapis-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' );
	wp_enqueue_style( 'flipmart-mamurjor-googleapis-montserrat', '//fonts.googleapis.com/css?family=Montserrat:400,700' );

	wp_enqueue_script( 'flipmart-mamurjor-jquery', get_template_directory_uri() . '/assets/js/jquery-1.11.1.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-bootstrap-hover-dropdown', get_template_directory_uri() . '/assets/js/bootstrap-hover-dropdown.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-echo', get_template_directory_uri() . '/assets/js/echo.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-jquery-easing', get_template_directory_uri() . '/assets/js/jquery.easing-1.3.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-bootstrap-slider', get_template_directory_uri() . '/assets/js/bootstrap-slider.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-jquery-rateit', get_template_directory_uri() . '/assets/js/jquery.rateit.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-lightbox', get_template_directory_uri() . '/assets/js/lightbox.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-bootstrap-select', get_template_directory_uri() . '/assets/js/bootstrap-select.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(), '1.0', true );
	wp_enqueue_script( 'flipmart-mamurjor-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0', true );

	wp_enqueue_script( 'flipmart-mamurjor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flipmart_mamurjor_scripts' );

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

