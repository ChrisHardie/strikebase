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

			<header class="page-header">
				<h2 class="page-title"><?php esc_html_e( 'Projects', 'strikebase' ); ?></h2>
			</header><!-- .entry-header -->

		<?php
		if ( have_posts() ) : ?>

			<div class="strikebase-filter-and-sort">
				<?php strikebase_filters( 'project-status', 'Status' ); ?>
				<?php strikebase_filters( 'project-type', 'Type' ); ?>
				<?php strikebase_filters( 'project-genre', 'Genre' ); ?>
				<?php strikebase_filters( 'project-host', 'Host' ); ?>
			</div>

			<?php strikebase_filter_sort_messaging(); ?>

			<div class="strikebase-projects-list">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'components/project/content', 'list' );
				endwhile;
				?>

			</div>

			<?php strikebase_numeric_pagination(); ?>

		<?php else :
			get_template_part( 'components/project/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
