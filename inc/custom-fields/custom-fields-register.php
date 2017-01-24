<?php
/**
 * Init Custom Fields
 */
function strikebase_fields_init() {
	// General class
	require_once( get_template_directory() . '/inc/custom-fields/class-strikebase-fields.php' );
	// Classes for individual Taxonomies
	require_once( get_template_directory() . '/inc/custom-fields/class-strikebase-fields-person.php' );
	require_once( get_template_directory() . '/inc/custom-fields/class-strikebase-fields-project.php' );
}

add_action( 'after_setup_theme', 'strikebase_fields_init' );
