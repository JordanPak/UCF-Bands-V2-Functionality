<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Announcement
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Announcement
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_announcement( $atts ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
//        'size'      => 'med',
	), $atts, 'announcement' );

    
    
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
    
    
    //-- CLASSES --//
    
    // Default
//    $button_classes .= 'button ';
    
    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    // Start Opening Tag
    $shortcode_output .= '<a ';
    
    

    
    // Closing Tag
    $shortcode_output .= '</a>';
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_announcement()

// Register the shortcode
add_shortcode( 'button', 'ucfbands_shortcode_announcement' );
