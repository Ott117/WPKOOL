<?php
/**
 * VW Automobile Lite Theme Customizer
 *
 * @package VW Automobile Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_automobile_lite_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_automobile_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-automobile-lite' ),
	    'description' => __( 'Description of what this panel does.', 'vw-automobile-lite' ),
	) );

	$wp_customize->add_section( 'vw_automobile_lite_left_right', array(
    	'title'      => __( 'General Settings', 'vw-automobile-lite' ),
		'priority'   => 30,
		'panel' => 'vw_automobile_lite_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_automobile_lite_theme_options',array(
	        'default' => 'One Column',
	        'sanitize_callback' => 'vw_automobile_lite_sanitize_choices'	        
	));

	$wp_customize->add_control('vw_automobile_lite_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => 'Do you want this section',
	        'section' => 'vw_automobile_lite_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','vw-automobile-lite'),
	            'Right Sidebar' => __('Right Sidebar','vw-automobile-lite'),
	            'One Column' => __('One Column','vw-automobile-lite'),
	            'Three Columns' => __('Three Columns','vw-automobile-lite'),
	            'Four Columns' => __('Four Columns','vw-automobile-lite'),
	            'Grid Layout' => __('Grid Layout','vw-automobile-lite')
	        ),
	    )
    );

	//home page slider
	$wp_customize->add_section( 'vw_automobile_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-automobile-lite' ),
		'priority'   => 30,
		'panel' => 'vw_automobile_lite_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_automobile_lite_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'vw_automobile_lite_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-automobile-lite' ),
			'section'  => 'vw_automobile_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	//Topbar section
	$wp_customize->add_section('vw_automobile_lite_topbar_icon',array(
		'title'	=> __('Topbar Section','vw-automobile-lite'),
		'description'	=> __('Add Top Header Content here','vw-automobile-lite'),
		'priority'	=> null,
		'panel' => 'vw_automobile_lite_panel_id',
	));

	$wp_customize->add_setting('vw_automobile_lite_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_automobile_lite_contact',array(
		'label'	=> __('Add Phone Number','vw-automobile-lite'),
		'section'	=> 'vw_automobile_lite_topbar_icon',
		'setting'	=> 'vw_automobile_lite_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_automobile_lite_email',array(
		'label'	=> __('Add Email','vw-automobile-lite'),
		'section'	=> 'vw_automobile_lite_topbar_icon',
		'setting'	=> 'vw_automobile_lite_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_automobile_lite_headertimings',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_automobile_lite_headertimings',array(
		'label'	=> __('Add Timing','vw-automobile-lite'),
		'section'	=> 'vw_automobile_lite_topbar_icon',
		'setting'	=> 'vw_automobile_lite_headertimings',
		'type'		=> 'text'
	));
	
	//Our Services
	$wp_customize->add_section('vw_automobile_lite_choose_us',array(
		'title'	=> __('Choose Us Section','vw-automobile-lite'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'vw_automobile_lite_panel_id',
	));
	
	$wp_customize->add_setting('vw_automobile_lite_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_automobile_lite_title',array(
		'label'	=> __('Title','vw-automobile-lite'),
		'section'	=> 'vw_automobile_lite_choose_us',
		'type'	=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_automobile_lite_choose_us_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_automobile_lite_choose_us_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','vw-automobile-lite'),
		'section' => 'vw_automobile_lite_choose_us',
	));
	
	/** home page setions end here**/	
}
add_action( 'customize_register', 'vw_automobile_lite_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_automobile_lite_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'vw_automobile_lite_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new vw_automobile_lite_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'VW Automobile Pro', 'vw-automobile-lite' ),
					'pro_text' => esc_html__( 'Go Pro',         'vw-automobile-lite' ),
					'pro_url'  => 'https://www.vwthemes.com/premium/automobile-wordpress-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-automobile-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-automobile-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
vw_automobile_lite_customize::get_instance();