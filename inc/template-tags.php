<?php
/**
 * Custom template tags for this theme.
 *
 * @package strikebase
 */

/*
 * Display the project status.
 */
function strikebase_show_project_status( $post_ID ) {
	echo strikebase_list_terms( $post_ID, 'project-status' );
}

/*
 * Display the project genre.
 */
function strikebase_show_project_genre( $post_ID ) {
	echo strikebase_list_terms( $post_ID, 'project-genre' );
}

/*
 * Display the project type.
 */
function strikebase_show_project_type( $post_ID ) {
	echo strikebase_list_terms( $post_ID, 'project-type' );
}

/*
 * Display the project host.
 */
function strikebase_show_project_host( $post_ID ) {
	echo strikebase_list_terms( $post_ID, 'project-host' );
}

/*
 * Display the type of person.
 */
function strikebase_show_person_type( $post_ID ) {
	echo strikebase_list_terms( $post_ID, 'person-type' );
}

/*
 * Display the organization name.
 */
function strikebase_show_organization( $post_ID ) {
	echo strikebase_list_terms( $post_ID, 'organization' );
}

/*
 * Reusable snippet of code to output a list of terms.
 * Mostly used to list out custom taxonomies and do the comma thing sensibly.
 *
 */
function strikebase_list_terms( $post_ID, $taxonomy ) {
	$terms = wp_get_post_terms( $post_ID, $taxonomy );

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

/*
 * This lists the people who belong to a specific organisation.
 * @TODO show gravatars!
 */
function strikebase_list_org_attachments( $organization, $post_type ) {

	// Query posts for people who belong to the org (taxonomy) specified
	$args = array(
		'post_type' => $post_type,
		'tax_query' => array(
			array(
				'taxonomy' => 'organization',
				'field'    => 'slug',
				'terms'    => $organization,
			),
		),
	);
	$the_query = new WP_Query( $args );

	// Loopity-loop!
	if ( $the_query->have_posts() ) :
		$return = '';

		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			$return .= '<a href="' . esc_url( get_the_permalink() ) . '">';
			$return .= get_the_title();
			$return .= '</a>';

			// Use a comma as a separator.
			if ( $the_query->current_post + 1 < $the_query->post_count ) :
				$return .= ', ';
			endif;

		endwhile;

		wp_reset_postdata();
		echo $return;

	else :
		return false;
	endif;
}
