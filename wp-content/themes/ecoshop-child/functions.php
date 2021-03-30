<?php
add_action( 'wp_enqueue_scripts', 'ecoshop_child_enqueue_styles',50);
function ecoshop_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'dynamic-combined', get_stylesheet_directory_uri() . '/css/dynamic-combined.css' );
} ?>