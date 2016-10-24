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

	<dl class="strikebase-person-info">
		<dt><?php esc_html_e( 'Type', 'strikebase' ); ?></dt>
		<dd><?php strikebase_show_person_type( get_the_ID() ); ?></dd>

		<dt><?php esc_html_e( 'Organization', 'strikebase' ); ?></dt>
		<dd><?php strikebase_show_organization( get_the_ID() ); ?></dd>

		<dt><?php esc_html_e( 'Projects', 'strikebase' ); ?></dt>
		<dd><strong>[LIST PROJECTS HERE]</strong></dd>
	</dl>

	<dl class="strikebase-contact-info">
		<?php
		$contact_info = strikebase_get_person_meta( get_the_ID() );

		foreach ( $contact_info as $key => $value ) :
			if ( $value ) :
				echo '<dt>' . $key . '</dt>';

				if ( 'last_contacted' === $key ) :
					echo '<dd>' . strikebase_formatted_date( $value ) . '</dd>';
				else :
					echo '<dd>' . $value . '</dd>';
				endif;

			endif;
		endforeach;
		?>
	</dl>

	<div class="entry-content">
		<div class="label"><?php esc_html_e( 'Notes', 'strikebase' ); ?></div>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
