<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Schedule
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Schedule
 * Register CPT
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_cpt_schedule() {
	$labels = array(
		'name'                => _x( 'Schedules', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Schedule', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Schedules', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Schedules', 'text_domain' ),
		'view_item'           => __( 'View Schedule', 'text_domain' ),
		'add_new_item'        => __( 'Add New Schedule', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Schedule', 'text_domain' ),
		'update_item'         => __( 'Update Schedule', 'text_domain' ),
		'search_items'        => __( 'Search Schedules', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'ucfbands_schedule', 'text_domain' ),
		'description'         => __( 'Schedule that can be displayed independently with shortcode or applied to an event.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title' /*'revisions'*/, /*'page-attributes',*/ ),
		'taxonomies'          => array( 'band' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-list-view',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'ucfbands_schedule', $args );
}
// Hook into the 'init' action
add_action( 'init', 'ucfbands_cpt_schedule', 0 );
