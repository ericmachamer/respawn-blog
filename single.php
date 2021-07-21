<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper pb-0" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<header class="entry-header col-12 text-center mb-4 py-4">

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">

					<?php understrap_posted_on(['by-line', 'posted-on-text']); ?>

				</div><!-- .entry-meta -->
				<?php if(has_tag()) { ?>
					<div class="entry-tags mt-3">
						<?php understrap_entry_footer(['edit']); ?>
					</div><!-- entry-tags -->
				<?php } ?>

			</header><!-- .entry-header -->
			<main class="site-main col-12 col-md-8" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) {
					// 	comments_template();
					// }
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->
	<div class="container-fluid g-0">
		<?php understrap_post_nav(); ?>
	</div>

</div><!-- #single-wrapper -->

<?php
get_footer();
