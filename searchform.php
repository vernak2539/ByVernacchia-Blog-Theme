<form role="search" method="get" id="searchform" action="<?php bloginfo('wpurl'); ?>" class="form-search visible-desktop">
  <div class="input-append">
    <input type="text" class="span11 search-query" name="s" id="s" placeholder="<?php if(isset($_GET['s'])) echo $_GET['s']; ?>">
    <button type="submit" class="btn">Search</button>
  </div>
</form>

<form role="search" method="get" id="searchform" action="<?php bloginfo('wpurl'); ?>" class="form-search hidden-desktop">
  <input type="text" class="span12 search-query hidden-desktop" name="s" id="s-tablet" placeholder="<?php echo isset($_GET['s']) ?  $_GET['s'] :  "Search"; ?>" />
</form>