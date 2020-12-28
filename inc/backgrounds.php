<?php
/**
 * Backgrounds
 *
 * @package      EAGenesisChild
 * @author       Jerod Hammerstein
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

if ( function_exists( 'acf_add_options_page' ) ) {

	add_action( 'wp_enqueue_scripts', 'ea_add_backgrounds', 15 );


	//if ( is_admin() ) {

        add_action( 'wp_ajax_dynamic_css', 'ea_dynamic_css' );
		add_action( 'wp_ajax_nopriv_dynamic_css', 'ea_dynamic_css' );
		add_editor_style( admin_url( 'admin-ajax.php' ) . '?action=dynamic_css' );


	//}
}

function ea_dynamic_css() {
	echo ea_add_backgrounds();
	// require( get_stylesheet_directory() . '/inc/backgrounds.css.php' );
	exit;
}

function ea_add_backgrounds() {

	$backgrounds = get_field( 'backgrounds', 'options' );

	$css = '';
	if ( $backgrounds ) {

		foreach ( $backgrounds as $background ) {
			$background_position = ( $background['background_position'] ) ? $background['background_position'] : 'center center';
			$css                .= '.' . $background['css_name'] . '{';
			$css                .= 'background-image: url( ' . $background['background_image']['url'] . ');';
			$css                .= 'background-position: ' . $background_position . ';';
			$css                .= 'background-size: cover; } ';
		}

		//$css = wp_kses_post( $css );
		wp_add_inline_style( 'ea-style', $css );
		return $css;
	}
}
