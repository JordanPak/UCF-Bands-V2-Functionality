<?php

/*
 *  UCFBands Theme Functionality
 *  Admin: Dashboard
 *    
 *  @author Jordan Pakrosnis
*/


// Get MKMC Dashboard Styles
add_action( 'admin_enqueue_scripts', 'mkmc_dashboard_styles' );
function mkmc_dashboard_styles() {
    
    // Admin Styles
    wp_enqueue_style( 'admin-styles', plugin_dir_url( __FILE__ ) . 'styles/dashboard.css' );
    
} // mkmc_dashboard_styles()



// Placeholder
function mkmc_dashboard() {
    
    ?>


    <!-- WP ADMIN PAGE WRAP -->
    <div class="wrap">
        
        <h2>MKMC Dashboard</h2>
        
        There's gonna be stuff here!
    
    </div><!-- /.wrap -->


    <?php
}
