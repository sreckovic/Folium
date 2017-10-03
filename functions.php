<?php
/**
 * folium functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package folium
 */

if ( ! function_exists( 'folium_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function folium_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on folium, use a find and replace
	 * to change 'folium' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'folium', get_template_directory() . '/languages' );

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
	 * Enable support for themes to add custom logos.
	 *
	 * https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 80,
		'flex-width' => false,
		//'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1348, 896, true ); // 2x 674x448px

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'folium' ),
		'menu-2' => esc_html__( 'Footer', 'folium' ),
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
	add_theme_support( 'custom-background', apply_filters( 'folium_custom_background_args', array(
		'default-color' => '#f5f5f5',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'starter-content', array(

		'posts' => array(
			'custom' => array(
				'post_type' => 'page',
				'post_title' => __( 'The name of a book', 'folium' ),
				'post_excerpt' => __( 'A subordinate title of a published work or article giving additional information about its content', 'folium' ),
			),
		),

		'theme_mods' => array(
			'banner-title' => __( 'The name of a book, composition, or other artistic work', 'folium' ),
			'banner-subtitle' => __( 'A subordinate title of a published work or article giving additional information about its content', 'folium' ),
	    'banner-page' => '{{custom}}',
			'banner-display' => 1,
	  ),

	) );

}
endif;

add_action( 'after_setup_theme', 'folium_setup', 0 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function folium_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'folium_content_width', 812 );
}
add_action( 'after_setup_theme', 'folium_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function folium_widgets_init() {

	//Add widgets here to appear in your footer.
	//Add widgets here to appear in your sidebar on blog posts and archive pages.
	//Blog Sidebar

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'folium' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add sidebar widgets here.', 'folium' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Social media', 'folium' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add footer social media widgets here.', 'folium' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'folium_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function folium_scripts() {
	wp_enqueue_style( 'folium-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'folium-fonts', folium_fonts(), array(), null );
	wp_enqueue_script( 'folium-navigation', get_template_directory_uri() . '/js/navigation-custom.js', array( 'jquery' ), '20151215', true );
	wp_enqueue_script( 'folium-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'folium_scripts' );

/**
 * Enqueue Google fonts.
 */
function folium_fonts() {
  $fonts_url = '';
  $roboto = _x( 'on', 'Roboto: on or off', 'folium' );
	$open_sans = _x( 'on', 'Open Sans: on or off', 'folium' );

	if ( has_custom_logo() ) {
		$pacifico = _x( 'off', 'Pacifico: on or off', 'folium' );
	} else {
		$pacifico = _x( 'on', 'Pacifico: on or off', 'folium' );
	};

	if ( 'off' !== $roboto || 'off' !== $open_sans || 'off' !== $pacifico ) {
    $fonts = array();

		if ( 'off' !== $roboto ) { $fonts[] = 'Roboto:100,300,400,400i,700'; }
    if ( 'off' !== $open_sans ) { $fonts[] = 'Open Sans:300,400,400i,700'; }
		if ( 'off' !== $pacifico ) { $fonts[] = 'Pacifico'; }
  }

  $args = array(
    'family' => urlencode( implode( '|', $fonts ) ),
    'subset' => urlencode( 'latin,latin-ext' ),
  );

  $fonts_url = add_query_arg( $args, '//fonts.googleapis.com/css' );
  return $fonts_url;
}

/**
 * Implement the Custom Logo feature.
 */
function folium_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/**
 * Sanitize function for checbox used in customizer.
 */
function folium_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Add description for Menu Locations inside customizer.
 */

function folium_menu_locations_description( $wp_customize ) {
	$section = $wp_customize->get_section( 'menu_locations' );
	$section->description .= "<p>" . __( 'Please note that menu depth is limited to 1', 'folium' ) . ".</p>";
}
add_action( 'customize_register', 'folium_menu_locations_description' , 12 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
