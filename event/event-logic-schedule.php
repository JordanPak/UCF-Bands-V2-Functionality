<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands Event Single - Get Schedule
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_schedule( $schedule_items ) {


    // Include Parsedown
    require_once( CHILD_DIR . '/inc/parsedown/Parsedown.php' );
    $Parsedown = new Parsedown();


    // Schedule Output String
    $schedule = '';


    $schedule .= '<div class="event-schedule"><h2><i class="fa fa-list"></i>&nbsp;&nbsp;Schedule</h2>';

        // Start UL
        $schedule .= '<ul>';


            //-- SCHEDULE ITEM LOOP --//
            foreach ( $schedule_items as $schedule_item ) {

                // Get Item Meta
                $time =         esc_attr( $schedule_item['time'] );
                $thing =        esc_attr( $schedule_item['thing'] );
                $sub_items =    $schedule_item['sub_item'];

                // Make "AM" and "PM" lowercase
                $time = explode( " ", $time );
                $time[1] = strtolower( $time[1] );


                // Start List Item
                $schedule .= '<li>';

                    // Parse thing into Markdown HTML
                    $thing = $Parsedown->text($thing);

                    // Time & Thing
                    $schedule .= '<span>' . $time[0] . ' ' . $time[1] . '</span>' . $thing;


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

    // Close Schedule Wrapper
    $schedule .= '</div>';


    // Return Schedule String
    return $schedule;


} // ucfbands_event_schedule()
