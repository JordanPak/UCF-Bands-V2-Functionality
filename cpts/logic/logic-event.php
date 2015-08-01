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



/**
 * UCFBands Event: None Found
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_none_found( $events_band ) {

    
    // Output String
   $none_found = '';

        
    // Get Band Name
    $events_band_name = get_term_by( 'slug', $events_band, 'band')->name;
    
    
    // Message Wrap Open
    $none_found .= '<br><div class="block entry"><p>';
    

        // If "all-bands", just do "There are currently no announcements"
        if ( strtolower($events_band_name) != 'all bands')
            $none_found .= 'There are currently no events for the ' . $events_band_name . '.';


        // If "All Bands"
        else
            $none_found .= 'There are currently no events.';

    
    // Message Wrap Close
    $none_found .= '</p></div>';
    
    
    // Return None Found string
    return $none_found;
    
    
} // ucfbands_event_none_found



/**
 * UCFBands Event: Get Meta
 * 
 * Default Meta
 *      - Title
 *      - Date(s) / Time
 *      - Location
 *      - Band / Icon BG
 *
 * Optional Meta
 *      - Google Map Iframe
 *      - Schedule
 *      - Program w/ Guest
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_get_meta( $event, $google_map = false, $schedule = false, $program = false ) {
    
    
    // Meta Array
    $event_meta = array();
    
    
    // Set Meta ID
    $meta_id_prefix = '_ucfbands_event_';
    
    
    // DEFAULT META //
    
    // Date/Time
    $event_meta['is_all_day_event']         = get_post_meta( $event, $meta_id_prefix . 'is_all_day_event', true );
    $event_meta['start_date_time']          = get_post_meta( $event, $meta_id_prefix . 'start_date_time', true );
    $event_meta['finish_date_time']         = get_post_meta( $event, $meta_id_prefix . 'finish_date_time', true );
    $event_meta['is_time_tba']              = get_post_meta( $event, $meta_id_prefix . 'is_time_tba', true );
    $event_meta['show_finish_time']         = get_post_meta( $event, $meta_id_prefix . 'show_finish_time', true );
    
    // Location
    $event_meta['location_name']            = get_post_meta( $event, $meta_id_prefix . 'location_name', true );
    
    // Icon/Band
    $event_meta['icon_background_color']    = get_post_meta( $event, $meta_id_prefix . 'icon_background_color', true );
    
    // Tickets
    $event_meta['ticket_price']             = get_post_meta( $event, $meta_id_prefix . 'ticket_price', true );
    $event_meta['ticket_link']              = get_post_meta( $event, $meta_id_prefix . 'ticket_link', true );
    
    
    // OPTIONAL META //
    
    // Google Map
    if ( $google_map ) {
        $event_meta['location_google_map']  = get_post_meta( $event, $meta_id_prefix . 'location_google_map', true );
        $event_meta['location_google_map_longitude'] = get_post_meta( $event, $meta_id_prefix . 'location_google_map_longitude', true );
        $event_meta['location_google_map_latitude'] = get_post_meta( $event, $meta_id_prefix . 'location_google_map_latitude', true );
        
        // Address
        $event_meta['location_address']     = get_post_meta( $event, $meta_id_prefix . 'location_address', 1 );
        
    } // if google_map
    
    // Schedule
    if ( $schedule )
        $event_meta['schedule_group']       = get_post_meta( $event, $meta_id_prefix . 'schedule_group', true );
        
    // Program
    if ( $program ) {
        
        $event_meta['program_group']        = get_post_meta( $event, $meta_id_prefix . 'program_group', true );
        
        $event_meta['program_guest_composer']   = get_post_meta( $event, $meta_id_prefix . 'program_guest_composer', true );
    
    } // program
    
    
    // Return Meta
    return $event_meta;

} // ucfbands_event_none_found



/**
 * UCFBands Event: Parse Address
 * 
 * @author Jordan Pakrosnis
 */
