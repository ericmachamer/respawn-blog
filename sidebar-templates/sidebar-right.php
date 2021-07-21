<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<div class="offset-lg-1 col-12 col-md-4 col-lg-3 widget-area" id="right-sidebar" role="complementary">

  <?php
    $args = array(
      'header' => 'Popular Posts',
      'post_html' => '<li class="p-4"><div class="background">{thumb}</div><p class="title"><a class="stretched-link h5" href="{url}">{text_title}</a></p><p class="date small">{date}</p></li>',
      'thumbnail_width' => 500,
      'stats_date' => 1,
      'pid' => $post->ID
    );

    wpp_get_mostpopular($args);
  ?>

  <?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->
