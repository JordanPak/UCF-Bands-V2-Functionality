<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Announcement
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Announcement
 * Register CPT
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_cpt_announcement() {
    
	$labels = array(
		'name'                => _x( 'Announcements', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Announcement', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Announcements', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Announcements', 'text_domain' ),
		'view_item'           => __( 'View Announcement', 'text_domain' ),
		'add_new_item'        => __( 'Add New Announcement', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Announcement', 'text_domain' ),
		'update_item'         => __( 'Update Announcemen', 'text_domain' ),
		'search_items'        => __( 'Search Announcements', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'announcements',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'ucfbands_announcement', 'text_domain' ),
		'description'         => __( 'Announcement that can be placed on the home page and optional other pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions'),
		'taxonomies'          => array( 'category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => 'mkmc',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 1,
//		'menu_icon'           => 'dashicons-format-quote',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'announcement', $args );
    
}

// Hook into the 'init' action
add_action( 'init', 'ucfbands_cpt_announcement', 0 );
