<?php
/**
 * strikebase functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package strikebase
 */

/**
 * Load VIP config and required plugins, if we're in a VIP context.
 */
if ( function_exists('wpcom_is_vip') ) :
	// Standard VIP configuration.
	require_once WP_CONTENT_DIR . '/themes/vip/plugins/vip-init.php';
	// Load Fieldmanager plugin.
	wpcom_vip_load_plugin( 'fieldmanager' );
endif;

if ( ! function_exists( 'strikebase_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function strikebase_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'strikebase' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'strikebase', get_template_directory() . '/languages' );

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

	add_image_size( 'strikebase-featured-image', 640, 9999 );

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
}
endif;
add_action( 'after_setup_theme', 'strikebase_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function strikebase_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'strikebase_content_width', 640 );
}
add_action( 'after_setup_theme', 'strikebase_content_width', 0 );

/**
 * Register Google Fonts
 */
function strikebase_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
	 * supported by Francois One, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$francois = esc_html_x( 'on', 'Francois One font: on or off', 'strikebase' );

	if ( 'off' !== $francois ) {
		$font_families = array();
		$font_families[] = 'Francois One';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function strikebase_scripts() {
	wp_enqueue_style( 'strikebase-style', get_stylesheet_uri() );
	wp_enqueue_style( 'strikebase-fonts', strikebase_fonts_url(), array(), null );

	wp_enqueue_script( 'strikebase-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'strikebase-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'strikebase_scripts' );

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Customizer stuff.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load custom template tags.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load custom date & time functionality.
 */
require get_template_directory() . '/inc/date-and-time.php';

/**
 * Load extra misc functionality.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Create a projects CPT.
 */
require get_template_directory() . '/inc/cpt/projects/class-projects-post-type.php';
require get_template_directory() . '/inc/cpt/projects/class-projects-custom-fields.php';

/**
 * Create a people CPT.
 */
require get_template_directory() . '/inc/cpt/people/class-people-post-type.php';
require get_template_directory() . '/inc/cpt/people/class-people-custom-fields.php';
