<?php
/**
 * EA Genesis Child.
 *
 * @package      EAGenesisChild
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

// Theme Supports
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery' ) );
add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'genesis-footer-widgets', 3 );
add_theme_support( 'genesis-structural-wraps', array( 'header', 'menu-primary', 'menu-secondary', 'site-inner', 'footer-widgets', 'footer' ) );
add_theme_support( 'genesis-menus', array( 'primary' => 'Primary Navigation Menu', 'secondary' => 'Secondary Navigation Menu' ) );
add_theme_support( 'genesis-inpost-layouts' );
add_theme_support( 'genesis-archive-layouts' );


// Remove Edit link
add_filter( 'genesis_edit_post_link', '__return_false' );

// Remove Genesis Favicon (use site icon instead)
remove_action( 'wp_head', 'genesis_load_favicon' );

// Remove Header Description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

// Remove unused page layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

// Remove unused sidebars
unregister_sidebar( 'sidebar-alt' );

// Remove header-right widget area if genesis-header-nav plugin is active
if( class_exists( '\\Gamajo\\GenesisHeaderNav\\Plugin' ) )
	unregister_sidebar( 'header-right' );
	
// Add New Sidebars
// genesis_register_widget_area( array( 'id' => 'blog-sidebar', 'name' => 'Blog Sidebar' ) );

/**
 * Remove Genesis Templates
 *
 */
function ea_remove_genesis_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'ea_remove_genesis_templates' );

/**
 * Remove Breadcrumb Arguments
 *
 * @since 1.0.0
 * @param array $args
 * @return array
 */
function ea_breadcrumb_args( $args ) {

	// Remove labels
	foreach( $args['labels'] as $key => &$label )
		$label = '';
		
	return $args;
}
add_filter( 'genesis_breadcrumb_args', 'ea_breadcrumb_args', 5 );

/**
 * Wrap last breadcrumb in a span for styling
 * @author Gary Jones
 *
 * @param array $crumbs, existing HTML markup for breadcrumbs
 * @param array $args, breadcrumb arguments
 * @return array $crumbs, amended breadcrumbs
 */
function ea_wrap_last_breadcrumb( $crumbs, $args ) {
	// Don't run on home or front page
	if( is_home() || is_front_page() )
		return $crumbs;
	// Ensure duplicate and empty crumb entries are handled.
	$crumbs = array_filter( array_unique( $crumbs ) );
	$last_crumb_index = count( $crumbs ) - 1;
	// Some "crumbs" actually contain multiple separated crumbs (i.e. sub-pages)
	// so make sure we're really only getting the last separated crumb
	$crumb_parts = explode( $args['sep'], $crumbs[ $last_crumb_index ] );
	if ( count( $crumb_parts ) > 1 ) {
		$last_crumb_part_index = count( $crumb_parts ) - 1;
		$crumb_parts[ $last_crumb_part_index ] = '<span class="last-breadcrumb">' . $crumb_parts[ $last_crumb_part_index ] . '</span>';
		$crumbs[ $last_crumb_index ] = join( $args['sep'], $crumb_parts );
	} else {
		$crumbs[ $last_crumb_index ] = '<span class="last-breadcrumb">' . $crumbs[ $last_crumb_index ] . '</span>';
	}
	return $crumbs;
}
add_filter( 'genesis_build_crumbs', 'ea_wrap_last_breadcrumb', 10, 2 );

/**
 * Removes Unused Genesis user settings
 *
 * @since 1.0.0
 */
function ea_remove_user_profile_fields() {
//	remove_action( 'show_user_profile', 'genesis_user_options_fields' );
//	remove_action( 'edit_user_profile', 'genesis_user_options_fields' );
	remove_action( 'show_user_profile', 'genesis_user_archive_fields' );
	remove_action( 'edit_user_profile', 'genesis_user_archive_fields' );
	remove_action( 'show_user_profile', 'genesis_user_seo_fields'     );
	remove_action( 'edit_user_profile', 'genesis_user_seo_fields'     );
	remove_action( 'show_user_profile', 'genesis_user_layout_fields'  );
	remove_action( 'edit_user_profile', 'genesis_user_layout_fields'  );
}
add_action( 'admin_init', 'ea_remove_user_profile_fields' );

remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
/**
 * Re-prioritise Genesis SEO metabox from high to default.
 *
 * Copied and amended from /lib/admin/inpost-metaboxes.php, version 2.0.0.
 *
 * @since 1.0.0
 */
function ea_add_inpost_seo_box() {

	if ( genesis_detect_seo_plugins() )
		return;

	foreach ( (array) get_post_types( array( 'public' => true ) ) as $type ) {
		if ( post_type_supports( $type, 'genesis-seo' ) )
			add_meta_box( 'genesis_inpost_seo_box', __( 'Theme SEO Settings', 'genesis' ), 'genesis_inpost_seo_box', $type, 'normal', 'default' );
	}

}
add_action( 'admin_menu', 'ea_add_inpost_seo_box' );

