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
function ucfbands_shortcode_hero( $atts, $content = null ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'size'          => 'med',  // Options: sm, med, lg
        'color'         => 'gray', // Options: Core Colors
        'image'         => '',
        'title'         => '',
        'button_url'    => '#',
        'button_icon'   => '',
        'button_text'   => '',
	), $atts, 'hero' );

    
    //-- SET VARS --//
    
    // Attributes
    $hero_size =     $atts['size'];
    $hero_color =       $atts['color'];
    $hero_image =       $atts['image'];
    $hero_title =       $atts['title'];
    $hero_button_url =  $atts['button_url'];
    $hero_button_icon = $atts['button_icon'];
    $hero_button_text = $atts['button_text'];
    
    // Attribute Helpers
    $hero_classes = '';
    $hero_image_tint = '';
    $hero_button = '';
    
    // Output
    $shortode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//    

    //-- CLASSES --//
    
    // General
    $hero_classes .= 'hero ';
    
    // Size
    if ($hero_size)
        $hero_classes .= 'hero-' . $hero_size . ' ';
    
    // Background Color
    if ($hero_color)
        $hero_classes .= 'hero-' . $hero_color . ' ';
    
    // Background Image
    if ($hero_image) {
        
        // Add Class
        $hero_classes .= 'hero-has-image ';
        
        
        // CONFIGURE TINT //
        
        // Get Color rgba
        switch ($hero_color) {
            
            case 'gold':
                $tint_color = 'rgba(225,172,6,0.80)'; // $ucf-gold
                break;

            case 'gray':
                $tint_color = 'rgba(0,0,0,0.8)'; // $black;
                //$tint_color = 'rgba(34,30,31,0.9)'; // $ucf-gray
                break;
            
            case 'red':
                $tint_color = 'rgba(192,11,6,0.8)'; // $red -20 on each
                break;
            
            case 'green':
                $tint_color = 'rgba(62,154,62,0.80)'; // $green -30 on each
                break;
            
            case 'blue':
                $tint_color = 'rgba(36,109,172,0.8)'; // $blue -30 on each
                break;
            
        } // switch
        
        $hero_image_tint = 'linear-gradient( ' . $tint_color . ', ' . $tint_color . ' )';
        
        
        // Set Style
        $hero_image = ' 
            style="background: ' . $hero_image_tint . ', url(\'' . $hero_image . '\');"';
    
    } // if hero image
    
    //-- TITLE --//

    if ($hero_title)
        $hero_title = '<h2>' . $hero_title . '</h2>';
    
    
    //-- BUTTON --//
    
    // Config button code if there's a button (Determined by existance of button_text)
    if ($hero_button_text) {
        $hero_button .= '<br><a class="button button-lg button-outline button-white" ';
    
        
        // If "http" isn't found in button url, throw in "http://"
        if ( strpos($hero_button_url, 'http') === false )
            $hero_button_url = 'http://' . $hero_button_url;

        
        // Button URL
        $hero_button .= 'href="' . $hero_button_url . '"';
        
        
        // Finish Opening Tag
        $hero_button .= '>';
        
        
        // Button Icon
        if ($hero_button_icon)
            $hero_button .= '<i class="fa fa-' . $hero_button_icon . '"></i>&nbsp;&nbsp;&nbsp;';
        
        
        // Button Text
        $hero_button .= $hero_button_text;
        
        
        // Closing Tag
        $hero_button .= '</a>';
        
    } // If hero_button_text is set
    
    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    // Start Opening Tag
    $shortcode_output .= '<section ';
    
    
        // Classes
        $shortcode_output .= 'class="' . $hero_classes . '"';
    
    
        // Background Image
        $shortcode_output .= $hero_image;
    
    
    // Close Opening Tag
    $shortcode_output .= '>';
    
        // Title
        $shortcode_output .= $hero_title;
    
        // Content
        $shortcode_output .= '<p>' . do_shortcode($content) . '</p>';
    
    
        // Button
        $shortcode_output .= $hero_button;
    
    
    // Closing Tag
    $shortcode_output .= '</section>';    
    
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'hero', 'ucfbands_shortcode_hero' );
