<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Staff
 *    
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands Staff: Get Meta
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_staff_get_meta( $staff_post ) {
    
    
    // Meta Array
    $staff_meta = array();
    
    
    // Set Meta ID
    $meta_id_prefix = '_ucfbands_staff_member_';
    
    
    // DEFAULT META //
    $staff_meta['is_faculty']   = get_post_meta( $staff_post, $meta_id_prefix . 'is_faculty', true );
    $staff_meta['position']     = get_post_meta( $staff_post, $meta_id_prefix . 'position', true );
    $staff_meta['email']        = get_post_meta( $staff_post, $meta_id_prefix . 'email', true );
    $staff_meta['phone']        = get_post_meta( $staff_post, $meta_id_prefix . 'phone', true );
    $staff_meta['biography']    = get_post_meta( $staff_post, $meta_id_prefix . 'biography', true );
    
    
    // Return Meta
    return $staff_meta;

} // ucfbands_staff_get_meta
