<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$i = $args['i'];
?>

<article <?php post_class(['row', 'py-4']); ?> id="post-<?php the_ID(); ?>">

	<?php
		if(get_the_post_thumbnail()) {
	?>
		<div class="col-12 col-lg-6<?php if($i%2 == 0) { echo ' order-lg-last'; }; ?>">
			<a href="<?= get_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'post-list', ['class' => 'rounded'] ); ?></a>
		</div>
	<?php
		}
	?>
	<div class="entry-content col align-self-center">
		<header class="entry-header">

			<?php
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>

			<?php if ( 'post' === get_post_type() ) : ?>

				<div class="entry-meta mb-3">
					<?php understrap_posted_on(['by-line', 'posted-on-text']); ?>
				</div><!-- .entry-meta -->

			<?php endif; ?>

		</header><!-- .entry-header -->
		<?php the_excerpt(); ?>
		<?php understrap_entry_footer(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
