<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *    
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands Event: Time
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_time( $is_all_day_event, $start_date_time, $finish_date_time, $is_time_tba, $show_finish_time ) {

    
    // Time Output
    $time = '';
    
    
    // CONVERT TO TIME STRINGS //
    $start_month	= date( 'M', $start_date_time );
    $start_day  	= date( 'j', $start_date_time );
    $start_time 	= date( 'g:i A', $start_date_time );
    
    $finish_month      = date( 'M', $finish_date_time );
    $finish_day        = date( 'j', $finish_date_time );
    $finish_time       = date( 'g:i A', $finish_date_time );
    
    
    
    // LOGIC //
    
    // TBA Time
    if ( $is_time_tba )
        $time_logic = 'TBA';
    
    // Daily Time
    else if ( $is_all_day_event ) 
        $time_logic = 'Daily';
    
    // NOT TBA or Daily; Do start/finish
    else {
        
        // Start Time
        $time_logic = $start_time;
        
        // End Time, as needed
        if ( $show_finish_time )
            $time_logic .= ' - ' . $finish_time;
        
        
    } // Not TBA
    
    
    
    // OUTPUT //
    
    
    // Wrapper
    $time .= '<span class="event-time">';
    

        // Time Icon
        $time .= '<i class="fa fa-clock-o"></i> ';


        // Insert Time Logic
        $time .= $time_logic;
    
    
    // Close Wrapper
    $time .= '</span>';
    
    
    // Return Time String
    return $time;
    
} // ucfbands_event_time()
