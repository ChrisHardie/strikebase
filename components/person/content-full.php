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
		<?php strikebase_show_gravatar( get_the_ID() ); ?>
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="strikebase-column">

		<dl class="strikebase-person-info">
			<dt><?php esc_html_e( 'Type', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_person_type( get_the_ID() ); ?></dd>

			<dt><?php esc_html_e( 'Organization', 'strikebase' ); ?></dt>
			<?php strikebase_show_organization( get_the_ID(), 'dd' ); ?>

			<dt><?php esc_html_e( 'Projects', 'strikebase' ); ?></dt>
			<?php strikebase_list_person_projects( get_the_ID() ); ?>
		</dl>

		<div class="entry-content">
			<div class="label"><?php esc_html_e( 'Notes', 'strikebase' ); ?></div>
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</div><!-- .strikebase-column -->

	<div class="strikebase-column">

		<section class="strikebase-card strikebase-contact-info">
			<h2 class="strikebase-card-title">Contact information</h2>
			<dl class="strikebase-contact-info">
				<?php
				$contact_info = strikebase_get_person_meta( $id );

				if ( $contact_info ) :
					foreach ( $contact_info as $key => $value ) :
						if ( $value ) :
							echo '<dt>' . strikebase_nice_key( $key ) . '</dt>';
							if ( is_array( $value ) ) :
								// If our value is an array, loop through it as well!
								foreach ( $value as $sub_key => $sub_value ) :
									if ( $sub_value ) :
										if ( 'social_media' === $key ) :
											echo '<dd>' . strikebase_convert_social_links( $sub_key, $sub_value ) . '</dd>';
										else:
											echo '<dd>' . strikebase_nice_key( $sub_key ) . ': ' . $sub_value . '</dd>';
										endif;
									endif;
								endforeach;
							else :
								// Otherwise just output the value.
								echo '<dd>' . $value . '</dd>';
							endif;
						endif;
					endforeach;
				endif;
				?>
			</dl>
		</section>

	</div><!-- .strikebase-column -->

</article><!-- #post-## -->
