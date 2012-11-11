<?php

get_header();

?>
<div id="posts-index">
<?php
  if(have_posts()) { 
    while(have_posts()) { 
      the_post();
      get_template_part('content', 'index');
    } // end while
?>
</div>
    <div class="page-navigation pagination">
      <?php
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $wp_query->max_num_pages,
          'prev_text' => '<img src="'.get_template_directory_uri().'/img/prev-page.png" alt="previous page of posts" class="pagination-links" />',
          'next_text' => '<img src="'.get_template_directory_uri().'/img/next-page.png" alt="next page of posts" class="pagination-links" />',
          'type' => 'list'
        ));
      ?>
    </div>
  <?php
  } else { // else if
  ?>
    <div class="post">
      <h2><?php _e('You haven\'t posted anything yet! Get writing!'); ?></h2>
    </div>    
  <?php
  } // end if

get_footer();