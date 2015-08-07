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
    
    
    // Taxonomy Query
    $tax_query = array(
        array(
            'taxonomy'  => 'band',
            'field'     => 'slug',
            'terms'     => $rehearsals_band,
        ),
    );
    
    // Query Options
    $rehearsals_args = array(
        'post_type'         => 'ucfbands_rehearsal',
        'tax_query'         => $tax_query,
        'fields'            => 'ids',
        'orderby'           => 'meta_value_num',
        'order'             => 'DSC',
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
        
        
        // Start Announcement Wrap
//        $shortcode_output .= '<div class="rehearsal-wrap">';
        
        
            // Post Title
            $shortcode_output .= '<h5 class="rehearsal-title">' . $rehearsal_post->post_title . '</h5>';
        
        
            // Accordion Content Div
            $shortcode_output .= '<div>';
        
        
        
            // Close Accordion Content Div
            $shortcode_output .= '</div>';
    
        
        // End rehearsal Wrap
//        $shortcode_output .= '</div>';

        
    } // foreach rehearsals as rehearsal
    
    
    // Close Accordion Container
    $shortcode_output .= '</div>';
    
    
    $shortcode_output .= '<br><br><br><br><div class="accordion">
  <h3>Section 1</h3>
  <div>
    <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget.
    Integer ut neque. Vivamus nisi metus, molestie vel, gravida in,
    condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros.
    Nam mi. Proin viverra leo ut odio.</p>
  </div>
  <h3>Section 2</h3>
  <div>
    <p>Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus.
    Vivamus hendrerit, dolor aliquet laoreet, mauris turpis velit,
    faucibus interdum tellus libero ac justo.</p>
  </div>
  <h3>Section 3</h3>
  <div>
    <p>Nam enim risus, molestie et, porta ac, aliquam ac, risus.
    Quisque lobortis.Phasellus pellentesque purus in massa.</p>
    <ul>
      <li>List item one</li>
      <li>List item two</li>
      <li>List item three</li>
    </ul>
  </div>
</div>
 ';
    
    // Close Wrap
    $shortcode_output .= $rehearsals_wrap_close;
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_rehearsals()


// Register the shortcode
add_shortcode( 'rehearsals', 'ucfbands_shortcode_rehearsals' );
