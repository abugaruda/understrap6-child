<?php
/**
 * Header layout settings and widget area.
 *
 * @package UnderstrapChild
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register the header layout control in the parent's layout section.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function understrap6_child_customize_header_layout( $wp_customize ) {
	$wp_customize->add_setting(
		'understrap6_child_header_layout',
		array(
			'default'           => 'single',
			'sanitize_callback' => 'understrap6_child_sanitize_header_layout',
		)
	);

	$wp_customize->add_control(
		'understrap6_child_header_layout',
		array(
			'label'       => __( 'Header layout', 'understrap-child' ),
			'description' => __( 'Add content to the Header widgets area under Appearance → Widgets.', 'understrap-child' ),
			'section'     => 'understrap_theme_layout_options',
			'type'        => 'select',
			'choices'     => array(
				'single'  => __( 'One row', 'understrap-child' ),
				'stacked' => __( 'Two rows: branding and widgets above the menu', 'understrap-child' ),
			),
		)
	);
}
add_action( 'customize_register', 'understrap6_child_customize_header_layout', 20 );

/**
 * Validate the header layout setting.
 *
 * @param mixed $layout Saved layout.
 * @return string
 */
function understrap6_child_sanitize_header_layout( $layout ) {
	return 'stacked' === $layout ? 'stacked' : 'single';
}

/**
 * Register the widget area next to the site branding.
 */
function understrap6_child_register_header_widgets() {
	register_sidebar(
		array(
			'name'          => __( 'Header widgets', 'understrap-child' ),
			'id'            => 'understrap6-child-header',
			'description'   => __( 'Shown next to the site branding in the two-row header.', 'understrap-child' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'understrap6_child_register_header_widgets' );
