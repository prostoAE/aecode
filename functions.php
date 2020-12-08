<?php
/**
 * aecode functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aecode
 */

if ( ! function_exists( 'aecode_setup' ) ) :

	function aecode_setup() {

		load_theme_textdomain( 'aecode', get_template_directory() . '/languages' );

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
			'home-menu' => esc_html__( 'Home header', 'aecode' ),
			'home-footer-menu' => esc_html__( 'Home footer', 'aecode' ),
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
		add_theme_support( 'custom-background', apply_filters( 'aecode_custom_background_args', array(
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
add_action( 'after_setup_theme', 'aecode_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aecode_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aecode_content_width', 640 );
}
add_action( 'after_setup_theme', 'aecode_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function aecode_scripts() {
	wp_enqueue_style( 'aecode-style', get_stylesheet_uri() );
	wp_enqueue_script( 'aecode-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'aecode-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//Custom Styles
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );

	//Custom Scripts
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jQuery_3.4.1.js', [], '3.4.1', true);
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel2-thumbs', get_template_directory_uri() . '/assets/js/owl.carousel2.thumbs.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'aecode_scripts' );

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
 * Redux Config
 */
require get_template_directory() . '/inc/redux-config.php';

/**
 * Custom PostType & Taxonomy
 */
require get_template_directory() . '/inc/custom_post_types.php';

/**
 * Social Share
 */
require get_template_directory() . '/inc/social.php';

/**
 * Custom Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-customsearch.php';
require get_template_directory() . '/inc/widgets/widget-blogcategory.php';
require get_template_directory() . '/inc/widgets/widget-blogtags.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*
 * Custom Code
*/

/* Сбрасываем правила для произвольного типа записей. */
add_action( 'after_switch_theme', 'aecode_flush_rewrite_rules' );
function aecode_flush_rewrite_rules() {
	flush_rewrite_rules();
}

/*Отключение админ панели*/
show_admin_bar(false);

/*Добавление класса в меню*/
function add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/*Изменяем количество выводимых слов в Excerpt*/
add_filter( 'excerpt_length', function(){
	return 25;
} );
