<?php
/**
 * Just One Tree Theme Customizer.
 *
 * @package Just_One_Tree
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function strikebase_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// General settings
	$wp_customize->add_section( 'strikebase_general_settings', array(
		'title'           => esc_html__( 'Custom Options', 'strikebase' ),
		'description'     => __( 'Custom options for the site.', 'strikebase' ),
	) );
	$wp_customize->add_setting( 'strikebase_check_in_interval', array(
		'type'              => 'theme_mod', // or 'option'
		'capability'        => 'edit_theme_options',
		'default'           => '6',
		'transport'         => 'refresh', // or postMessage
		'sanitize_callback' => 'strikebase_sanitize_numeric_value',
	) );
	$wp_customize->add_control( 'strikebase_check_in_interval', array(
		'label'     => esc_html__( 'Check-in interval (in months)', 'strikebase' ),
		'section'   => 'strikebase_general_settings',
		'type'      => 'number',
	) );
}
add_action( 'customize_register', 'strikebase_customize_register' );

/**
 * Sanitize a numeric value
 */
function strikebase_sanitize_numeric_value( $input ) {
	if ( is_numeric( $input ) ) :
		return intval( $input );
	else:
		return 0;
	endif;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function strikebase_customize_preview_js() {
	wp_enqueue_script( 'strikebase_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'strikebase_customize_preview_js' );
