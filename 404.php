<?php

get_header();

?>

  <h3 style="color:#666;">Opps...</h3>
  <p><strong>Looks like this page <em style="color:#888">(<?php echo $_SERVER['REQUEST_URI']; ?>)</em> doesn't exist. Look what you found though.</strong></p>
  <div class="video-container">  
    <iframe width="620" height="465" src="http://www.youtube.com/embed/oHg5SJYRHA0?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
  </div>
  <p>I had to, sorry!</p>
        
<?php
get_footer();