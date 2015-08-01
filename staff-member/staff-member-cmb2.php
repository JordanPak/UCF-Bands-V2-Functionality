<?php
/*
 *  UCFBands Theme Functionality
 *  CPT: Staff Member
 *    
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands CPT: Staff Member Title Field
 * Change Default Title Field to "Staff Member Name"
 *
 * @author Jordan Pakrosnis
 */
function change_default_title( $title ){
    
     $screen = get_current_screen();
 
     if  ( 'ucfbands_staff' == $screen->post_type ) {
          $title = 'Staff Member Name';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_default_title' );



/**
 * UCFBands CPT: Staff Member CMB
 * Register Staff Member CMB
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_staff_member_metabox() {
	$prefix = '_ucfbands_staff_member_';

    // Initialize
    $cmb = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Staff Member Details', 'cmb' ),
        'object_types'  => array( 'ucfbands_staff' ),
        'context'       => 'normal',
        'priority'      => 'core',
    ) );
    
    // Is Faculty
    $cmb->add_field( array(
        'name' => 'Faculty',
        'desc' => 'Staff Member is UCF Faculty. Faculty members are listed before non-faculty members in listings.',
        'id'   => $prefix . 'is_faculty',
        'type' => 'checkbox'
    ) );
    
    // Position
    $cmb->add_field( array(
        'name'    => 'Position',
        'desc'    => 'Ex: "Director of Bands"',
        'id'      => $prefix . 'position',
        'type'    => 'text'
    ) );
    
    // Email Address
    $cmb->add_field( array(
        'name' => 'Email Address',
        'desc' => '@ucf.edu preferred.',
        'id'   => 'email',
        'type' => 'text_email',
    ) );    
    
    // Phone Number
    $cmb->add_field( array(
        'name'    => 'Phone Number',
        'desc'    => 'Format: (407) 823-XXXX. UCF Number Preferred',
        'id'      => $prefix . 'phone',
        'type'    => 'text'
    ) );
    
    // Biography
    $cmb->add_field( array(
    'name'    => 'Biography',
    'id'      => 'biography',
    'type'    => 'wysiwyg',
    'options' => array(
        'media_buttons' => false,
    ),
    ) );
    
}
add_action( 'cmb2_init', 'ucfbands_staff_member_metabox' );
