<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Rehearsal
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Rehearsal
 * Register CPT
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_cpt_rehearsal() {
	$labels = array(
		'name'                => _x( 'Rehearsals', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Rehearsal', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Rehearsals', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Rehearsals', 'text_domain' ),
		'view_item'           => __( 'View Rehearsal', 'text_domain' ),
		'add_new_item'        => __( 'Add New Rehearsal', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Rehearsal', 'text_domain' ),
		'update_item'         => __( 'Update Rehearsal', 'text_domain' ),
		'search_items'        => __( 'Search Rehearsals', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'ucfbands_rehearsal', 'text_domain' ),
		'description'         => __( 'Rehearsal Schedule with Details', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( /*'title',*/ 'revisions', /*'page-attributes',*/ ),
		'taxonomies'          => array( /*'category'*/ ), // Taxonomy field instead!!
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 9,
		'menu_icon'           => 'dashicons-playlist-audio',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'ucfbands_rehearsal', $args );
}
// Hook into the 'init' action
add_action( 'init', 'ucfbands_cpt_rehearsal', 0 );
