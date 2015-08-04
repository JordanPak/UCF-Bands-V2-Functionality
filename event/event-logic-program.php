<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Event
 *    
 *  @author Jordan Pakrosnis
*/

/**
 * UCFBands Event Single - Get Program
 *
 * @author Jordan Pakrosnis
 */
function ucfbands_event_program( $program, $program_guest_composer ) {
    
    
    // Program Output String
    $program_output = '';
    

    // WRAPPER (Style classes: "style-centered", "style-simple", "style-dotted")
    $program_output .= '<div class="event-program style-dotted"><h2>Program</h2>';


        // Guest Composer
        if ( $program_guest_composer )
            $program_output .= '<span class="guest-composer">' . $program_guest_composer . '</span>';


        // Start UL
        $program_output .= '<ul>';


            //-- PROGRAM LOOP --//
            foreach ( $program as $piece ) {

                // Get Item Meta
                $piece_title =      esc_attr( $piece['title'] );
                $piece_composer =   esc_attr( $piece['composer'] );
                $piece_notes =                $piece['piece_note'];


                // Piece List Item
                $program_output .= '<li>';

                    // Piece Title
                    $program_output .= '<span class="piece-title">' . $piece_title . '</span>';

                    // Separator
//                    $program_output .= '<span class="piece-separator">&nbsp;&nbsp;&nbsp;&nbsp;</span>';

                    // Piece Composer
                    $program_output .= '<span class="piece-composer">' . $piece_composer . '</span>';


                    // Check for Piece Notes
                    if ( $piece_notes != '' ) {

                        // Nested UL
                        $program_output .= '<ul>';

                            foreach ( $piece_notes as $piece_note )
                                $program_output .= '<li>' . $piece_note . '</li>';

                        $program_output .= '</ul>';

                    } // if Piece Note(s)

                // End Piece List Item
                $program_output .= '</li>';

            } // foreach program as piece

        // Close UL
        $program_output .= '</ul>';

    // Close Wrapper
    $program_output .= '</div>';
    
    
    // Return Schedule String
    return $program_output;
    
    
} // ucfbands_event_program()
