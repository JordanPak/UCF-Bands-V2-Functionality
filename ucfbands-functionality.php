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


//==================//
//  BANDS TAXONOMY  //
//==================//

// Register Bands Taxonomy
require_once( 'bands.php' );


//===================//
//  DASHBOARD SETUP  //
//===================//

// Global Admin Styles
require_once( 'admin/styles/global.php' );

// Admin Menu
//require_once( 'admin/menu.php' );

// Admin Dashboard
//require_once( 'admin/dashboard.php' );


//=====================//
//  CUSTOM POST TYPES  //
//=====================//

// Announcement
require_once( 'cpts/announcement.php' );

// Staff Member
require_once( 'cpts/staff-member.php' );

// Event
require_once( 'cpts/event.php' );

// Rehearsal Schedule
require_once( 'cpts/rehearsal-schedule.php' );

// Photo Gallery (TBA)
//require_once( 'cpts/photo-gallery.php' );

// Pep Band (TBA)
//require_once( 'cpts/pep-band.php' );



//==============//
//  SHORTCODES  //
//==============//


//-- GENERAL --//

// Button
require_once( 'shortcodes/button.php' );

// Content Box
require_once( 'shortcodes/content-box.php' );

// Hero (Bootstrap Jumbotron-like thing)
require_once( 'shortcodes/hero.php' );

// Block (TBA)
//require_once( 'shortcodes/block.php' );


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
