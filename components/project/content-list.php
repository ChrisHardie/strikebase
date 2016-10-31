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
		<?php strikebase_show_project_status( get_the_ID() ); ?>
	</td>

	<td class="strikebase-project-launch-date">
		<?php
		$dates = strikebase_get_project_meta( get_the_ID(), 'dates' );
		if ( $dates['launch'] ) :
			echo strikebase_formatted_date( $dates['launch'] );
		elseif ( $dates['est_launch'] ) :
			echo strikebase_formatted_date( $dates['est_launch'] );
			esc_html_e( ' (estimated)', 'strikebase' );
		endif;
		?>
	</td>

	<td class="strikebase-project-last-contact">
		<?php
		if ( $dates AND array_key_exists( 'last_check_in', $dates ) ) :
			echo strikebase_formatted_date( $dates['last_check_in'] );
		endif;
		?>
	</td>

</tr><!-- #post-## -->
