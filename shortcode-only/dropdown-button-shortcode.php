<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Dropdown Button
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Dropdown Button
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_dropdown_button( $atts, $content = '' ) {


    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'id'		=> 'dropdownMenu1',
		'size'      => 'med',
        'color'     => '',
        'outline'   => '',
        'icon'      => '',
	), $atts, 'dropdown-button' );



    //-- SET VARS --//

    // Attributes
	$button_id = 		$atts['id'];
    $button_size =      $atts['size'];
    $button_color =     $atts['color'];
    $button_outline =   $atts['outline'];
    $button_icon =      $atts['icon'];

    // Attribute Helpers
    $button_classes = '';

    // Output
    $shortode_output = '';



    //=========//
    //  LOGIC  //
    //=========//


    //-- CLASSES --//

    // Default
    $button_classes .= 'dropdown-toggle button';

    // Size
    if ($button_size)
        $button_classes .= ' button-' . $button_size;

    // Color
    if ($button_color)
        $button_classes .= ' button-' . $button_color;

    // Outline
    if ($button_outline == 'yes')
        $button_classes .= ' button-outline';


    //-- ICON --//
    if ($button_icon) {
        $button_icon = strtolower($button_icon);
        $button_icon = '<i class="fa fa-' . $button_icon . '"></i>&nbsp;&nbsp;&nbsp;';
    }


    //==========//
    //  OUTPUT  //
    //==========//

	// Dropdown Wrapper
	$shortcode_output .= '<div class="dropdown">';

	    // Start Anchor Tag
	    $shortcode_output .= '<a ';


	        // Classes
	        $shortcode_output .= 'class="' . $button_classes . '" ';

			// ID
			$shortcode_output .= 'id="' . $button_id . '" ';

			// Other Bootstrap Stuff
			$shortcode_output .= 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"';

	        // URL
	        // $shortcode_output .= 'href="#"';

	    // Close Anchor Opener
	    $shortcode_output .= '>';


	        // Icon
	        $shortcode_output .= $button_icon;

	        // Dropdown Links (separate shortcodes)
	        $shortcode_output .= do_shortcode($content);

			// Caret
			$shortcode_output .= '<span class="caret"></span>';

	    // Close Anchor
	    $shortcode_output .= '</a>';

	// Close Dropdown Wrapper
	$shortcode_output .= '</div>';


    // Return Output String
	return $shortcode_output;

} // ucfbands_shortcode_button()

// Register the shortcode
add_shortcode( 'dropdown-button', 'ucfbands_shortcode_dropdown_button' );
