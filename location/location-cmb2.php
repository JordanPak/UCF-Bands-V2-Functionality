<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Location
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Location CMB
 * Register Location CMB
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_location_metabox() {
	$prefix = '_ucfbands_location_';

    // Initialize
    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Location Details', 'cmb' ),
        'object_types'  => array( 'ucfbands_location' ),
        'context'       => 'normal',
        'priority'      => 'core',
    ) );

    // Location Name (NOT USED - POST TITLE INSTEAD)
    // $cmb->add_field( array(
    //     'name'    => 'Location Name',
    //     'desc'    => 'Leave empty for "TBA"',
    //     'id'      => $prefix . 'location_name',
    //     'type'    => 'text'
    // ) );

    // Location Address
    $cmb->add_field( array(
        'name'    => 'Address',
        'id'      => $prefix . 'address',
        'type'    => 'address',
		'desc'	  => 'Requires the <a href="https://github.com/WebDevStudios/CMB2-Snippet-Library/blob/master/custom-field-types/address-field-type.php" target="_BLANK">CMB2 Addres Field Type Plugin</a>.',
    ) );

    // Google Map
    $cmb->add_field( array(
        'name' => 'Google Map',
        'desc' => 'Drag the marker to set the exact location. Requires the <a href="https://github.com/mustardBees/cmb_field_map" target="_BLANK">CMB2 Google Maps Field Type Plugin</a>.',
        'id' => $prefix . 'google_map',
        'type' => 'pw_map',
        'split_values' => true, // Save latitude and longitude as two separate fields
    ) );

}

add_action( 'cmb2_init', 'ucfbands_location_metabox' );
