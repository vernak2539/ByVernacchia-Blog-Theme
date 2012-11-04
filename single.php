<?php

get_header();


  if(have_posts()) { 
    while(have_posts()) { 
      the_post();
?>
    <div id="post-<?php the_ID(); ?>" class="post-full">
      <h2><?php the_title(); ?><?php edit_post_link('Edit', '<span class="label label-info" style="padding:2px 5px;position:relative;top:-6px;left:10px">', '</span>'); ?></h2>
      
      <div class="entry">
        <?php the_content(); ?>
        <div class="postmetadata">
          <div><?php _e('Posted In: '); ?><?php the_category(', ') ?></div>
          <div class="post-tagged"> 
          <?php if(get_the_tag_list()) { ?>
            <?php echo get_the_tag_list('Tagged: ',', ',''); ?> 
          <?php } ?>
          </div>
        </div>
      </div>
      <?php comments_template(); ?>
    </div>
  <?php
    } // end while
  }

get_footer();