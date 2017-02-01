<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package strikebase
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'File not found', 'strikebase' ); ?></h1>
				</header>
				<div class="page-content">
					<p><?php esc_html_e( 'Quoth the raven: 404.', 'strikebase' ); ?></p>

					<?php get_search_form(); ?>
				</div>
			</section>
		</main>
	</div>
<?php
get_footer();
