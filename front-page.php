<?php
/**
 * The front page template file.
 *
 * @package strikebase
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="widget strikebase-check-ins-widget strikebase-card">
				<h2 class="strikebase-card-title"><?php esc_html_e( 'Client check-ins', 'strikebase' ); ?></h2>

				<ul class="strikebase-check-ins-list">
					<?php
					$check_ins = strikebase_get_check_ins( 'all' );

					foreach ( $check_ins as $check_in ) :
						echo '<li class="strikebase-' . $check_in['class'] . '-check-in">';
						echo '<a href="'. $check_in['permalink'] .'">';

						if ( 'overdue' === $check_in['class'] ) :
							strikebase_icon( 'alert' );
						else :
							strikebase_icon( 'clock' );
						endif;
						
						echo '<span class="strikebase-check-in-date">' . strikebase_formatted_date( $check_in['next_check_in'], 'jS F' ) . '</span>';
						echo $check_in['title'];
						echo '</a></li>';
					endforeach;
					?>
				</ul>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
