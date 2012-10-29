<?php get_header(); ?>

    
        <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
				global $more;
				$more = 100;
				?>
                <div class="post">
                    <div class="post-title">
                    	<h4><a href="#" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                	</div>
                    <div class="entry">
                    	<?php the_content(); ?>
                    </div>
                    <div class="comments">
                    	<span class="post-cat">Category: <?php the_category(', '); ?></span>
                    	<div class="post-comments"> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
                    </div>
                </div>
                <?php
            } // end while
        } else {
            echo 'not found';
        }
        ?>
    </div><!-- end of middle. start tag in header-->
    <div id="right">
    	<?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>