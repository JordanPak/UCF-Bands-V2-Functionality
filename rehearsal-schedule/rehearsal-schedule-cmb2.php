<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Rehearsal
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Rehearsal CMB
 * Register Rehearsal CMB
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_rehearsal_metabox() {
	$prefix = '_ucfbands_rehearsal_';

    // Initialize
    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Rehearsal Details', 'cmb' ),
        'object_types'  => array( 'ucfbands_rehearsal' ),
        'context'       => 'normal',
        'priority'      => 'core',
    ) );

    // Date
    $cmb->add_field( array(
        'name' => 'Date',
        'id'   => $prefix . 'date',
        'type' => 'text_date_timestamp',
        // 'timezone_meta_key' => 'wiki_test_timezone',
        // 'date_format' => 'l jS \of F Y',
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

    // Announcements
    $cmb->add_field( array(
        'name'    => 'Announcements',
        'desc'    => 'Click "Add Row" to add multiple announcements. Announcements can be formated with <b><a href="https://help.github.com/articles/github-flavored-markdown/" target="_BLANK">GithHub Flavored Markdown</a></b>.',
        'id'      => $prefix . 'announcements',
        'type'    => 'text',
        'repeatable' => true,
    ) );    
    
    // Rehearsal Cancelled
    $cmb->add_field( array(
        'name' => 'Reherasal Cancelled',
        'desc' => 'Check to show rehearsal as cancelled',
        'id'   => $prefix . 'is_rehearsal_cancelled',
        'type' => 'checkbox'
    ) );
    
    // Cancelled Rehearsal Message
    $cmb->add_field( array(
        'name'    => 'Cancelled Rehearsal Message',
        'desc'    => 'Optional. Displays only if rehearsal is cancelled.<br>Ex: "The field is REALLY wet, yo."',
        'id'      => $prefix . 'rehearsal_cancelled_message',
        'type'    => 'text'
    ) );
    
    // Band
    $cmb->add_field( array(
        'name'     => 'Band',
        'desc'     => 'Band this rehearsal applies to',
        'id'       => $prefix . 'band',
        'taxonomy' => 'band', //Enter Taxonomy Slug
        'type'     => 'taxonomy_radio',
        'default' => 'marching-knights',
    ) );
}
add_action( 'cmb2_init', 'ucfbands_rehearsal_metabox' );
