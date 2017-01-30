<?php
/**
 * Init Custom Taxonomies
 *
 * @action after_theme_setup
 * @returns null
 */
function strikebase_taxonomies_init() {
	// General class
	require_once( get_template_directory() . '/inc/custom-taxonomies/class-taxonomies.php' );
	// Classes for individual Taxonomies
	require_once( get_template_directory() . '/inc/custom-taxonomies/class-taxonomies-person.php' );
	require_once( get_template_directory() . '/inc/custom-taxonomies/class-taxonomies-project.php' );
	require_once( get_template_directory() . '/inc/custom-taxonomies/class-taxonomies-shared.php' );
}

add_action( 'after_setup_theme', 'strikebase_taxonomies_init' );
