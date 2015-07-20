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
        'padding'               => 'med',  // Options: sm, med, lg
        'background-color'      => 'gold', // Options: Core Colors
        'background-image-url'  => '',
        'title'                 => '',
	), $atts, 'hero' );

    
    //-- SET VARS --//
    
    // Attributes
    $hero_padding =                 $atts['padding'];
    $hero_background_color =        $atts['background-color'];
    $hero_background_image_url =    $atts['background-image-url'];
    $hero_title =                   $atts['title'];
    
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
    
    // Padding
    if ($hero_padding)
        $hero_classes .= 'hero-padding-' . $hero_padding . ' ';
    
    // Background Color
    if ($hero_background_color)
        $hero_classes .= 'hero-' . $hero_background_color;
    
    
    // Background Image
    if ($hero_background_image_url)
        $hero_background_image_url = ' style="background-image: url(\'' . $hero_background_image_url . '\');" ';
    
    
    //-- TITLE --//
    
    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    // Start Opening Tag
    $shortcode_output .= '<section ';
    
    
        // Classes
        $shortcode_output .= 'class="' . $hero_classes . '"';
    
    
        // Background Image
        $shortcode_output .= $hero_background_image_url;
    
    
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
