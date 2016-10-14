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

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<dl class="strikebase-project-info">
		<dt><?php esc_html_e( 'Status', 'strikebase' ); ?></dt>
		<dd><?php strikebase_show_project_status(); ?></dd>

		<dt><?php esc_html_e( 'Genre', 'strikebase' ); ?></dt>
		<dd><?php strikebase_show_project_genre(); ?></dd>

		<dt><?php esc_html_e( 'Hosted on', 'strikebase' ); ?></dt>
		<dd><?php strikebase_show_project_host(); ?></dd>

		<dt><?php esc_html_e( 'Type of project', 'strikebase' ); ?></dt>
		<dd><?php strikebase_show_project_type(); ?></dd>
	</dl>

	<div class="entry-content">
		<div class="label"><?php esc_html_e( 'Notes', 'strikebase' ); ?></div>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
