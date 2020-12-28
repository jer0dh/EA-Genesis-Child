<?php
/**
 * Site Footer
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_before_footer', 'ea_footer_widget_areas' );

/**
 * Tests if the footer widgets should be hidden, otherwise show them.
 */
function ea_footer_widget_areas() {
	if ( class_exists( 'ACF' ) && get_field( 'hide_footer' ) ) {
		return;
	}
	add_action( 'genesis_before_footer', 'genesis_footer_widget_areas', 11 );
}

/**
 * Footer copyright plus ACF fields in Theme Settings.
 */
function ea_site_footer() {

	$before_year = get_field( 'footer_before', 'options', false );
	$after_year  = get_field( 'footer_after', 'options', false );

	echo '<div class="footer-left">';

	if ( $before_year || $after_year ) {
		echo '<p class="footer-copyright">' . wp_kses_post( $before_year ) . date( 'Y' ) . wp_kses_post( $after_year ) . '</p>';
	} else {

		echo '<p class="copyright">Copyright &copy; ' . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) . '®. All Rights Reserved.</p>';
		echo '<p class="footer-links"><a href="' . home_url( 'privacy-policy' ) . '">Privacy Policy</a> <a href="' . home_url( 'terms' ) . '">Terms</a></p>';

	}
	echo '</div>';
	echo '<a class="backtotop" href="#main-content">Back to top' . ea_icon( array( 'icon' => 'arrow-up' ) ) . '</a>';
}


add_action( 'genesis_footer', 'ea_site_footer' );
remove_action( 'genesis_footer', 'genesis_do_footer' );
