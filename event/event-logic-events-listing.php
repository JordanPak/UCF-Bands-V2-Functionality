<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Event: Listing
 *
 * For use on shortcode, archive, and other pages.
 * 
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_events_listing( $events, $is_archive = false ) {

    
    // Events Listing Output String
    $events_listing = '';
    
    

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



        // ENTRY WRAPPER //
        
        // If Archive
        if ( $is_archive )
            $events_listing .= '<div class="entry-wrapper masonry-block masonry-block-size--one-third">';
        else
            $events_listing .= '<div class="entry-wrapper clearfix">';


            // Date(s)
            $events_listing .= ucfbands_event_date_badge(
                $event_meta['start_date_time'],
                $event_meta['finish_date_time'],
                $event_meta['icon_background_color']
            );            


            // More Info Icon
            $events_listing .= '<span class="more-info">';
            $events_listing .= '<a href="' . get_permalink( $event ) .'" title="Event Details" rel="Event Details">';
            $events_listing .= '<span class="event-details">Event Details </span>';
            $events_listing .= '<i class="fa fa-info-circle fa-lg"></i></a></span>';


            // Right-Info Wrapper
            $events_listing .= '<div class="right-info">';


                // Title
                $events_listing .= '<h4 class="event-title"><a href="' . get_permalink( $event ) . '" title="Event Details" rel="See Event Details">';
                    $events_listing .= $event_post->post_title;
                $events_listing .= '</a></h4>';


                    // Time/Daily/TBA
                    $events_listing .= ucfbands_event_time(
                        $event_meta['is_all_day_event'],
                        $event_meta['start_date_time'],
                        $event_meta['finish_date_time'],
                        $event_meta['is_time_tba'],
                        $event_meta['show_finish_time']
                    );


                    // Divider
                    $events_listing .= '<br>';


                    // Location
                    $events_listing .= '<i class="fa fa-map-marker"></i> ' .  $location;


            // Right-Info Wrapper Close
            $events_listing .= '</div>';
        
        
            // If Archive & has details, Show Details Excerpt
            if ( $is_archive && ($event_post->post_content != '') ) {
            
                
                // Events listing HR & Details Excerpt
                $events_listing .= '<hr><div class="event-details-excerpt">';
                
                
                    // Get "Excerpt" content from content
                    $event_content = substr($event_post->post_content, 0, 250); // Get excerpt

                    $events_listing .= '<p>' . $event_content . ' | <a href="' . get_permalink( $event ) . '">More Details...</a></p>';
                
                
                // Close excerpt tag
                $events_listing .= '</div>';
                
                
            } // Show Details Excerpt


        // Close Entry Wrapper
        $events_listing .= '</div>';


    } // foreach event
    
    
 
    // Return Events Listing String
    return $events_listing;

} // ucfbands_events_listing();
