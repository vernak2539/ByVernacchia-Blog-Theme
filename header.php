<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php bloginfo('name'); ?><?php if(is_single()) { echo ' | ' .  the_title("", "", false); } ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Alex Vernacchia">

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rdf_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" href="<?php bloginfo('atom_url'); ?>" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-XXXX-X']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </head>
  <body>
    <div class="container hidden-phone">
      <div class="main-logo">
        <a href="<?php echo bloginfo('wpurl'); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>"></a>
      </div>
    </div>
    <nav class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand visible-phone" href="/">Blog By Vernacchia</a>
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="divider-vertical"></li>
              <?php 
              wp_nav_menu( 
                array(
                  'theme_location' => 'primary',
                  'sort_column'    => 'menu_order', 
                  'container'      => false,
                  'items_wrap'     => '%3$s',
                  'after'          => '<li class="divider-vertical"></li>',
                  'depth'          => 1
                )
              ); 
              ?>
              <li class="social-links hidden-phone">
                <a href="http://twitter.com/vernacchia" rel="tooltip" title="@vernacchia" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/sm-twitter.png"></a>
                <a href="http://www.linkedin.com/in/alexvernacchia" rel="tooltip" title="LinkedIn" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/sm-linkedin.png"></a>
                <a href="http://github.com/vernak2539" rel="tooltip" title="My Github" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/sm-github.png"></a>
                <a href="http://vizualize.me/HInDtrv78i?r=HInDtrv78i" rel="tooltip" title="Vizualize.me" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/sm-vizualize.png"></a>
                <a href="http://www.pandora.com/profile/alvernacchia" rel="tooltip" title="Pandora" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/sm-pandora.png"></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="container content">
      <div class="row-fluid">
        <div class="span12 alert"  id="not-blog-alert">
          <button type="button" class="close" onclick="$(this).parent().hide()">×</button>
          <strong>Sorry!</strong> I am working working on other parts of my site. The rest of it will be done soon!
        </div>
      </div>
      <div class="row-fluid">
        <?php if(is_sidebar_active('primary_widget_area') || is_sidebar_active('secondary_widget_area')) { ?>
        <div class="span8">
        <?php } else { ?>
        <div class="span12">
        <?php } ?>