function ucfbands_event_address( $address, $location_name ) {

    // Set default values for each address key
    $address = wp_parse_args( $address, array(
        'address-1' => '',
        'address-2' => '',
        'city'      => '',
        'state'     => '',
        'zip'       => '',
    ) );

    // Get Values
    $address_1 =        esc_html( $address['address-1'] );
    $address_2 =        esc_html( $address['address-2'] );
    $address_city =     esc_html( $address['city'] );
    $address_state =    esc_html( $address['state'] );
    $address_zip =      esc_html( $address['zip'] );
    
    
    // OUTPUT ADDRESS //
    
    $address = '';
    
    
    // Check for TBA Location
    if ( $location_name != '' ) {
    
        $address .= '<address>';
        $address .= '<b>' . $location_name . '</b><br>';

        if ( $address_1 )
            $address .= $address_1 . '<br>';

        if ( $address_2 )
            $address .= $address_2 . '<br>';

        if ( $address_city )
        $address .= $address_city;

        if ( $address_state )
            $address .= ', ' . $address_state;

        if ( $address_zip )
            $address .= ' ' . $address_zip;

        $address .= '</address>';
        
    } // location_name exists
    
    else {
        $address .= 'To Be Announced';
    }
    
    
    // Return Address
    return $address;
    
} // ucfbands_event_address()



