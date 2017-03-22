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

		<?php if ( have_posts() ) : ?>

			<div class="strikebase-filter-and-sort">
				<?php strikebase_filters( 'person-type', 'Type' ); ?>
			</div>

			<?php strikebase_filter_sort_messaging(); ?>

			<div class="strikebase-people-list">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					get_template_part( 'components/person/content', 'list' );
				endwhile;
				?>
			</div>

			<?php strikebase_numeric_pagination(); ?>

		<?php else :
			get_template_part( 'components/person/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
