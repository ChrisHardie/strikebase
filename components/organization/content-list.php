<?php
/**
 * Template part for displaying organizations in a list.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package strikebase
 */
?>

<article id="strikebase-<?php echo $term->slug; ?>" class="strikebase-card organization">

	<h2 class="strikebase-card-title"><?php echo $term->name; ?></h2>

	<dl>
		<dt><?php esc_html_e( 'People', 'strikebase' ); ?></dt>
		<?php strikebase_list_org_attachments( $term->slug, 'person', 'dd' ); ?>

		<dt><?php esc_html_e( 'Projects', 'strikebase' ); ?></dt>
		<?php strikebase_list_org_attachments( $term->slug, 'project', 'dd' ); ?>
	</dl>

</article><!-- #post-## -->
