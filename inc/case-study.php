<?php
/**
 * Case-study.php Adds CPT and shortcode
 *
 * @package      EAGenesisChild
 * @author       Jerod Hammerstein
 * @since        1.0.0
 * @license      GPL-2.0+
 **/

/**
 * Adds Case Study Custom Post Type
 */
function ea_add_cpt_case_studies() {

	$labels  = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'ea_genesis_child' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'ea_genesis_child' ),
		'menu_name'             => __( 'Case Studies', 'ea_genesis_child' ),
		'name_admin_bar'        => __( 'Case Study', 'ea_genesis_child' ),
		'archives'              => __( 'Case Study Archives', 'ea_genesis_child' ),
		'attributes'            => __( 'Case Study Attributes', 'ea_genesis_child' ),
		'parent_item_colon'     => __( 'Parent Case Study:', 'ea_genesis_child' ),
		'all_items'             => __( 'All Case Studies', 'ea_genesis_child' ),
		'add_new_item'          => __( 'Add New Case Study', 'ea_genesis_child' ),
		'add_new'               => __( 'Add New', 'ea_genesis_child' ),
		'new_item'              => __( 'New Case Study', 'ea_genesis_child' ),
		'edit_item'             => __( 'Edit Case Study', 'ea_genesis_child' ),
		'update_item'           => __( 'Update Case Study', 'ea_genesis_child' ),
		'view_item'             => __( 'View Case Study', 'ea_genesis_child' ),
		'view_items'            => __( 'View Case Studies', 'ea_genesis_child' ),
		'search_items'          => __( 'Search Case Study', 'ea_genesis_child' ),
		'not_found'             => __( 'Not found', 'ea_genesis_child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ea_genesis_child' ),
		'featured_image'        => __( 'Featured Image', 'ea_genesis_child' ),
		'set_featured_image'    => __( 'Set featured image', 'ea_genesis_child' ),
		'remove_featured_image' => __( 'Remove featured image', 'ea_genesis_child' ),
		'use_featured_image'    => __( 'Use as featured image', 'ea_genesis_child' ),
		'insert_into_item'      => __( 'Insert into item', 'ea_genesis_child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ea_genesis_child' ),
		'items_list'            => __( 'Case Studies list', 'ea_genesis_child' ),
		'items_list_navigation' => __( 'Case Studies list navigation', 'ea_genesis_child' ),
		'filter_items_list'     => __( 'Filter case studies list', 'ea_genesis_child' ),
	);
	$rewrite = array(
		'slug'         => 'case-studies',
		'with_front'   => true,
		'hierarchical' => true,
	);
	$args    = array(
		'label'               => __( 'Case Study', 'ea_genesis_child' ),
		'description'         => __( 'Case Studies for White Hat Ops', 'ea_genesis_child' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_in_rest'        => true,  // For Gutenberg to work with cpt.
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'             => $rewrite,
	);
	register_post_type( 'ea-case-study', $args );

}

ea_add_cpt_case_studies();



add_shortcode( 'featured-case-study-from-meta', 'ea_featured_case_study_from_meta' );

/**
 * Shortcode to add svg icons stored in theme files.
 *
 * @param array $atts  Shortcode attributes from user.
 * @return string
 */
function ea_featured_case_study_from_meta( $atts = array() ) {

	$atts = shortcode_atts(
		array(),
		$atts
	);

	$case_study = get_field( 'featured_case_study' );

	if ( $case_study ) {

		$ea_query = new WP_Query(
			array(
				'post_type' => 'ea-case-study',
				'p'         => $case_study,
			)
		);

		if ( $ea_query->have_posts() ) {
			ob_start();
			while ( $ea_query->have_posts() ) {
				$ea_query->the_post();
				get_template_part( 'partials/case-study' );
			}
			wp_reset_postdata();
			return ob_get_clean();

		}
	}

}
