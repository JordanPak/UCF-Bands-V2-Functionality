<?php

/*
 *  UCFBands Theme Functionality
 *  Admin: Dashboard
 *    
 *  @author Jordan Pakrosnis
*/


// Get Admin Styles
add_action( 'admin_enqueue_scripts', 'ucfbands_functionality_styles' );
function ucfbands_functionality_styles() {
    
    // Admin Styles
    wp_enqueue_style( 'admin-styles', plugin_dir_url( __FILE__ ) . 'ucfbands-functionality.css' );
    
} // ucfbands_functionality_styles()



// Placeholder
function ucfbands_admin_page() {
    ?>
    <div class="wrap">
        <h2>My Plugin Options</h2>
        your form and page content goes here
    </div>
    <?php
}
