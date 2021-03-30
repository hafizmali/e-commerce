<?php
/*
Plugin Name: Ecoshop Tweets
Plugin URI: http://gomalthemes.com/
Description: Ecoshop Tweets recent tweets plugin for only Ecoshop theme.
Version: 1.0
Author: Gomal Themes
Author URI: http://gomalthemes.com/
License: GPLv2
*/
function ecoshop_enqueue_scripts(){
    // Register JavaScript.
    wp_register_script('ecoshoptweets', plugins_url('tweets.js', __FILE__), array('jquery'), '', true);
    // Enqueue JavaScript.
    wp_enqueue_script('ecoshoptweets');
}
add_action('wp_enqueue_scripts','ecoshop_enqueue_scripts');