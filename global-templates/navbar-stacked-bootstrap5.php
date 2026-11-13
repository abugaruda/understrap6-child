<?php
/**
 * Two-row Bootstrap 5 header.
 *
 * @package UnderstrapChild
 */

defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type', 'container' );
$offcanvas = ! empty( $args['offcanvas'] );
$menu_id   = $offcanvas ? 'navbarNavOffcanvas' : 'navbarNavDropdown';
?>

<div class="navbar navbar-dark bg-primary">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 w-100">
			<div class="mw-100">
				<?php get_template_part( 'global-templates/navbar-branding' ); ?>
			</div>
			<?php if ( is_active_sidebar( 'understrap6-child-header' ) || is_customize_preview() ) : ?>
				<div class="mw-100 text-break text-white">
					<?php dynamic_sidebar( 'understrap6-child-header' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-primary" aria-labelledby="main-nav-label">
		<h2 id="main-nav-label" class="screen-reader-text"><?php esc_html_e( 'Main Navigation', 'understrap' ); ?></h2>
		<div class="<?php echo esc_attr( $container ); ?>">
			<button
				class="navbar-toggler"
				type="button"
				data-bs-toggle="<?php echo $offcanvas ? 'offcanvas' : 'collapse'; ?>"
				data-bs-target="#<?php echo esc_attr( $menu_id ); ?>"
				aria-controls="<?php echo esc_attr( $menu_id ); ?>"
				<?php if ( ! $offcanvas ) : ?>
					aria-expanded="false"
				<?php endif; ?>
				aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>"
			>
				<span class="navbar-toggler-icon"></span>
			</button>

			<?php if ( $offcanvas ) : ?>
				<div class="offcanvas offcanvas-end bg-primary text-white" tabindex="-1" id="<?php echo esc_attr( $menu_id ); ?>" aria-labelledby="main-nav-label">
					<div class="offcanvas-header justify-content-end">
						<button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="<?php esc_attr_e( 'Close menu', 'understrap' ); ?>"></button>
					</div>
			<?php endif; ?>

			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => $offcanvas ? 'offcanvas-body' : 'collapse navbar-collapse',
					'container_id'    => $offcanvas ? '' : $menu_id,
					'menu_class'      => 'navbar-nav',
					'fallback_cb'     => false,
					'menu_id'         => 'main-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>

			<?php if ( $offcanvas ) : ?>
				</div>
			<?php endif; ?>
		</div>
	</nav>
<?php endif; ?>
