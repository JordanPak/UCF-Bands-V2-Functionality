<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Event: None Found
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_none_found( $events_band ) {

    
    // Output String
   $none_found = '';

        
    // Get Band Name
    $events_band_name = get_term_by( 'slug', $events_band, 'band')->name;
    
    
    // Message Wrap Open
    $none_found .= '<br><div class="block entry"><p>';
    

        // If "all-bands", just do "There are currently no announcements"
        if ( strtolower($events_band_name) != 'all bands')
            $none_found .= 'There are currently no events for the ' . $events_band_name . '.';


        // If "All Bands"
        else
            $none_found .= 'There are currently no events.';

    
    // Message Wrap Close
    $none_found .= '</p></div>';
    
    
    // Return None Found string
    return $none_found;
    
    
} // ucfbands_event_none_found
