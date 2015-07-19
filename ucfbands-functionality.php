<?php
/*
Plugin Name: UCFBands Theme Functionality
Plugin URI:  http://ucfbands.com/
Description: Custom post types, shortcodes, and other functionality for the UCFBands Genesis child theme.
Version:     2.0
Author:      Jordan Pakrosnis
Author URI:  http://JordanPak.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


//===================//
//  DASHBOARD SETUP  //
//===================//

// Admin CSS
add_action( 'admin_enqueue_scripts', 'ucfbands_functionality_styles' );
function ucfbands_functionality_styles() {
    
    // Only load on Functionality Dashboard
    if ( 'ucfbands.php' != $hook ) {
        return;
    }
    
    // Admin Styles
    wp_enqueue_style( 'admin-styles', plugin_dir_url( __FILE__ ) . 'admin/style.css' );
    
} // ucfbands_functionality_styles()

#adminmenu .wp-menu-image img


// Admin Menu
require_once( 'admin/admin-menu.php' );



//=====================//
//  CUSTOM POST TYPES  //
//=====================//

// Announcement
require_once( 'cpts/announcement.php' );

// Staff Member
//require_once( 'cpts/staff-member.php' );

// Event
//require_once( 'cpts/event.php' );

// Rehearsal Schedule
//require_once( 'cpts/rehearsal-schedule.php' );

// Photo Gallery (TBA)
//require_once( 'cpts/photo-gallery.php' );

// Pep Band (TBA)
//require_once( 'cpts/pep-band.php' );



//==============//
//  SHORTCODES  //
//==============//


//-- GENERAL --//

// Button
//require_once( 'shortcodes/button.php' );


// Content Box
//require_once( 'shortcodes/content-box.php' );

// Block
//require_once( 'shortcodes/block.php' );

// Hero (Bootstrap Jumbotron-like thing)
//require_once( 'shortcodes/hero.php' );


//-- CPT-BASED --//

// Announcement & Announcements Listing
//require_once( 'shortcodes/announcement.php' );

// Staff Member Listing
//require_once( 'shortcodes/staff-member.php' );

// Event & Events Listing
//require_once( 'shortcodes/event.php' );

// Rehearsal Listings
//require_once( 'shortcodes/rehearsal.php' );

// Photo Gallery & Photo Galleries (TBA)
//require_once( 'shortcodes/photo-gallery.php' );

// Pep Band & Pep Band Listing (TBA)
//require_once( 'shortcodes/pep-band.php' );
