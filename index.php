<?php

get_header();

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
        <?php 
        if(has_post_thumbnail($post->ID))
          the_post_thumbnail('thumbnail', array('align' => 'right', 'class' => 'post-thumbnail'));
        ?>
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
    <div class="post">
      <h2><?php _e('You haven\'t posted anything yet! Get writing!'); ?></h2>
    </div>    
  <?php
  } // end if

get_footer();