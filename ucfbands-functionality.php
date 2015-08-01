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



//================//
//  ANNOUNCEMENT  //
//================//

require_once( 'announcement/announcement-cpt.php' );
require_once( 'announcement/announcement-shortcode.php' );



//=========//
//  EVENT  //
//=========//

require_once( 'event/event-cpt.php' );
require_once( 'event/event-cmb2.php' );
require_once( 'event/event-logic.php' );
require_once( 'event/event-shortcode.php' );



//======================//
//  REHEARSAL SCHEDULE  //
//======================//

require_once( 'rehearsal-schedule/rehearsal-schedule-cpt.php' );
require_once( 'rehearsal-schedule/rehearsal-schedule-cmb2.php' );



//================//
//  STAFF MEMBER  //
//================//

require_once( 'staff-member/staff-member-cpt.php' );
require_once( 'staff-member/staff-member-cmb2.php' );



//==================//
//  SHORTCODE ONLY  //
//==================//

require_once( 'shortcode-only/button-shortcode.php' );
require_once( 'shortcode-only/content-box-shortcode.php' );
require_once( 'shortcode-only/hero-shortcode.php' );



//==============//
//  FUTURE DEV  //
//==============//

// Block
// Photo Gallery & Photo Galleries
// Pep Band & Pep Band Listing
