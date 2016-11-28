<?php
/**
 * Extra functionality for this theme.
 *
 * @package strikebase
 */

/**
 * Adjust the post limit on certain archive pages.
 * This is to ensure pages will show three full rows of videos.
 */
function strikebase_adjust_postlimit( $query ) {
	if ( is_admin() ) :
		return;
	endif;

	if ( is_post_type_archive() ) :
		$query->set( 'posts_per_page', 50 );
		return;
	endif;
}
add_action( 'pre_get_posts', 'strikebase_adjust_postlimit' );
