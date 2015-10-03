<?php

/*
 *  UCFBands Theme Functionality
 *  CPT: Location
 *
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands CPT: Location
 * Get Location Name
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_location_get_name ( $location ) {
    return get_the_title( $location );
}

/**
 * UCFBands CPT: Location
 * Get Location Address
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_location_get_address( $location ) {

    $location_meta = ucfbands_location_get_meta( $location );

    $address = $location_meta['address'];

    return ucfbands_location_address( $address );

} // ucfbands_get_location_address()



/**
 * UCFBands CPT: Location
 * Get Location Google Map
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_location_get_google_map( $location ) {

} // ucfbands_get_location_google_map()
