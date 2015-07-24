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

    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'num'       => '3',         // Number of announcements to show
        'heading'   => '',          // Show "Events" Heading
        'button'    => '',          // Show "View All" Button next to heading
        'band'      => 'all-bands', // Slug for band in Band taxonomy
	), $atts, 'announcements' );
    
    
    //-- SET VARS --//
    
    // Attributes
    $events_num =        $atts['num'];
    $events_heading =    $atts['heading'];
    $events_button =     $atts['button'];
    $events_band =       $atts['band'];
    
    // Helpers
    $events =           ''; // WP_Query()
    $no_events_found =  '';
    
    // Output
    $shortode_output =  '';    
    
    
    
    //=========//
    //  LOGIC  //
    //=========//
    
    
    // Get Events
    $events = ucfbands_event_query( 5, 'all-bands' );
    
    
} // ucfbands_shortcode_events()

// Register the shortcode
add_shortcode( 'events', 'ucfbands_shortcode_events' );
