<?php
/**
 * Banner.php add code to use featured image as banner on page.  Code for posts, using default image or acf background image for design.
 *
 * @package      EAGenesisChild
 * @author       Jerod Hammerstein
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

add_action( 'genesis_after_header', 'ea_add_banner_image' );


function ea_add_banner_image() {
	if ( is_singular( array( 'page' ) ) && class_exists( 'ACF' ) ) {

		$use_featured_image_as_banner = get_field( 'use_featured_image_as_banner' );

		if ( $use_featured_image_as_banner ) {
			$image_id = get_post_thumbnail_id();
			if ( $image_id ) {
				$url      = wp_get_attachment_image_url( $image_id, 'full' );
				$position = get_field( 'background_position' );
				$position = ( $position ) ? $position : 'center center';
				echo '<div class="hero-banner" style="background-image: url( ' . esc_url( $url ) . '); background-position:' . esc_attr( $position ) . '">';

				echo '</div>';
			}
		}
	}
}

add_action( 'genesis_after_header', 'ea_add_background_image', 11 );


function ea_add_background_image() {
	if ( is_singular( array( 'post', 'ea-case-study' ) ) && class_exists( 'ACF' ) ) {

		$default_design_image_for_posts = get_field( 'default_design_image_for_posts', 'options' );
		$design_image_for_post          = get_field( 'design_image_for_post' );

		$image_id = false;
		if ( $design_image_for_post ) {
			$image_id = $design_image_for_post['ID'];
		} elseif ( $default_design_image_for_posts ) {
			$image_id = $default_design_image_for_posts['ID'];
		}
		if ( $image_id ) {
			$url      = wp_get_attachment_image_url( $image_id, 'full' );
			echo '<div class="hero-design-image" style="background-image: url( ' . esc_url( $url ) . ');">';
			echo '</div>';
		}
	}

}
