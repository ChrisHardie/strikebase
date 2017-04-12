<?php
/**
 * SVG icon functionality.
 *
 * This makes it easier for us to get up and running with SVG icons, without
 * doing a lot of extra work or adjusting our templates.
 *
 * Currently using the <symbol> method of insertion, YMMV.
 */
$strikebase_sprite_external = true;

/*
 * Inject our SVG sprite at the bottom of the page.
 *
 * There is a possibility that this will cause issues with
 * older versions of Chrome. In which case, it may be
 * necessary to inject just after the </head> tag.
 * See: https://code.google.com/p/chromium/issues/detail?id=349175
 *
 * This function currently is only used when we're not using the external method of insertion.
 */
function strikebase_inject_sprite() {
	global $strikebase_sprite_external;
	if ( ! $strikebase_sprite_external ) :
		include_once( get_template_directory() .'/assets/svg/icons.svg' );
	endif;
}
add_filter( 'wp_footer' , 'strikebase_inject_sprite' );

/*
 * Implement svg4everybody in order to better support external sprite references
 * on IE8-10. For lower versions, we need an older copy of the script.
 * https://github.com/jonathantneal/svg4everybody
 */
function strikebase_svg_scripts() {
	global $strikebase_sprite_external;
	/*
	 * Implement svg4everybody in order to better support external sprite references
	 * on IE8-10. For lower versions, we need an older copy of the script.
	 * https://github.com/jonathantneal/svg4everybody
	 */
	if ( $strikebase_sprite_external ) :
		wp_enqueue_script( 'strikebase-svg4everybody', get_template_directory_uri() . '/assets/js/svg4everybody.js', array(), '20160222', false );
	endif;
}
add_action( 'wp_enqueue_scripts', 'strikebase_svg_scripts' );

/*
 * Inject some header code to make IE play nice.
 *
 * This seems to do the trick, but may require more testing.
 * See: https://github.com/jonathantneal/svg4everybody
 */
function strikebase_svg4everybody() {
	global $strikebase_sprite_external;
	if ( $strikebase_sprite_external ) :
		echo '<meta http-equiv="x-ua-compatible" content="ie=edge">';
		echo '<script type="text/javascript">svg4everybody();</script>';
	endif;
}
add_action( 'wp_head', 'strikebase_svg4everybody', 20 );

/**
 * This allows us to get the SVG code and return as a variable
 * Usage: strikebase_get_icon( 'name-of-icon' );
 */
function strikebase_get_icon( $name, $id = null ) {
	global $strikebase_sprite_external;
	$attr = 'class="strikebase-icon strikebase-icon-' . $name . '"';
	if ( $id ) :
		$attr .= 'id="' . $id . '"';
	endif;
	$return = '<svg '. $attr.'>';
	if ( $strikebase_sprite_external ) :
		if ( defined( 'IS_WPCOM' ) && IS_WPCOM ) :
			// "use" doesn't currently work with cross-origin requests in any browsers so we need to un-staticize it
			// https://codereview.chromium.org/1036323002
			remove_filter( 'theme_root_uri', 'staticize_subdomain' );
			$return .= '<use xlink:href="' . esc_url( get_theme_file_uri( '/assets/svg/icons.svg#' ) ) . $name . '" />';
			add_filter( 'theme_root_uri', 'staticize_subdomain' );
		else :
			$return .= '<use xlink:href="' . esc_url( get_theme_file_uri( '/assets/svg/icons.svg#' ) ) . $name . '" />';
		endif;
	else :
		$return .= '<use xlink:href="#' . $name . '" />';
	endif;
	$return .= '</svg>';
 return $return;
}
/*
 * This allows for easy injection of SVG references inline.
 * Usage: strikebase_icon( 'name-of-icon' );
 */
function strikebase_icon( $name, $id = null ) {
	echo strikebase_get_icon( $name, $id );
}
/*
 * Filter our navigation menus to look for social media links.
 * When we find a match, we'll hide the text and instead show an SVG icon.
 */
function strikebase_social_menu( $items ) {
	foreach ( $items as $item ) :
		$subject = $item->url;
		$feed_pattern = '/\/feed\/?/i';
		$mail_pattern = '/mailto/i';
		$skype_pattern = '/skype/i';
		$google_pattern = '/plus.google.com/i';
		$domain_pattern = '/([a-z]*)(\.com|\.org|\.io|\.tv|\.co)/i';
		$domains = array( 'codepen', 'digg', 'dribbble', 'dropbox', 'facebook', 'flickr', 'foursquare', 'github', 'instagram', 'linkedin', 'path', 'pinterest', 'getpocket', 'polldaddy', 'reddit', 'spotify', 'stumbleupon', 'tumblr', 'twitch', 'twitter', 'vimeo', 'vine', 'youtube' );
		// Match feed URLs
		if ( preg_match( $feed_pattern, $subject, $matches ) ) :
			$icon = strikebase_get_icon( 'feed' );
		// Match a mailto link
		elseif ( preg_match( $mail_pattern, $subject, $matches ) ) :
			$icon = strikebase_get_icon( 'mail' );
		// Match a Skype link
		elseif ( preg_match( $skype_pattern, $subject, $matches ) ) :
			$icon = strikebase_get_icon( 'skype' );
		// Match a Google+ link
		elseif ( preg_match( $google_pattern, $subject, $matches ) ) :
			$icon = strikebase_get_icon( 'google-plus' );
		// Match various domains
		elseif ( preg_match( $domain_pattern, $subject, $matches ) && in_array( $matches[1], $domains ) ) :
			$icon = strikebase_get_icon( $matches[1] );
		endif;
		// If we've found an icon, hide the text and inject an SVG
		if ( isset( $icon ) ) {
			$item->title = $icon . '<span class="screen-reader-text">' . $item->title . '</span>';
		}
	endforeach;
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'strikebase_social_menu' );

/*
 * Output an inline SVG.
 * This just inserts an SVG as an inline element.
 */
 function strikebase_svg( $file ) {
	if ( function_exists( 'wpcom_is_vip' ) ) :
		echo wpcom_vip_file_get_contents( esc_url( $file ) );
	else :
		echo file_get_contents( esc_url( $file ) );
	endif;
 }
/*
 * Register a custom shortcode to allow users to insert SVGs.
 * This is used to insert a regular inline SVG.
 * Usage: [svg file="filename"]
 */
function strikebase_svg_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
    'file' => '',
	), $atts );
	$file = get_template_directory_uri() . '/assets/svg/'.$a['file'].'.svg';
	if ( function_exists( 'wpcom_is_vip' ) ) :
		return wpcom_vip_file_get_contents( esc_url( $file ) );
	else :
		return file_get_contents( esc_url( $file ) );
	endif;
}
add_shortcode( 'svg', 'strikebase_svg_shortcode' );
/*
 * Register a custom shortcode to allow users to insert SVG icons.
 * This is used to insert SVG icons using the strikebase_get_icon function.
 * Usage: [svg-icon name="name" id="id"]
 */
function strikebase_svg_icon_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
    'name' => '',
	 'id'   => '',
	), $atts );
	return strikebase_get_icon( $a['name'], $a['id'] );
}
add_shortcode( 'svg-icon', 'strikebase_svg_icon_shortcode' );
