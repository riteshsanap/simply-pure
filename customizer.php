<?php 
/************************************************************************************/
 /*	Theme Customizer	*/		
 /************************************************************************************/		
 function simply_pure_customizer( $wp_customize ) {

    $wp_customize->add_setting( 'subtext_color' , array(
        'default'     => '#666666',
        'transport'   => 'refresh',
        'capability' => 'edit_theme_options', //Capability needed to tweak
        'sanitize_callback'=>'sanitize_hex_color',
    ) );

    $wp_customize->add_control( 
        new WP_Customize_Color_Control( 
        $wp_customize, 
        'subtext_color_control', 
        array(
            'label'      => __( 'Header Subtext Color', 'simply-pure' ),
            'section'    => 'colors',
            'settings'   => 'subtext_color',
        ) ) 
    );
 	$wp_customize->add_section('simply_pure_sidebar', array(
 		'title' => __('Theme Settings', 'simply-pure'),
 		'priority'=> 110
 		));
 		/* Sidebar Positioning */
    $wp_customize->add_setting( 'sidebar_position' , array(
    	'default'     => 'left',
    	'transport'   => 'refresh',
    	'capability' => 'edit_theme_options', //Capability needed to tweak
        'sanitize_callback'=>'simply_pure_sanitize_sidebar_position'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'simply_pure_sidebar_position_select', array(
	'label'        => __( 'Sidebar Position', 'simply-pure' ),
	'section'    => 'simply_pure_sidebar',
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
        'sanitize_callback'=>'simply_pure_sanitize_header_position'
    	));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'simply_pure_header_position', array(
    	'label' => __('Header Position','simply-pure'),
    	'section' =>'simply_pure_sidebar',
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
        'sanitize_callback'=>'simply_pure_sanitize_avatar_display'
    ) );
    
    $wp_customize->add_control( 'display_avatar_control', array(
        'settings' => 'display_avatar',
        'label'    => __( 'Display Avatar next to Post title', 'simply-pure'),
        'section'  => 'simply_pure_sidebar',
        'type'     => 'checkbox',
        ) );
 }
 add_action( 'customize_register', 'simply_pure_customizer' ); 

/************************************************************************************/
/*    Sanitization functions    */        
/************************************************************************************/        
 /**
  * Sanitization for Header Display Position
  */
 function simply_pure_sanitize_header_position ($pos) {
    if ( ! in_array( $pos, array( 'sidebar-top', 'content-top', 'both', 'content-top-home' ) ) )
        $pos = 'content-top-home';
    return $pos;
 }
 /**
  * Sanitization for Sidebar Position
  */
 function simply_pure_sanitize_sidebar_position ($pos) {
    if ( ! in_array( $pos, array( 'left', 'right' ) ) )
        $pos = 'left';
    return $pos;
 }

 /**
  * Sanitization for Avatar Display
  */
 function simply_pure_sanitize_avatar_display ($value) {
    if ( ! in_array( $value, array( true, false ) ) )
        $value = true;
    return $value;
 }

 function simply_pure_customize_css() { ?>
    <style type="text/css">
    .content .header , .content .header a{ color: #<?php echo esc_attr(get_header_textcolor()); ?>}
    .content .header {background: #<?php echo esc_attr(get_background_color()); ?>  }
    .content .header h2 {color: <?php echo esc_attr(get_theme_mod('subtext_color', '#666666')); ?>}
    .content .header {background-image:url(<?php echo esc_url(get_header_image()); ?>); background-position: center; background-size: cover; }
    </style>
<?php
}
add_action( 'wp_head', 'simply_pure_customize_css');
?>