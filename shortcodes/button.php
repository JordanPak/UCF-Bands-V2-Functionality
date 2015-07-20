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
        'text'      => '',
        'size'      => 'med',
        'color'     => '',
        'url'       => '#',
        'target'    => '',
        'icon'      => '',
	), $atts, 'button' );

    
    //-- SET VARS --//
    
    // Attributes
    $button_text =      $atts['text'];
    $button_size =      $atts['size'];
    $button_color =     $atts['color'];
    $button_url =       $atts['url'];
    $button_target =    $atts['target'];
    $button_icon =      $atts['icon'];
    
    // Output
    $shortode_output = '';
    
    
    
    
    
	return "foo = {$atts['foo']}";
    
} // ucfbands_shortcode_button()


// Register the shortcode
add_shortcode( 'button', 'ucfbands_shortcode_button' );
