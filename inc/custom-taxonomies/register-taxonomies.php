<?php
/**
 * Init Custom Taxonomies
 */
function strikebase_taxonomies_init() {
	// General class
	require_once( get_template_directory() . '/inc/custom-taxonomies/taxonomies.php' );
	// Classes for individual Taxonomies
	require_once( get_template_directory() . '/inc/custom-taxonomies/taxonomies-person.php' );
	require_once( get_template_directory() . '/inc/custom-taxonomies/taxonomies-project.php' );
	require_once( get_template_directory() . '/inc/custom-taxonomies/taxonomies-shared.php' );
}

add_action( 'after_setup_theme', 'strikebase_taxonomies_init' );
