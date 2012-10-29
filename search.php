<?php

get_header();

?>
    <div class="container content">
      <div class="row-fluid">
        <div class="span12 alert"  id="not-blog-alert">
          <button type="button" class="close" onclick="$(this).parent().hide()">×</button>
          <strong>Sorry!</strong> I am working working on other parts of my site. The rest of it will be done soon!
        </div>
      </div>
      <div class="row-fluid">
        <?php if(is_sidebar_active('primary_widget_area') || is_sidebar_active('secondary_widget_area')) { ?>
        <div class="span8">
        <?php } else { ?>
        <div class="span12">
        <?php } ?>

          <h4 class="search-label">
            <?php 
            /* Search Count */ 
            $allsearch = &new WP_Query("s=$s&showposts=-1"); 
            $key       = wp_specialchars($s, 1); 
            $count     = $allsearch->post_count; 
            echo '<em>' . $count . '</em> results for: ';
            _e('<span class="search-terms">'); 
            echo $key; 
            _e('</span>'); 
            wp_reset_query(); 
            ?>
          </h4>
          <?php 
          if(have_posts()) { 
            while(have_posts()) { 
              the_post();
          ?>
            <div id="post-<?php the_ID(); ?>" class="post">
              <div class="post-date">
                <span><?php the_date('m.d.Y'); ?></span>
              </div>
              <?php edit_post_link('Edit', '<div class="edit-link">', '</div>'); ?>
              <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
              <div class="entry">
                <?php the_excerpt(); ?>
                <div class="postmetadata">
                  <div><?php _e('Posted In: '); ?><?php the_category(', ') ?></div>
                  <div class="post-tagged"> 
                  <?php if(get_the_tag_list()) { ?>
                    <?php echo get_the_tag_list('Tagged: ',', ',''); ?> 
                  <?php } ?>
                  </div>
                  <div class="post-comments">
                    <?php comments_popup_link('<img src="'.get_template_directory_uri().'/img/comment_add.png" width="28" height="28" />', '<div class="multiple-comments">1</div>', '<div class="multiple-comments">%</div>'); ?>
                  </div>
                </div>
              </div>
            </div>
          <?php
            } // end while
          ?>
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
              ) );

              ?>
            </div>
          <?php
          } else { // else if
          ?>
            <h3 style="color:#666;text-align:center"><?php _e('No posts have what you were searching for. Try again!'); ?></h3> 
            <div class="video-container">  
              <iframe width="620" height="465" src="http://www.youtube.com/embed/oHg5SJYRHA0?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
            </div>
          <?php
          } // end if
          ?>
        </div>
        <?php if(is_sidebar_active('primary_widget_area') || is_sidebar_active('secondary_widget_area')) { ?>
        <div class="span4 sidebar">
          <?php get_sidebar(); ?>
        </div>
        <?php } ?>
      </div>
    </div>
<?php
get_footer();