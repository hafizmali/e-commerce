<?php
// Legacy Update
function ecoshop_visual_composer_legacy_update() {
    if ( defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.3.5', '<' ) ) {
        do_action( 'vc_before_init' );
    }
}
add_action( 'admin_init', 'ecoshop_visual_composer_legacy_update' );

/* Set Visual Composer */
// Removes tabs such as the "Design Options" from the Visual Composer Settings & page and disables automatic updates.
function ecoshop_visual_composer_set_as_theme() {
    vc_set_as_theme( true );
}
add_action( 'vc_before_init', 'ecoshop_visual_composer_set_as_theme' );
// Remove Default Shortcodes
if ( ! function_exists( 'ecoshop_visual_composer_remove_default_shortcodes' ) ) {
    function ecoshop_visual_composer_remove_default_shortcodes() {
        //vc_remove_element( 'vc_column_text' );
        //vc_remove_element( 'vc_separator' );
        //vc_remove_element( 'vc_text_separator' );
        //vc_remove_element( 'vc_message' );
        //vc_remove_element( 'vc_facebook' );
        //vc_remove_element( 'vc_tweetmeme' );
        //vc_remove_element( 'vc_googleplus' );
        vc_remove_element( 'vc_pinterest' );
        vc_remove_element( 'vc_toggle' );
        //vc_remove_element( 'vc_single_image' );
        vc_remove_element( 'vc_gallery' );
        vc_remove_element( 'vc_images_carousel' );
        vc_remove_element( 'vc_tabs' );
        vc_remove_element( 'vc_tour' );
        vc_remove_element( 'vc_accordion' );
        vc_remove_element( 'vc_posts_grid' );
        vc_remove_element( 'vc_carousel' );
        vc_remove_element( 'vc_posts_slider' );
        vc_remove_element( 'vc_widget_sidebar' );
        vc_remove_element( 'vc_button' );
        vc_remove_element( 'vc_cta_button' );
        //vc_remove_element( 'vc_video' );
        vc_remove_element( 'vc_gmaps' );
        //vc_remove_element( 'vc_raw_html' );
        vc_remove_element( 'vc_raw_js' );
        vc_remove_element( 'vc_flickr' );
        //vc_remove_element( 'vc_progress_bar' );
        //vc_remove_element( 'vc_pie' );
        //vc_remove_element( 'contact-form-7' );
        //vc_remove_element( 'rev_slider_vc' );
        //vc_remove_element( 'rev_slider' );
        vc_remove_element( 'vc_wp_search' );
        vc_remove_element( 'vc_wp_meta' );
        vc_remove_element( 'vc_wp_recentcomments' );
        vc_remove_element( 'vc_wp_calendar' );
        vc_remove_element( 'vc_wp_pages' );
        vc_remove_element( 'vc_wp_tagcloud' );
        vc_remove_element( 'vc_wp_custommenu' );
        //vc_remove_element( 'vc_wp_text' );
        vc_remove_element( 'vc_wp_posts' );
        vc_remove_element( 'vc_wp_links' );
        vc_remove_element( 'vc_wp_categories' );
        vc_remove_element( 'vc_wp_archives' );
        vc_remove_element( 'vc_wp_rss' );
        vc_remove_element( 'vc_button2' );
        vc_remove_element( 'vc_cta_button2' );
        //vc_remove_element( 'vc_custom_heading' );
        //vc_remove_element( 'vc_empty_space' );
        //vc_remove_element( 'vc_icon' );
        vc_remove_element( 'vc_tta_tabs' );
        vc_remove_element( 'vc_tta_tour' );
        vc_remove_element( 'vc_tta_accordion' );
        vc_remove_element( 'vc_tta_pageable' );
        //vc_remove_element( 'vc_btn' );
        vc_remove_element( 'vc_cta' );
        vc_remove_element( 'vc_round_chart' );
        vc_remove_element( 'vc_line_chart' );
        vc_remove_element( 'vc_basic_grid' );
        //vc_remove_element( 'vc_media_grid' );
        vc_remove_element( 'vc_masonry_grid' );
        vc_remove_element( 'vc_acf' );
        //vc_remove_element( 'vc_masonry_media_grid' );
        vc_remove_element( 'recent_products' );
        vc_remove_element( 'featured_products' );
        vc_remove_element( 'product' );
        vc_remove_element( 'products' );
        vc_remove_element( 'add_to_cart' );
        vc_remove_element( 'add_to_cart_url' );
        vc_remove_element( 'product_page' );
        vc_remove_element( 'product_category' );
        vc_remove_element( 'product_categories' );
        vc_remove_element( 'sale_products' );
        vc_remove_element( 'best_selling_products' );
        vc_remove_element( 'top_rated_products' );
        vc_remove_element( 'product_attribute' );
    }
    add_action( 'vc_before_init', 'ecoshop_visual_composer_remove_default_shortcodes' );
}
// Remove Default Templates
if ( ! function_exists( 'ecoshop_visual_composer_remove_default_templates' ) ) {
    function ecoshop_visual_composer_remove_default_templates( $data ) {
        return array();
    }
    add_filter( 'vc_load_default_templates', 'ecoshop_visual_composer_remove_default_templates' );
}
// Remove Meta Boxes
if ( ! function_exists( 'ecoshop_visual_composer_remove_meta_boxes' ) ) {
    function ecoshop_visual_composer_remove_meta_boxes() {
        if ( is_admin() ) {
            foreach ( get_post_types() as $post_type ) {
                remove_meta_box( 'vc_teaser',  $post_type, 'side' );
            }
        }
    }
    add_action( 'do_meta_boxes', 'ecoshop_visual_composer_remove_meta_boxes' );
}
// Disable Frontend Editor
if ( function_exists( 'vc_disable_frontend' ) ) {
    vc_disable_frontend();
}
// Map Shortcodes
if ( ! function_exists( 'ecoshop_visual_composer_map_shortcodes' ) ) {
    function ecoshop_visual_composer_map_shortcodes() {
        $animations = array(
            'Select' => '',
            'bounce' => 'bounce',
            'bounceIn'     => 'bounceIn',
            'flash'     => 'flash',
            'pulse'     => 'pulse',
            'rubberBand'     => 'rubberBand',
            'shake'     => 'shake',
            'swing'     => 'swing',
            'tada'     => 'tada',
            'wobble'     => 'wobble',
            'jello'     => 'jello',
            'fadeIn'     => 'fadeIn',
            'fadeInDown'     => 'fadeInDown',
            'fadeInDownBig'     => 'fadeInDownBig',
            'fadeInLeft'     => 'fadeInLeft',
            'fadeInLeftBig'     => 'fadeInLeftBig',
            'fadeInRight'     => 'fadeInRight',
            'fadeInRightBig'     => 'fadeInRightBig',
            'fadeInUp'     => 'fadeInUp',
            'fadeInUpBig'     => 'fadeInUpBig',
            'fadeOut'     => 'fadeOut',
            'fadeOutDown'     => 'fadeOutDown',
            'fadeOutDownBig'     => 'fadeOutDownBig',
            'fadeOutLeft'     => 'fadeOutLeft',
            'fadeOutLeftBig'     => 'fadeOutLeftBig',
            'fadeOutRight'     => 'fadeOutRight',
            'fadeOutRightBig'     => 'fadeOutRightBig',
            'fadeOutUp'     => 'fadeOutUp',
            'fadeOutUpBig'     => 'fadeOutUpBig',
            'slideInUp'     => 'slideInUp',
            'slideInDown'     => 'slideInDown',
            'slideInLeft'     => 'slideInLeft',
            'slideInRight'     => 'slideInRight',
            'zoomIn'     => 'zoomIn',
            'zoomInDown'     => 'zoomInDown',
            'zoomInLeft'     => 'zoomInLeft',
            'zoomInRight'     => 'zoomInRight',
            'zoomInUp'     => 'zoomInUp',
        );
        // Container
        vc_map(
            array(
                'base'            => 'container',
                'name'            => esc_html__( 'Container', 'ecoshop' ),
                'weight'          => 1,
                'class'           => 'container',
                'icon'            => 'ecoshop_vc_container',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Include a container in your content', 'ecoshop' ),
                'as_parent'       => array( 'only' => 'feature_products,popular_products,product_fresh_arrival,tweets,simple_video_block,vc_raw_html,rev_slider,rev_slider_vc,vc_video,toggle_services_box,facts,feature_checklists,plain_tabs,feature_lists,feature_services,skill_bars,team_members,time_lines,blog_posts,text_services,title_block,contact_info,img_with_column,social_links,vc_single_image,simple_img_slides,pricing_table,simple_heading,testimonials,counter_box,services_box,vc_column_text,vc_separator,vc_text_separator,vc_message,vc_facebook,vc_tweetmeme,vc_googleplus,vc_progress_bar,vc_pie,contact-form-7,vc_wp_text,vc_custom_heading,vc_empty_space,vc_icon,vc_btn,vc_media_grid,vc_masonry_media_grid,vc_row'),
                'content_element' => true,
                'js_view'         => 'VcColumnView',
                'params'          => array(
                    array(
                        'param_name'  => 'class',
                        'heading'     => esc_html__( 'Class', 'ecoshop' ),
                        'description' => esc_html__( '(Optional) Enter a unique class/classes.', 'ecoshop' ),
                        'type'        => 'textfield'
                    )
                )
            )
        );
        // Title Block
        vc_map(
            array(
                'base'            => 'title_block',
                'name'            => esc_html__( 'Title Block', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_feature_heading',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Add simple title block to your content.', 'ecoshop' ),
                'params'          => array(
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'ecoshop' ),
                        'description' => esc_html__( 'Input heading text.', 'ecoshop' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // Small Description
                    array(
                        'param_name'  => 'small_desc',
                        'heading'     => esc_html__( 'Small Description', 'ecoshop' ),
                        'description' => esc_html__( 'Input small description below title.', 'ecoshop' ),
                        'type'        => 'textarea',
                        "holder"	=> 'p'
                    ),
                    // Text Alignment
                    array(
                        'param_name'  => 'txt_alignment',
                        'heading'     => esc_html__( 'Text Alignment', 'ecoshop' ),
                        'description' => esc_html__( 'Set your title block text alignment.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Left' => 'text-left',
                            'Center'     => 'text-center',
                            'Right'     => 'text-right'
                        ),
                        "admin_label"	=> true
                    ),
                    // Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Style', 'ecoshop' ),
                        'description' => esc_html__( 'Choose heading style.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'White' => 'color-white',
                            'Dark'     => 'color-dark'
                        ),
                        "admin_label"	=> true
                    ),
                    // Display Style
                    array(
                        'param_name'  => 'display_style',
                        'heading'     => esc_html__( 'Display Style', 'ecoshop' ),
                        'description' => esc_html__( 'Choose heading display style.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Plain' => 'plain',
                            'Left View'     => 'style-left'
                        ),
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Simple Video Block
        vc_map(
            array(
                'base'            => 'simple_video_block',
                'name'            => esc_html__( 'Simple Video Block', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_slider',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Add simple video block to your content.', 'ecoshop' ),
                'params'          => array(
                    // Video Link Text
                    array(
                        'param_name'  => 'video_link_text',
                        'heading'     => esc_html__( 'Video Link Text', 'ecoshop' ),
                        'description' => esc_html__( 'Input video link text.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Video Link
                    array(
                        'param_name'  => 'video_link',
                        'heading'     => esc_html__( 'Video Link', 'ecoshop' ),
                        'description' => esc_html__( 'Input external source link, youtube or vimeo.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Text Alignment
                    array(
                        'param_name'  => 'txt_alignment',
                        'heading'     => esc_html__( 'Text Alignment', 'ecoshop' ),
                        'description' => esc_html__( 'Set your title block text alignment.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Left' => 'text-left',
                            'Center'     => 'text-center',
                            'Right'     => 'text-right'
                        ),
                        "admin_label"	=> true
                    ),
                    // Target
                    array(
                        'param_name'  => 'target',
                        'heading'     => esc_html__( 'Target', 'ecoshop' ),
                        'description' => esc_html__( 'Set opened link target.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Blank' => '_blank',
                            'Parent'     => '_parent',
                            'Self'     => '_self',
                            'Top'     => '_top'
                        ),
                        "admin_label"	=> true
                    ),
                    // Style
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Style', 'ecoshop' ),
                        'description' => esc_html__( 'Choose display style.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'White' => 'color-white',
                            'Dark'     => 'color-dark'
                        ),
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Team Members
        vc_map(
            array(
                'base'            => 'team_members',
                'name'            => esc_html__( 'Team Members', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_team',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Add team members to your content. ', 'ecoshop' ),
                'params'          => array(
                    // Member Image
                    array(
                        'param_name'  => 'image',
                        'heading'     => esc_html__( 'Member image', 'ecoshop' ),
                        'description' => esc_html__( 'Choose team member image', 'ecoshop' ),
                        'type'        => 'attach_image',
                        'holder'    => 'img'
                    ),
                    // Name
                    array(
                        'param_name'  => 'name',
                        'heading'     => esc_html__( 'Enter name.', 'ecoshop' ),
                        'description' => esc_html__( 'Team member name', 'ecoshop' ),
                        'type'        => 'textfield',
                        'holder' => 'h3'
                    ),
                    // Designation
                    array(
                        'param_name'  => 'designation',
                        'heading'     => esc_html__( 'Enter designation.', 'ecoshop' ),
                        'description' => esc_html__( 'Team member designation', 'ecoshop' ),
                        'type'        => 'textfield',
                        'holder'      => 'p'
                    ),
                    // Facebook
                    array(
                        'param_name'  => 'facebook',
                        'heading'     => esc_html__( 'Facebook.', 'ecoshop' ),
                        'description' => esc_html__( 'Leave empty if not required', 'ecoshop' ),
                        'type'        => 'textfield'
                    ),
                    // Twitter
                    array(
                        'param_name'  => 'twitter',
                        'heading'     => esc_html__( 'Twitter.', 'ecoshop' ),
                        'description' => esc_html__( 'Leave empty if not required', 'ecoshop' ),
                        'type'        => 'textfield'
                    ),
                    // Linkedin
                    array(
                        'param_name'  => 'linkedin',
                        'heading'     => esc_html__( 'Linkedin.', 'ecoshop' ),
                        'description' => esc_html__( 'Leave empty if not required', 'ecoshop' ),
                        'type'        => 'textfield'
                    ),
                    // Google Plus
                    array(
                        'param_name'  => 'google',
                        'heading'     => esc_html__( 'Google Plus.', 'ecoshop' ),
                        'description' => esc_html__( 'Leave empty if not required', 'ecoshop' ),
                        'type'        => 'textfield'
                    ),
                    // Dribble
                    array(
                        'param_name'  => 'dribble',
                        'heading'     => esc_html__( 'Dribbble.', 'ecoshop' ),
                        'description' => esc_html__( 'Leave empty if not required', 'ecoshop' ),
                        'type'        => 'textfield'
                    ),
                    // Youtube
                    array(
                        'param_name'  => 'youtube',
                        'heading'     => esc_html__( 'Youtube.', 'ecoshop' ),
                        'description' => esc_html__( 'Leave empty if not required', 'ecoshop' ),
                        'type'        => 'textfield'
                    )

                )
            )
        );
        // Tweets
        vc_map(
            array(
                'base'            => 'tweets',
                'name'            => esc_html__( 'Single Tweets', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_rotating-logo',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Add single tweet to your content.', 'ecoshop' ),
                'params'          => array(
                    array(
                        'param_name'  => 'txt_alignment',
                        'heading'     => esc_html__( 'Text Alignment', 'ecoshop' ),
                        'description' => esc_html__( 'Set your title block text alignment.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Left' => 'text-left',
                            'Center'     => 'text-center',
                            'Right'     => 'text-right'
                        ),
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Facts
        vc_map(
            array(
                'base'            => 'facts',
                'name'            => esc_html__( 'Facts And Figures', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_heading',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Add fact and figures to your content.', 'ecoshop' ),
                'params'          => array(
                    // Number
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Enter Figure', 'ecoshop' ),
                        'description' => esc_html__( 'Input any figure.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Heading Text
                    array(
                        'param_name'  => 'heading',
                        'heading'     => esc_html__( 'Heading', 'ecoshop' ),
                        'description' => esc_html__( 'Input heading text.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Icon
                    array(
                        'param_name'  => 'icon',
                        'heading'     => esc_html__( 'Icon Class', 'ecoshop' ),
                        'description' => esc_html__( 'Enter icon class, choose from documentation.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),

                )
            )
        );
        // Product Fresh Arrival
        vc_map(
            array(
                'base'            => 'product_fresh_arrival',
                'name'            => esc_html__( 'Product Fresh Arrival', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_woo',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Display fresh arrival products.', 'ecoshop' ),
                'params'          => array(
                    // Number
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Products To Display', 'ecoshop' ),
                        'description' => esc_html__( 'Input number of product to display, numeric value only.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Layout
                    array(
                        'param_name'  => 'style',
                        'heading'     => esc_html__( 'Style', 'ecoshop' ),
                        'description' => esc_html__( 'Select fresh arrival display style.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Plain' => 'plain',
                            'Masonry'     => 'masonry'
                        ),
                        'admin_label' => true
                    ),
                    // Columns
                    array(
                        'param_name'  => 'columns',
                        'heading'     => esc_html__( 'Columns.', 'ecoshop' ),
                        'description' => esc_html__( 'Select number of columns.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            '2 Columns' => 'col-md-6',
                            '3 Columns'     => 'col-md-4'
                        ),
                        'dependency' => array(
                            'element' => 'style',
                            'value' =>'masonry'
                        ),
                        'admin_label' => true
                    ),
                    // View All Link
                    array(
                        'param_name'  => 'view_all',
                        'heading'     => esc_html__( 'View ALL Link.', 'ecoshop' ),
                        'description' => esc_html__( 'Input view all products link.', 'ecoshop' ),
                        'type'        => 'textfield',
                        'dependency' => array(
                            'element' => 'style',
                            'value' =>'masonry'
                        ),
                        'admin_label' => true
                    ),
                )
            )
        );
        // Popular Products
        vc_map(
            array(
                'base'            => 'popular_products',
                'name'            => esc_html__( 'Popular Products', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_woo',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Display popular products carousel.', 'ecoshop' ),
                'params'          => array(
                    // Number
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Products To Display', 'ecoshop' ),
                        'description' => esc_html__( 'Input number of product to display, numeric value only.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),

                )
            )
        );
        // Feature Products
        vc_map(
            array(
                'base'            => 'feature_products',
                'name'            => esc_html__( 'Feature Products', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_woo',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Display feature products in your content.', 'ecoshop' ),
                'params'          => array(
                    // Number
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Products To Display', 'ecoshop' ),
                        'description' => esc_html__( 'Input number of product to display, numeric value only.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Background Color
                    array(
                        'param_name'  => 'bg_color',
                        'heading'     => esc_html__( 'Background Color', 'ecoshop' ),
                        'description' => esc_html__( 'Set diagonal products background color.', 'ecoshop' ),
                        'type'        => 'colorpicker',
                        "admin_label"	=> true
                    ),

                )
            )
        );
        // Popular Special Offer
        vc_map(
            array(
                'base'            => 'product_special_offer',
                'name'            => esc_html__( 'Product Special Offer', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_woo',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Display solo product in special offer.', 'ecoshop' ),
                'params'          => array(
                    // Main Heading
                    array(
                        'param_name'  => 'main_heading',
                        'heading'     => esc_html__( 'Main Heading', 'ecoshop' ),
                        'description' => esc_html__( 'Input main heading.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Sale Heading
                    array(
                        'param_name'  => 'sale_heading',
                        'heading'     => esc_html__( 'Sale Heading', 'ecoshop' ),
                        'description' => esc_html__( 'Input sale heading.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Shop Now Link
                    array(
                        'param_name'  => 'shop_now_link',
                        'heading'     => esc_html__( 'Shop Now Link', 'ecoshop' ),
                        'description' => esc_html__( 'Input shop now link.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Background Image
                    array(
                        'param_name'  => 'image',
                        'heading'     => esc_html__( 'Background Image', 'ecoshop' ),
                        'description' => esc_html__( 'Upload feature section background image, recommended size 1920*1100.', 'ecoshop' ),
                        'type'        => 'attach_image'
                    ),

                )
            )
        );
        // Blog Posts
        vc_map(
            array(
                'base'            => 'blog_posts',
                'name'            => esc_html__( 'Blog Posts', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_blog',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Use to insert blog posts to your content.', 'ecoshop' ),
                'params'          => array(
                    // Number Of Posts
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Posts', 'ecoshop' ),
                        'description' => esc_html__( 'Only numeric values, default is 2.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'ecoshop' ),
                        'description' => esc_html__( 'Set posts display order.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    ),
                    // Category Slug
                    array(
                        'param_name'  => 'cat_slug',
                        'heading'     => esc_html__( 'Category Slug', 'ecoshop' ),
                        'description' => esc_html__( 'Enter category slug or leave empty for all.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
        // Client Testimonials
        vc_map(
            array(
                'base'            => 'testimonials',
                'name'            => esc_html__( 'Client Testimonials', 'ecoshop' ),
                'class'           => '',
                'icon'            => 'ecoshop_vc_testimonials',
                'category'        => esc_html__( 'Ecoshop', 'ecoshop' ),
                'description'     => esc_html__( 'Add testimonials to your content.', 'ecoshop' ),
                'params'          => array(
                    // Number Of Testimonials
                    array(
                        'param_name'  => 'number',
                        'heading'     => esc_html__( 'Number Of Testimonials', 'ecoshop' ),
                        'description' => esc_html__( 'Only numeric values, default is 3.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                    // Display Order
                    array(
                        'param_name'  => 'order',
                        'heading'     => esc_html__( 'Display Order', 'ecoshop' ),
                        'description' => esc_html__( 'Set testimonials display order.', 'ecoshop' ),
                        'type'        => 'dropdown',
                        'value'       => array(
                            'Select' => '',
                            'Ascending' => 'ASC',
                            'Descending'     => 'DESC'
                        ),
                        "admin_label"	=> true
                    ),
                    // Group Slug
                    array(
                        'param_name'  => 'grp_slug',
                        'heading'     => esc_html__( 'Group Slug', 'ecoshop' ),
                        'description' => esc_html__( 'Enter group slug or leave empty for all.', 'ecoshop' ),
                        'type'        => 'textfield',
                        "admin_label"	=> true
                    ),
                )
            )
        );
    }
    add_action( 'vc_before_init', 'ecoshop_visual_composer_map_shortcodes' );
    // Extend container class (parents).
    if(class_exists('WPBakeryShortCodesContainer')){
        class WPBakeryShortCode_Container extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Simple_img_slides extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Time_lines extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Feature_lists extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Plain_tabs extends WPBakeryShortCodesContainer { }
        class WPBakeryShortCode_Feature_checklists extends WPBakeryShortCodesContainer { }
    }
    // Extend shortcode class (children).
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_Services_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Title_block extends WPBakeryShortCode { }
        class WPBakeryShortCode_Team_members extends WPBakeryShortCode { }
        class WPBakeryShortCode_Skill_bars extends WPBakeryShortCode { }
        class WPBakeryShortCode_Feature_services extends WPBakeryShortCode { }
        class WPBakeryShortCode_Feature_list extends WPBakeryShortCode { }
        class WPBakeryShortCode_Plain_tab extends WPBakeryShortCode { }
        class WPBakeryShortCode_Feature_checklist extends WPBakeryShortCode { }
        class WPBakeryShortCode_Facts extends WPBakeryShortCode { }
        class WPBakeryShortCode_Toggle_services_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Counter_box extends WPBakeryShortCode { }
        class WPBakeryShortCode_Testimonials extends WPBakeryShortCode { }
        class WPBakeryShortCode_Simple_heading extends WPBakeryShortCode { }
        class WPBakeryShortCode_Pricing_table extends WPBakeryShortCode { }
        class WPBakeryShortCode_Simple_img_slide extends WPBakeryShortCode { }
        class WPBakeryShortCode_Social_links extends WPBakeryShortCode { }
        class WPBakeryShortCode_Img_with_column extends WPBakeryShortCode { }
        class WPBakeryShortCode_Contact_info extends WPBakeryShortCode { }
        class WPBakeryShortCode_Text_services extends WPBakeryShortCode { }
        class WPBakeryShortCode_Portfolio extends WPBakeryShortCode { }
        class WPBakeryShortCode_Blog_posts extends WPBakeryShortCode { }
        class WPBakeryShortCode_Time_line extends WPBakeryShortCode { }
        class WPBakeryShortCode_Simple_video_block extends WPBakeryShortCode { }
        class WPBakeryShortCode_Tweets extends WPBakeryShortCode { }
        class WPBakeryShortCode_Product_fresh_arrival extends WPBakeryShortCode { }
        class WPBakeryShortCode_Popular_products extends WPBakeryShortCode { }
        class WPBakeryShortCode_Feature_products extends WPBakeryShortCode { }
        class WPBakeryShortCode_Product_special_offer extends WPBakeryShortCode { }
    }

}

// Update Existing Elements
if ( ! function_exists( 'ecoshop_visual_composer_update_existing_shortcodes' ) ) {
    function ecoshop_visual_composer_update_existing_shortcodes() {
    }
    add_action( 'admin_init', 'ecoshop_visual_composer_update_existing_shortcodes' );
}
// Incremental ID Counter for Templates
if ( ! function_exists( 'ecoshop_visual_composer_templates_id_increment' ) ) {
    function ecoshop_visual_composer_templates_id_increment() {
        static $count = 0; $count++;
        return $count;
    }
}