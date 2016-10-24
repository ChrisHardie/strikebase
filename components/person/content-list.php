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
		<strong>[LIST PROJECTS HERE]</strong>
	</td>

	<td class="strikebase-project-last-contact">
		<?php
		$dates = strikebase_get_person_meta( get_the_ID() );
		if ( $dates['last_contacted'] ) :
			echo strikebase_formatted_date( $dates['last_contacted'] );
		endif;
		?>
	</td>

</tr><!-- #post-## -->
