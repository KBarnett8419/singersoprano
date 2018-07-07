<?php
/**
 * Relative Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Relative
 */

if ( ! function_exists( 'relative_setup' ) ) :

	// Set the default content width.
		$GLOBALS['content_width'] = 1150;
		
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function relative_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Relative Pro, use a find and replace
		 * to change 'relative' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'relative', get_template_directory() . '/languages' );

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
		
		// blog style select for thumbnail creation
		$blogstyle = esc_attr(get_theme_mod( 'relative_blog_style', 'blog1' ));
		
		// create featured images for the default blog style
		if( esc_attr(get_theme_mod( 'relative_blogmedium_thumbnails', false ) ) ) :
			add_image_size( 'relative_blogmedium', 775, 400, true );
		endif;

		// create featured images for the blog grid
		if( esc_attr(get_theme_mod( 'relative_bloggrid_thumbnails', false ) ) ) :
			add_image_size( 'relative_bloggrid', 500, 400, true );
		endif;
		
		// create slides
		if( esc_attr(get_theme_mod( 'relative_show_slider', false ) ) ) :
			add_image_size( 'relative_slider', 1150, 550, true );		
		endif;

		// create related posts thumbnails
			add_image_size( 'relative_related', 60, 60, true );
		
		// create recent posts thumbnails
		add_image_size( 'relative_recent', 80, 70, true );		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Main Menu', 'relative' ),
			'social' => esc_html__( 'Social Menu', 'relative' ),
			'footer' => esc_html__( 'Footer Menu', 'relative' ),
		) );

		
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'relative_custom_background_args', array(
			'default-image' => get_template_directory_uri() . '/images/default-bg.png',
			'default-color' => 'ffffff',
		) ) );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style( array( '/css/editor.css', relative_fonts_url() ) );
		
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
add_action( 'after_setup_theme', 'relative_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */

function relative_content_width() {
	$content_width = $GLOBALS['content_width'];
 
	// Check if is single post and there is no sidebar.
	if ( is_active_sidebar( 'pageleft'  ) || is_active_sidebar( 'blogleft' ) || is_active_sidebar( 'blogright' ) || is_active_sidebar( 'blogright' ) ) {
		$content_width = 750;
	}
	
  $GLOBALS['content_width'] = apply_filters( 'relative_content_width', $content_width );
}
add_action( 'template_redirect', 'relative_content_width', 0 );



/**
 * Register custom fonts.
 */
function relative_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Muli, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$muli = _x( 'on', 'Muli font: on or off', 'relative' );

	if ( 'off' !== $muli ) {
		$font_families = array();

		$font_families[] = 'Muli:400,600,800,900';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function relative_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'relative-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'relative_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function relative_scripts() {
	
	// Add slider CSS only if is front page ans slider is enabled
	if ( ( is_home() || is_front_page() ) && get_theme_mod( 'relative_show_slider' ) == 1 ) {
		wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/css/flexslider.css' );
	}	
	
	// Font Awesome 4
	if( esc_attr(get_theme_mod( 'relative_fa4', true ) ) ) :
		wp_enqueue_style( 'font-awesome-4', get_template_directory_uri() . '/css/fontawesome4.css', '', '4.7.0' );
	endif;

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'relative-fonts', relative_fonts_url(), array(), null );	

	wp_enqueue_style( 'relative-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'relative-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20151215', true );

	// Add the WooCommerce Flexslider JS only if is front page ans slider is enabled
	if ( ( is_home() || is_front_page() ) && get_theme_mod( 'relative_show_slider' ) == 1 ) {
		wp_register_script( 'flexslider-js', get_template_directory_uri() . '/js/flexslider.js', array( 'jquery' ), '2.7.0', true );
	}
		
	wp_enqueue_script( 'relative-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Main theme related functions
	wp_enqueue_script( 'relative-theme-scripts', get_template_directory_uri() . '/js/theme-scripts.js', array( 'jquery' ) );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'relative_scripts' );


// Load Inline Styles.
require get_template_directory() . '/inc/inline-styles.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Theme Info Page
require get_template_directory() . '/inc/theme-info/relative-info.php';
require get_template_directory() . '/inc/theme-info/relative-info-class-about.php';

// Implement the Custom Header feature.
require get_template_directory() . '/inc/sidebars.php';

// Register recent posts widget
require get_template_directory() . '/inc/widgets/recent-posts-widget.php';
