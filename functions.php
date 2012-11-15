<?php

require( dirname( __FILE__ ) . '/inc/template-tags.php' );

function new_excerpt_more($more) {
global $post;
  return '... <a href="'. get_permalink($post->ID) . '">[more]</a>';
}

function custom_excerpt_length($length) {
  return 85;
}

function bv_widget_init() {
  register_sidebar(
    array(
      'name' => 'Primary Widget Area',
      'id' => 'primary_widget_area',
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget' => '</li>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
    )
  );
  register_sidebar(
    array(
      'name' => 'Secondary Widget Area',
      'id' => 'secondary_widget_area',
      'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
      'after_widget' => '</li>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>'
    )
  );
}

function is_sidebar_active($index) {
  global $wp_registered_sidebars;
  $widget_columns = wp_get_sidebars_widgets();
  if($widget_columns[$index]) {
    return true;
  }
  return false;
}

function bv_load_js() {
  if(!is_admin()) {
    wp_deregister_script('jquery'); 
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js', array(), '1.8.2', false);  
    wp_enqueue_script('jquery'); 

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '2.1.1', true );
    wp_enqueue_script('bootstrap');   

    wp_register_script('prettify', get_template_directory_uri() . '/js/prettify.js', array('jquery'), '', true );
    wp_enqueue_script('prettify');

    wp_register_script('main', get_template_directory_uri() . '/js/app.js', array('bootstrap'), '.1', true);
    wp_enqueue_script('main');
  }
}

function bv_post_class($classes) {
  if(is_single()) {
    $classes[] = sanitize_html_class('post-full');
  }
  return $classes;
}

register_nav_menu('primary', 'Navigation Menu');
add_filter('excerpt_more', 'new_excerpt_more');
add_filter('excerpt_length', 'custom_excerpt_length', 999);
add_filter('post_class', 'bv_post_class');
add_action('wp_enqueue_scripts','bv_load_js');
add_action('init', 'bv_widget_init');
add_theme_support('custom-background');
add_theme_support('post-thumbnails'); 
add_theme_support( 'infinite-scroll', array(
    'container'  => 'posts-index',
    'footer'     => 'footer-all'
));
add_theme_support( 'custom-header', array(
  'default-image'          => get_template_directory_uri() . '/img/main-logo.png',
  'random-default'         => false,
  'width'                  => 204,
  'height'                 => 125,
  'flex-height'            => true,
  'flex-width'             => true,
  'header-text'            => false,
  'uploads'                => true
));






?>