remove_action( 'admin_menu', 'genesis_add_inpost_layout_box' );
/**
 * Re-prioritise layout metabox from high to default.
 *
 * Copied and amended from /lib/admin/inpost-metaboxes.php, version 2.0.0.
 *
 * @since 1.0.0
 */
function ea_add_inpost_layout_box() {

	if ( ! current_theme_supports( 'genesis-inpost-layouts' ) )
		return;

	foreach ( (array) get_post_types( array( 'public' => true ) ) as $type ) {
		if ( post_type_supports( $type, 'genesis-layouts' ) )
			add_meta_box( 'genesis_inpost_layout_box', __( 'Layout Settings', 'genesis' ), 'genesis_inpost_layout_box', $type, 'normal', 'default' );
	}

}
add_action( 'admin_menu', 'ea_add_inpost_layout_box' );

/**
 * Remove Genesis widgets.
 *
 * @since 1.0.0
 */
function ea_remove_genesis_widgets() {
    unregister_widget( 'Genesis_Featured_Page' );
    unregister_widget( 'Genesis_Featured_Post' );
    unregister_widget( 'Genesis_User_Profile_Widget' );
}
add_action( 'widgets_init', 'ea_remove_genesis_widgets', 20 );

/**
 * Remove Genesis theme settings metaboxes.
 *
 * @since 1.0.0
 * @param string $_genesis_theme_settings_pagehook
 */
function ea_remove_genesis_metaboxes( $_genesis_theme_settings_pagehook ) {
	//remove_meta_box( 'genesis-theme-settings-feeds',      $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-header',     $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav',        $_genesis_theme_settings_pagehook, 'main' );
	//remove_meta_box( 'genesis-theme-settings-breadcrumb', $_genesis_theme_settings_pagehook, 'main' );
	//remove_meta_box( 'genesis-theme-settings-comments',   $_genesis_theme_settings_pagehook, 'main' );
	//remove_meta_box( 'genesis-theme-settings-posts',      $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-blogpage',   $_genesis_theme_settings_pagehook, 'main' );
	//remove_meta_box( 'genesis-theme-settings-layout', $_genesis_theme_settings_pagehook, 'main' );
	//remove_meta_box( 'genesis-theme-settings-scripts',    $_genesis_theme_settings_pagehook, 'main' );
}
add_action( 'genesis_theme_settings_metaboxes', 'ea_remove_genesis_metaboxes' );

/**
 * Remove Genesis Customizer Settings
 *
 * @since  1.0.0
 * @param object $wp_customize
 */
function ea_remove_genesis_customizer( $wp_customize ) {
    $wp_customize->remove_section( 'static_front_page'    );
    $wp_customize->remove_section( 'title_tagline'        );
    $wp_customize->remove_section( 'nav'                  );
    $wp_customize->remove_section( 'genesis_layout'       );
    $wp_customize->remove_section( 'genesis_comments'     );
    $wp_customize->remove_section( 'genesis_breadcrumbs'  );
    $wp_customize->remove_section( 'genesis_archives'     );
    $wp_customize->remove_section( 'genesis_color_scheme' );
}
//add_action( 'customize_register', 'ea_remove_genesis_customizer', 30 );

/**
 * Default Titles for Term Archives
 *
 * @author Bill Erickson
 * @url http://www.billerickson.net/default-category-and-tag-titles
 *
 * @param string $headline
 * @param object $term
 * @return string $headline
 */
function ea_default_term_title( $headline, $term ) {
	if( ( is_category() || is_tag() || is_tax() ) && empty( $headline ) )
		$headline = $term->name;
		
	return $headline;
}
add_filter( 'genesis_term_meta_headline', 'ea_default_term_title', 10, 2 );

/**
 * Excerpt More
 *
 */
function ea_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'ea_excerpt_more' );

/**
 * Echo the post image on archive pages.
 * Same as genesis_do_post_image(), except we've added a class of .entry-image-link
 *
 */
function ea_do_post_image() {

	if ( ! is_singular() && genesis_get_option( 'content_archive_thumbnail' ) ) {
		$img = genesis_get_image( array(
			'format'  => 'html',
			'size'    => genesis_get_option( 'image_size' ),
			'context' => 'archive',
			'attr'    => genesis_parse_attr( 'entry-image', array ( 'alt' => get_the_title() ) ),
		) );

		if ( ! empty( $img ) )
			printf( '<a href="%s" class="entry-image-link" aria-hidden="true">%s</a>', get_permalink(), $img );
	}

}
add_action( 'genesis_entry_content', 'ea_do_post_image', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
