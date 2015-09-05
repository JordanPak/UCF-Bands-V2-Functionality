<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: modal
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Modal
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_modal( $atts, $content = '' ) {


    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'title'      => '',
	), $atts, 'button' );



    //-- SET VARS --//

    // Attributes
    $title =      $atts['title'];

    // Attribute Helpers
    $button_classes = '';

    // Output
    $shortode_output = '';



    //=========//
    //  LOGIC  //
    //=========//


    //-- CLASSES --//

    // Default
    $button_classes .= 'button ';

    // Size
    if ($button_size)
        $button_classes .= 'button-' . $button_size . ' ';

    // Color
    if ($button_color)
        $button_classes .= 'button-' . $button_color . ' ';

    // Outline
    if ($button_outline == 'yes')
        $button_classes .= 'button-outline ';


    //-- URL --//

    // If "http" isn't found, throw in "http://"
    if ( strpos($button_url, 'http') === false ) {
        $button_url = 'http://' . $button_url;
    }


    //-- TARGET --//
    if ($button_new_tab == 'yes')
        $button_new_tab = 'target="_BLANK"';


    //-- ICON --//
    if ($button_icon) {
        $button_icon = strtolower($button_icon);
        $button_icon = '<i class="fa fa-' . $button_icon . '"></i>&nbsp;&nbsp;&nbsp;';
    }


    //==========//
    //  OUTPUT  //
    //==========//

    // Start Opening Tag
    $shortcode_output .= '<a ';


        // Classes
        $shortcode_output .= 'class="' . $button_classes . '" ';

        // URL
        $shortcode_output .= 'href="' . $button_url . '" ';

        // Target (new tab)
        $shortcode_output .= $button_new_tab;


    // Close Opening Tag
    $shortcode_output .= '>';


        // Icon
        $shortcode_output .= $button_icon;

        // Text
        $shortcode_output .= $content;


    // Closing Tag
    $shortcode_output .= '</a>';


    // Return Output String
	return $shortcode_output;

} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'modal', 'ucfbands_shortcode_modal' );
