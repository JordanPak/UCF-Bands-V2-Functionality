<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Content Box
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Content Box
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_content_box( $atts ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'size'      => 'med',
        'color'     => '',
        'outline'   => '',
        'url'       => '#',
        'newtab'   => '',
        'icon'      => '',
        'text'      => '',
	), $atts, 'content-box' );

    
    //-- SET VARS --//
    
    // Attributes
//    $button_size =      $atts['size'];

    
    // Attribute Helpers
//    $button_classes = '';
    
    // Output
    $shortode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//    
    
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'content-box', 'ucfbands_shortcode_content_box' );
