  </div>
      <?php if(is_single()) { ?>
      <div class="span4 sidebar single-nav">
        <div class="sidebar">
          <div class="single-prev">
            <?php 
              $p = get_adjacent_post(0,'',1);
              if(!empty($p)) {
            ?>
              <a href="<?php echo get_permalink($p->ID); ?>" rel="popover" data-original-title="<strong>Previous Post</strong>" data-content="<?php echo $p->post_title; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/single-prev.png" /></a>
            <?php } else { ?>
              <a href="#" class="unclickable"><img src="<?php bloginfo('template_directory'); ?>/img/trans-1x1.gif" width="92" height="91" /></a>
            <?php } ?>
          </div
          ><div class="single-next">
            <?php 
              $n = get_adjacent_post(0,'',0);
              if(!empty($n)) {
            ?>
              <a href="<?php echo get_permalink($n->ID); ?>" rel="popover" data-original-title="<strong>Next Post</strong>" data-content="<?php echo $n->post_title; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/single-next.png" /></a>
            <?php } else { ?>
              <a href="#" class="unclickable"><img src="<?php bloginfo('template_directory'); ?>/img/trans-1x1.gif" width="92" height="91" /></a>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php if(is_sidebar_active('primary_widget_area') || is_sidebar_active('secondary_widget_area')) { ?>
      <div class="span4 sidebar">
        <?php get_sidebar(); ?>
      </div>
      <?php } ?>
    </div>
  </div>
  <footer id="footer-all" class="container">
    <div class="row-fluid copyright">
      <div class="span12">
        &copy; 2010-<?php echo date('Y'); ?> Alex Vernacchia. Theme <a href="https://github.com/vernak2539/ByVernacchia-Blog-Theme" target="_blank">ByVernacchia</a> by Alex Vernacchia
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
  </body>
</html>
