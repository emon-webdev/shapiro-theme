<?php 
// Header panel
new \Kirki\Panel(
	'header_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Header Option', 'kirki' ),
		'description' => esc_html__( 'Header Option.', 'kirki' ),
	]
);

new \Kirki\Section(
	'header_section',
	[
		'title'       => esc_html__( 'Top Header', 'kirki' ),
		'description' => esc_html__( 'Top Header Option Description.', 'kirki' ),
		'panel'       => 'header_panel',
		'priority'    => 160,
	]
);

Kirki::add_field( 'theme_config_id', [
	'type'        => 'select',
	'settings'    => 'header_option',
	'label'       => esc_html__( 'Header Option', 'kirki' ),
	'section'     => 'header_section',
	'default'     => 'header-1',
	'placeholder' => esc_html__( 'Select an header ', 'kirki' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'header-1' => esc_html__( 'Header 1', 'kirki' ),
		'header-2' => esc_html__( 'Header 2', 'kirki' ),
	],
] );


Kirki::add_field( 'theme_config_id', [
	'type'     => 'text',
	'settings' => 'top_heading',
	'label'    => esc_html__( 'Top Heading 1', 'kirki' ),
	'section'  => 'header_section',
	'default'  => esc_html__( 'This is a default value', 'kirki' ),
	'priority' => 10,
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'color',
	'settings'    => 'heading_color',
	'label'       => __( 'Color Control (hex-only)', 'kirki' ),
	'description' => esc_html__( 'This is a color control - without alpha channel.', 'kirki' ),
	'section'     => 'header_section',
	'default'     => '#0088CC',
	'output' => array(
		array(
			'element'  => 'h2',
			'property' => 'color',
		),
		array(
			'element'  => '.my-super-cool-css-class',
			'property' => 'background-color',
		),
	),
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'editor',
	'settings'    => 'editor_setting',
	'label'       => esc_html__( 'My Editor Control', 'kirki' ),
	'description' => esc_html__( 'This is an editor control.', 'kirki' ),
	'section'     => 'header_section',
	'default'     => '',
] );
Kirki::add_field( 'theme_config_id', [
	'type'     => 'link',
	'settings' => 'header_setting',
	'label'    => __( 'Link Control', 'kirki' ),
	'section'  => 'header_section',
	'default'  => 'https://mapsteps.com/',
	'priority' => 10,
] );




// Footer option
new \Kirki\Panel(
	'footer_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Footer Option', 'kirki' ),
		'description' => esc_html__( 'Footer Option.', 'kirki' ),
	]
);

new \Kirki\Section(
	'footer_section',
	[
		'title'       => esc_html__( 'Footer Option', 'kirki' ),
		'description' => esc_html__( 'Footer Option Description.', 'kirki' ),
		'panel'       => 'footer_panel',
		'priority'    => 160,
	]
);

Kirki::add_field( 'theme_config_id', [
	'type'        => 'select',
	'settings'    => 'footer_option',
	'label'       => esc_html__( 'Header Option', 'kirki' ),
	'section'     => 'footer_section',
	'default'     => 'footer-1',
	'placeholder' => esc_html__( 'Select an header ', 'kirki' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'footer-1' => esc_html__( 'footer style 1', 'kirki' ),
		'footer-2' => esc_html__( 'footer style 2', 'kirki' ),
	],
] );

Kirki::add_field( 'theme_config_id', [
	'type'        => 'image',
	'settings'    => 'footer_logo',
	'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
	'description' => esc_html__( 'Description Here.', 'kirki' ),
	'section'     => 'footer_section',
	'default'     => '',
] );

Kirki::add_field( 'theme_config_id', [
	'type'     => 'text',
	'settings' => 'footer_copyright',
	'label'    => esc_html__( 'Footer Copyright ', 'kirki' ),
	'section'  => 'footer_section',
	'default'  => esc_html__( 'Copyright 2023', 'kirki' ),
	'priority' => 10,
] );










