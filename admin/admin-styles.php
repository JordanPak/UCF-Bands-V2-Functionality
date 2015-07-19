<?php

/*
 *  UCFBands Theme Functionality
 *  Admin: Styles
 *    
 *  @author Jordan Pakrosnis
*/

add_action( 'admin_enqueue_scripts', 'ucfbands_functionality_styles' );
function ucfbands_functionality_styles() {
    
    // Only load on Functionality Dashboard
//    if ( 'ucfbands.php' != $hook ) {
//        return;
//    }
    
    // Admin Styles
    wp_enqueue_style( 'admin-styles', plugin_dir_url( __FILE__ ) . 'admin/ucfbands-functionality.css' );
    
} // ucfbands_functionality_styles()