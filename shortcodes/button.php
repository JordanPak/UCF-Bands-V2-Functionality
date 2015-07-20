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
    
	$atts = shortcode_atts( array(
		'foo' => 'no foo',
		'baz' => 'default baz'
	), $atts, 'bartag' );

	return "foo = {$atts['foo']}";
    
} // ucfbands_shortcode_button()


// Register the shortcode
add_shortcode( 'button', 'ucfbands_shortcode_button' );
