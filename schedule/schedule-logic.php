<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Schedule
 *
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands Schedule: Get Meta
 *
 * @author Jordan Pakrosnis
 * @return string
 */
function ucfbands_schedule_get_meta( $schedule_post ) {

    // Meta Array
    $schedule_meta = array();

    // Set Meta ID
    $meta_id_prefix = '_ucfbands_schedule_';

    // DEFAULT META //
    $rehearsal_meta['schedule_group'] = get_post_meta( $schedule_post, $meta_id_prefix . 'schedule_group', true );

    // Return Meta
    return $schedule_meta;

} // ucfbands_schedule_get_meta
