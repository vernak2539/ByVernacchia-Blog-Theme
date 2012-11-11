<?php
if ( ! function_exists( 'bv_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function bv_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment row-fluid">
            <header class="comment-author-pic span1">
                <?php echo get_avatar( $comment, 40 ); ?>
            </header>
            <div class="comment-info-container span11">
                <footer>
                    <div class="comment-author vcard">
                        <?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    </div><!-- .comment-author .vcard -->
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( '<small>Your comment is awaiting moderation.</small>'); ?></em>
                        <br />
                    <?php endif; ?>
     
                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
                        <?php
                            /* translators: 1: date, 2: time */
                            printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ); ?>
                        </time></a>
                        <?php edit_comment_link( __( '(Edit)' ), ' ' );
                        ?>
                    </div><!-- .comment-meta .commentmetadata -->
                </footer>
     
                <div class="comment-content"><?php comment_text(); ?></div>
     
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->
            </div><!-- .comment-container -->
        </article><!-- #comment-## -->
 
    <?php
            break;
    endswitch;
}
endif; // ends check for bv_comments()