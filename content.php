<?php
// Displays single posts on index page. 
// used in loop
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-date hidden-phone">
    <div class="post-date-circle">
      <div class="day">
        <?php echo get_the_date('j'); ?>
      </div>
      <div class="month">
        <?php echo get_the_date('M'); ?>
      </div>
    </div>
    <div class="year">
      <?php echo get_the_date('Y'); ?>
    </div>
  </div>
  <?php edit_post_link('Edit', '<div class="edit-link hidden-phone">', '</div>'); ?>
  <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
  <div class="post-meta visible-phone">
    <?php
    printf( __( 'Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>'),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s' ), get_the_author() ) ),
        esc_html( get_the_author() )
    );
    ?>
  </div>
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