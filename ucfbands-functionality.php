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


//====================//
//  CPT REGISTRATION  //
//====================//

// Announcement
require_once( 'cpts/register/register-announcement.php' );

// Staff Member
require_once( 'cpts/register/register-staff-member.php' );

// Event
require_once( 'cpts/register/register-event.php' );

// Rehearsal Schedule
require_once( 'cpts/register/register-rehearsal-schedule.php' );

// Photo Gallery (TBA)
//require_once( 'cpts/register/register-photo-gallery.php' );

// Pep Band (TBA)
//require_once( 'cpts/register/register-pep-band.php' );



//=============//
//  CPT LOGIC  //
//=============//

// Events
require_once( 'cpts/logic/logic-event.php' );



//==============//
//  SHORTCODES  //
//==============//


//-- GENERAL --//

// Button
require_once( 'shortcodes/shortcode-button.php' );

// Content Box
require_once( 'shortcodes/shortcode-content-box.php' );

// Hero (Bootstrap Jumbotron-like thing)
require_once( 'shortcodes/shortcode-hero.php' );

// Block (TBA)
//require_once( 'shortcodes/shortcode-block.php' );


//-- CPT-BASED --//

// Announcement & Announcements Listing
require_once( 'shortcodes/shortcode-announcement.php' );

// Staff Member Listing
//require_once( 'shortcodes/shortcode-staff-member.php' );

// Event & Events Listing
require_once( 'shortcodes/shortcode-event.php' );

// Rehearsal Listings
//require_once( 'shortcodes/shortcode-rehearsal.php' );

// Photo Gallery & Photo Galleries (TBA)
//require_once( 'shortcodes/shortcode-photo-gallery.php' );

// Pep Band & Pep Band Listing (TBA)
//require_once( 'shortcodes/shortcode-pep-band.php' );
