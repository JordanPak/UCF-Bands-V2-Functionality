<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Rehearsal Schedule
 *    
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands Rehearsal: Get Meta
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_rehearsal_get_meta( $rehearsal_post ) {
    
    
    // Meta Array
    $rehearsal_meta = array();
    
    
    // Set Meta ID
    $meta_id_prefix = '_ucfbands_rehearsal_';
    
    
    // DEFAULT META //
    $rehearsal_meta['date']                         = get_post_meta( $rehearsal_post, $meta_id_prefix . 'date', true );
    $rehearsal_meta['schedule_group']               = get_post_meta( $rehearsal_post, $meta_id_prefix . 'schedule_group', true );    
    $rehearsal_meta['announcements']                = get_post_meta( $rehearsal_post, $meta_id_prefix . 'announcements', true );
    $rehearsal_meta['is_rehearsal_cancelled']       = get_post_meta( $rehearsal_post, $meta_id_prefix . 'is_rehearsal_cancelled', true );
    $rehearsal_meta['rehearsal_cancelled_message']  = get_post_meta( $rehearsal_post, $meta_id_prefix . 'rehearsal_cancelled_message', true );
    $rehearsal_meta['band']                         = get_post_meta( $rehearsal_post, $meta_id_prefix . 'band', true );
    
    // Return Meta
    return $rehearsal_meta;

} // ucfbands_rehearsal_get_meta
