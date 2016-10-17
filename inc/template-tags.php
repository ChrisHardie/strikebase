<?php
/**
 * Custom template tags for this theme.
 *
 * @package strikebase
 */

/*
 * Display the project status.
 */
function strikebase_show_project_status() {
	echo strikebase_list_terms( 'project-status' );
}

/*
 * Display the project genre.
 */
function strikebase_show_project_genre() {
	echo strikebase_list_terms( 'project-genre' );
}

/*
 * Display the project type.
 */
function strikebase_show_project_type() {
	echo strikebase_list_terms( 'project-type' );
}

/*
 * Display the project host.
 */
function strikebase_show_project_host() {
	echo strikebase_list_terms( 'project-host' );
}

/*
 * Display the type of person.
 */
function strikebase_show_person_type() {
	echo strikebase_list_terms( 'person-type' );
}

/*
 * Display the organization name.
 */
function strikebase_show_organization() {
	echo strikebase_list_terms( 'organization' );
}

/*
 * Reusable snippet of code to output a list of terms.
 * Mostly used to list out custom taxonomies and do the comma thing sensibly.
 *
 */
function strikebase_list_terms( $taxonomy ) {
	$terms = get_terms( $taxonomy );

	// Make sure we have some terms.
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
		$i = 1;
		$return = '';

		// Loopity-loop.
		foreach ( $terms as $term ) :
			$return .= $term->name;

			// Just in case we have more than one, use a comma to separate.
			if ( $i < count( $terms ) ) :
				$return .= ', ';
			endif;

			$i++;
		endforeach;

		return $return;
	endif;

	return false;
}
