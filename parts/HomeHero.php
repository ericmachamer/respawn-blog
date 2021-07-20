<?php
  class HomeHero {
    function RetrieveNewestHeroID() {
      $posts = get_posts(array(
        'numberposts'	=> 1,
        'post_type'		=> 'post',
        'meta_key'		=> 'featured_main',
        'meta_value'	=> true,
        'orderby' => 'post_date',
        'order' => 'DESC'
      ));
      
      return $posts;
    }

    function SetExclude() {
      $postID = $this->RetrieveNewestHeroID();
      foreach($postID as $post) {
        $exclude[] = $post->ID;
      }
      return $exclude;
    }

    function DisplayHero() {
      $postID = $this->RetrieveNewestHeroID();
      foreach($postID as $post) {
        setup_postdata( $GLOBALS['post'] =& $post );
?>
        <section id="home-hero" class="container-fluid p-0">
          <div class="row g-0">
            <div class="col">
              <div class="card bg-dark text-white">
                <img src="<?= get_the_post_thumbnail_url(get_the_ID()); ?>" id="hero-bg" class="card-img" alt="">
                <div class="card-img-overlay">
                  <div class="row g-0 justify-content-end align-content-center h-100">
                    <div class="col-5">
                      <h2 class="h1 fw-bold card-title"><?= get_the_title(); ?></h2>
                      <p class="card-text d-none d-lg-block"><?= get_the_excerpt(); ?></p>
                    </div>
                    <div class="col-1 spacer-col"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section><!-- #home-hero -->
<?php
      }//end foreach
      wp_reset_postdata();
    }
  }