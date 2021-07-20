<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper bg-dark" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-12">

				<footer class="site-footer" id="colophon">
					<div class="row g-0 justify-content-between pb-3">
						<div id="footer-branding" class="col">
							<?php the_custom_logo(); ?>
							<?php
								if( have_rows('social_settings', 'option') ) : while( have_rows('social_settings', 'option') ) : the_row();
									if( have_rows('sites') ) :
							?>
								<div class="row g-0 mt-3">
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
							<?php	
									endif;
								endwhile;
								endif;
							?>
							<p id="footer-shop-btn" class="my-3"><a href="https://respawnproducts.com" target="_blank" class="btn btn-light rounded-pill">Shop All Products</a></p>
							<p class="m-0">&copy;Copyright <?= date('Y'); ?>, RESPAWN</p>
						</div>
						<div id="footer-nav" class="col-auto">
							<h4 class="mb-3">Recent Posts</h4>
							<ul class="recent-posts">
								<?php
									$recent_posts = wp_get_recent_posts(array(
										'numberposts' => 4, // Number of recent posts thumbnails to display
										'post_status' => 'publish' // Show only the published posts
									));
									foreach( $recent_posts as $post_item ) : ?>
										<li class="mb-2">
												<a href="<?php echo get_permalink($post_item['ID']) ?>" class="fs-5 text-decoration-none"><?php echo $post_item['post_title'] ?></a>
										</li>
									<?php endforeach; ?>
							</ul>
						</div>
					</div>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

