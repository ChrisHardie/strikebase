<?php
/**
 * The front page template file.
 *
 * @package strikebase
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<h1 class="aligncenter">Hello, there!</h1>

			<section class="widget">
				<h3 class="widget-title">Client check-ins</h3>

				<dl>
				<?php

				$check_ins = strikebase_get_check_ins( 'all' );

				foreach ( $check_ins as $check_in ) :
					echo '<dt>' . $check_in['title'] . '</dt>';
					echo '<dd>' . strikebase_formatted_date( $check_in['next_check_in'] ) . '</dd>';
				endforeach;
				?>
				</dl>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
