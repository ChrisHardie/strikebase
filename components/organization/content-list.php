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
		<?php echo $term->name; ?>
	</td>

	<td class="strikebase-person-organization">
		<?php strikebase_list_org_attachments( $term->slug, 'person' ); ?>
	</td>

	<td class="strikebase-person-project">
		<?php strikebase_list_org_attachments( $term->slug, 'project' ); ?>
	</td>

	<td class="strikebase-person-last-contact">
		<strong>[LAST CONTACT DATE]</strong>
	</td>

</tr><!-- #post-## -->
