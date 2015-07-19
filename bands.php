<?php
/*
 *  UCFBands Theme Functionality
 *  Taxonomy: Register Bands
 *    
 *  @author Jordan Pakrosnis
*/


if ( ! function_exists( 'bands' ) ) {

// Register Custom Taxonomy
function bands() {

	$labels = array(
		'name'                       => _x( 'Bands', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Band', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Bands', 'text_domain' ),
		'all_items'                  => __( 'All Bands', 'text_domain' ),
		'parent_item'                => __( 'Parent Band', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Band:', 'text_domain' ),
		'new_item_name'              => __( 'The Band Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Band', 'text_domain' ),
		'edit_item'                  => __( 'Edit Band', 'text_domain' ),
		'update_item'                => __( 'Update Band', 'text_domain' ),
		'view_item'                  => __( 'View Band', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate bands with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove bands', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Bands', 'text_domain' ),
		'search_items'               => __( 'Search Bands', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'band', array( 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'bands', 0 );

}