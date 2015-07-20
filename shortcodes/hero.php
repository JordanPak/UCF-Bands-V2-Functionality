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
        'padding'           => 'med',
        'background-color'  => 'gold',
        'background-image'  => '',
	), $atts, 'hero' );

    
    //-- SET VARS --//
    
    // Attributes
    $hero_padding =             $atts['padding'];
    $hero_background_color =    $atts['background-color'];
    $hero_background_image =    $atts['background-image'];
    
    // Attribute Helpers
    $hero_classes = '';
    
    // Output
    $shortode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//    

    //-- CLASSES --//
    
    // General
    $hero_classes .= 'hero ';
    
    // Background Color
    if ($hero_background_color) {
        $hero_classes .= 'hero-' . $hero_background_color;
    }
    
    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    // Start Opening Tag
    $shortcode_output .= '<section ';
    
    
        // Classes
        $shortcode_output .= 'class="' . $hero_classes . '"';
    
    
    // Close Opening Tag
    $shortcode_output .= '>';
    
    
        // Content
        $shortcode_output .= do_shortcode($content);
    
    
    // Closing Tag
    $shortcode_output .= '</section>';    
    
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'hero', 'ucfbands_shortcode_hero' );
