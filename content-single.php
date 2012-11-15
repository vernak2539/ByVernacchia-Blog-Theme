<?php
// Display single post
// used in loop, well not really loop
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-date visible-desktop">
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
  <h2>
    <?php the_title(); ?>
    <?php edit_post_link('Edit', '<span class="label label-info edit-content-btn">', '</span>'); ?>
  </h2>

  <div class="post-meta hidden-desktop">
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
    <?php the_content(); ?>
    <div class="postmetadata">
      <div>
        <?php _e('Posted In: '); ?><?php the_category(', ') ?>
      </div>
      <div class="post-tagged"> 
        <?php 
          if(get_the_tag_list()) { 
            echo get_the_tag_list('Tagged: ',', ',''); 
          } 
        ?>
      </div>
    </div>
  </div>
</article>