<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Event
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Event
 * Register CPT
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_cpt_event() {
	$labels = array(
		'name'                => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Events', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Events', 'text_domain' ),
		'view_item'           => __( 'View Event', 'text_domain' ),
		'add_new_item'        => __( 'Add New Event', 'text_domain' ),
		'add_new'             => __( 'Add Event', 'text_domain' ),
		'edit_item'           => __( 'Edit Event', 'text_domain' ),
		'update_item'         => __( 'Update Event', 'text_domain' ),
		'search_items'        => __( 'Search Events', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'events',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'ucfbands_event', 'text_domain' ),
		'description'         => __( 'UCF Bands Events', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor', 'revisions', ),
		'taxonomies'          => array( 'band' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-calendar',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'ucfbands_event', $args );
}

// Hook into the 'init' action
add_action( 'init', 'ucfbands_cpt_event', 0 );



/**
 * UCFBands CPT: Event CMB
 * Register Event CMB
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_metabox() {
	$prefix = '_ucfbands_event_';

    // Initialize
    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Event Details', 'cmb' ),
        'object_types'  => array( 'ucfbands_event' ),
        'context'       => 'normal',
        'priority'      => 'core',
    ) );
    
    // All-Day Event
    $cmb->add_field( array(
        'name' => 'All-Day Event',
        'desc' => 'Displays "Daily" instead of the start/end time or "TBA"',
        'id'   => $prefix . 'is_all_day_event',
        'type' => 'checkbox'
    ) );    
    
    // Start Date & Time
    $cmb->add_field( array(
        'name' => 'Start Date/Time',
        'desc' => 'Both <b>Date and Time</b> are required for proper display of event.',
        'id'   => $prefix . 'start_date_time',
        'type' => 'text_datetime_timestamp',
    ) );

    // Finish Date & Time
    $cmb->add_field( array(
        'name' => 'Finish Date/Time',
        'desc' => 'Both <b>Date and Time</b> are required for proper display of event.',
        'id'   => $prefix . 'finish_date_time',
        'type' => 'text_datetime_timestamp',
    ) );
    
    // Time TBA
    $cmb->add_field( array(
        'name' => 'Time TBA',
        'desc' => 'Displays "TBA" instead of start time.',
        'id'   => $prefix . 'is_time_tba',
        'type' => 'checkbox'
    ) );  
    
    // Show End Time
    $cmb->add_field( array(
        'name' => 'Show Finish Time',
        'desc' => 'If the event has a close estimated finish or definite finish time, check this.',
        'id'   => $prefix . 'show_finish_time',
        'type' => 'checkbox'
    ) );  
    
    // Location Name
    $cmb->add_field( array(
        'name'    => 'Location Name',
        'desc'    => 'Leave empty for "TBA"',
        'id'      => $prefix . 'location_name',
        'type'    => 'text'
    ) ); 
    
    // Location Address
    $cmb->add_field( array(
        'name'    => 'Address',
//        'desc'    => 'Leave empty for "TBA"',
        'id'      => $prefix . 'location_address',
        'type'    => 'address'
    ) );
    
    // Google Map
    $cmb->add_field( array(
        'name' => 'Google Map',
        'desc' => 'Drag the marker to set the exact location',
        'id' => $prefix . 'location_google_map',
        'type' => 'pw_map',
        'split_values' => true, // Save latitude and longitude as two separate fields
    ) );

    // Admission Price
    $cmb->add_field( array(
        'name' => 'Admission/Ticket Price',
        'desc' => 'Set to 0 for "Free Admission". Leave empty to not show anything.',
        'id' => $prefix . 'ticket_price',
        'type' => 'text_money',
        // 'before_field' => '£', // Replaces default '$'
    ) );
    
    // Icon Background Color
    $cmb->add_field( array(
        'name'             => 'Icon Background Color',
        'id'               => $prefix. 'icon_background_color',
        'type'             => 'radio',
        'default' => 'ucf-gray',
        'options' => array(
            'ucf-gray'	=> __( '<b>Concert Ensemble</b> (Dark Gray)', 'cmb' ),
            'gold'   	=> __( '<b>Athletic</b> (Gold)', 'cmb' ),
            'red'       => __( '<b>Audition</b> (Red)', 'cmb' ),
            'green'	    => __( '<b>General/Clinic/Other</b> (Green)', 'cmb' ),
//            'primary'	=> __( 'Blue', 'cmb' ),
//            'warning'	=> __( 'Orange', 'cmb' ),
//            'default'	=> __( 'Gray', 'cmb' )
        ),        
    ) );    

    // Schedule Group
    $group_field_id = $cmb->add_field( array(
        'id'          => $prefix . 'schedule_group',
        'name'        => 'Schedule',
        'type'        => 'group',
        'description' => __( 'Add Schedule List Items', 'cmb' ),
        'options'     => array(
            'group_title'   => __( 'Item {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Schedule Item', 'cmb' ),
            'remove_button' => __( 'Remove Schedule Item', 'cmb' ),
            'sortable'      => true // beta
        ),
    ) );

    // Schedule Group: Listing Time
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Time',
        'id'   => 'time',
        'type' => 'text_time',
        'time_format' => 'g:i a',
    ) );
    
    // Schedule Group: Listing Thing
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Thing',
        'id'   => 'thing',
        'type' => 'text',
    ) );

    // Schedule Group: Sub-Item
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Sub-Items (Optional)',
        'id'   => 'sub_item',
        'type' => 'text',
        'repeatable' => true,
    ) );    

    
    // Program Group
    $group_field_id = $cmb->add_field( array(
        'id'          => $prefix . 'program_group',
        'name'        => 'Program',
        'type'        => 'group',
        'description' => __( 'Build Program', 'cmb' ),
        'options'     => array(
            'group_title'   => __( 'Piece {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Piece', 'cmb' ),
            'remove_button' => __( 'Remove Piece', 'cmb' ),
            'sortable'      => true // beta
        ),
    ) );
    
    // Program Group: Piece Title
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Title',
        'desc' => 'Ex: Kirkpatrick Fanfare',
        'id'   => 'title',
        'type' => 'text',
    ) );

    // Program Group: Piece Composer
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Composer(s)',
        'desc' => 'Ex: Boysen',
        'id'   => 'composer',
        'type' => 'text',
    ) );    
    
    // Program Group: Sub-Listing
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Piece Note',
        'desc' => 'Optional. Ex: <i>Laszlo Marosi, Conductor</i>',
        'id'   => 'piece_note',
        'type' => 'text',
        'repeatable' => true,
    ) );
    
    
    // Program Guest Compooser
    $cmb->add_field( array(
        'name'    => 'Program Guest Composer(s)/Conductor(s)',
        'desc'    => 'Optional. Displays before program pieces.<br>Ex: <i>Carter Pann, Guest Composer</i>',
        'id'      => $prefix . 'program_guest_composer',
        'type'    => 'text'
    ) );
}

add_action( 'cmb2_init', 'ucfbands_event_metabox' );
