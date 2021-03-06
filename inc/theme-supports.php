<?php
/**
 * Functions which declare theme support for WordPress
 *
 * @package fadboilerplate
 */

if ( ! function_exists( 'fadboilerplate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fadboilerplate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fadboilerplate, use a find and replace
		 * to change 'fadboilerplate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fadboilerplate', get_template_directory() . '/languages' );

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
				'fadboilerplate_custom_background_args',
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

		//https://weblines.com.au/gutenberg-blocks-wide-alignment-full-width/
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );


		// Disable Custom Colors
		add_theme_support( 'disable-custom-colors' );

		// Editor Color Palette
		add_theme_support( 'editor-color-palette', array(
		 	array(
		 		'name'  => __( 'Light Blue', 'fadboilerplate' ),
		 		'slug'  => 'light-blue',
		 		'color'	=> '#28b0e5',
			),
			array(
		 		'name'  => __( 'Blue', 'fadboilerplate' ),
		 		'slug'  => 'blue',
		 		'color'	=> '#146e9a',
			),
			array(
		 		'name'  => __( 'Black', 'fadboilerplate' ),
		 		'slug'  => 'black',
		 		'color'	=> '#000000',
			),
			array(
		 		'name'  => __( 'Dark Gray', 'fadboilerplate' ),
		 		'slug'  => 'dark-gray',
		 		'color'	=> '#3f3f3f',
			),
			array(
		 		'name'  => __( 'Gray', 'fadboilerplate' ),
		 		'slug'  => 'gray',
		 		'color'	=> '#6c757d',
			),
			array(
		 		'name'  => __( 'Light Gray', 'fadboilerplate' ),
		 		'slug'  => 'light-gray',
		 		'color'	=> '#f8f9fa',
			),
			array(
		 		'name'  => __( 'White', 'fadboilerplate' ),
		 		'slug'  => 'white',
		 		'color'	=> '#ffffff',
			),
		) );

		add_theme_support( 'disable-custom-font-sizes' );

		// Adds support for editor font sizes.
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name'      => __( 'small', 'fadboilerplate' ),
				'shortName' => __( 'S', 'fadboilerplate' ),
				'size'      => 14,
				'slug'      => 'small'
			),
			array(
				'name'      => __( 'regular', 'fadboilerplate' ),
				'shortName' => __( 'M', 'fadboilerplate' ),
				'size'      => 16,
				'slug'      => 'regular'
			),
			array(
				'name'      => __( 'large', 'fadboilerplate' ),
				'shortName' => __( 'L', 'fadboilerplate' ),
				'size'      => 24,
				'slug'      => 'large'
			),
			array(
				'name'      => __( 'larger', 'fadboilerplate' ),
				'shortName' => __( 'XL', 'fadboilerplate' ),
				'size'      => 32,
				'slug'      => 'larger'
			),
			array(
				'name'      => __( 'huge', 'fadboilerplate' ),
				'shortName' => __( 'Huge', 'fadboilerplate' ),
				'size'      => 48,
				'slug'      => 'huge'
			),
			array(
				'name'      => __( 'display', 'fadboilerplate' ),
				'shortName' => __( 'Display', 'fadboilerplate' ),
				'size'      => 72,
				'slug'      => 'display'
			),
		) );

		// Add editor styles
		add_theme_support( 'editor-styles' );
		add_editor_style( 'editor.css' );
	}
endif;
add_action( 'after_setup_theme', 'fadboilerplate_setup' );

/**
 * Add custom admin theme
 */
add_action( 'admin_init', 'miles_add_colors' );
function miles_add_colors() {
	wp_admin_css_color(
        'fadboilerplate',
        'fadboilerplate',
        get_template_directory_uri() . '/css/wp_admin.css', array( '#3f3f3f', '#103694', '#018ac6', '#17a2b8' ),
        array(
            'base' => '#e4e4e7',
            'focus' => '#fff',
            'current' => '#fff',
        )
    );
}

function fadboilerplate_set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'fadboilerplate'
    );
    wp_update_user( $args );
}
add_action('user_register', 'fadboilerplate_set_default_admin_color');

if ( !current_user_can('manage_options') )
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fadboilerplate_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fadboilerplate_content_width', 640 );
}
add_action( 'after_setup_theme', 'fadboilerplate_content_width', 0 );

/**
 * Print scripts to the <head>
 *
 * Warning: There is no validation - copies directly from the acf field in
 *          Theme Options settings.
 */
add_action( 'wp_head', 'fadboilerplate_wp_head' );
function fadboilerplate_wp_head() {
	if ( !is_admin() && !is_feed() && !is_robots() && !is_trackback() ) {
		$advanced_settings = get_field('advanced_settings', 'options');
		$header_scripts = ( isset( $advanced_settings['header_scripts'] ) ) ? $advanced_settings['header_scripts'] : '';
		if ( !empty( $header_scripts ) ) {
			echo $header_scripts;
		}
	}
}

/**
 * Print scripts after the opening <body>
 *
 * Warning: There is no validation - copies directly from the acf field in
 *          Theme Options settings.
 */
add_action( 'wp_body_open', 'fadboilerplate_wp_body_open' );
function fadboilerplate_wp_body_open() {
	if ( !is_admin() && !is_feed() && !is_robots() && !is_trackback() ) {
		$advanced_settings = get_field('advanced_settings', 'options');
		$body_scripts = ( isset( $advanced_settings['body_scripts'] ) ) ? $advanced_settings['body_scripts'] : '';
		if ( !empty( $body_scripts ) ) {
			echo $body_scripts;
		}
	}
}

/**
 * Print scripts to the <footer>
 *
 * Warning: There is no validation - copies directly from the acf field in
 *          Theme Options settings.
 */
add_action( 'wp_footer', 'fadboilerplate_wp_footer' );
function fadboilerplate_wp_footer() {
	if ( !is_admin() && !is_feed() && !is_robots() && !is_trackback() ) {
		$advanced_settings = get_field('advanced_settings', 'options');
		$footer_scripts = ( isset( $advanced_settings['footer_scripts'] ) ) ? $advanced_settings['footer_scripts'] : '';
		if ( !empty( $footer_scripts ) ) {
			echo $footer_scripts;
		}
	}
}
