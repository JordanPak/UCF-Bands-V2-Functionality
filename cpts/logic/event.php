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
    
    // Event Query Args
    $events_args = array(
        'post_type'         => 'event',
        'tax_query'         => $tax_query,
        'fields'            => 'ids',
        'orderby'           => 'meta_value_num',
        'order'             => 'DSC',
        'post_count'        => $events_num,
        'posts_per_page'    => $events_num,
    );
    
    // Query/Get Post IDs
    $events = new WP_Query( $events_args );
    
} // ucfbands_event_query()
