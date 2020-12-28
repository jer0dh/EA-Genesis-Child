<?php
/**
 * Case-study.php.
 *
 * @package      EAGenesisChild
 * @author       Jerod Hammerstein
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

echo '<article class="case-study case-study--card">';
	echo '<header><h2>' . get_the_title() . '</h2></header>';

	echo '<main><div class="case-study__excerpt">';
	echo get_the_excerpt();
	echo '</div>';

	$result = get_field( 'result' );

	echo '<hr />';

if ( $result ) {
	echo '<h3>' . esc_html__( 'The Result?', 'ea_genesis_child' ) . '</h3>';
	echo '<div class="case-study__result">';
	echo '<div>' . wp_kses_post( $result ) . '</div>';
	echo '</div>';
}
	echo '</main>';

	echo '<a href="' . esc_url( get_the_permalink() ) . '" class="button is-style-button-small">' . esc_html__( 'Read More', 'ea_genesis_child' ) . '</a>';

echo '</article>';
