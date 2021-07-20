<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<div class="col-4 widget-area" id="right-sidebar" role="complementary">

<?php dynamic_sidebar( 'right-sidebar' ); ?>

</div><!-- #right-sidebar -->
