<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Location
 *
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands Location: Get Meta
 *
 * @author Jordan Pakrosnis
 * @return string
 */
function ucfbands_location_get_meta( $location ) {

    // Meta Array
    $location_meta = array();

    // Set Meta ID
    $meta_id_prefix = '_ucfbands_location_';

    // Default Meta
    $location_meta['address']     = get_post_meta( $location, $meta_id_prefix . 'address', 1 );
    $location_meta['google_map']  = get_post_meta( $location, $meta_id_prefix . 'google_map', true );
    $location_meta['google_map_longitude'] = get_post_meta( $location, $meta_id_prefix . 'google_map_longitude', true );
    $location_meta['google_map_latitude'] = get_post_meta( $location, $meta_id_prefix . 'google_map_latitude', true );

    // Return Meta
    return $location_meta;

} // ucfbands_location_get_meta
