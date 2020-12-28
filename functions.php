<?php
/**
 * Functions
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

/*
BEFORE MODIFYING THIS THEME:
Please read the instructions here (private repo): https://github.com/billerickson/EA-Starter/wiki
Devs, contact me if you need access
*/

/**
 * Set up the content width value based on the theme's design.
 * 
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1472;
}

/**
 * Global enqueues
 *
 * @since  1.0.0
 * @global array $wp_styles
 */
function ea_global_enqueues() {

	// javascript
	if( ! ea_is_amp() ) {
		wp_enqueue_script( 'ea-global', get_stylesheet_directory_uri() . '/assets/js/global-min.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/js/global-min.js' ), true );

		// Move jQuery to footer
		if( ! is_admin() ) {
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
			wp_enqueue_script( 'jquery' );
		}

	}

	// css
	wp_dequeue_style( 'child-theme' );
	wp_enqueue_style( 'ea-fonts', ea_theme_fonts_url() );
	wp_enqueue_style( 'ea-style', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );
}
add_action( 'wp_enqueue_scripts', 'ea_global_enqueues' );

/**
 * Gutenberg scripts and styles
 */
function ea_gutenberg_scripts() {
	wp_enqueue_style( 'ea-fonts', ea_theme_fonts_url() );
	wp_enqueue_script( 'ea-editor', get_stylesheet_directory_uri() . '/assets/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ), true );
}
add_action( 'enqueue_block_editor_assets', 'ea_gutenberg_scripts' );

/**
 * Theme Fonts URL
 *
 */
function ea_theme_fonts_url() {
//	return 'https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;700&display=swap';
	return false;
}

/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function ea_child_theme_setup() {

	define( 'CHILD_THEME_VERSION', filemtime( get_stylesheet_directory() . '/assets/css/main.css' ) );

	// General cleanup
	include_once( get_stylesheet_directory() . '/inc/wordpress-cleanup.php' );
	include_once( get_stylesheet_directory() . '/inc/genesis-changes.php' );

	// Theme
	include_once( get_stylesheet_directory() . '/inc/markup.php' );
	include_once( get_stylesheet_directory() . '/inc/helper-functions.php' );
	include_once( get_stylesheet_directory() . '/inc/layouts.php' );
	include_once( get_stylesheet_directory() . '/inc/navigation.php' );
	include_once( get_stylesheet_directory() . '/inc/loop.php' );
	include_once( get_stylesheet_directory() . '/inc/author-box.php' );
	include_once( get_stylesheet_directory() . '/inc/template-tags.php' );
	include_once( get_stylesheet_directory() . '/inc/site-footer.php' );
	//include_once get_stylesheet_directory() . '/inc/backgrounds.php';
	include_once get_stylesheet_directory() . '/inc/custom-logo.php';
	include_once get_stylesheet_directory() . '/inc/banner.php';
	include_once get_stylesheet_directory() . '/inc/social-media-contact-icons.php';

	// Editor
	include_once( get_stylesheet_directory() . '/inc/disable-editor.php' );
	include_once( get_stylesheet_directory() . '/inc/tinymce.php' );
	include_once get_stylesheet_directory() . '/inc/block-patterns.php';

	// Functionality
	include_once( get_stylesheet_directory() . '/inc/login-logo.php' );
	include_once( get_stylesheet_directory() . '/inc/block-area.php' );
	include_once( get_stylesheet_directory() . '/inc/social-links.php' );

	// Plugin Support
	include_once( get_stylesheet_directory() . '/inc/acf.php' );
	include_once( get_stylesheet_directory() . '/inc/amp.php' );
	include_once( get_stylesheet_directory() . '/inc/shared-counts.php' );
	include_once( get_stylesheet_directory() . '/inc/wpforms.php' );

	// Could be in a Core plugin
	include_once get_stylesheet_directory() . '/inc/case-study.php';
	include_once get_stylesheet_directory() . '/inc/display-posts.php';

	// Editor Styles
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );

	add_theme_support( 'genesis-archive-layouts' );
	add_theme_support( 'genesis-lazy-load-images' );

	// Image Sizes
	// add_image_size( 'ea_featured', 400, 100, true );

	// Gutenberg

	// -- Responsive embeds
	add_theme_support( 'responsive-embeds' );

	// -- Wide Images
	add_theme_support( 'align-wide' );

	// -- Disable custom font sizes
	// add_theme_support( 'disable-custom-font-sizes' );

	// -- Editor Font Styles
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'ea_genesis_child' ),
				'shortName' => __( 'S', 'ea_genesis_child' ),
				'size'      => 16,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'ea_genesis_child' ),
				'shortName' => __( 'M', 'ea_genesis_child' ),
				'size'      => 20,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'ea_genesis_child' ),
				'shortName' => __( 'L', 'ea_genesis_child' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Large2', 'ea_genesis_child' ),
				'shortName' => __( 'L2', 'ea_genesis_child' ),
				'size'      => 25,
				'slug'      => 'large2',
			),
		)
	);

	// -- Disable Custom Colors
	// add_theme_support( 'disable-custom-colors' );

	// -- Editor Color Palette
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'Blue', 'ea_genesis_child' ),
				'slug'  => 'blue',
				'color' => '#003974',
			),
			array(
				'name'  => __( 'Red', 'ea_genesis_child' ),
				'slug'  => 'red',
				'color' => '#ee2a7b',
			),
			array(
				'name'  => __( 'Red-2', 'ea_genesis_child' ),
				'slug'  => 'red-2',
				'color' => '#d22254',
			),
			array(
				'name'  => __( 'Cyan', 'ea_genesis_child' ),
				'slug'  => 'cyan',
				'color' => '#72cdc9',
			),
			array(
				'name'  => __( 'Black', 'ea_genesis_child' ),
				'slug'  => 'black',
				'color' => '#414042',
			),
			array(
				'name'  => __( 'White', 'ea_genesis_child' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
		)
	);

	// * Define some widgets

	genesis_register_sidebar(
		array(
			'id'          => 'top-bar-left',
			'name'        => 'Top Bar Left',
			'description' => 'Items for the left-side of the top bar',
		)
	);
	genesis_register_sidebar(
		array(
			'id'          => 'top-bar-right',
			'name'        => 'Top Bar Right',
			'description' => 'Items for the right-side of the top bar',
		)
	);

	genesis_register_sidebar(
		array(
			'id'          => 'header-cta',
			'name'        => 'Header CTA',
			'description' => 'This will appear to the right of the menu',
		)
	);

}



add_action( 'genesis_setup', 'ea_child_theme_setup', 15 );

/**
 * Change the comment area text
 *
 * @since  1.0.0
 * @param  array $args
 * @return array
 */
function ea_comment_text( $args ) {
	$args['title_reply']          = __( 'Leave A Reply', 'ea_genesis_child' );
	$args['label_submit']         = __( 'Post Comment',  'ea_genesis_child' );
	$args['comment_notes_before'] = '';
	$args['comment_notes_after']  = '';
	return $args;
}
add_filter( 'comment_form_defaults', 'ea_comment_text' );


/**
 * Template Hierarchy
 */
function ea_template_hierarchy( $template ) {
	if ( is_home() ) {
		$template = get_query_template( 'archive' );
	}
	return $template;
}
add_filter( 'template_include', 'ea_template_hierarchy' );

