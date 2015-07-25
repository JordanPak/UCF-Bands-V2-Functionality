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
        'num'       => '5',         // Number of announcements to show
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
            
            
            // Event Location Logic
            $location = '<span class="location">';
            
                if ( $event_meta['location_name'] == '' )
                    $location .= 'TBA';

                else
                    $location .= '<a href="' . get_permalink( $event ) .'" title="Location Details" rel="Location Details">' . $event_meta['location_name'] . '</a>';
    
            
            $location .= '</span>';
            
            
            
            // Entry Wrapper
            $shortcode_output .= '<div class="entry-wrapper clearfix">';
            
            
                // Date(s)
                $shortcode_output .= ucfbands_event_date_badge(
                    $event_meta['start_date_time'],
                    $event_meta['finish_date_time'],
                    $event_meta['icon_background_color']
                );            
                
            
                // More Info Icon
                $shortcode_output .= '<span class="more-info">';
                $shortcode_output .= '<a href="' . get_permalink( $event ) .'" title="Event Details" rel="Event Details">';
                $shortcode_output .= '<span class="event-details">Event Details </span>';
                $shortcode_output .= '<i class="fa fa-info-circle fa-lg"></i></a></span>';
            
                
                // Right-Info Wrapper
                $shortcode_output .= '<div class="right-info">';
            
                
                    // Title
                    $shortcode_output .= '<h4 class="event-title"><a href="' . get_permalink( $event ) . '" title="Event Details" rel="See Event Details">';
                        $shortcode_output .= $event_post->post_title;
                    $shortcode_output .= '</a></h4>';


                        // Time/Daily/TBA
                        $shortcode_output .= ucfbands_event_time(
                            $event_meta['is_all_day_event'],
                            $event_meta['start_date_time'],
                            $event_meta['finish_date_time'],
                            $event_meta['is_time_tba'],
                            $event_meta['show_finish_time']
                        );


                        // Divider
                        $shortcode_output .= '<br>';
//                        $shortcode_output .= '&nbsp;|&nbsp;';


                        // Location
                        $shortcode_output .= '<i class="fa fa-map-marker"></i> ' .  $location;

            
                // Right-Info Wrapper Close
                $shortcode_output .= '</div>';
            
            
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
