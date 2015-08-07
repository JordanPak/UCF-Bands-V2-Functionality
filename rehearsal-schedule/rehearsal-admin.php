<?php

add_filter( 'manage_edit-ucfbands_rehearsal_columns', 'edit_rehearsal_columns' ) ;

function edit_rehearsal_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
        'title' => __( 'Title' ),
		'rehearsal_date' => __( 'Rehearsal Date' ),
        'band' => __( 'Band' ),
		'cancelled' => __( 'Cancelled' ),
		'date' => __( 'Date Posted' )
	);

	return $columns;
}






add_action( 'manage_ucfbands_rehearsal_posts_custom_column', 'manage_rehearsal_columns', 10, 2 );

function manage_rehearsal_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'duration' column. */
		case 'rehearsal_date' :
            
            // Edit link 
            echo '<a href="' . get_edit_post_link() . '">';

			/* Get the post meta. */
			$rehearsal_date = get_post_meta( $post_id, '_ucfbands_rehearsal_' . 'date', true );

			/* If no date is found, output a default message. */
			if ( empty( $rehearsal_date ) )
				echo __( 'Not Set!' );

			/* If there is a date, append it to the text string. */
			else
				echo date( 'l, M jS', $rehearsal_date );
            
            
            // End edit link
            echo '</a>';

            
			break;
            
            

        /* If displaying the 'cancelled' column. */
        case 'cancelled' :

			/* Get the post meta. */
			$rehearsal_cancelled = get_post_meta( $post_id, '_ucfbands_rehearsal_' . 'is_rehearsal_cancelled', true );

			/* If no date is found, output a default message. */
			if ( $rehearsal_cancelled == true )
                echo '<b>Yes</b>';

			break;            
            
            
            
		/* If displaying the 'band' column. */
		case 'band' :

			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, 'band' );

			/* If terms were found. */
			if ( !empty( $terms ) ) {

				$out = array();

				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '%s',
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'band', 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}

			/* If no terms were found, output a default message. */
			else {
				_e( 'No Band' );
			}

			break;
            
            

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
    
}