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
    
    // Check for posts
    $events_has_posts = $events->have_posts();
    

    //==========//
    //  OUTPUT  //
    //==========//
    
    
    // Wrap Open
    $shortcode_output .= $events_wrap_open;
    
    
    // Heading
    $shortcode_output .= $events_heading;
    
    
    // None Found
    if ($events_has_posts == false)
        $shortcode_output .= ucfbands_event_none_found( $events_band );
    
    
    
    // Wrap Close
    $shortcode_output .= $events_wrap_close;
    
    

    // Return Output
    return $shortcode_output;
    
} // ucfbands_shortcode_events()

// Register the shortcode
add_shortcode( 'events', 'ucfbands_shortcode_events' );
