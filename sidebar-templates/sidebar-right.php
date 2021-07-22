<?php
/**
 * The right sidebar containing the main widget area
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<div class="col-12 col-md-4 col-lg-3 offset-lg-1 widget-area" id="right-sidebar" role="complementary">
<div id="recent-posts">
  <h4>Recent Posts</h4>
  <ul id="recent-posts-list">
    <?php
      $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 3,
        'post_status' => 'publish',
        'exclude'     => $post->ID
      ));
      foreach($recent_posts as $post) {
      ?>
        <li class="mb-3">
          <div class="background">
            <?php if(get_the_post_thumbnail_url($post['ID'])) { ?>
              <img src="<?= get_the_post_thumbnail_url($post['ID']); ?>" alt="<?= get_the_title($post['ID']); ?>" />
            <?php } ?>
          </div>
          <div class="post-data p-4">
            <h5><a class="stretched-link" href="<?php the_permalink($post['ID']); ?>"><?= get_the_title($post['ID']); ?></a></h5>
            <p><?= get_the_date('', $post['ID']); ?></p>
          </div>
        </li>
      <?php
      } //end foreach
  ?>
  </ul>
</div>
<?php dynamic_sidebar( 'right-sidebar' ); ?> 

</div><!-- #right-sidebar -->
