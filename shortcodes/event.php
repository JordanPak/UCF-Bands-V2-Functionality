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
    
    
    //-- WRAP --//
    $events_wrap_open =     '<div class="events-shortcode-wrap">';
    $events_wrap_close =    '</div>';
    
    
    //-- GET EVENTS --//
    $events = ucfbands_event_query( $events_num, $events_band );
    
    

    //==========//
    //  OUTPUT  //
    //==========//
    
    
    // Wrap Open
    $shortcode_output .= $events_wrap_open;
    
    
    // Wrap Close
    $shortcode_output .= $events_wrap_close;
    
    

    // Return Output
    return $shortcode_output;
    
} // ucfbands_shortcode_events()

// Register the shortcode
add_shortcode( 'events', 'ucfbands_shortcode_events' );
