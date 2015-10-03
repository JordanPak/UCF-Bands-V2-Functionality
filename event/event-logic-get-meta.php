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
 *      - Schedule
 *      - Program w/ Guest
 *
 * @author Jordan Pakrosnis
 * @return string
 */
function ucfbands_event_get_meta( $event, $schedule = false, $program = false ) {


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
    $event_meta['location']            = get_post_meta( $event, $meta_id_prefix . 'location', true );

    // Icon/Band
    $event_meta['icon_background_color']    = get_post_meta( $event, $meta_id_prefix . 'icon_background_color', true );

    // Tickets
    $event_meta['ticket_price']             = get_post_meta( $event, $meta_id_prefix . 'ticket_price', true );
    $event_meta['ticket_link']              = get_post_meta( $event, $meta_id_prefix . 'ticket_link', true );


    // OPTIONAL META //

    // Schedule
    if ( $schedule )
        $event_meta['attached_schedule']    = get_post_meta( $event, $meta_id_prefix . 'attached_schedule', true );

    // Program
    if ( $program ) {

        $event_meta['program_group']        = get_post_meta( $event, $meta_id_prefix . 'program_group', true );

        $event_meta['program_guest_composer'] = get_post_meta( $event, $meta_id_prefix . 'program_guest_composer', true );

    } // program


    // Return Meta
    return $event_meta;

} // ucfbands_event_get_meta
