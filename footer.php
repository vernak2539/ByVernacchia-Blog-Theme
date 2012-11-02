  </div>
      <?php if(is_sidebar_active('primary_widget_area') || is_sidebar_active('secondary_widget_area')) { ?>
      <div class="span4 sidebar">
        <?php get_sidebar(); ?>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="container">
    <div class="row-fluid copyright">
      <div class="span12">
        &copy; 2010-<?php echo date('Y'); ?> Alex Vernacchia. Theme <a href="https://github.com/vernak2539/ByVernacchia-Blog-Theme" target="_blank">ByVernacchia</a> by Alex Vernacchia
      </div>
    </div>
  </div>
  <?php wp_footer(); ?>
  </body>
</html>
