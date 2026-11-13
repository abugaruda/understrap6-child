<?php
/**
 * Select the Bootstrap 5 offcanvas navbar layout.
 *
 * @package UnderstrapChild
 */

defined( 'ABSPATH' ) || exit;

if ( 'stacked' === get_theme_mod( 'understrap6_child_header_layout', 'single' ) ) {
	get_template_part( 'global-templates/navbar-stacked-bootstrap5', null, array( 'offcanvas' => true ) );
	return;
}

load_template( get_template_directory() . '/global-templates/navbar-offcanvas-bootstrap5.php', false );
