<?php
/**
 * folium Theme Customizer
 *
 * @package folium
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function folium_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add a footer/copyright information section.
	$wp_customize->add_section( 'footer' , array(
	  'title' => esc_html__( 'Footer', 'folium' ),
		'description' => esc_html__( 'Enter footer copyright information.', 'folium' ),
	  'priority' => 105, // Before Widgets.
	) );

	// Add copyright information setting
	$wp_customize->add_setting( 'copyright' , array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'copyright', array(
	    'label' => esc_html__( 'Copyright Text', 'folium' ),
	    'section' => 'footer',
	    'settings' => 'copyright',
			'type' => 'textarea'
	) ) );

	// Add Banner section
	$wp_customize->add_section( 'banner' , array(
	    'title' => esc_html__( 'Banner', 'folium' ),
	    'description' => esc_html__( 'Enter details below to display introductory banner.', 'folium' ),
			'priority' => 55, // Before Header Image 60
	) );

	// Add Banner title setting
	$wp_customize->add_setting( 'banner-title' , array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner-title', array(
	    'label' => esc_html__( 'Title', 'folium' ),
	    'section' => 'banner',
	    'settings' => 'banner-title'
	) ) );

	// Add Banner subtitle setting
	$wp_customize->add_setting( 'banner-subtitle' , array(
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner-subtitle', array(
	    'label' => esc_html__( 'Subtitle', 'folium' ),
	    'section' => 'banner',
	    'settings' => 'banner-subtitle'
	) ) );

	// Add Banner page setting
	$wp_customize->add_setting( 'banner-page' , array(
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner-page', array(
	    'label' => esc_html__( 'Select Page', 'folium' ),
	    'section' => 'banner',
	    'settings' => 'banner-page',
			'type' => 'dropdown-pages'
	) ) );

	// Add Banner page link text setting
	$wp_customize->add_setting( 'banner-text' , array(
		'default' => esc_html__( 'View Case Study', 'folium' ),
		'transport' => 'postMessage',
		'sanitize_callback' => 'folium_is_empty',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner-text', array(
	    'label' => esc_html__( 'Page Link Text', 'folium' ),
	    'section' => 'banner',
	    'settings' => 'banner-text'
	) ) );

	// Add Banner display setting
	$wp_customize->add_setting( 'banner-display' , array(
		'sanitize_callback' => 'folium_sanitize_checkbox',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'banner-display', array(
	  'label' => esc_html__( 'Check if you want to display banner', 'folium' ),
	  'section' => 'banner',
	  'settings' => 'banner-display',
	  'type' => 'checkbox',
	) ) );

}
add_action( 'customize_register', 'folium_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function folium_customize_preview_js() {
	wp_enqueue_script( 'folium_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'folium_customize_preview_js' );

function folium_is_empty( $value ) {
	if ( !isset( $value ) || trim( $value ) === '' ) $value = esc_html__( 'View Case Study', 'folium' );
	return $value;
}