/**
 * UCFBands Event: Date Badge
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_date_badge( $start_date_time, $finish_date_time, $icon_background_color ) {
    
    
    // Date Badge Output
    $date_badge = '';
    
    
    // CONVERT TO TIME STRINGS //
    $start_month	   = date( 'M', $start_date_time );
    $start_day  	   = date( 'j', $start_date_time );
    $finish_month      = date( 'M', $finish_date_time );
    $finish_day        = date( 'j', $finish_date_time );
    
    
    
    // LOGIC //
    
    // Background Color
    $color = ' date-badge-' . $icon_background_color;
    
    
    // Month
    if ( $start_month == $finish_month )
        $month = $start_month;
    
    else
        $month = $start_month . ' / ' . $finish_month;

    $month = '<span class="month">' . $month . '</span><br>';
    
    
    // Day
    if ( $start_day == $finish_day ) {
        $day = $start_day;
        $day_class = '';   
    }
    
    else {
        $day = $start_day . ' - ' . $finish_day;
        $day_class = ' day-multi';
    }
    
    $day = '<span class="day' . $day_class . '">' . $day . '</span>';
        
    
    
    // OUTPUT BADGE //
    
    // Open Wrapper
    $date_badge .= '<div class="date-badge' . $color . '">';
    
        
        // Month
        $date_badge .= $month;
        
        // Day
        $date_badge .= $day;
    
    
    // Close Badge Wrapper
    $date_badge .= '</div>';
    
    
    
    // Return Date Badge string
    return $date_badge;

} // ucfbands_event_none_found



/**
 * UCFBands Event: Time
 *
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_time( $is_all_day_event, $start_date_time, $finish_date_time, $is_time_tba, $show_finish_time ) {

    
    // Time Output
    $time = '';
    
    
    // CONVERT TO TIME STRINGS //
    $start_month	= date( 'M', $start_date_time );
    $start_day  	= date( 'j', $start_date_time );
    $start_time 	= date( 'g:i A', $start_date_time );
    
    $finish_month      = date( 'M', $finish_date_time );
    $finish_day        = date( 'j', $finish_date_time );
    $finish_time       = date( 'g:i A', $finish_date_time );
    
    
    
    // LOGIC //
    
    // TBA Time
    if ( $is_time_tba )
        $time_logic = 'TBA';
    
    // Daily Time
    else if ( $is_all_day_event ) 
        $time_logic = 'Daily';
    
    // NOT TBA or Daily; Do start/finish
    else {
        
        // Start Time
        $time_logic = $start_time;
        
        // End Time, as needed
        if ( $show_finish_time )
            $time_logic .= ' - ' . $finish_time;
        
        
    } // Not TBA
    
    
    
    // OUTPUT //
    
    
    // Wrapper
    $time .= '<span class="event-time">';
    

        // Time Icon
        $time .= '<i class="fa fa-clock-o"></i> ';


        // Insert Time Logic
        $time .= $time_logic;
    
    
    // Close Wrapper
    $time .= '</span>';
    
    
    // Return Time String
    return $time;
    
} // ucfbands_event_time()



/**
 * UCFBands Event: Listing
 *
 * For use on shortcode, archive, and other pages.
 * 
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_events_listing( $events, $is_archive = false ) {

    
    // Events Listing Output String
    $events_listing = '';
    
    

    //-- GET POSTS --//

    // Get the queried posts
    $events = $events->get_posts();


    //-- LOOP --//
    foreach( $events as $event ) {

        
        // Get Current Post
        $event_post = get_post( $event );


        // Get "Default" event meta (params get what we want)
        $event_meta = ucfbands_event_get_meta( $event );


        // Event Location Logic
        $location = '<span class="location">';

            if ( $event_meta['location_name'] == '' )
                $location .= 'TBA';

            else
                $location .= '<a href="' . get_permalink( $event ) .'" title="Location Details" rel="Location Details">' . $event_meta['location_name'] . '</a>';


        $location .= '</span>';



        // ENTRY WRAPPER //
        
        // If Archive
        if ( $is_archive )
            $events_listing .= '<div class="entry-wrapper masonry-block masonry-block-size--one-third">';
        else
            $events_listing .= '<div class="entry-wrapper clearfix">';


            // Date(s)
            $events_listing .= ucfbands_event_date_badge(
                $event_meta['start_date_time'],
                $event_meta['finish_date_time'],
                $event_meta['icon_background_color']
            );            


            // More Info Icon
            $events_listing .= '<span class="more-info">';
            $events_listing .= '<a href="' . get_permalink( $event ) .'" title="Event Details" rel="Event Details">';
            $events_listing .= '<span class="event-details">Event Details </span>';
            $events_listing .= '<i class="fa fa-info-circle fa-lg"></i></a></span>';


            // Right-Info Wrapper
            $events_listing .= '<div class="right-info">';


                // Title
                $events_listing .= '<h4 class="event-title"><a href="' . get_permalink( $event ) . '" title="Event Details" rel="See Event Details">';
                    $events_listing .= $event_post->post_title;
                $events_listing .= '</a></h4>';


                    // Time/Daily/TBA
                    $events_listing .= ucfbands_event_time(
                        $event_meta['is_all_day_event'],
                        $event_meta['start_date_time'],
                        $event_meta['finish_date_time'],
                        $event_meta['is_time_tba'],
                        $event_meta['show_finish_time']
                    );


                    // Divider
                    $events_listing .= '<br>';


                    // Location
                    $events_listing .= '<i class="fa fa-map-marker"></i> ' .  $location;


            // Right-Info Wrapper Close
            $events_listing .= '</div>';
        
        
            // If Archive & has details, Show Details Excerpt
            if ( $is_archive && ($event_post->post_content != '') ) {
            
                
                // Events listing HR & Details Excerpt
                $events_listing .= '<hr><div class="event-details-excerpt">';
                
                
                    // Get "Excerpt" content from content
                    $event_content = substr($event_post->post_content, 0, 250); // Get excerpt

                    $events_listing .= '<p>' . $event_content . ' | <a href="' . get_permalink( $event ) . '">More Details...</a></p>';
                
                
                // Close excerpt tag
                $events_listing .= '</div>';
                
                
            } // Show Details Excerpt


        // Close Entry Wrapper
        $events_listing .= '</div>';


    } // foreach event
    
    
 
    // Return Events Listing String
    return $events_listing;

} // ucfbands_events_listing();




/**
 * UCFBands Event: Google Map
 *
 * Outputs Google Map with Marker at Event Location
 * 
 * @author Jordan Pakrosnis
 * @return string 
 */
function ucfbands_event_google_map( $latitude, $longitude ) {
    
    //-- NOTE: GOOGLE MAPS API MUST ALREADY BE LOADED! --//
    
    // Set Coordinates
    $coordinates = $latitude . ',' . $longitude;
    
    ?>

    <script>
        var myCenter=new google.maps.LatLng(<?php echo $coordinates; ?>);

        function initialize()
        {
        var mapProp = {
          center:myCenter,
          zoom:16,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          mapTypeControlOptions: {
            style:google.maps.MapTypeControlStyle.SMALL
          },
          };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
          position:myCenter,
          });

        marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <div id="googleMap" style="width:100%; height:250px;"></div>


    <?php 
    
} // ucfbands_event_google_map();