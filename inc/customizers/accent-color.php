<?php

/**
 * Cycling Club Theme Customizer
 *
 * @package cyclingclublite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cyclingclublite_customize_register_accent_color( $wp_customize ) {

	/*
	 * This adds a setting in the customiser to change
	 * the accent colour through out the site.
	 *
	 * add the setting to the /js/customizer.js for live preview
	 * 
	 */
	
	// add a setting to change the accent colour
	$wp_customize->add_setting( 'accent_color',
		array(
			'default'    => '#68B1DF',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'cyclingclublite_sanitize_hex_color',
			'transport'  => 'postMessage',
		) 
	);      

	// define the colour control for the accent colour
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color',
		array(
			'label'      => __( 'Accent Color', 'cyclingclublite' ),
			'priority'   => 10,
			'section'    => 'colors',
		)
	));
	
	// get the setting and show in the preview
	$wp_customize->get_setting( 'accent_color' )->transport = 'postMessage';

}
add_action( 'customize_register', 'cyclingclublite_customize_register_accent_color' );