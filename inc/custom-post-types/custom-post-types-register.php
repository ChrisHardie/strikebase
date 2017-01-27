<?php

/**
 * Init Custom Post Types
 */
function strikebase_post_types_init() {
	// General class
	require_once( get_template_directory() . '/inc/custom-post-types/class-post-type.php' );
	// Classes for individual CPTs
	require_once( get_template_directory() . '/inc/custom-post-types/class-post-type-person.php' );
	require_once( get_template_directory() . '/inc/custom-post-types/class-post-type-project.php' );
}
add_action( 'after_setup_theme', 'strikebase_post_types_init' );
