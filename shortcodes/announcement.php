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
    
    
    //-- WRAP --//
    $announcements_wrap_open =      '<div class="announcements-wrap">';
    $announcements_wrap_close =     '</div>';
    
    
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
    
    
    // Wrap
    $shortcode_output .= $announcements_wrap_open;
    
    
    // Heading
    $shortcode_output .= $announcements_heading;

    
    
    //-- NONE FOUND MESSAGE --//
    
    // If no matches, set the message
    if ( ($announcements->have_posts()) == false ) {
        $shortcode_output .= '<p>There are currently no announcements for this band.</p>' . $announcements_wrap_close;
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
        
        
            // Post Date
            $shortcode_output .= 
                '<span class="announcement-date"><i class="fa fa-calendar"></i>&nbsp; ' .
                mysql2date( 'F j', $announcement_post->post_date ) . '</span>';
        
        
            // Post Title
            $shortcode_output .=
                '<h5 class="announcement-title">
                <a href="' . get_permalink( $announcement ) . '">'
                    . $announcement_post->post_title .
                '</h5></a>';
    
        
            // Post Content
            $announcement_content = $announcement_post->post_content;
            $announcement_content = strip_tags($announcement_content); // Strip tags (like a's that break the content)
            $announcement_content = substr($announcement_content, 0, 100) . '...'; // Get excerpt
        
            $shortcode_output .=
                '<p><a href="' . get_permalink( $announcement ) . '">'
                    . $announcement_content . 
                '</a></p>';
        
        
        
        // End Announcement Wrap
        $shortcode_output .= '</div>';

        
    } // foreach announcements as announcement
    
    
    
    // Close Wrap
    $shortcode_output .= $announcements_wrap_close;
    
    
    // Return Output String
	return $shortcode_output;
    
} // ucfbands_shortcode_announcement()

// Register the shortcode
add_shortcode( 'announcements', 'ucfbands_shortcode_announcements' );
