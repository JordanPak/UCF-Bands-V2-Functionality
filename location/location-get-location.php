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

    if ( $location != '' ) {
        $location_meta = ucfbands_location_get_meta( $location );
        $address = $location_meta['address'];

        return '<b>' . get_the_title( $location ) . '</b>' . ucfbands_location_address( $address );
    }

    else {
        return 'To Be Announced';
    }

} // ucfbands_get_location_address()



/**
 * UCFBands CPT: Location
 * Get Location Google Map
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_location_get_google_map( $location ) {

    if ( $location != '' ) {

        $location_meta = ucfbands_location_get_meta( $location );

        $latitude = $location_meta['google_map_latitude'];
        $longitude = $location_meta['google_map_longitude'];


        // if google map, continue. Else, output TBA.
        if ( ($latitude != '') && ($longitude != '') ) {
            ucfbands_location_google_map( $latitude, $longitude );
        }

    } // if location exists

    return;

} // ucfbands_get_location_google_map()
