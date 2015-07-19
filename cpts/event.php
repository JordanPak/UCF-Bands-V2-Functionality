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
		'supports'            => array( 'title', 'thumbnail', 'revisions', ),
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
        'desc' => 'If the event has a close estimated end or defined end, check this.',
        'id'   => $prefix . 'show_finish_time',
        'type' => 'checkbox'
    ) );  
    
    // Location Name
    $cmb->add_field( array(
        'name'    => 'Location Name',
        'desc'    => 'Leave empty for "TBA"',
        'default' => 'standard value (optional)',
        'id'      => $prefix . 'location_name',
        'type'    => 'text'
    ) );

    // Google Map
    $cmb->add_field( array(
        'name'    => 'Google Map Embed Code',
        'desc'    => '<br>
            <b style="color:#444;">How to get a location\'s Google Map Embed iframe code:</b>
            <ol>
               <li>Go to <a href="http://google.com/maps" target="_BLANK">Google Maps</a></li>
               <li>Search for the location (Ex: "University of Central Florida")</li>
               <li>Open the menu (Hamburger icon at the top-left of the page) and select "Share or Embed Map"</li>
               <li>Click the "Embed Map" Tab</li>
               <li>Copy the iframe code into the field above</li>
            </ol>
        ',
        'id'      => $prefix . 'location_google_map',
        'type'    => 'textarea_code'
    ) );    
}
add_action( 'cmb2_init', 'ucfbands_event_metabox' );










