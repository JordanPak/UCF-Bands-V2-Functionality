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
    
    // Event Query Args
    $events_args = array(
        'post_type'         => 'ucfbands_event',
        'tax_query'         => $tax_query,
        'fields'            => 'ids',
        'orderby'           => 'meta_value_num',
        'order'             => 'DSC',
        'post_count'        => $num_events,
        'posts_per_page'    => $num_events,
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
    $shortcode_output = '';

        
    // Get Band Name
    $events_band_name = get_term_by( 'slug', $events_band, 'band')->name;
    
    
    // Message Wrap Open
    $shortcode_output .= '<br><div class="block entry"><p>';
    

        // If "all-bands", just do "There are currently no announcements"
        if ( strtolower($events_band_name) != 'all bands')
            $shortcode_output .= 'There are currently no events for the ' . $events_band_name . '.';


        // If "All Bands"
        else
            $shortcode_output .= 'There are currently no events.';

    
    // Message Wrap Close
    $shortcode_output .= '</p></div>';
    
    
    // Finish Shortcode FN with output.
    return $shortcode_output;
    
    
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
    
    
    // Set Meta ID
    $meta_id_prefix = '_ucfbands_event_';
    
    
    // DEFAULT META
    $is_all_day_event       = get_post_meta( $event, $meta_id_prefix . 'is_all_day_event', true );

    

} // ucfbands_event_none_found
