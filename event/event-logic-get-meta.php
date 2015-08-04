<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *    
 *  @author Jordan Pakrosnis
*/

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
    
    // Tickets
    $event_meta['ticket_price']             = get_post_meta( $event, $meta_id_prefix . 'ticket_price', true );
    $event_meta['ticket_link']              = get_post_meta( $event, $meta_id_prefix . 'ticket_link', true );
    
    
    // OPTIONAL META //
    
    // Google Map
    if ( $google_map ) {
        $event_meta['location_google_map']  = get_post_meta( $event, $meta_id_prefix . 'location_google_map', true );
        $event_meta['location_google_map_longitude'] = get_post_meta( $event, $meta_id_prefix . 'location_google_map_longitude', true );
        $event_meta['location_google_map_latitude'] = get_post_meta( $event, $meta_id_prefix . 'location_google_map_latitude', true );
        
        // Address
        $event_meta['location_address']     = get_post_meta( $event, $meta_id_prefix . 'location_address', 1 );
        
    } // if google_map
    
    // Schedule
    if ( $schedule )
        $event_meta['schedule_group']       = get_post_meta( $event, $meta_id_prefix . 'schedule_group', true );
        
    // Program
    if ( $program ) {
        
        $event_meta['program_group']        = get_post_meta( $event, $meta_id_prefix . 'program_group', true );
        
        $event_meta['program_guest_composer']   = get_post_meta( $event, $meta_id_prefix . 'program_guest_composer', true );
    
    } // program
    
    
    // Return Meta
    return $event_meta;

} // ucfbands_event_get_meta
