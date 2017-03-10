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
			<a class="dropdown-link" href="#"><?php echo esc_html__( $dropdown_label ); ?><img class="strikebase-icon" src="https://icon.now.sh/chevron/down" alt="Show filter options" /></a>

			<div class="dropdown-wrapper">
			<ul class="dropdown-menu dropdown-main-menu">
				<li class="dropdown-title"><?php printf( esc_html__( 'Filter by %1$s', 'strikebase' ), strtolower( get_taxonomy( $taxonomy )->label ) ); ?>
				<a class="dropdown-close" href="#"><img class="strikebase-icon" src="https://icon.now.sh/x" alt="Close menu" /></a>
				</li>

				<?php
				// Get all terms at the top level of the selected taxonomy.
				$terms = get_terms( array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
					'parent'     => 0,
				) );

				if ( $terms ) :
					// Loop through the terms and output each as a filter option.
					foreach ( $terms as $term ) : ?>
						<li><a class="filter-link" href="#" data-filter="<?php echo $term->taxonomy; ?>-<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>

						<?php
						// Get all child terms.
						$child_terms = strikebase_filter_child_terms( $taxonomy, $term->term_id );
						if ( $child_terms ) :

							// Save the terms in a new array. We'll output them a little later.
							$child_term_array[$term->slug] = strikebase_filter_child_terms( $taxonomy, $term->term_id );
							?>

							<a class="dropdown-submenu-open" href="#" data-target="<?php echo $term->slug; ?>"><img class="strikebase-icon" src="https://icon.now.sh/chevron" alt="Show sub-categories" /></a>

						<?php endif; ?>
						</li>

					<?php endforeach;
				endif; ?>
			</ul> <!-- .dropdown-menu -->

			<?php
				// Okay, now it's time to output lists of all the child terms.
				if ( ! empty( $child_term_array ) ) :
					foreach ( $child_term_array as $parent_term=>$child_terms ) : ?>
						<ul class="dropdown-menu dropdown-submenu <?php echo $parent_term; ?>">
							<li class="dropdown-title">
								<a class="dropdown-submenu-close" href="#" data-target="<?php echo $parent_term; ?>"><img class="strikebase-icon" src="https://icon.now.sh/chevron/left" alt="Back to parent category" />
								<?php echo $parent_term; ?></a></li>

							<?php foreach ( $child_terms as $child_term ) : ?>
								<li><a class="filter-link" href="#" data-filter="<?php echo $child_term->slug; ?>"><?php echo $child_term->name; ?></a>
							<?php endforeach; ?>

						</ul><!-- .dropdown-menu -->
					<?php endforeach;
				endif;
			?>
			</div><!-- .dropdown-wrapper -->
		</li>
	</ul><!-- .dropdown-container -->

<?php
}

/*
 * Return an array containing all child terms of a parent term.
 *
 */
function strikebase_filter_child_terms( $taxonomy, $parent=0 ) {
	// Get all terms in our taxonomy.
	$terms = get_terms( array(
		'taxonomy'   => $taxonomy,
		'hide_empty' => false,
		'parent'     => $parent,
	) );

	if ( $terms ) :
		return $terms;
	else :
		return false;
	endif;
}

/*
 * Outputs a button to allow for quickly resetting all filters.
 * This button will be hidden if no filters are currently applied.
 */
function strikebase_clear_filters_button() { ?>
	<a class="strikebase-clear-filters" href="#"><img class="strikebase-icon" src="https://icon.now.sh/x" alt="Clear filters" />
	<?php esc_html_e( 'Clear all filters', 'strikebase' ); ?></a>
<?php }
