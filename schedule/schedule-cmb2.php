<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Schedule
 *
 *  @author Jordan Pakrosnis
*/



/**
 * UCFBands CPT: Schedule
 * Shortcode Metabox
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_schedule_shortcode_metabox() {

	global $post;

   	// Get the data
   	$id = $post->ID;

   	echo '<code style="display: inline-block; margin-top: 5px; padding: 12px 20px;">[schedule id=\'' . $id . '\']</code>';
	echo '<p>Use this shortcode in a box to display the schedule.</p>';

} // ucfbands_schedule_shortcode_metabox()

function ucfbands_schedule_display_shortcode_metabox() {
	add_meta_box('projects_refid', 'Schedule Shortcode', 'ucfbands_schedule_shortcode_metabox', 'ucfbands_schedule', 'side');
}
add_action('add_meta_boxes', 'ucfbands_schedule_display_shortcode_metabox');



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


	// Schedule Download
	$cmb->add_field( array(
	    'name'    => 'Schedule Download',
	    'desc'    => 'Upload a PDF or enter an URL. Download button will only display if checked below.',
	    'id'      => $prefix . 'file_download',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        // 'url' => false, // Hide the text input for the url
	        'add_upload_file_text' => 'Upload PDF' // Change upload button text. Default: "Add or Upload File"
	    ),
	) );

	// Download Button
	$cmb->add_field( array(
	    'name'    => 'Remove Download Button',
	    'desc'    => '<br><b>Only applies if file entered</b>. Will be removed from the schedule globally.<br>However, it can still be removed from an individual shortcode by adding button="no" attribute (Ex: <code style="font-style: normal;">[schedule id=\'10\' download=\'no\']</code>).',
	    'id'      => $prefix . 'remove_download_button',
	    'type'    => 'checkbox',
	) );

	// Attach to Event
	$cmb->add_field( array(
	    'name'        => __( 'Attach to Event' ),
	    'id'          => $prefix . 'attached_event',
	    'type'        => 'post_search_text', // This field type
	    // post type also as array
	    'post_type'   => 'ucfbands_event',
	    // Default is 'checkbox', used in the modal view to select the post type
	    'select_type' => 'radio',
	    // Will replace any selection with selection from modal. Default is 'add'
	    'select_behavior' => 'replace',
		'description' => '<b>Optional</b>. Click search icon, then find the event. The event\'s ID will be entered.',
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
