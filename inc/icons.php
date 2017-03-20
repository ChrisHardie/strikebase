<?php
/**
 * SVG icon functionality.
 *
 * This makes it easier for us to get up and running with SVG icons, without
 * doing a lot of extra work or adjusting our templates.
 *
 * Currently using the <symbol> method of insertion, YMMV.
 */

/**
 * This allows us to get the SVG code and return as a variable
 * Usage: strikebase_get_icon( 'name-of-icon' );
 */
function strikebase_get_icon( $name ) {
	$file = get_template_directory_uri() . '/assets/svg/'.$name.'.svg';
	if ( function_exists( 'wpcom_is_vip' ) ) :
		$icon = wpcom_vip_file_get_contents( esc_url( $file ) );
	else :
		$icon = file_get_contents( esc_url( $file ) );
	endif;
 return '<span class="strikebase-icon strikebase-icon-' . $name . '">'. $icon . '</span>';
}

/*
 * This allows for easy injection of SVG references inline.
 * Usage: strikebase_icon( 'name-of-icon' );
 */
function strikebase_icon( $name ) {
	echo strikebase_get_icon( $name );
}
