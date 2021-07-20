<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<?php if($paged === 1) { ?>
	<?php get_template_part( 'global-templates/home-hero' ); ?>
	<?php get_template_part( 'global-templates/home-under-hero' ); ?>
<?php } ?>


<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<div id="loading" class="col">
				<div class="justify-content-center d-none">
					<div class="spinner-border" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
			<?php if($paged != 1) { ?>
				<?php understrap_pagination(array(
					'linkID'=>'index-wrapper'
			)); ?>
			<?php } ?>
			<main class="site-main" id="main">
				
				<?php
        $heroExclude = new HomeHero();
        $excludeHero = $heroExclude->SetExclude();
				$ppp = 5;
				$offset = 2;
				if($paged > 1) {
					$paged = $paged-1;//page math correction
					$offset = ($paged*$ppp)+$offset;
				}
				
        $args = array('post__not_in' => array($excludeHero), 'offset' => $offset, 'posts_per_page' => $ppp);
        $q1 = new WP_query($args);
				if ( $q1->have_posts() ) {
					// Start the Loop.
					$i = 1;
					while ( $q1->have_posts() ) {
						$q1->the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format(), array(
							'q1'=>$q1,
							'i'=>$i 
						) );
						$i++;
					}
				} else {
					get_template_part( 'loop-templates/content', 'none' );
				}
				?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(array(
				'linkID'=>'index-wrapper'
			)); ?>
			<?php wp_reset_postdata(); ?>
			<!-- Do the right sidebar check -->
			<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
