<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-dark" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>

		<?php if ( 'container' === $container ) : ?>
			<div class="container">
		<?php endif; ?>
			<div class="row w-100 g-0 justify-content-between">
				<div class="col-auto">
					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>

						<?php
					} else {
						the_custom_logo();
					}
					?>
					<!-- end custom logo -->
				</div>
				<div class="col-auto">
					<div class="row g-0">
						<?php
							if( have_rows('social_settings', 'option') ) : while( have_rows('social_settings', 'option') ) : the_row();
								if( have_rows('sites') ) :
						?>
								<div class="col-auto pe-4">
									<div class="row g-0 h-100">
										<?php
											while( have_rows('sites') ) : the_row();
												if(get_sub_field('active')) :
										?>
												<div class="col-auto social align-self-center px-2">
													<a href="<?= get_sub_field('url'); ?>" target="_blank"><i class="bi bi-<?= get_sub_field('site_name'); ?> text-light fs-5"></i></a>
												</div>
										<?php
												endif;
											endwhile;
										?>
									</div>
								</div>
						<?php	
								endif;
							endwhile;
							endif;
						?>
						<div class="col-auto">
							<a href="https://respawnproducts.com" target="_blank" class="btn btn-light rounded-pill">Shop</a>
						</div>
					</div>
				</div>
			</div>

				<!-- The WordPress Menu goes here -->
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
