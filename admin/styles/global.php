<?php

/*
 *  UCFBands Theme Functionality
 *  Admin: Global Admin Styles
 *    
 *  @author Jordan Pakrosnis
*/


// Get MKMC Dashboard Styles
add_action( 'admin_enqueue_scripts', 'ucfbands_admin_styles' );
function ucfbands_admin_styles() {
    
    // Admin Styles
    wp_enqueue_style( 'admin-styles', plugin_dir_url( __FILE__ ) . 'global.css' );
    
} // ucfbands_admin_styles()