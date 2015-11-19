<?php 
/************************************************************************************/
 /*	Theme Customizer	*/		
 /************************************************************************************/		
 function purecss_customizer( $wp_customize ) {
 	$wp_customize->add_section('purecss_sidebar', array(
 		'title' => __('Theme Settings', 'simply-pure'),
 		'priority'=> 110
 		));
 		/* Sidebar Positioning */
    $wp_customize->add_setting( 'sidebar_position' , array(
    	'default'     => 'left',
    	'transport'   => 'refresh',
    	'capability' => 'edit_theme_options', //Capability needed to tweak
        'sanitize_callback'=>'sanitize_theme_values'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'purecss_sidebar_position_select', array(
	'label'        => __( 'Sidebar Position', 'simply-pure' ),
	'section'    => 'purecss_sidebar',
	'settings'   => 'sidebar_position',
	'type' => 'radio',
	'choices' => array(
		'left'=>__('Left', 'simply-pure'),
	    'right'=>__('Right', 'simply-pure')
	    ),
	 ) ) );
    $wp_customize->add_setting('header_position', array(
    	'transport'=>'refresh',
    	'capability'=>'edit_theme_options',
    	'default'=>'content-top-home',
        'sanitize_callback'=>'sanitize_theme_values'
    	));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'purecss_header_position', array(
    	'label' => __('Header Position','simply-pure'),
    	'section' =>'purecss_sidebar',
    	'settings' =>'header_position',
    	'type' => 'select',
    	'choices' => array(
    		'sidebar-top' => __('Sidebar Top', 'simply-pure'),
    		'content-top' => __('Content Top', 'simply-pure'),
    		'both' => __('Display on Both', 'simply-pure'),
    		'content-top-home' => __('Sidebar Top + (Content Top on Home Page)', 'simply-pure')
    		)
    	)));
    
    $wp_customize->add_setting( 'display_avatar', array(
        'default'        => true,
        'transport'=>'refresh',
        'capability'=>'edit_theme_options',
        'sanitize_callback'=>'sanitize_theme_values'
    ) );
    
    $wp_customize->add_control( 'display_avatar_control', array(
        'settings' => 'display_avatar',
        'label'    => __( 'Display Avatar next to Post title', 'simply-pure'),
        'section'  => 'purecss_sidebar',
        'type'     => 'checkbox',
        ) );
 }
 add_action( 'customize_register', 'purecss_customizer' ); 

 function sanitize_theme_values($value) {
    return $value;    
 }
?>