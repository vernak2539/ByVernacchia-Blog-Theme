<?php

get_header();

  while ( have_posts() ) { 
    the_post();
    get_template_part( 'content', 'page' );
    //comments_template( '', false );
   } // end of the loop

get_footer();