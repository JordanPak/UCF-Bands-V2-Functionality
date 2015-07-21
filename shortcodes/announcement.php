<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Announcements
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Announcements
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_announcements( $atts ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'num'       => '3',     // Number of announcements to show
        'heading'   => '',      // Show "Announcements" Heading
        'button'    => '',      // Show "View All" Button next to heading 
	), $atts, 'announcements' );

    
    
    //-- SET VARS --//
    
    // Attributes
    $announcements_num =        $atts['num'];
    $announcements_heading =    $atts['heading'];
    $announcements_button =     $atts['button'];
        
    // Output
    $shortode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//
    
    
    //-- HEADING --//
    
    // If no heading, don't do block title or button
    if ($announcements_heading != 'no') {
        
        // Block Button
        if ($announcements_button != 'no') {
            $announcements_button = ' <a class="button button-xsm button-white" href="' . get_site_url() . '/announcements' . '">View All</a>';
        }
    
        // Set Block Title
        $announcements_heading = '<h2 class="block-title">Announcements' . $announcements_button . '</h2>';
        
    } // if announcements_heading isn't "no"
    
    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    // Heading
    $shortcode_output .= $announcements_heading;
    
    

    
    // Closing Tag
    $shortcode_output .= '</a>';
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_announcement()

// Register the shortcode
add_shortcode( 'announcements', 'ucfbands_shortcode_announcements' );
