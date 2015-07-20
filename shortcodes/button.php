<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Button
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Button
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_button( $atts ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'size'      => 'med',
        'color'     => '',
        'outline'   => 'no',
        'url'       => '#',
        'target'    => '',
        'icon'      => '',
        'text'      => '',
	), $atts, 'button' );

    
    
    //-- SET VARS --//
    
    // Attributes
    $button_size =      $atts['size'];
    $button_color =     $atts['color'];
    $button_outline =   $atts['outline'];
    $button_url =       $atts['url'];
    $button_target =    $atts['target'];
    $button_icon =      $atts['icon'];
    $button_text =      $atts['text'];
    
    // Output
    $shortode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//
    
    
    //-- CLASSES --//
    
    // 
    
    
    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    // Open Tag
    $shortcode_output .= '<a ';
    
    
    
    // Close Tag
    $shortcode_output .= '</a>';
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_button()


// Register the shortcode
add_shortcode( 'button', 'ucfbands_shortcode_button' );















