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

	<ul class="dropdown-container dropdown-container-<?php echo $taxonomy; ?>" data-taxonomy-group="<?php echo $taxonomy; ?>">

		<li class="dropdown-label">
			<a class="dropdown-link" title="<?php esc_html_e( 'Show filtering options', 'strikebase' ); ?>" href="#"><?php echo esc_html__( $dropdown_label ); ?><?php strikebase_icon( 'caret' ); ?>
			</a>

			<div class="dropdown-wrapper">
			<ul class="dropdown-menu dropdown-main-menu">
				<li class="dropdown-title"><?php printf( esc_html__( 'Filter by %1$s', 'strikebase' ), strtolower( get_taxonomy( $taxonomy )->label ) ); ?>
				<a class="dropdown-close" href="#" title="<?php esc_html_e( 'Close menu', 'strikebase' ); ?>"><?php strikebase_icon( 'x' ); ?></a>
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
					foreach ( $terms as $term ) :

						// Get all child terms.
						$child_terms = strikebase_filter_child_terms( $taxonomy, $term->term_id );

						if ( $child_terms ) :

							// Save the terms in a new array. We'll output them a little later.
							$child_term_array[$term->slug] = strikebase_filter_child_terms( $taxonomy, $term->term_id );
							?>

							<li><a class="dropdown-submenu-link" href="#" data-target="<?php echo $term->slug; ?>" <?php esc_html_e( 'Show subcategories', 'strikebase' ); ?>><?php echo $term->name; ?><?php strikebase_icon( 'caret' ); ?></a></li>

						<?php else:
							strikebase_filter_link( $term->taxonomy, $term->slug, $term->name );
						endif; ?>

					<?php endforeach;
				endif; ?>
			</ul> <!-- .dropdown-menu -->

			<?php
				// Okay, now it's time to output lists of all the child terms.
				if ( ! empty( $child_term_array ) ) :
					foreach ( $child_term_array as $parent_term=>$child_terms ) : ?>
						<ul class="dropdown-menu dropdown-submenu <?php echo $parent_term; ?>">
							<li class="dropdown-title"><a class="dropdown-submenu-close" href="#" data-target="<?php echo $parent_term; ?>" title="<?php esc_html_e( 'Back to parent category', 'strikebase' ); ?>"><?php strikebase_icon( 'caret' ); ?><?php echo $parent_term; ?></a></li>

							<?php foreach ( $child_terms as $child_term ) :
								strikebase_filter_link( $term->taxonomy, $child_term->slug, $child_term->name );
							endforeach; ?>

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
 * Output a filter link for a given term.
 *
 */
function strikebase_filter_link( $taxonomy, $slug, $name ) { ?>
	<li><a class="filter-link" href="#"
		data-filter="<?php echo $taxonomy; ?>-<?php echo $slug; ?>"
		data-filter-name="<?php echo $name; ?>">
		<?php echo $name; ?>
		<?php strikebase_icon( 'x' ); ?>
	</a></li>
<?php }

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
function strikebase_filter_sort_messaging() { ?>
	<div class="strikebase-filter-sort-messaging">

		<span class="strikebase-current-filters hidden">
			<?php esc_html_e( 'Filters:', 'strikebase' ); ?>
		</span>

		<button class="strikebase-clear-filters subtle hidden" href="#" title="<?php esc_html_e( 'Clear filters', 'strikebase' ); ?>"><?php strikebase_icon( 'x' ); ?><?php esc_html_e( 'Clear', 'strikebase' ); ?></button>

	</div>

	<div class="strikebase-card strikebase-card-warning strikebase-no-filter-matches hidden">
		<h2 class="strikebase-card-title"><?php esc_html_e( 'Oh, shoot!', 'strikebase' ); ?></h2>
		<p><?php esc_html_e( 'No results match your selection. Try being a bit less precise.', 'strikebase' ); ?></p>
	</div>
<?php }
