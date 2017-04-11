<?php
/**
 * Template part for displaying full project details.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package strikebase
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="strikebase-column">
		<dl class="strikebase-project-info">
			<dt><?php esc_html_e( 'Status', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_project_status( get_the_ID() ); ?></dd>

			<dt><?php esc_html_e( 'Genre', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_project_genre( get_the_ID() ); ?></dd>

			<dt><?php esc_html_e( 'Hosted on', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_project_host( get_the_ID() ); ?></dd>

			<dt><?php esc_html_e( 'Type of project', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_project_type( get_the_ID() ); ?></dd>

			<?php if ( strikebase_is_pre_team_project( get_the_ID() ) ) : ?>
				<dt>Pre-Team 51 Project</dt>
			<?php endif; ?>
		</dl>

		<?php strikebase_output_project_meta( 'people' ); ?>

		<div class="entry-content">
			<div class="label"><?php esc_html_e( 'Notes', 'strikebase' ); ?></div>
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</div><!-- .strikebase-column -->

	<div class="strikebase-column">

		<?php
			strikebase_output_project_meta( 'dates' );
			strikebase_output_project_meta( 'links' );
		?>

	</div><!-- .strikebase-column -->

</article><!-- #post-## -->
