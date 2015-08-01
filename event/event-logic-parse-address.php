<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Event: Parse Address
 * 
 * @author Jordan Pakrosnis
 */
function ucfbands_event_address( $address, $location_name ) {

    // Set default values for each address key
    $address = wp_parse_args( $address, array(
        'address-1' => '',
        'address-2' => '',
        'city'      => '',
        'state'     => '',
        'zip'       => '',
    ) );

    // Get Values
    $address_1 =        esc_html( $address['address-1'] );
    $address_2 =        esc_html( $address['address-2'] );
    $address_city =     esc_html( $address['city'] );
    $address_state =    esc_html( $address['state'] );
    $address_zip =      esc_html( $address['zip'] );
    
    
    // OUTPUT ADDRESS //
    
    $address = '';
    
    
    // Check for TBA Location
    if ( $location_name != '' ) {
    
        $address .= '<address>';
        $address .= '<b>' . $location_name . '</b><br>';

        if ( $address_1 )
            $address .= $address_1 . '<br>';

        if ( $address_2 )
            $address .= $address_2 . '<br>';

        if ( $address_city )
        $address .= $address_city;

        if ( $address_state )
            $address .= ', ' . $address_state;

        if ( $address_zip )
            $address .= ' ' . $address_zip;

        $address .= '</address>';
        
    } // location_name exists
    
    else {
        $address .= 'To Be Announced';
    }
    
    
    // Return Address
    return $address;
    
} // ucfbands_event_address()
