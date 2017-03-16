<?php
/**
 * Template Name: Organization list
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package strikebase
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Organizations', 'strikebase' ); ?></h2>
				</header><!-- .entry-header -->

			<?php
			/* Alrighty! So let's grab our organisations, first. */

			$terms = get_terms( array(
				'taxonomy' => 'organization',
				'hide_empty' => false,
				) );

			if ( $terms ) : ?>

			<div class="strikebase-organizations-list">

				<?php
				foreach ( $terms as $term ) :
					// We're using locate_template here so we can pass our $terms array through.
					// See http://mekshq.com/passing-variables-via-get_template_part-wordpress/
					include( locate_template( 'components/organization/content-list.php', false, false ) );
				endforeach;
				?>

			</div>
		<?php else :
			get_template_part( 'components/organization/content', 'none' );
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
