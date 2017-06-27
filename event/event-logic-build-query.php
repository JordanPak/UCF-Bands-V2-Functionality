<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Event: Build Query
 *
 * @author Jordan Pakrosnis
 * @return Event Query
 */
function ucfbands_event_query( $num_events, $band ) {


    // Taxonomy Query //
    $tax_query = array(
        array(
            'taxonomy'  => 'band',
            'field'     => 'slug',
            'terms'     => $band,
        ),
    );


    // Meta Query Args
	// Only get events that haven't passed!
	$meta_query = array(
		'relation'	=>	'AND',
		array(
			'key'		=>	'_ucfbands_event_finish_date_time',
			'value'		=>	time(),
			'compare'	=>	'>'
		)
	);


    // Event Query Args
    $events_args = array(
        'post_type'         => 'ucfbands_event',
        'tax_query'         => $tax_query,
        'fields'            => 'ids',
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC',
        'post_count'        => $num_events,
        'posts_per_page'    => $num_events,
        'meta_key'          => '_ucfbands_event_start_date_time',
        'meta_query'        => $meta_query
    );

    // Query/Get Post IDs
    $events = new WP_Query( $events_args );


    // Return the events
    return $events;

} // ucfbands_event_query()
