<?php

get_header();

  if(have_posts()) { 
    while(have_posts()) { 
      the_post();
      
      get_template_part('content', 'single');
     
      // displaying comments only if they are open and there is 1+ 
      if(comments_open() || get_comments_number() != "0") {
        comments_template('', true); 
      }
    } // end while
  }

get_footer();