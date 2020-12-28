<?php
/**
 * Block-patterns.
 *
 * @package      jh-genesis-child
 * @author       Jerod Hammerstein
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

register_block_pattern(
	'EAGenesisChild/ea-page-title',
	array(
		'title'       => __( 'Page Title', 'ea_genesis_child' ),
		'description' => _x( 'Page Title, Subtitle, separator', 'Block pattern description', 'ea_genesis_child' ),
		'content'     => '<!-- wp:heading {"level":1,"className":"is-style-default"} -->
<h1 class="is-style-default">Page Title</h1>
<!-- /wp:heading -->

<!-- wp:heading {"className":"is-style-h2"} -->
<h2 class="is-style-h2">Subtitle</h2>
<!-- /wp:heading -->

<!-- wp:separator {"className":"is-style-page-title"} -->
<hr class="wp-block-separator is-style-page-title"/>
<!-- /wp:separator -->',
	)
);


register_block_pattern(
	'EAGenesisChild/ea-grid',
	array(
		'title'       => __( 'ea-Grid', 'ea_genesis_child' ),
		'description' => _x( 'WHO grid', 'Block pattern description', 'ea_genesis_child' ),
		'content'     => '<!-- wp:group {"className":"ea-grid"} -->
<div class="wp-block-group ea-grid"><div class="wp-block-group__inner-container"><!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"id":101,"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/gear-search.png" alt="Gear Search" class="wp-image-101"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"className":"is-style-h2-medium"} -->
<h2 class="is-style-h2-medium">Search Engine Optimization</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our experience helps guide your marketing strategy to build usefulness on the web, not just ranking. Technical SEO creates an efficient relationship between your website and search engines for sustainable results.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline-small"} -->
<div class="wp-block-button is-style-outline-small"><a class="wp-block-button__link">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"id":101,"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/gear-search.png" alt="Gear Search" class="wp-image-101"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"className":"is-style-h2-medium"} -->
<h2 class="is-style-h2-medium">Pay Per Click Management</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our experience helps guide your marketing strategy to build usefulness on the web, not just ranking. Technical SEO creates an efficient relationship between your website and search engines for sustainable results.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline-small"} -->
<div class="wp-block-button is-style-outline-small"><a class="wp-block-button__link">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"id":101,"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/gear-search.png" alt="Gear Search" class="wp-image-101"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"className":"is-style-h2-medium"} -->
<h2 class="is-style-h2-medium">Social Media Marketing</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our experience helps guide your marketing strategy to build usefulness on the web, not just ranking. Technical SEO creates an efficient relationship between your website and search engines for sustainable results.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline-small"} -->
<div class="wp-block-button is-style-outline-small"><a class="wp-block-button__link">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"id":101,"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/gear-search.png" alt="Gear Search" class="wp-image-101"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"className":"is-style-h2-medium"} -->
<h2 class="is-style-h2-medium">Local Search</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our experience helps guide your marketing strategy to build usefulness on the web, not just ranking. Technical SEO creates an efficient relationship between your website and search engines for sustainable results.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline-small"} -->
<div class="wp-block-button is-style-outline-small"><a class="wp-block-button__link">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:group -->

<!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"id":101,"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/gear-search.png" alt="Gear Search" class="wp-image-101"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"className":"is-style-h2-medium"} -->
<h2 class="is-style-h2-medium">Analytics Strategy</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our experience helps guide your marketing strategy to build usefulness on the web, not just ranking. Technical SEO creates an efficient relationship between your website and search engines for sustainable results.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline-small"} -->
<div class="wp-block-button is-style-outline-small"><a class="wp-block-button__link">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:group -->',
	)
);

register_block_pattern(
	'EAGenesisChild/ea-cta1',
	array(
		'title'       => __( 'ea-CTA1', 'ea_genesis_child' ),
		'description' => _x( 'WHO CTA1', 'Block pattern description', 'ea_genesis_child' ),
		'content'     =>'<!-- wp:cover {"url":"https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/red_texture.jpg","id":138,"dimRatio":0,"overlayColor":"white","minHeight":150,"align":"full"} -->
<div class="wp-block-cover alignfull has-white-background-color" style="background-image:url(https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/red_texture.jpg);min-height:150px"><div class="wp-block-cover__inner-container"><!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns {"verticalAlignment":null} -->
<div class="wp-block-columns"><!-- wp:column {"width":66.66} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
<h2>What Can We Do For You</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Really, we\'d love to chat. Don\'t by shy.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":33.33} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:buttons {"align":"center"} -->
<div class="wp-block-buttons aligncenter"><!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color">Contact Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
	)
);


register_block_pattern(
	'EAGenesisChild/ea-features-block',
	array(
		'title'       => __( 'ea-Features Block', 'ea_genesis_child' ),
		'description' => _x( 'WHO Features Block', 'Block pattern description', 'ea_genesis_child' ),
		'content'     =>'<!-- wp:media-text {"align":"","mediaId":101,"mediaLink":"https://staging5.who.jhtechservices.com/blocks-styles/gear-search/","mediaType":"image","verticalAlignment":"center","imageFill":false,"className":"pl-3 pr-3"} -->
<div class="wp-block-media-text is-stacked-on-mobile is-vertically-aligned-center pl-3 pr-3"><figure class="wp-block-media-text__media"><img src="https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/gear-search.png" alt="" class="wp-image-101"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"className":"is-style-h3"} -->
<h2 class="is-style-h3">Search Engine Optimization</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Navigating changes in Google search algorithms, we leap to the top of search results with hard work and no shortcuts. We focus on keeping you in front of customers to build your business or association.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text -->',
	)
);

register_block_pattern(
	'EAGenesisChild/ea-team-block',
	array(
		'title'       => __( 'WHO Team Block', 'ea_genesis_child' ),
		'description' => _x( 'WHO Team Block', 'Block pattern description', 'ea_genesis_child' ),
		'content'     => '<!-- wp:media-text {"align":"","mediaId":202,"mediaLink":"https://staging5.who.jhtechservices.com/blocks-styles/300x385-1/","mediaType":"image","verticalAlignment":"center","className":"ea-team media-30 mb-3 mt-3"} -->
<div class="wp-block-media-text is-stacked-on-mobile is-vertically-aligned-center ea-team media-30 mb-3 mt-3"><figure class="wp-block-media-text__media"><img src="https://staging5.who.jhtechservices.com/wp-content/uploads/2020/08/300x385-1.png" alt="" class="wp-image-202"/></figure><div class="wp-block-media-text__content"><!-- wp:heading -->
<h2>Jane Doe</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"ea-job-title"} -->
<p class="ea-job-title">Job Title</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a condimentum neque. Nunc dapibus id magna at rhoncus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus condimentum sit amet ligula ac auctor. Duis sapien lacus, pellentesque a lorem sit amet, finibus imperdiet eros. Donec fringilla sed justo vel varius. Fusce non erat ut sapien lobortis maximus. Phasellus at neque sed orci porttitor fermentum. Phasellus non quam dictum tortor congue maximus at quis mi. Quisque sed metus vel ante sollicitudin laoreet pretium dui eu enim vehicula aliquet purus vitae felis lacinia maximus.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a condimentum neque. Nunc dapibus id magna at rhoncus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus condimentum sit amet ligula ac auctor. Duis sapien lacus, pellentesque a lorem sit amet, finibus imperdiet eros. Donec fringilla sed justo vel varius. Fusce non erat ut sapien lobortis maximus. Phasellus at neque sed orci porttitor fermentum. Phasellus non quam dictum tortor congue maximus at quis mi. Quisque sed metus vel ante sollicitudin laoreet pretium dui eu enim vehicula aliquet purus vitae felis lacinia maximus.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:media-text -->',
	)
);


register_block_pattern(
	'EAGenesisChild/ea-pullquote-title-block',
	array(
		'title'       => __( 'WHO Pullquote Title Block', 'ea_genesis_child' ),
		'description' => _x( 'WHO Pullquote Title Block', 'Block pattern description', 'ea_genesis_child' ),
		'content'     => '<!-- wp:group -->
<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns {"verticalAlignment":"center","className":"gap-large reverse-order"} -->
<div class="wp-block-columns are-vertically-aligned-center gap-large reverse-order"><!-- wp:column {"verticalAlignment":"center","width":37} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:37%"><!-- wp:paragraph {"className":"pullquote","textColor":"blue"} -->
<p class="pullquote has-blue-color has-text-color"><em>Duis molestie interdum sapien, et molestie urna condimentum vel lorem ipsum dolor set amet. Nam ut risus nibh. Curabitur egestas ligula vel elit varius.</em></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":1} -->
<h1>Our Team</h1>
<!-- /wp:heading -->

<!-- wp:heading {"className":"is-style-h2"} -->
<h2 class="is-style-h2">SUBTITLE IF NEEDED GOES HERE</h2>
<!-- /wp:heading -->

<!-- wp:separator {"className":"is-style-page-title"} -->
<hr class="wp-block-separator is-style-page-title"/>
<!-- /wp:separator -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&nbsp;</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:group -->',
	)
);