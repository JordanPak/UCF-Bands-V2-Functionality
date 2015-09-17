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



    // Include Parsedown
    require_once( CHILD_DIR . '/inc/parsedown/Parsedown.php' );
    $Parsedown = new Parsedown();


    // Container
    $output .= '<div class="SCHEDULE">';

        // Not Found?
        if ( $schedule == null ) {
            $output .= '<p>Schedule Not Found</p>';
        }

        // Schedule Exists
        else {
            ucfbands_output_schedule( $schedule_id );
        }

    // Close Container
    $output .= '</div>';


    // Return Output String
	return $output;

} // ucfbands_shortcode_rehearsals()


// Register the shortcode
add_shortcode( 'schedule', 'ucfbands_shortcode_schedule' );
