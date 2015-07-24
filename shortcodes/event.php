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
    
    
    //-- NONE FOUND MESSAGE --//
    
    // If no matches, set the message
    if ( ($events->have_posts()) == false ) {
        
        // Get Band Name
        $events_band_name = get_term_by( 'slug', $events_band, 'band')->name;
        
        // If "all-bands", just do "There are currently no announcements"
        if ( strtolower($events_band_name) != 'all bands') {
        
            // None Found Message
            $shortcode_output .=
                '<p>There are currently no events for the ' . $events_band_name . '.</p>' . $events_wrap_close;
            
            
        } // If not "All Bands"
        
        // If "All Bands"
        else {
            $shortcode_output .= '<p>There are currently no events.</p>' . $events_wrap_close;
        }
        
        // Finish Shortcode FN with output.
        return $shortcode_output;
    
    } // If None Found        
    
    
    
    // Wrap Close
    $shortcode_output .= $events_wrap_close;
    
    

    // Return Output
    return $shortcode_output;
    
} // ucfbands_shortcode_events()

// Register the shortcode
add_shortcode( 'events', 'ucfbands_shortcode_events' );
