<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: FooGallery Archive
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: FooGallery Archive
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_foogallery_archive( $atts, $content = "" ) {


    //-- ATTRIBUTES --//
  	$atts = shortcode_atts( array(
  	), $atts, 'foogallery-archive' );


    //-- SET VARS --//

    // Output
    $shortode_output = '';



    //==========//
    //  OUTPUT  //
    //==========//

    // Start Wrap
    $shortcode_output .= '<div class="foogallery-archive">';


        // Archive Title
        $shortcode_output .= '<span class="foogallery-archive-title"><i class="fa fa-history"></i>&nbsp;&nbsp;Archive</span>';


        // list
        $shortcode_output .= '<ul>';

            // Content (Link Shortcodes)
            $shortcode_output .= do_shortcode($content);

        $shortcode_output .= '</ul>';


    // Closing Tag
    $shortcode_output .= '</div>';


    // Return Output String
	return $shortcode_output;

} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'foogallery-archive', 'ucfbands_shortcode_foogallery_archive' );
