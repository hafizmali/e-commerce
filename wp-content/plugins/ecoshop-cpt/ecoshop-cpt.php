<?php
/*
Plugin Name: Ecoshop CPT
Plugin URI: http://gomalthemes.com/
Description: Ecoshop custom post type's for only Ecoshop WP theme.
Version: 1.0
Author: Gomal Themes
Author URI: http://gomalthemes.com/
License: GPLv2
*/
// Creating Testimonial CPT
function ecoshop_testimonials() {
    register_post_type( 'ecoshop-testimonials',
        array(
            'labels' => array(
                'name' => 'Testimonials',
                'singular_name' => 'Testimonial',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Testimonial',
                'edit' => 'Edit',
                'edit_item' => 'Edit Testimonial',
                'new_item' => 'New Testimonial',
                'view' => 'View',
                'view_item' => 'View Testimonial',
                'search_items' => 'Search Testimonial',
                'not_found' => 'No Testimonial found',
                'not_found_in_trash' => 'No Testimonial found in Trash',
                'parent' => 'Parent Testimonial'
            ),

            'public' => true,
            'supports' => array( 'title','editor','thumbnail'),
            'show_in_nav_menus' => false,
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'img/testimonials.png', __FILE__ ),
            'has_archive' => true,
            'exclude_from_search' => true,
        )
    );
}
add_action( 'init', 'ecoshop_testimonials' );
add_action( 'init', 'ecoshop_test_taxonomies', 0 );
function ecoshop_test_taxonomies() {
    register_taxonomy(
        'ecoshop_testimonials_genre',
        'ecoshop-testimonials',
        array(
            'labels' => array(
                'name' => 'Groups',
                'add_new_item' => 'Add New Group',
                'new_item_name' => "New Group"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'show_in_nav_menus' => false,
            'hierarchical' => true
        )
    );
}