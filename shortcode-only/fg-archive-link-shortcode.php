<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: FooGallery Archive Link
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: FooGallery Archive Link
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_fg_archive_link( $atts, $content = "" ) {


    //-- ATTRIBUTES --//
  	$atts = shortcode_atts( array(
  	), $atts, 'fg-archive-link' );


    //-- SET VARS --//

    // Output
    $shortode_output = '';



    //=========//
    //  LOGIC  //
    //=========//

    //-- CLASSES --//




    //==========//
    //  OUTPUT  //
    //==========//

    // Start Wrap
    $shortcode_output .= '<li>';


    // Closing Tag
    $shortcode_output .= '</li>';


    // Return Output String
	return $shortcode_output;

} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'fg-archive-link', 'ucfbands_shortcode_fg_archive_link' );
