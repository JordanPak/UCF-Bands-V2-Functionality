<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Schedule
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Schedule: Output Schedule
 *
 * @author Jordan Pakrosnis
 * @return string
 */
function ucfbands_output_schedule( $schedule_id, $output_title = false ) {

    // Include Parsedown
    require_once( CHILD_DIR . '/inc/parsedown/Parsedown.php' );
    $Parsedown = new Parsedown();


    // Get Schedule Post
    $schedule_post = get_post( $schedule_id );

    // Output String
    $schedule = '';

    // Meta Array
    $schedule_meta = array();

    // Get Meta
    $schedule_meta = ucfbands_schedule_get_meta( $schedule_id );

    // Schedule Items
    $schedule_items = $schedule_meta['schedule_group'];


    // Start Wrap
    $schedule .= '<div class="event-schedule">';


        // if Title is needed
        if( $output_title == true) {
            $schedule .= '<h2><i class="fa fa-list"></i>&nbsp;&nbsp;Schedule</h2>';
        }

        // Start Ul
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

                // End List Item
                $schedule .= '</li>';


            } // Schedule Item Loop


        // Close UL
        $schedule .= '</ul>';


        //-- SCHEDULE DOWNLOAD --//

        // If Remove Download Button is not checked & There's info in the File Download
        if ( ($schedule_meta['remove_download_button'] != TRUE) && ($schedule_meta['file_download'] != NULL) ) {

            $schedule .= '<a class="button button-white button-schedule-download" href="' . esc_url( $schedule_meta['file_download'] ) . '" target="_BLANK"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</a>';

        } // If display schedule download


    // End Wrap
    $schedule .= '</div>';


    // Output Schedule
    return $schedule;

} // ucfbands_output_schedule()



/**
 * UCFBands Schedule: Get Meta
 *
 * @author Jordan Pakrosnis
 * @return string
 */
function ucfbands_schedule_get_meta( $schedule_post ) {

    // Meta Array
    $schedule_meta = array();

    // Set Meta ID
    $meta_id_prefix = '_ucfbands_schedule_';

    // DEFAULT META //
    $schedule_meta['schedule_group'] =          get_post_meta( $schedule_post, $meta_id_prefix . 'schedule_group', true );
    $schedule_meta['file_download'] =                get_post_meta( $schedule_post, $meta_id_prefix . 'file_download', true );
    $schedule_meta['remove_download_button'] =  get_post_meta( $schedule_post, $meta_id_prefix . 'remove_download_button', true );

    // Return Meta
    return $schedule_meta;

} // ucfbands_schedule_get_meta
