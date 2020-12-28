<?php
/**
 * Social-media.php
 *
 * @package      EAGenesisChild
 * @author       Jerod Hammerstein
 * @since        0.0.797
 * @license      GPL-2.0+
 **/

// Social icons.

if ( class_exists( 'acf' ) ) {

	add_shortcode( 'social_media', 'ea_social_media' );

	/**
	 * Cleans up and adds default settings to social icon list.
	 *
	 * @param array $atts  Shortcode attributes from user.
	 * @return string
	 */
	function ea_social_media( $atts ) {

		$atts = shortcode_atts(
			array(
				'class'    => '',
				'wrap'     => true,
				'li_class' => '',
				'group'    => 'light',
				'size'     => 32,

			),
			$atts
		);

		return ea_get_social_media( $atts );

	}

	/**
	 * Returns an unordered list of social media icons that are from the Theme Settings
	 *
	 * @param string $atts  Defaults to use in the markup.
	 *
	 * @return string
	 */
	function ea_get_social_media( $atts = array() ) {

		$atts = shortcode_atts(
			array(
				'class'    => '',
				'wrap'     => true,
				'li_class' => '',
				'group'    => 'light',
				'size'     => '100%',

			),
			$atts
		);

		$return = '';
		if ( have_rows( 'social_media', 'options' ) ) {
			if ( $atts['wrap'] ) {
				$return .= '<ul class="ea-social-media ' . esc_attr( $atts['class'] ) . '">';
			}
			while ( have_rows( 'social_media', 'options' ) ) {
				the_row();
				$image = get_sub_field( 'logo' );
				$name  = get_sub_field( 'name' );
				$url   = get_sub_field( 'url' );

				if ( $image ) {
					$icon_html = wp_get_attachment_image( $image['ID'], 'thumbnail', true, array( 'alt' => $name ) );
				} else {
					$icon_html = $name;
				}
				$return .= '<li class="' . $atts['li_class'] . '">';
				$return .= '<a target="_blank" href="' . esc_url( $url ) . '">';
				$return .= $icon_html;
				$return .= '</a></li>';
			}

			if ( $atts['wrap'] ) {
				$return .= '</ul>';
			}
		}

		return $return;
	}
}

// contact icons.

if ( class_exists( 'acf' ) ) {

	add_shortcode( 'contact_icons', 'ea_contact_icons' );

	/**
	 * Cleans up and adds default settings to social icon list.
	 *
	 * @param array $atts  Shortcode attributes from user.
	 * @return string
	 */
	function ea_contact_icons( $atts ) {

		$atts = shortcode_atts(
			array(
				'class'    => '',
				'wrap'     => true,
				'li_class' => '',
				'group'    => 'light',
				'size'     => 32,

			),
			$atts
		);

		return ea_get_contact_icons( $atts );

	}

	/**
	 * Returns an unordered list of social media icons that are from the Theme Settings
	 *
	 * @param string $atts  Defaults to use in the markup.
	 *
	 * @return string
	 */
	function ea_get_contact_icons( $atts = array() ) {

		$atts = shortcode_atts(
			array(
				'class'    => '',
				'wrap'     => true,
				'li_class' => '',
				'group'    => 'light',
				'size'     => '100%',

			),
			$atts
		);

		$return = '';
		if ( have_rows( 'contact_icons', 'options' ) ) {
			if ( $atts['wrap'] ) {
				$return .= '<ul class="ea-contact-icons ' . esc_attr( $atts['class'] ) . '">';
			}
			while ( have_rows( 'contact_icons', 'options' ) ) {
				the_row();
				$image = get_sub_field( 'logo' );
				$name  = get_sub_field( 'name' );
				$url   = get_sub_field( 'url' );

				if ( $image ) {
					$icon_html = wp_get_attachment_image( $image['ID'], 'thumbnail', true, array( 'alt' => $name ) );
				} else {
					$icon_html = $name;
				}
				$return .= '<li class="' . $atts['li_class'] . '">';
				$return .= '<a target="_blank" href="' . esc_url( $url ) . '">';
				$return .= $icon_html;
				$return .= '<span class="ea-contact-icons__name">' . wp_kses_post( $name ) . '</span></a></li>';
			}

			if ( $atts['wrap'] ) {
				$return .= '</ul>';
			}
		}

		return $return;
	}
}

