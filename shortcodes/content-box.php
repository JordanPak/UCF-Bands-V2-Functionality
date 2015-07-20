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
function ucfbands_shortcode_content_box( $atts, $content = "" ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'color'     => '',
	), $atts, 'content-box' );

    
    //-- SET VARS --//
    
    // Attributes
    $content_box_color = $atts['color'];
    
    // Attribute Helpers
    $content_box_classes = '';
    
    // Output
    $shortode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//    

    //-- CLASSES --//
    
    // Color
    if ($content_box_color) {
        $content_box_classes .= 'content-box-' . $content_box_color;
    }
    else {
        $content_box_classes .= 'content-box-gray';
    }
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'content-box', 'ucfbands_shortcode_content_box' );
