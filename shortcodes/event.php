<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Event
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Events
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_events( $atts ) {
    
    
    //=========//
    //  LOGIC  //
    //=========//
    
    // Get Events
    $events = ucfbands_event_query( 5, 'all-bands' );
    
    
} // ucfbands_shortcode_events()

// Register the shortcode
add_shortcode( 'events', 'ucfbands_shortcode_events' );
