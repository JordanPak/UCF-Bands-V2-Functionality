<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Rehearsal Schedules
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Rehearsal Schedules
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_rehearsals( $atts ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'band'      => 'all-bands', // Slug for band in Band taxonomy
	), $atts, 'rehearsals' );

    
    
    //-- SET VARS --//
    
    // Attributes
    $rehearsals_band =       $atts['band'];
    
    // Helpers
    $rehearsals =            ''; // WP_Query()
    $no_rehearsals_found =   '';
    
    // Output
    $shortcode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//
    
    
    //-- WRAP --//
    $rehearsals_wrap_open =      '<div class="rehearsals-wrap">';
    $rehearsals_wrap_close =     '</div>';
    
    
    //-- HEADING --//
    
    // Set Block Title
    $rehearsals_heading = '<h2 class="block-title">Rehearsal Schedules</h2>';
    
    
    
    //-- CPT QUERY --//
    
	
    // Preparing the query for rehearsals
    // Only get rehearsals that haven't passed!
    $meta_quer_args = array(
        'relation'	=>	'AND',
        array(
            'key'		=>	'_ucfbands_rehearsal_date',
            'value'		=>	time(),
            'compare'	=>	'>'
        )
    );


    // Query Options
    $rehearsals_args = array(
        'post_type'		=> 'ucfbands_rehearsal',
        'fields' 		=> 'ids', // This is so only the ID is returned instead of the WHOLE post object (Performance)
        'meta_key'		=> '_ucfbands_rehearsal_date',
        'orderby' 		=> 'meta_value_num',
        'order' 		=> 'ASC',
        'post_count'	=> 3,
        'posts_per_page'=> 3,
        'meta_query'	=> $meta_quer_args
    );    

    
    // Query/Get Post IDs
    $rehearsals = new WP_Query( $rehearsals_args );
    

    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    
    // Wrap
    $shortcode_output .= $rehearsals_wrap_open;
    
    
    // Heading
    $shortcode_output .= $rehearsals_heading;

    
    
    //-- NONE FOUND MESSAGE --//
    
    // If no matches, set the message
    if ( ($rehearsals->have_posts()) == false ) {
        
        // Get Band Name
        $rehearsals_band_name = get_term_by( 'slug', $rehearsals_band, 'band')->name;
        
        // If "all-bands", just do "There are currently no announcements"
        if ( strtolower($rehearsals_band_name) != 'all bands') {
        
            // None Found Message
            $shortcode_output .=
                '<p>There are currently no rehearsal schedules found for the ' . $rehearsals_band_name . '.<br>Please note this does not mean any rehearsals are cancelled.</p>' . $rehearsals_wrap_close;
            
            
        } // If not "All Bands"
        
        // If "All Bands"
        else {
            $shortcode_output .= '<p>There are currently no rehearsal schedules. Please note this does not mean any rehearsals are cancelled.</p>' . $rehearsals_wrap_close;
        }
        
        // Finish Shortcode FN with output.
        return $shortcode_output;
    
    } // If None Found
    
    
    
    
    //-- GET POSTS & META -//
    
    // Get the queried posts
    $rehearsals = $rehearsals->get_posts();
    
    
    
    // Open Accordion Container
    $shortcode_output .= '<div class="accordion">';
    
    
        //-- POST LOOP --//
        foreach($rehearsals as $rehearsal) { // $announcement is just the ID


            // Get Current Post
            $rehearsal_post = get_post( $rehearsal );
            
            
            // Get Rehearsal Meta
            $rehearsal_meta = ucfbands_rehearsal_get_meta( $rehearsal );
            
            
            // Convert Date to Actual Date
            $rehearsal_date = $rehearsal_meta['date'];
            $rehearsal_date = date( 'l, M jS', $rehearsal_date );
            

            // Start Announcement Wrap
    //        $shortcode_output .= '<div class="rehearsal-wrap">';


                // Date
                $shortcode_output .= '<h5 class="rehearsal-date">' . $rehearsal_date . '</h5>';


                // Accordion Content Div
                $shortcode_output .= '<div>';

                    

                // Close Accordion Content Div
                $shortcode_output .= '</div>';


            // End rehearsal Wrap
    //        $shortcode_output .= '</div>';


        } // foreach rehearsals as rehearsal

    
    // Close Accordion Container
    $shortcode_output .= '</div>';
    
    
    // Close Wrap
    $shortcode_output .= $rehearsals_wrap_close;
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_rehearsals()


// Register the shortcode
add_shortcode( 'rehearsals', 'ucfbands_shortcode_rehearsals' );
