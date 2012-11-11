<?php
// Displays single posts on index page. 
// used in loop
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
      the_post_thumbnail('thumbnail', array('align' => 'right', 'class' => 'post-thumbnail', 'height' => '150'));
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