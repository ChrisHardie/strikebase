<?php
/**
 * Custom functionality related to client check-ins.
 *
 * @package strikebase
 */

/*
 * Get data about upcoming check-ins.
 * Returns an array of check-ins.
 */
function strikebase_get_check_ins( $return='all' ) {

	// Get the check-in interval from our theme mod, if set. (Default to 6.)
	$check_in_interval = get_theme_mod( 'strikebase_check_in_interval', 6 );

	// Create two arrays: one for overdue check-ins, and one for upcoming.
	$overdue_check_ins = array();
	$upcoming_check_ins = array();

	// Query posts for our projects.
	$the_query = new WP_Query( array( 'post_type' => 'project' ) );

	// Loop through our projects, check_ing for check-ins.
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) :
			$the_query->the_post();

			// Get the date of our last check-in.
			$project_dates = strikebase_get_project_meta( get_the_ID(), 'dates' );

			if ( isset( $project_dates['last_check_in'] ) ) :
				$last_check_in = $project_dates['last_check_in'];
			endif;

			// Create an array of the data we'll need.
			$project_array = array(
				'title'         => get_the_title(),
				'id'            => get_the_ID(),
			);

			if ( ! $last_check_in ) :
				// Set due date to today, and add to the overdue array.
				$project_array['next_check_in'] = time();
				$project_array['class'] = 'overdue';
				$overdue_check_ins[] = $project_array;

			else :
				// @todo Check to see if we have a custom check-in interval or not.

				// Generate next check-in date from last check-in date + interval.
				$next_check_in = strtotime( '+'. $check_in_interval .' month', $last_check_in );

				// Add it to our project array.
				$project_array['next_check_in'] = $next_check_in;

				// Depending on whether the project is overdue or not, add it to the proper array.
				if ( time() >= $next_check_in ) :
					// Add to the 'overdue' array.
					$project_array['class'] = 'overdue';
					$overdue_check_ins[] = $project_array;
				else :
					// Add to the 'upcoming' array.
					$project_array['class'] = 'upcoming';
					$upcoming_check_ins[] = $project_array;
				endif;

			endif;

		endwhile;

		wp_reset_postdata();

		// Sort arrays by the check-in date.
		function compareOrder( $a, $b ) {
			return $a['next_check_in'] - $b['next_check_in'];
		}

		usort( $upcoming_check_ins, 'compareOrder' );
		usort( $overdue_check_ins, 'compareOrder' );

		// Finally, return the arrays!
		if ( 'upcoming' === $return ) :
			return $upcoming_check_ins;
		elseif ( 'overdue' === $return ) :
			return $overdue_check_ins;
		else :
			return array_merge( $overdue_check_ins, $upcoming_check_ins );
		endif;
	else :
		// Return false if we have no projects.
		return false;
	endif;
}
?>
