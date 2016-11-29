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
function strikebase_show_organization( $post_ID, $format ) {
	echo strikebase_list_terms( $post_ID, 'organization', $format );
}

/*
 * Get an array of custom metadata attached to a given project.
 */
function strikebase_get_project_meta( $post_ID, $key ) {
	$metas = get_post_meta( get_the_ID(), 'project_info', false );
	if ( $metas ) :
		$array = $metas[0][$key];
		return $array;
	else :
		return false;
	endif;
}

/*
 * Output project post metadata fields to template
 */
function strikebase_output_project_meta( $section ) {
	$project_metadata = strikebase_get_project_meta( get_the_ID(), $section );

	if ( ! $project_metadata ) {
		return;
	}

	echo '<dl class="strikebase-"' . $section  . '>';

	foreach ( $project_metadata as $key => $value ) :
		if ( $value ) :

		switch( $section ) :
			case 'people':
				echo '<dt>' . strikebase_nice_key( $key ) . '</dt>';
				if ( is_array( $value ) ) :
					// If our value is an array, loop through it as well!
					foreach ( $value as $person ) :
						echo '<dd>' . get_the_title( $person ) . '</dd>';
					endforeach;
				else:
					echo '<dd>' . $value . '</dd>';
				endif;
				break;
			case 'dates':
				echo '<dt>' . strikebase_nice_key( $key ) . '</dt>';
				echo '<dd>' . strikebase_formatted_date( $value ) . '</dd>';
				break;
			case 'links':
				echo '<dt>' . strikebase_nice_key( $key ) . '</dt>';
				echo '<dd><a href="' . $value . '">' . strikebase_simplify_URL( $value ) . '</a></dd>';
				break;
			default:
				echo '<dd>' . $value . '</dd>';
		endswitch;

		endif;
	endforeach;

	echo '</dl>';
}

/*
 * Get an array of custom metadata attached to a given person.
 */
function strikebase_get_person_meta( $post_ID ) {
	$metas = get_post_meta( get_the_ID(), 'person_contact_info', false );
	if ( $metas ) :
		$array = $metas[0];
		return $array;
	else :
		return false;
	endif;
}

/*
 * Output person post metadata fields to template
 * @todo: Add functionality here to combine template output.
 */
function strikebase_output_person_meta( $section ) {
}

/*
 * List the projects a given person is attached to.
 *
 */
function strikebase_list_person_projects( $person, $format = 'dd' ) {
	// Custom query setup
	global $person_page_id;
	$person_page_id = get_the_id();
	$query_args = array( 'post_type' => 'project', 'posts_per_page' => -1 );
	$project_query = new WP_Query( $query_args );

	// Custom query loop
	if ( $project_query->have_posts() ) {
		while ( $project_query->have_posts() ) {
			$project_query->the_post();
			$projects = strikebase_get_project_meta( get_the_ID(), 'people' );

			if ( $projects ) {
				if ( is_array( $projects['influencers'] ) && in_array( $person_page_id, $projects['influencers'] ) ) {
					echo '<'. $format .'>' . get_the_title() . '</' . $format . '>';
				}
			}
		}
		wp_reset_postdata();
	} else {
		echo '<'. $format .'>' . esc_html_e( 'No associated projects.', 'strikebase' ) . '</' . $format . '>';
	}
}

/*
 * Simplify a URL.
 */
function strikebase_simplify_URL( $URL ) {
	// Remove extra slashes.
	$simple_URL = trim( $URL, '/' );

	// If protocol is included, strip it out.
	if ( substr($simple_URL, 0, 7) == 'http://' ) {
		$simple_URL = substr($simple_URL, 7);
	}

	if ( substr($simple_URL, 0, 8) == 'https://' ) {
		$simple_URL = substr($simple_URL, 8);
	}

	// Remove the 'www.' prefix.
	if ( substr($simple_URL, 0, 4) == 'www.') {
		$simple_URL = substr($simple_URL, 4);
	}

	return $simple_URL;
}

/*
 * Tweak the display of a given label for a custom meta key.
 * In some cases, these labels aren't quite as descriptive as they should be,
 * so we're going to manually fine-tune them.
 */
