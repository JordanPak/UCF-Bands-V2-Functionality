<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

function clear_events_transients( $post_id, $post, $update ){
	// If this is just a revision, don't clear transients
	if ( wp_is_post_revision( $post_id ) ){
		return;
	}

    	// If this isn't a event post, don't update it.
    	if ( 'ucfbands_event' != $post->post_type ) {
     	   return;
    	}

	delete_transient( 'ucf' . $meta_id_prefix .  $event . '__get_meta_both' );	
	delete_transient( 'ucf' . $meta_id_prefix .  $event . '__get_meta_schedule' );	
	delete_transient( 'ucf' . $meta_id_prefix .  $event . '__get_meta_program' ); 
	delete_transient( 'ucf' . $meta_id_prefix .  $event . '__get_meta_none' ); 
}
add_action( 'save_post', 'clear_events_transients', 10, 3 );
