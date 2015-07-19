<?php

/*
 *  UCFBands Theme Functionality
 *  Admin: Top-Level Menu
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * Add UCFBands Functionality Menu
 * Registers the top-level menu for the WP Admin Dashboard
 *
 * @author Jordan Pakrosnis
 */
function add_ucfbands_functionality_menu() {
    
    //add an item to the menu
    add_menu_page (
        'MKMC Dashboard',
        'MKMC',
        'manage_options',
        'mkmc',
        'mkmc_dashboard',
        plugin_dir_url( __FILE__ ).'icons/ucf-icon.png',
        '3.1'
    );

} // add_ucfbands_functionality_menu()

// Register the menu function
add_action( 'admin_menu', 'add_ucfbands_functionality_menu' );