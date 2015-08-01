<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Event: Date Badge
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_date_badge( $start_date_time, $finish_date_time, $icon_background_color ) {
    
    
    // Date Badge Output
    $date_badge = '';
    
    
    // CONVERT TO TIME STRINGS //
    $start_month	   = date( 'M', $start_date_time );
    $start_day  	   = date( 'j', $start_date_time );
    $finish_month      = date( 'M', $finish_date_time );
    $finish_day        = date( 'j', $finish_date_time );
    
    
    
    // LOGIC //
    
    // Background Color
    $color = ' date-badge-' . $icon_background_color;
    
    
    // Month
    if ( $start_month == $finish_month )
        $month = $start_month;
    
    else
        $month = $start_month . ' / ' . $finish_month;

    $month = '<span class="month">' . $month . '</span><br>';
    
    
    // Day
    if ( $start_day == $finish_day ) {
        $day = $start_day;
        $day_class = '';   
    }
    
    else {
        $day = $start_day . ' - ' . $finish_day;
        $day_class = ' day-multi';
    }
    
    $day = '<span class="day' . $day_class . '">' . $day . '</span>';
        
    
    
    // OUTPUT BADGE //
    
    // Open Wrapper
    $date_badge .= '<div class="date-badge' . $color . '">';
    
        
        // Month
        $date_badge .= $month;
        
        // Day
        $date_badge .= $day;
    
    
    // Close Badge Wrapper
    $date_badge .= '</div>';
    
    
    
    // Return Date Badge string
    return $date_badge;

} // ucfbands_event_date_badge
