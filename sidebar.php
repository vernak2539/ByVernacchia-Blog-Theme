<?php if(is_sidebar_active('primary_widget_area')) { ?>
        <div id="primary-sidebar" class="widget-area">
          <ul class="sidebar">
            <?php dynamic_sidebar('primary_widget_area'); ?>
          </ul>
        </div><!-- #primary .widget-area -->
<?php } ?>       
         
<?php if(is_sidebar_active('secondary_widget_area')) { ?>
        <div id="secondary-sidebar" class="widget-area">
          <ul class="sidebar">
              <?php dynamic_sidebar('secondary_widget_area'); ?>
          </ul>
        </div><!-- #secondary .widget-area -->
<?php } ?>