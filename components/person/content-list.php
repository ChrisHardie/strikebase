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
	<h2 class="strikebase-card-title">
		<?php the_title(); ?>
	</h2>

	<dl>
		<dt><?php esc_html_e( 'Organization', 'strikebase' ); ?></dt>
		<?php strikebase_show_organization( get_the_ID(), 'dd' ); ?>

		<dt><?php esc_html_e( 'Projects', 'strikebase' ); ?></dt>
		<?php strikebase_list_person_projects( get_the_ID(), 'dd' ); ?>
	</dl>
<a href="<?php echo esc_url( get_permalink() ); ?>" class="strikebase-card-link"> </a>
</article><!-- #post-## -->
