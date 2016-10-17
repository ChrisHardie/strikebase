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
		<?php strikebase_show_organization(); ?>
	</td>

	<td class="strikebase-person-project">
		Project 1, project 2
	</td>

	<td class="strikebase-person-last-contact">
		22 October 2016
	</td>

</tr><!-- #post-## -->
