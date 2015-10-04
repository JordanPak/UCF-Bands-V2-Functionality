<?php

/*
 *  UCFBands Theme Functionality
 *  CPT: Location
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Location
 * Register CPT
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_cpt_location() {
	$labels = array(
		'name'                => _x( 'Locations', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Locations', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Locations', 'text_domain' ),
		'view_item'           => __( 'View Location', 'text_domain' ),
		'add_new_item'        => __( 'Add New Location', 'text_domain' ),
		'add_new'             => __( 'Add Location', 'text_domain' ),
		'edit_item'           => __( 'Edit Location', 'text_domain' ),
		'update_item'         => __( 'Update Location', 'text_domain' ),
		'search_items'        => __( 'Search Locations', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'locations',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'ucfbands_location', 'text_domain' ),
		'description'         => __( 'UCF Bands Event Locations', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-location-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'ucfbands_location', $args );
}

// Hook into the 'init' action
add_action( 'init', 'ucfbands_cpt_location', 0 );
