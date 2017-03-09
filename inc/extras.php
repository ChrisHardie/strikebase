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
		$query->set( 'posts_per_page', 500 );
		return;
	endif;
}
add_action( 'pre_get_posts', 'strikebase_adjust_postlimit' );

/**
 * Numeric pagination for custom queries
 * Pinched more or less verbatim from https://www.binarymoon.co.uk/2013/10/wordpress-numeric-pagination/
 *
 * @global type $wp_query
 * @param type $pageCount
 * @param type $query
 * @return type
 */
function strikebase_numeric_pagination( $page_count = 9, $query = null ) {

	if ( null == $query ) {
		global $wp_query;
		$query = $wp_query;
	}

	// Return early if we only have one page.
	if ( 1 >= $query->max_num_pages ) {
		return;
	}

	echo '<div class="strikebase-pagination">';

	$big = 9999999999; // need an unlikely integer
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total' => $query->max_num_pages,
		'end_size' => 0,
		'mid_size' => $page_count,
		'next_text' => '&raquo;',
		'prev_text' => '&laquo;',
	) );

	echo '</div>';
}

/*
 * Get gravatar for a given email address.
 *
 */
function strikebase_get_gravatar( $email ) {
	$hash = md5( strtolower( trim( $email ) ) );
	return "//www.gravatar.com/avatar/" . $hash;
}

/*
 * Show the gravatar for a given user ID, if a gravatar is available.
 *
 */
function strikebase_show_gravatar( $id ) {
	$contact_info = strikebase_get_person_meta( $id );
	if ( $contact_info['email'] ) :
		echo '<img class="gravatar" src="'. strikebase_get_gravatar( $contact_info['email'] ) . '?s=200&&d=mm" />';
	endif;
}
