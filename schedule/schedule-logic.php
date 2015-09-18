<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Schedule
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Schedule: Output Schedule
 *
 * @author Jordan Pakrosnis
 * @return string
 */
function ucfbands_output_schedule( $schedule_id ) {

    // Get Schedule Post
    $schedule_post = get_post( $schedule_id );

    // Output String
    $schedule = '';

    // Meta Array
    $schedule_meta = array();

    // Get Meta
    $schedule_meta = ucfbands_schedule_get_meta( $schedule_id );


    // Output Schedule
    return $schedule;

} // ucfbands_output_schedule()



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
    $schedule_meta['schedule_group'] = get_post_meta( $schedule_post, $meta_id_prefix . 'schedule_group', true );

    // Return Meta
    return $schedule_meta;

} // ucfbands_schedule_get_meta
