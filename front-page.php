<?php
/**
 * The front page template file.
 *
 * @package strikebase
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h1 class="aligncenter">Why, hello!</h1>

			<section class="widget strikebase-check-ins-widget">
				<h3 class="widget-title">Client check-ins</h3>

				<ul>
					<?php
					$check_ins = strikebase_get_check_ins( 'all' );

					foreach ( $check_ins as $check_in ) :
						echo '<li class="strikebase-' . $check_in['class'] . '-check-in">';
						echo '<span>' . $check_in['title'] . '</span>';
						echo '<span>' . strikebase_formatted_date( $check_in['next_check_in'] ) . '</span>';
						echo '</li>';
					endforeach;
					?>
				</ul>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
