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

	<td class="strikebase-project-status">
		<?php strikebase_show_project_status(); ?>
	</td>

	<td class="strikebase-project-launch-date">
		18 July 2016
	</td>

	<td class="strikebase-project-last-contact">
		22 October 2016
	</td>

</tr><!-- #post-## -->
