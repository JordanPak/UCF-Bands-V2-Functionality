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
        'UCF Bands',
        'UCF Bands',
        'manage_options',
        'ucfbands',
        'ucfbands_admin_page',
        plugin_dir_url( __FILE__ ).'icons/ucf-icon.png',
        '23.56'
    );

} // add_ucfbands_functionality_menu()

// Register the menu function
add_action( 'admin_menu', 'add_ucfbands_functionality_menu' );




// Placeholder
function ucfbands_admin_page() {
    ?>
    <div class="wrap">
        <h2>My Plugin Options</h2>
        your form and page content goes here
    </div>
    <?php
}