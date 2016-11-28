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

			<table class="strikebase-people-list">
				<thead>
					<th><?php esc_html_e( 'Name', 'strikebase' ); ?></th>
					<th><?php esc_html_e( 'Organization', 'strikebase' ); ?></th>
					<th><?php esc_html_e( 'Projects', 'strikebase' ); ?></th>
				</thead>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'components/person/content', 'list' );
				endwhile;
				?>
			</table>

			<?php strikebase_numeric_pagination(); ?>

		<?php else :
			get_template_part( 'components/person/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
