<?php
/**
 * Custom template tags for this theme.
 *
 * @package strikebase
 */

/*
 * Display the project status.
 *
 */
function strikebase_show_project_status() {
	$terms = get_terms( 'project-status' );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	    foreach ( $terms as $term ) {
	        echo $term->name; // Needs a separator just in case we have more than one.
	    }
	}
}
