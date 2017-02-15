<?php
/**
 * Template part for displaying projects in a list.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package strikebase
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'strikebase-card' ); ?>>

	<?php the_title( '<h2 class="strikebase-card-title">', '</h2>' ); ?>

	<dl>
		<dt><?php esc_html_e( 'Status', 'strikebase' ); ?></dt>
		<dd><?php strikebase_show_project_status( get_the_ID() ); ?></dd>

		<?php
		$dates = strikebase_get_project_meta( get_the_ID(), 'dates' );
		if ( $dates['launch'] ) : ?>
			<dt><?php esc_html_e( 'Launch date', 'strikebase' ); ?></dt>
			<dd><?php echo strikebase_formatted_date( $dates['launch'] ); ?></dd>
		<?php elseif ( $dates['est_launch'] ) : ?>
			<dt><?php esc_html_e( 'Expected launch', 'strikebase' ); ?></dt>
			<dd><?php echo strikebase_formatted_date( $dates['est_launch'] ); ?></dd>
		<?php endif; ?>
	</dl>

	<a href="<?php echo esc_url( get_permalink() ); ?>" class="strikebase-card-link"> </a>

</article><!-- #post-## -->
