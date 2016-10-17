<?php
/**
 * Template part for displaying organizations in a list.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package strikebase
 */
?>

<tr id="strikebase-<?php echo $term->slug; ?>">


	<td class="entry-title">
		<a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
			<?php echo $term->name; ?>
		</a>
	</td>

	<td class="strikebase-person-organization">
		<?php strikebase_list_org_attachments( $term->slug, 'person' ); ?>
	</td>

	<td class="strikebase-person-project">
		<?php strikebase_list_org_attachments( $term->slug, 'project' ); ?>
	</td>

	<td class="strikebase-person-last-contact">
		22 October 2016
	</td>

</tr><!-- #post-## -->
