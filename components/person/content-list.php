<?php
/**
 * Template part for displaying projects in a list.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package strikebase
 */
?>

<tr id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<td class="entry-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?>
		</a>
	</td>

	<td class="strikebase-person-organization">
		<?php strikebase_show_organization( get_the_ID() ); ?>
	</td>

	<td class="strikebase-person-project">
		<?php
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
						echo '<span>' . get_the_title() . '</span>';
					}
				}
			}
			wp_reset_postdata();
		} else {
			echo '<dd>No associated projects.</dd>';
		}
		?>
	</td>

</tr><!-- #post-## -->
