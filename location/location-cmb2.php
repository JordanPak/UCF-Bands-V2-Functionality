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


    // Location Address
    $cmb->add_field( array(
        'name'    => 'Address<br><small><i>Requires the <a href="https://github.com/WebDevStudios/CMB2-Snippet-Library/blob/master/custom-field-types/address-field-type.php" target="_BLANK">CMB2 Address Field Type Plugin</a></i>.</small>',
        'id'      => $prefix . 'address',
        'type'    => 'address',
    ) );

    // Google Map
    $cmb->add_field( array(
        'name' => 'Google Map<br><small><i>Requires the <a href="https://github.com/mustardBees/cmb_field_map" target="_BLANK">CMB2 Google Maps Field Type Plugin</a>.</i></small>',
        'desc' => 'Drag the marker to set the exact location.',
        'id' => $prefix . 'google_map',
        'type' => 'pw_map',
        'split_values' => true, // Save latitude and longitude as two separate fields
    ) );

}

add_action( 'cmb2_init', 'ucfbands_location_metabox' );
