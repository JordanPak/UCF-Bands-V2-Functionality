<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Schedule
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Schedule
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_schedule( $atts, $content = null ) {

    //-- ATTRIBUTES --//
	$a = shortcode_atts( array(
        'id' => '',
	), $atts );


    // Post ID
    $schedule_id = esc_attr($a['id']);

    // Get Post
    $schedule = get_post( $schedule_id );

    // Shortcode Output String
    $output = '';


    //==========//
    //  OUTPUT  //
    //==========//


    // Container
    // $output .= '<div class="SCHEDULE">';

        // Not Found?
        if ( $schedule == null ) {
            $output .= '<p>Schedule Not Found</p>';
        }

        // Schedule Exists
        else {
            $output .= ucfbands_output_schedule( $schedule_id );
        }

    // Close Container
    // $output .= '</div>';


    // Return Output String
	return $output;

} // ucfbands_shortcode_rehearsals()


// Register the shortcode
add_shortcode( 'schedule', 'ucfbands_shortcode_schedule' );
