<?php
/**
 * Init/require Custom Fields
 *
 * @action after_theme_setup
 * @returns null
 */
function strikebase_fields_init() {
	// General class
	require_once( get_template_directory() . '/inc/custom-fields/class-fields.php' );
	// Classes for individual Taxonomies
	require_once( get_template_directory() . '/inc/custom-fields/class-fields-person.php' );
	require_once( get_template_directory() . '/inc/custom-fields/class-fields-project.php' );
}

add_action( 'after_setup_theme', 'strikebase_fields_init' );
