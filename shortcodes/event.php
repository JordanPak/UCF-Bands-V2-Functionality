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
    
    
    //-- HEADING --//
    
    // If no heading, don't do block title or button
    if ($events_heading != 'no') {
        
        // Block Button
        if ($events_button != 'no') {
            $events_button = ' <a class="button button-xsm button-white" href="' . get_site_url() . '/events' . '">View All</a>';
        }
    
        // Set Block Title
        $events_heading = '<h2 class="block-title"><i class="fa fa-calendar"></i>&nbsp;Events' . $events_button . '</h2>';
        
    } // if announcements_heading isn't "no"
    
    
    //-- GET EVENTS --//
    $events = ucfbands_event_query( $events_num, $events_band );
    
    

    //==========//
    //  OUTPUT  //
    //==========//
    
    
    // Wrap Open
    $shortcode_output .= $events_wrap_open;
    
    
    // Heading
    $shortcode_output .= $events_heading;
    
    
    //-- NONE FOUND MESSAGE --//
    
    // If no matches, set the message
    if ( ($events->have_posts()) == false ) {
        
        // Get Band Name
        $events_band_name = get_term_by( 'slug', $events_band, 'band')->name;
        
        // If "all-bands", just do "There are currently no announcements"
        if ( strtolower($events_band_name) != 'all bands') {
        
            // None Found Message
            $shortcode_output .=
                '<br><div class="block entry"><p>There are currently no events for the ' . $events_band_name . '.</p></div>' . $events_wrap_close;
            
            
        } // If not "All Bands"
        
        // If "All Bands"
        else {
            $shortcode_output .= '<br><div class="block entry"><p>There are currently no events.</p></div>' . $events_wrap_close;
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
