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

	<div class="strikebase-column">
		<dl class="strikebase-project-info">
			<dt><?php esc_html_e( 'Status', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_project_status( get_the_ID() ); ?></dd>

			<dt><?php esc_html_e( 'Genre', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_project_genre( get_the_ID() ); ?></dd>

			<dt><?php esc_html_e( 'Hosted on', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_project_host( get_the_ID() ); ?></dd>

			<dt><?php esc_html_e( 'Type of project', 'strikebase' ); ?></dt>
			<dd><?php strikebase_show_project_type( get_the_ID() ); ?></dd>
		</dl>

		<dl class="strikebase-people">
			<?php
			$people = strikebase_get_project_meta( get_the_ID(), 'people' );
			foreach ( $people as $key => $value ) :
				if ( $value ) :
					echo '<dt>' . strikebase_nice_key( $key ) . '</dt>';
					echo '<dd>' . $value . '</dd>';
				endif;
			endforeach;
			?>
		</dl>

		<div class="entry-content">
			<div class="label"><?php esc_html_e( 'Notes', 'strikebase' ); ?></div>
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</div><!-- .strikebase-column -->

	<div class="strikebase-column">

		<dl class="strikebase-links">
			<?php
			$links = strikebase_get_project_meta( get_the_ID(), 'links' );
			foreach ( $links as $key => $value ) :
				if ( $value ) :
					echo '<dt>' . strikebase_nice_key( $key ) . '</dt>';
					echo '<dd><a href="' . $value . '">' . strikebase_simplify_URL( $value ) . '</a></dd>';
				endif;
			endforeach;
			?>
		</dl>

		<dl class="strikebase-dates">
			<?php
			$dates = strikebase_get_project_meta( get_the_ID(), 'dates' );
			foreach ( $dates as $key => $value ) :
				if ( $value ) :
					echo '<dt>' . strikebase_nice_key( $key ) . '</dt>';
					echo '<dd>' . strikebase_formatted_date( $value ) . '</dd>';
				endif;
			endforeach;
			?>
		</dl>

	</div><!-- .strikebase-column -->

</article><!-- #post-## -->
