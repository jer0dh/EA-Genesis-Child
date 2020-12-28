<?php
/**
 * Single Post
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

// Entry category in header
// add_action( 'genesis_entry_header', 'ea_entry_category', 8 );
// add_action( 'genesis_entry_header', 'ea_entry_author', 12 );

add_action( 'genesis_entry_header', 'ea_entry_header_share', 13 );

add_filter( 'genesis_post_info', 'ea_get_archive_post_info' );

add_filter( 'body_class', 'ea_add_narrow_class' );
/**
 * Entry header share
 */
function ea_entry_header_share() {
	do_action( 'ea_entry_header_share' );
}

/**
 * After Entry
 */
function ea_single_after_entry() {
	echo '<div class="after-entry">';

	// Breadcrumbs
	genesis_do_breadcrumbs();

	// Publish date
//	echo '<p class="publish-date">Published on ' . get_the_date( 'F j, Y' ) . '</p>';

	// Sharing
	do_action( 'ea_entry_footer_share' );

	// Author Box
//	genesis_do_author_box_single();
}
add_action( 'genesis_after_entry', 'ea_single_after_entry', 8 );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );


add_action( 'genesis_entry_header', 'ea_author_gravatar', 9 );
function ea_author_gravatar() {

	$entry_author = get_avatar( get_the_author_meta( 'email' ), 100 );
	$author_link  = get_author_posts_url( get_the_author_meta( 'ID' ) );
	printf( '<div class="author-avatar"><a href="%s">%s</a></div>', $author_link, $entry_author );

}

genesis();
