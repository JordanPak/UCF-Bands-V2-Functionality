<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: UCFBands Gallery (Mostly just to get rid of empty <p> tags...)
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: UCFBands Gallery
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_ucfbands_gallery( $atts, $content = '' ) {


    //-- ATTRIBUTES --//
  	$atts = shortcode_atts( array(
  	), $atts, 'ucfbands-gallery' );


    //-- SET VARS --//

    // Output
    $shortode_output = '';



    //==========//
    //  OUTPUT  //
    //==========//

    // Start Wrap
    $shortcode_output .= '<div>' . do_shortcode($content) . '</div>';

    // Return Output String
	return $shortcode_output;

} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'ucfbands-gallery', 'ucfbands_shortcode_ucfbands_gallery' );
