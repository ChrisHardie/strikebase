<?php
/**
 * The template for displaying a list of all projects.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package strikebase
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<table class="strikebase-project-list">
				<thead>
					<th><?php esc_html_e( 'Project', 'strikebase' ); ?></th>
					<th><?php esc_html_e( 'Status', 'strikebase' ); ?></th>
					<th><?php esc_html_e( 'Launch date', 'strikebase' ); ?></th>
					<th><?php esc_html_e( 'Last check-in', 'strikebase' ); ?></th>
				</thead>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'components/project/content', 'list' );
			endwhile;
			the_posts_navigation();
			?>

			</table>
		<?php else :
			get_template_part( 'components/project/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
