<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Rehearsal
 *    
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands Rehearsal - Get Schedule
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_rehearsal_schedule( $schedule_items ) {
    
    
    // Include Parsedown
    require_once( CHILD_DIR . '/inc/parsedown/Parsedown.php' );
    $Parsedown = new Parsedown();
    
    
    // Schedule Output String
    $schedule = '';
    

    // Schedule Wrapper
    $schedule .= '<div class="event-schedule"><b>Schedule</b>';

        // Start UL
        $schedule .= '<ul>';
    

            //-- SCHEDULE ITEM LOOP --//
            foreach ( $schedule_items as $schedule_item ) {

                // Get Item Meta
                $time =         esc_attr( $schedule_item['time'] );
                $thing =        esc_attr( $schedule_item['thing'] );
                $sub_items =    $schedule_item['sub_item'];


                // Start List Item
                $schedule .= '<li>';
                
                    // Parse thing into Markdown HTML
                    $thing = $Parsedown->text($thing);    
                
                    // Time & Thing
                    $schedule .= '<span>' . $time . '</span>&nbsp;&nbsp;&nbsp;&nbsp;' . $thing;


                    // Check for sub-items
                    if ( $sub_items != '' ) {

                        // Nested UL
                        $schedule .= '<ul>';

                            foreach ( $sub_items as $sub_item ) {
                                
                                // Parse item into Markdown HTML
                                $sub_item = $Parsedown->text($sub_item);
                                
                                // Output Sub item
                                $schedule .= '<li>' . $sub_item . '</li>';
                                
                            } // foreach sub-item

                        $schedule .= '</ul>';

                    } // if sub-items

                $schedule .= '</li>';

            } // foreach Item Loop

    
        $schedule .= '</ul>';
    
//     Close Schedule Wrapper
    $schedule .= '</div>'; 
    
    
    // Return Schedule String
    return $schedule;
    
    
} // ucfbands_rehearsal_schedule()
