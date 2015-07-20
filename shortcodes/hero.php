<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Hero (Bootstrap- "Jumbotron"-like thing)
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Hero
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_hero( $atts, $content = "" ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'color'     => '',
	), $atts, 'hero' );

    
    //-- SET VARS --//
    
    // Attributes
//    $content_box_color = $atts['color'];
    
    // Attribute Helpers
//    $content_box_classes = '';
    
    // Output
    $shortode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//    

    //-- CLASSES --//
    
    // Color

    
    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    // Start Opening Tag
    $shortcode_output .= '<div ';
    
    
        // Classes
//        $shortcode_output .= 'class="' . $content_box_classes . '"';
    
    
    // Close Opening Tag
    $shortcode_output .= '>';
    
    
        // Content
        $shortcode_output .= do_shortcode($content);
    
    
    // Closing Tag
    $shortcode_output .= '</div>';    
    
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'hero', 'ucfbands_shortcode_hero' );
