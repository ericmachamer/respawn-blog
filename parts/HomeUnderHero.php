<?php
  class HomeUnderHero {
    function RetrieveNewestPostID($exclude) {
      $posts = get_posts(array(
        'numberposts'	=> 2,
        'post_type'		=> 'post',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post__not_in' => $exclude
      ));
      foreach($posts as $post) {
        $heroPost[] = $post;
      }
      return $heroPost;
    }

    function SetExclude() {
      $postID = $this->RetrieveNewestHeroID();
      return $postID;
    }

    function DisplayUnderHero($exclude) {
      $postID = $this->RetrieveNewestPostID($exclude);
      global $location;
      $location = 'card';
      if(count($postID) > 0) {
?> 
        <section id="home-under-hero" class="container py-5">
          <div class="row">
            <div class="col text-center">
              <h2 class="mb-3">Most Recent</h2>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-lg-2">
<?php
            foreach($postID as $post) {
              setup_postdata( $GLOBALS['post'] =& $post );
?>
              <div class="col">
                <div class="card bg-transparent border-0 text-white h-100 text-center">
                  <a href="<?= get_permalink(); ?>"><img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'card-image'); ?>" class="card-img rounded" alt=""></a>
                  <div class="card-body">
                    <h5 class="card-title"> <a href="<?= get_permalink(); ?>" class="text-decoration-none"><?= get_the_title(); ?></a></h5>
                    <p class="card-text"><?= get_the_excerpt(); ?></p>
                  </div>
                </div>
              </div>
<?php
            }//end foreach
            wp_reset_postdata();
?>
          </div>
        </section>
<?php
      }//end if
      $location = '';
    }//end function
  }