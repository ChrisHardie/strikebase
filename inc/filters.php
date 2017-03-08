<?php
/**
 * Custom functionality related to filtering of projects and people.
 *
 * @package strikebase
 */

/*
 * Get data about upcoming check-ins.
 * Returns an array of check-ins.
 */
function strikebase_filters( $taxonomy, $dropdown_label ) { ?>

	<ul class="dropdown-container dropdown-container-<?php echo $taxonomy; ?>">

		<li class="dropdown-label">
			<a href="#"><?php echo esc_html__( $dropdown_label ); ?></a>

			<ul class="dropdown">
				<li class="dropdown-title"><?php printf( esc_html__( 'Filter by %1$s', 'strikebase' ), strtolower( get_taxonomy( $taxonomy )->label ) ); ?></li>

				<?php strikebase_filter_terms( $taxonomy ); ?>
			</ul> <!-- .dropdown -->
		</li>
	</ul><!-- .dropdown-container -->

<?php
}

function strikebase_filter_terms( $taxonomy, $parent=0 ) {
	// Get all terms in our taxonomy.
	$terms = get_terms( array(
		'taxonomy'   => $taxonomy,
		'hide_empty' => false,
		'parent'     => $parent,
	) );

	if ( $terms ) :
		if ( 0 !== $parent ) : ?>
			<ul class="dropdown-submenu">
		<?php endif;

			// Loop through the terms and output each as a filter option.
			foreach ( $terms as $term ) : ?>
				<li><a class="filter-link" href="#" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>

				<?php
				// Check for child terms of the current taxonomy as well!
				strikebase_filter_terms( $taxonomy, $term->term_id );
				?>

				</li>

			<?php
			endforeach;

		if ( 0 !== $parent ) : ?>
			</ul>
		<?php endif;
	endif;
}
