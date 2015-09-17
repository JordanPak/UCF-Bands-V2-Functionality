<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Schedule
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Schedule
 * Register Schedule CMB
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_schedule_metabox() {
	$prefix = '_ucfbands_schedule_';

    // Initialize
    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Schedule Details', 'cmb' ),
        'object_types'  => array( 'ucfbands_schedule' ),
        'context'       => 'normal',
        'priority'      => 'core',
    ) );

    // Schedule Group
    $group_field_id = $cmb->add_field( array(
        'id'          => $prefix . 'schedule_group',
        'name'        => 'Schedule',
        'type'        => 'group',
        'description' => __( 'Add Schedule List Items. Items and sub-items can be formated with <b><a href="https://help.github.com/articles/github-flavored-markdown/" target="_BLANK">GithHub Flavored Markdown</a></b>.', 'cmb' ),
        'options'     => array(
            'group_title'   => __( 'Item {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Schedule Item', 'cmb' ),
            'remove_button' => __( 'Remove Schedule Item', 'cmb' ),
            'sortable'      => true // beta
        ),
    ) );

    // Schedule Group: Listing Time
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Time',
        'id'   => 'time',
        'type' => 'text_time',
        'time_format' => 'g:i a',
    ) );

    // Schedule Group: Listing Thing
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Thing',
        'id'   => 'thing',
        'type' => 'text',
    ) );

    // Schedule Group: Sub-Item
    $cmb->add_group_field( $group_field_id, array(
        'name' => 'Sub-Items (Optional)',
        'id'   => 'sub_item',
        'type' => 'text',
        'repeatable' => true,
    ) );
	
}

add_action( 'cmb2_init', 'ucfbands_schedule_metabox' );
