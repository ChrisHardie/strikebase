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

	<ul class="dropdown-container">

		<li class="dropdown-label">
			<a href="#"><?php echo esc_html__( $dropdown_label ); ?></a>

			<ul class="dropdown">
				<li class="dropdown-title"><?php printf( esc_html__( 'Filter by %1$s', 'strikebase' ), strtolower( get_taxonomy( $taxonomy )->label ) ); ?></li>

				<?php
				// Get all terms in our taxonomy.
				$terms = get_terms( array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
				) );

				// Loop through the terms and output each as a filter option.
				foreach ( $terms as $term ) : ?>
					<li><a class="filter-link" href="#" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
				<?php endforeach; ?>
			</ul> <!-- .dropdown -->
		</li>
	</ul><!-- .dropdown-container -->

<?php
}
