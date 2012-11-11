<?php
    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if ( post_password_required() )
        return;
?>
 
    <div id="comments" class="comments-area">
 
    <?php // You can start editing here -- including this comment! ?>
 
    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php
                printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number() ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h3>
 
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
        <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation'); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments') ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;') ); ?></div>
        </nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>
 
        <ol class="commentlist">
            <?php
              wp_list_comments( array( 'callback' => 'bv_comment' ) );
            ?>
        </ol><!-- .commentlist -->
 
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through? If so, show navigation ?>
        <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
            <h1 class="assistive-text"><?php _e( 'Comment navigation'); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments') ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;' ) ); ?></div>
        </nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
        <?php endif; // check for comment navigation ?>
 
    <?php endif; // have_comments() ?>
 
    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>
    <?php endif; ?>
 
    <?php 

      $commenter = wp_get_current_commenter();
      $req = get_option( 'require_name_email' );
      $aria_req = ( $req ? " aria-required='true'" : '' );

      $comment_args =  array(
        'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . '</p>',
        'fields' =>  array(
          'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="Who are you?" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
          'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" placeholder="Have an email?" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
          'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" placeholder="Do you have a website?" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
        ),
        'comment_field' => '<textarea id="comment" name="comment" aria-required="true" placeholder="What do you want to tell me?"></textarea></p>',
        'comment_notes_after' => '<p class="form-allowed-tags"><small>' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</small></p>'
      ); 

      comment_form($comment_args); 
    ?>
 
</div><!-- #comments .comments-area -->