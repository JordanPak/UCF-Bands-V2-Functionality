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
function ucfbands_shortcode_schedule( $atts ) {


    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'slug'      => 'slug', // Slug for schedule (as shown in url)
	), $atts, 'ucfbands_schedule' );



    //-- SET VARS --//

    // Attributes
    $schedule_slug = $atts['slug'];

    // Output
    $output = '';



    //=========//
    //  LOGIC  //
    //=========//

    //-- GET POST --//



    //==========//
    //  OUTPUT  //
    //==========//


    //-- NONE FOUND MESSAGE --//



    // Get the queried posts
    // $rehearsals = $rehearsals->get_posts();


    // Include Parsedown
    require_once( CHILD_DIR . '/inc/parsedown/Parsedown.php' );
    $Parsedown = new Parsedown();


    // Open Accordion Container
    $output .= '<div class="SCHEDULE">SCHEDULE HERE';


    // Close Accordion Container
    $output .= '</div>';




    // Return Output String
	return $output;

} // ucfbands_shortcode_rehearsals()


// Register the shortcode
add_shortcode( 'schedule', 'ucfbands_shortcode_schedule' );
