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
function ucfbands_shortcode_fg_archive_link( $atts ) {


    //-- ATTRIBUTES --//
  	$atts = shortcode_atts( array(
        'year'  => '',
        'url'   => '#',
  	), $atts, 'fg-archive-link' );


    //-- SET VARS --//

    // Attributes
    $year = $atts['year'];
    $url  = $atts['url'];

    // Output
    $shortode_output = '';



    //==========//
    //  OUTPUT  //
    //==========//

    // Start Wrap
    $shortcode_output .= '<li>';

        // link
        $shortcode_output .= '<a href="' . $url . '">';

            // Year
            $shortcode_output .= $year;

        $shortcode_output .= '</a>';

    // Closing Tag
    $shortcode_output .= '</li>';


    // Return Output String
	return $shortcode_output;

} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'fg-archive-link', 'ucfbands_shortcode_fg_archive_link' );
