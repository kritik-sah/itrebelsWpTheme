<?php
/**
 * itrebels functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package itrebels
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function itrebels_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on itrebels, use a find and replace
		* to change 'itrebels' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'itrebels', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'itrebels' ),
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
			'itrebels_custom_background_args',
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
add_action( 'after_setup_theme', 'itrebels_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function itrebels_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'itrebels_content_width', 640 );
}
add_action( 'after_setup_theme', 'itrebels_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function itrebels_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'itrebels' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'itrebels' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'itrebels_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function itrebels_scripts() {
	wp_enqueue_style( 'itrebels-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'itrebels-main', get_template_directory_uri() . '/css/style.min.css');
	wp_enqueue_style( 'itrebels-mystyle', get_template_directory_uri() . '/css/mystyle.css');
	wp_enqueue_style( 'grt-yt-popup', get_template_directory_uri() . '/css/grt-youtube-popup.css');
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css');
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/lib/lightbox/css/lightbox.min.css');
	wp_style_add_data( 'itrebels-style', 'rtl', 'replace' );

	wp_enqueue_script( 'itrebels-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_register_script( 'jquery-js', 'https://code.jquery.com/jquery-3.4.1.min.js');
	wp_enqueue_script( 'jquery-js');
	wp_register_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js');
	wp_enqueue_script( 'bootstrap-js');
	wp_register_script( 'typed-js', 'https://cdn.jsdelivr.net/npm/typed.js@latest/lib/typed.min.js');
	wp_enqueue_script( 'typed-js');
	wp_enqueue_script( 'easing-js', get_template_directory_uri() . '/lib/easing/easing.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'waypoints-js', get_template_directory_uri() . '/lib/waypoints/waypoints.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'owlcarousel-js', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/lib/isotope/isotope.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/lib/lightbox/js/lightbox.min.js', array(), _S_VERSION, true );





	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'grt-yt-js', get_template_directory_uri() . '/js/grt-youtube-popup.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'itrebels_scripts' );


/**
 * Custom google fonts
 */
function enqueue_custom_fonts(  ){
	wp_register_style('fonts-oswald', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap');
	wp_register_style('fonts-rubik', 'https://fonts.googleapis.com/css2?family=Rubik&display=swap');
	wp_enqueue_style('fonts-oswald');
	wp_enqueue_style('fonts-rubik');
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_fonts');

/**
 * Custom icons
 */
function enqueue_custom_icons(  ){
	wp_register_style('fontawesome-6', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css');
	wp_register_style('fontawesome-5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css');
	wp_register_style('bootstrap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css');
	wp_enqueue_style('fontawesome-6');
	wp_enqueue_style('fontawesome-5');
	wp_enqueue_style('bootstrap-icon');
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_icons');

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

