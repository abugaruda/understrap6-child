<?php
/**
 * Select the Bootstrap 5 collapse navbar layout.
 *
 * @package UnderstrapChild
 */

defined( 'ABSPATH' ) || exit;

if ( 'stacked' === get_theme_mod( 'understrap6_child_header_layout', 'single' ) ) {
	get_template_part( 'global-templates/navbar-stacked-bootstrap5' );
	return;
}

load_template( get_template_directory() . '/global-templates/navbar-collapse-bootstrap5.php', false );
