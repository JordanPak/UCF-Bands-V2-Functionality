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
        $events_heading = '<h2 class="block-title"><i class="fa fa-calendar"></i>&nbsp;Upcoming Events' . $events_button . '</h2>';
        
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
    
    
    
    // If posts are found, process them
    if ($events_has_posts) {
    
        
        //-- GET POSTS --//

        // Get the queried posts
        $events = $events->get_posts();


        //-- LOOP --//
        foreach( $events as $event ) {
            
            
            // Get Current Post
            $event_post = get_post( $event );
            

            // Get "Default" event meta (params get what we want)
            $event_meta = ucfbands_event_get_meta( $event );
            
            
            // Entry Wrapper
            $shortcode_output .= '<div class="entry-wrapper">';
            
            
                
                // Date(s)
            
            
                
                // Title
                $shortcode_output .= '<h4 class="event-title">' . $event_post->post_title . '</h4>';
            
            
                // Time/Daily/TBA
            
            
                // Location
            
            
            // Close Entry Wrapper
            $shortcode_output .= '</div>';
            

        } // foreach event
    
        
    } // if events has posts
    
    
    // Wrap Close
    $shortcode_output .= $events_wrap_close;
    

    // Return Output
    return $shortcode_output;
    
} // ucfbands_shortcode_events()

// Register the shortcode
add_shortcode( 'events', 'ucfbands_shortcode_events' );
