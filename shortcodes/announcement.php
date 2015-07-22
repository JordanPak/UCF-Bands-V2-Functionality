<?php
/*
 *  UCFBands Theme Functionality
 *  Shortcode: Announcements
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Shortcode: Announcements
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_shortcode_announcements( $atts ) {
    
    
    //-- ATTRIBUTES --//
	$atts = shortcode_atts( array(
        'num'       => '3',     // Number of announcements to show
        'heading'   => '',      // Show "Announcements" Heading
        'button'    => '',      // Show "View All" Button next to heading
        'band'      => '',      // Slug for band in Band taxonomy
	), $atts, 'announcements' );

    
    
    //-- SET VARS --//
    
    // Attributes
    $announcements_num =        $atts['num'];
    $announcements_heading =    $atts['heading'];
    $announcements_button =     $atts['button'];
    $announcements_band =       $atts['band'];
    
    // Helpers
    $announcements =            ''; // WP_Query()
    $no_announcements_found =   '';
    
    // Output
    $shortode_output = '';
    
    
    
    //=========//
    //  LOGIC  //
    //=========//
    
    
    //-- HEADING --//
    
    // If no heading, don't do block title or button
    if ($announcements_heading != 'no') {
        
        // Block Button
        if ($announcements_button != 'no') {
            $announcements_button = ' <a class="button button-xsm button-white" href="' . get_site_url() . '/announcements' . '">View All</a>';
        }
    
        // Set Block Title
        $announcements_heading = '<h2 class="block-title">Announcements' . $announcements_button . '</h2>';
        
    } // if announcements_heading isn't "no"
    
    
    
    //-- CPT QUERY --//
    
    // Query Options
    $announcements_args = array(
        'post_type'         => 'announcement',
        'category_name'     => $announcements_band,
        'fields'            => 'ids',
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC',
        'post_count'        => $announcements_num,
        'posts_per_page'    => $announcements_num,
    );
    
    // Query/Get Post IDs
    $announcements = new WP_Query( $announcements_args );
    
    
    
    //==========//
    //  OUTPUT  //
    //==========//
    
    
    // Heading
    $shortcode_output .= $announcements_heading;

    
    
    //-- NONE FOUND MESSAGE --//
    
    // If no matches, set the message
    if ( ($announcements->have_posts()) == false ) {
        $shortcode_output .= '<p>There are currently no announcements for this band.</p>';
        return $shortcode_output;
    }
    
    
    
    //-- GET POSTS & META -//
    
    // Get the queried posts
    $announcements = $announcements->get_posts();
    
    
    
    //-- POST LOOP --//
    foreach($announcements as $announcement) {
        
        
        // Get Current Post
        $announcement_post = get_post($announcement);
        
        
        // Start Announcement Wrap
        $shortcode_output .= '<div class="announcement-wrap">';
        
            
            // Get & Output Post Title
            $shortcode_output .=
                '<h5 class="announcement-title">
                <a href="' . get_permalink( $announcement ) . '">'
                    . $announcement_post->post_title .
                '</h5></a>';
        
        
            // Get & Output Post Content
            $announcement_content = $announcement_post->post_content;
            $shortcode_output .= '<p>' . $announcement_content . '</p>';
        
        
        
        // End Announcement Wrap
        $shortcode_output .= '</div>';

        
    } // foreach announcements as announcement
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_announcement()

// Register the shortcode
add_shortcode( 'announcements', 'ucfbands_shortcode_announcements' );
