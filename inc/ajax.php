<?php
  defined( 'ABSPATH' ) || exit;

  add_action( 'wp_ajax_pagination-load-posts', 'pagination_load_posts' );
  add_action( 'wp_ajax_nopriv_pagination-load-posts', 'pagination_load_posts' ); 

  function pagination_load_posts() {
    global $wpdb;
    // Set default variables
    $msg = '';
    if(isset($_POST['page'])){
      // Sanitize the received page   
      $homeHero = new HomeHero();
      $homeHeroExclude = $homeHero->SetExclude();
      $page = sanitize_text_field($_POST['page']);
      $cur_page = $page;
      $page -= 1;
      // Set the number of results to display
      $ppp = 5;
      $previous_btn = true;
      $next_btn = true;
      $first_btn = true;
      $last_btn = true;
      $start = $page * $ppp+2;

      // Set the table where we will be querying data
      $table_name = $wpdb->prefix . "posts";

      $args = array('post__not_in' => $homeHeroExclude, 'offset' => $start, 'posts_per_page' => $ppp);
      $q1 = new WP_query($args);
      $count = new WP_Query(
          array(
              'post_type'         => 'post',
              'post_status '      => 'publish',
              'posts_per_page'    => -1,
              'post__not_in' => $exclude
          )
      );
      if ( $q1->have_posts() ) {
        // Loop into all the posts
        $i = 1;
        while ( $q1->have_posts() ) { 
          $q1->the_post();
          //var_dump($q1);
            // Set the desired output into a variable
          $msg .= '
            <article class="'.implode(get_post_class(['row', 'py-4'], get_the_ID()), ' ').'" id="post-'.get_the_ID().'">';
            if(get_the_post_thumbnail()) {
              if($i%2 == 0) { 
                $class = ' order-last'; 
              };
            $msg .= '
              <div class="col-6'.$class.'">
                '.get_the_post_thumbnail(get_the_ID(), 'post-list' ).'
              </div>';
            };
            $msg .= '
              <div class="entry-content col align-self-center">
                <header class="entry-header">
                <h2 class="entry-title"><a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a></h2>';  
            if ( 'post' === get_post_type() ) {

              $msg .= '<div class="entry-meta mb-3">
                <span class="posted-on">Posted On <a href="%2$s" rel="bookmark">'.get_the_date('F j, Y').'</a></span>
                    </div><!-- .entry-meta -->';

            }
            $msg .= '
                </header><!-- .entry-header -->
                <p>'.get_the_excerpt().'</p>
                <p><a class="btn btn-light rounded-pill understrap-read-more-link" href="'.get_permalink().'">Read More</a></p>

              </div><!-- .entry-content -->

            </article><!-- #post-## -->';
            $i++;
          };
      }


        // We echo the final output
        echo $msg;
    } 
  // Always exit to avoid further execution
    exit();
  };