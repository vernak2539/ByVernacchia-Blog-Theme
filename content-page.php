<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="wp-page-header">
        <h3 class="wp-page-title"><?php the_title(); ?></h3>
        <?php edit_post_link('Edit', '<span class="label label-info" style="padding:2px 5px;position:relative;top:-4px;left:10px">', '</span>'); ?>
    </header><!-- .wp-page-header -->
 
    <div class="wp-page-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'shape' ), 'after' => '</div>' ) ); ?>
    </div><!-- .wp-page-content -->
</article><!-- #post-<?php the_ID(); ?> -->