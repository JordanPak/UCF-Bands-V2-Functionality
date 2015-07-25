<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Event: Build Query
 *
 * @author Jordan Pakrosnis
 * @return Event Query 
 */
function ucfbands_event_query( $num_events, $band ) {
    
    
    // Taxonomy Query //
    $tax_query = array(
        array(
            'taxonomy'  => 'band',
            'field'     => 'slug',
            'terms'     => $band,
        ),
    );

    
    // Meta Query Args
	// Only get events that haven't passed!
	$meta_query = array(
		'relation'	=>	'AND',
		array(
			'key'		=>	'_ucfbands_event_finish_date_time',
			'value'		=>	time(),
			'compare'	=>	'>'
		)
	);
    
    
    // Event Query Args
    $events_args = array(
        'post_type'         => 'ucfbands_event',
        'tax_query'         => $tax_query,
        'fields'            => 'ids',
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC',
        'post_count'        => $num_events,
        'posts_per_page'    => $num_events,
        'meta_key'          => '_ucfbands_event_start_date_time',
        'meta_query'        => $meta_query
    );
    
    // Query/Get Post IDs
    $events = new WP_Query( $events_args );

    
    // Return the events
    return $events;
    
} // ucfbands_event_query()



/**
 * UCFBands Event: None Found
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_none_found( $events_band ) {

    
    // Output String
   $none_found = '';

        
    // Get Band Name
    $events_band_name = get_term_by( 'slug', $events_band, 'band')->name;
    
    
    // Message Wrap Open
    $none_found .= '<br><div class="block entry"><p>';
    

        // If "all-bands", just do "There are currently no announcements"
        if ( strtolower($events_band_name) != 'all bands')
            $none_found .= 'There are currently no events for the ' . $events_band_name . '.';


        // If "All Bands"
        else
            $none_found .= 'There are currently no events.';

    
    // Message Wrap Close
    $none_found .= '</p></div>';
    
    
    // Return None Found string
    return $none_found;
    
    
} // ucfbands_event_none_found



/**
 * UCFBands Event: Get Meta
 * 
 * Default Meta
 *      - Title
 *      - Date(s) / Time
 *      - Location
 *      - Band / Icon BG
 *
 * Optional Meta
 *      - Google Map Iframe
 *      - Schedule
 *      - Program w/ Guest
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_get_meta( $event, $google_map = false, $schedule = false, $program = false ) {
    
    
    // Meta Array
    $event_meta = array();
    
    
    // Set Meta ID
    $meta_id_prefix = '_ucfbands_event_';
    
    
    // DEFAULT META //
    
    // Date/Time
    $event_meta['is_all_day_event']         = get_post_meta( $event, $meta_id_prefix . 'is_all_day_event', true );
    $event_meta['start_date_time']          = get_post_meta( $event, $meta_id_prefix . 'start_date_time', true );
    $event_meta['finish_date_time']         = get_post_meta( $event, $meta_id_prefix . 'finish_date_time', true );
    $event_meta['is_time_tba']              = get_post_meta( $event, $meta_id_prefix . 'is_time_tba', true );
    $event_meta['show_finish_time']         = get_post_meta( $event, $meta_id_prefix . 'show_finish_time', true );
    
    // Location
    $event_meta['location_name']            = get_post_meta( $event, $meta_id_prefix . 'location_name', true );
    
    // Icon/Band
    $event_meta['icon_background_color']    = get_post_meta( $event, $meta_id_prefix . 'icon_background_color', true );
    
    
    
    // OPTIONAL META //
    
    // Google Map
    if ( $google_map )
        $event_meta['location_google_map']  = get_post_meta( $event, $meta_id_prefix . 'location_google_map', true );
    
    // Schedule
    if ( $schedule )
        $event_meta['schedule_group']       = get_post_meta( $event, $meta_id_prefix . 'schedule_group', true );
        
    // Program
    if ( $program )
        $event_meta['program_group']        = get_post_meta( $event, $meta_id_prefix . 'program_group', true );
    
    
    
    // Return Meta
    return $event_meta;

} // ucfbands_event_none_found



/**
 * UCFBands Event: Date Badge
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_date_badge( $start_date_time, $finish_date_time, $icon_background_color ) {
    
    
    // Date Badge Output
    $date_badge = '';
    
    
    // CONVERT TO TIME STRINGS //
    $start_month	= date( 'M', $start_date_time );
    $start_day  	= date( 'j', $start_date_time );
    $start_time 	= date( 'g:i A', $start_date_time );

    $end_month      = date( 'M', $finish_date_time );
    $end_day        = date( 'j', $finish_date_time );
    $end_time       = date( 'g:i A', $finish_date_time );
    
    
    // Background Color
    $color = ' date-badge-' . $icon_background_color;
    
    
    // Badge Wrapper
    $date_badge .= '<div class="date-badge' . $color . '">';
    
        
        // Testing
        $date_badge .= 'Date #';
    
    
    // Close Badge Wrapper
    $date_badge .= '</div>';
    
    
    // Return Date Badge string
    return $date_badge;

} // ucfbands_event_none_found