function strikebase_nice_key( $key ) {
	// Replace underscores with a space.
	$nice_key = str_replace( '_', ' ', $key );

	// Expand "launch", "est launch", and "last contacted".
	if ( 'est_launch' === $key ) :
		$nice_key = 'Estimated Launch Date';
	elseif ( 'launch' === $key ) :
		$nice_key = 'Launch Date';
	elseif ( 'last_check_in' === $key ) :
		$nice_key = 'Last Check-in';
	endif;

	// Expand "username".
	if ( 'username' === $key ) :
		$nice_key = 'WordPress.com Username';
	endif;

	// Expand "social media".
	if ( 'social_media' === $key ) :
		$nice_key = 'Social Media Accounts';
	endif;

	return $nice_key;
}

/*
 * Output social media links in a linky way.
 * This is going to assume the username alone is entered,
 * and we'll build the relevant URL around that.
 * @TODO: Add SVG icons!
 */
function strikebase_convert_social_links( $key, $value ) {
	// Remove @ symbol if it exists.
	$value = str_replace( '@', '', $value );

	switch ( $key ) :
		case 'twitter':
			$URL = 'https://twitter.com/' . $value;
			break;
		case 'facebook':
			$URL = 'https://facebook.com/' . $value;
			break;
		case 'instagram':
			$URL = 'https://instagram.com/' . $value;
			break;
		case 'youtube':
			$URL = 'https://youtube.com/user/' . $value;
			break;
	endswitch;

	$link = $key . ': <a href="' . $URL . '">@' . $value . '</a>';
	return $link;
}

/*
 * Reusable snippet of code to output a list of terms.
 * Mostly used to list out custom taxonomies and do the comma thing sensibly.
 *
 */
function strikebase_list_terms( $post_ID, $taxonomy, $format = 'comma' ) {
	$terms = wp_get_post_terms( $post_ID, $taxonomy );

	// Make sure we have some terms.
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
		$i = 1;
		$return = '';

		// Loopity-loop.
		foreach ( $terms as $term ) :

			if ( $format === 'comma' ) :
				// Output the term without any wrapping tags.
				$return .= $term->name;
				// Use a comma to separate items in list.
				if ( $i < count( $terms ) ) :
					$return .= ', ';
				endif;
			else :
				// Wrap items in the format selected.
				$return .= '<'. $format .'>' . $term->name . '</' . $format . '>';
			endif;

			$i++;
		endforeach;

		return $return;
	endif;

	return false;
}

/*
 * This lists the people or projects who/that belong to a specific organisation.
 * @TODO show gravatars!
 */
function strikebase_list_org_attachments( $organization, $post_type ) {

	// Query posts for the CPTs that belong to the org (taxonomy) specified.
	$args = array(
		'post_type' => $post_type,
		'tax_query' => array(
			array(
				'taxonomy' => 'organization',
				'field'	 => 'slug',
				'terms'	 => $organization,
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

/*
 * Show the last check-in date for an organisation.
 *
 */
function strikebase_show_checkin_date( $organization ) {

	// Query posts for the projects that belong to the org (taxonomy) specified.
	$args = array(
		'post_type' => 'project',
		'tax_query' => array(
			array(
				'taxonomy' => 'organization',
				'field'	 => 'slug',
				'terms'	 => $organization,
			),
		),
	);
	$the_query = new WP_Query( $args );

	// To find the check-in date for an organisation, we'll need to get
	// all the projects attached to the org, and the check-in dates of those projects.
	// Then, we'll just output the most recent date.
	if ( $the_query->have_posts() ) :
		// Create an empty array.
		$project_checkins = array();

		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			// Get the check-in date and add it to our array.
			$project_dates = strikebase_get_project_meta( get_the_ID(), 'dates' );
			$project_checkins[] = $project_dates['last_check_in'];
		endwhile;

		wp_reset_postdata();

		// Sort the array so our most recent check-in is first.
		sort( $project_checkins );

		// Now get the last check-in date and output it.
		$latest_checkin = array_slice( $project_checkins, -1 )[0];
		echo strikebase_formatted_date( $latest_checkin );
		return true;
	else :
		return false;
	endif;
}
