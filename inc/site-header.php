<?php

add_action( 'genesis_before_header', 'ea_add_page_border' );
function ea_add_page_border() {
	echo '<div class="ea-page-border">';

	add_action( 'genesis_after_footer', function() { echo '</div>';}, 99 );
}

add_action( 'genesis_header', 'ea_do_top_bar', 3 );


function ea_do_top_bar() {
	if ( is_active_sidebar( 'top-bar-left' ) || is_active_sidebar( 'top-bar-right' ) ) {
		?>
	<div class="ea-top-bar">
		<div class="wrap">
			<div class="ea-top-bar__left">
				<?php dynamic_sidebar( 'top-bar-left' ); ?>
			</div>
			<div class="ea-top-bar__right">
				<?php dynamic_sidebar( 'top-bar-right' ); ?>
			</div>
		</div>
	</div>
		<?php
	}
}

add_action( 'genesis_header', 'ea_do_header_cta', 13 );

function ea_do_header_cta() {

	if ( is_active_sidebar( 'header-cta' ) ) {

		dynamic_sidebar( 'header-cta' );
	}

}
