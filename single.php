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
        <?php } 
          if(have_posts()) { 
            while(have_posts()) { 
              the_post();
        ?>
            <div id="post-<?php the_ID(); ?>" class="post-full">
              <h2><?php the_title(); ?> <?php edit_post_link('Edit', '<span class="label label-info" style="padding:2px 5px;position:relative;top:-4px;>', '</span>'); ?></h2>
              
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