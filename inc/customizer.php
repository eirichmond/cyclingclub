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
function cyclingclublite_customize_register( $wp_customize ) {
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'cyclingclublite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'cyclingclublite_customize_partial_blogdescription',
		) );
	}

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
			'sanitize_callback' => 'sanitize_hex_color',
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
add_action( 'customize_register', 'cyclingclublite_customize_register' );

function cyclingclublite_customize_css()
{
    ?>
         <style type="text/css">
             .button:hover, .main-navigation li:hover > a, .main-navigation li.focus > a, .trim-background-color,.trim-border-bottom:after, .home .secondary-background-colour {
	             background : <?php echo get_theme_mod('accent_color', '#68B1DF'); ?>; }
             #content a, #content a:visited, .site-info > a, #footer-menu li a:hover {
	             color : <?php echo get_theme_mod('accent_color', '#68B1DF'); ?>;
             }
             #footer-menu {
	             border-bottom-color : <?php echo get_theme_mod('accent_color', '#68B1DF'); ?>;
             }
             article {
	             border-left-color : <?php echo get_theme_mod('accent_color', '#68B1DF'); ?>;
             }
         </style>
    <?php
}
add_action( 'wp_head', 'cyclingclublite_customize_css');


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cyclingclublite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cyclingclublite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cyclingclublite_customize_preview_js() {
	wp_enqueue_script( 'cyclingclublite-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cyclingclublite_customize_preview_js' );
