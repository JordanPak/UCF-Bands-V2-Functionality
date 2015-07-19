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
		'supports'            => array( 'title', 'revisions', /*'page-attributes',*/ ),
		'taxonomies'          => array( /*'category'*/ ), // Taxonomy field instead!!
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 9,
		'menu_icon'           => 'dashicons-list-view',
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



/**
 * UCFBands CPT: Rehearsal CMB
 * Register Rehearsal CMB
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_reahearsal_metabox() {
	$prefix = '_ucfbands_rehearsal_';

    // Initialize
    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Staff Member Details', 'cmb' ),
        'object_types'  => array( 'ucfbands_staff' ),
        'context'       => 'normal',
        'priority'      => 'core',
    ) );
    
    // Is Faculty
    $cmb->add_field( array(
        'name' => 'Faculty',
        'desc' => 'Staff Member is UCF Faculty. Faculty members are listed before non-faculty members in listings.',
        'id'   => $prefix . 'is_faculty',
        'type' => 'checkbox'
    ) );
    
    // Position
    $cmb->add_field( array(
        'name'    => 'Position',
        'desc'    => 'Ex: "Director of Bands"',
        'id'      => $prefix . 'position',
        'type'    => 'text'
    ) );
    
    // Email Address
    $cmb->add_field( array(
        'name' => 'Email Address',
        'desc' => '@ucf.edu preferred.',
        'id'   => 'email',
        'type' => 'text_email',
    ) );    
    
    // Phone Number
    $cmb->add_field( array(
        'name'    => 'Phone Number',
        'desc'    => 'Format: (407) 823-XXXX. UCF Number Preferred',
        'id'      => $prefix . 'phone',
        'type'    => 'text'
    ) );
    
    // Biography
    $cmb->add_field( array(
    'name'    => 'Biography',
    'id'      => 'biography',
    'type'    => 'wysiwyg',
    'options' => array(
        'media_buttons' => false,
    ),
    ) );
    
}
add_action( 'cmb2_init', 'ucfbands_rehearsal_metabox' );
