<?php
/*
Plugin Name: Ecoshop Shortcodes
Plugin URI: http://gomalthemes.com/
Description: Ecoshop shortcodes provides a free set of different shortcodes for your WordPress theme!
Version: 1.0
Author: Gomal Themes
Author URI: http://gomalthemes.com/
License: GPLv2
*/
// Content filter used ONLY on custom theme shortcodes to remove
add_filter("the_content", "the_content_filter");
function the_content_filter($content) {
    // array of custom shortcodes requiring the fix
    $block = join("|",array(
        "pricing_table",
    ));
// opening tag
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
// closing tag
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
    return $rep;
}
// Container Shortcode
function container_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['class'])){
        $class = $atts['class'];
    } else {
        $class = '';
    }
    $out = '';
    $out .= '<div class="container '.$class.'">';
    $out .= do_shortcode($content);
    $out .= '</div>';
    return $out;
}
add_shortcode('container', 'container_shortcode');
// Title Block Shortcode
function title_block_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['small_desc'])){
        $small_desc = $atts['small_desc'];
    } else {
        $small_desc = '';
    }
    if(!empty($atts['txt_alignment'])){
        $txt_alignment = $atts['txt_alignment'];
    } else {
        $txt_alignment = 'text-center';
    }
    if(!empty($atts['style'])){
        $style = $atts['style'];
    } else {
        $style = '';
    }
    if(!empty($atts['display_style'])){
        $display_style = $atts['display_style'];
    } else {
        $display_style = '';
    }
    $out = '';
    $out .= '<div class="heading '.$display_style.' '.$style.' '.$txt_alignment.'">';
    $out .= '<h4>'.$heading.'</h4>';
    $out .= '<span>'.$small_desc.'</span>';
    $out .= '</div>';
    return $out;
}
add_shortcode('title_block', 'title_block_shortcode');
// Simple Video Block Shortcode
function simple_video_block_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['video_link_text'])){
        $video_link_text = $atts['video_link_text'];
    } else {
        $video_link_text = '';
    }
    if(!empty($atts['video_link'])){
        $video_link = $atts['video_link'];
    } else {
        $video_link = '';
    }
    if(!empty($atts['txt_alignment'])){
        $txt_alignment = $atts['txt_alignment'];
    } else {
        $txt_alignment = 'text-center';
    }
    if(!empty($atts['style'])){
        $style = $atts['style'];
    } else {
        $style = '';
    }
    if(!empty($atts['target'])){
        $target = 'target="'.$atts['target'].'"';
    } else {
        $target = '';
    }
    $out = '';
    $out .= '<div class="video-block '.$style.' '.$txt_alignment.'">';
    $out .= '<a '.$target.' href="'.$video_link.'">';
    $out .= '<i class="icon-camcorder"></i>';
    $out .= $video_link_text;
    $out .= '</a>';
    $out .= '</div>';
    return $out;
}
add_shortcode('simple_video_block', 'simple_video_block_shortcode');
// Team Member Shortcode
function team_members_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['image'])){
        $image_info = wp_get_attachment_image_src( $atts['image'], 'full' );
        $image = '<img class="img-circle" src="'.$image_info[0].'" alt="">';
    } else {
        $image = '';
    }
    if(!empty($atts['name'])){
        $name = $atts['name'];
    } else {
        $name = '';
    }
    if(!empty($atts['designation'])){
        $designation = $atts['designation'];
    } else {
        $designation = '';
    }
    if(!empty($atts['facebook'])){
        $facebook = $atts['facebook'];
    } else {
        $facebook = '';
    }
    if(!empty($atts['twitter'])){
        $twitter = $atts['twitter'];
    } else {
        $twitter = '';
    }
    if(!empty($atts['linkedin'])){
        $linkedin = $atts['linkedin'];
    } else {
        $linkedin = '';
    }
    if(!empty($atts['google'])){
        $google = $atts['google'];
    } else {
        $google = '';
    }
    if(!empty($atts['dribble'])){
        $dribble = $atts['dribble'];
    } else {
        $dribble = '';
    }
    if(!empty($atts['youtube'])){
        $youtube = $atts['youtube'];
    } else {
        $youtube = '';
    }

    $out = '';
    $out .= '<div class="our-team text-center">';
    $out .= '<article>';
    $out .= '<div class="avatar">';
    $out .= $image;
    $out .= '<div class="team-hover">';
    $out .= '<div class="position-center-center">';
    $out .= '<div class="social-icons">';
    if(!empty($facebook)){
        $out .= '<a href="'.$facebook.'"><i class="icon-social-facebook"></i></a>';
    } if(!empty($twitter)){
        $out .= '<a href="'.$twitter.'"><i class="icon-social-twitter"></i></a>';
    } if(!empty($dribble)){
        $out .= '<a href="'.$dribble.'"><i class="icon-social-dribbble"></i></a>';
    } if(!empty($youtube)){
        $out .= '<a href="'.$youtube.'"><i class="icon-social-youtube"></i></a>';
    } if(!empty($linkedin)){
        $out .= '<a href="'.$linkedin.'"><i class="ion-social-linkedin-outline"></i></a>';
    } if(!empty($google)){
        $out .= '<a href="'.$google.'"><i class="ion-social-googleplus-outline"></i></a>';
    }
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '<div class="team-names">';
    $out .= '<h6>'.$name.'</h6>';
    $out .= '<p>'.$designation.'</p>';
    $out .= '</div>';
    $out .= '</article>';
    $out .= '</div>';
    return $out;
}
add_shortcode('team_members', 'team_members_shortcode');
// Tweets
function tweets_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['txt_alignment'])){
        $txt_alignment = $atts['txt_alignment'];
    } else {
        $txt_alignment = 'text-center';
    }
    $out = '';
    $out .= '<div class="tweet center-block '.$txt_alignment.'">';
    $out .= '<i class="icon-social-twitter"></i>';
    $out .= '<div id="tweet-holder">';
    $out .= '<p>Phasellus lacinia fermentum bibendum.</p>';
    $out .= '<span><span class="primary-color">@johnsmith</span> 4 hours ago via Twitter</span>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('tweets', 'tweets_shortcode');
// Facts & Figures
function facts_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = '';
    }
    if(!empty($atts['heading'])){
        $heading = $atts['heading'];
    } else {
        $heading = '';
    }
    if(!empty($atts['icon'])){
        $icon = $atts['icon'];
    } else {
        $icon = '';
    }
    $out = '';
    $out .= '<div class="fun-facts">';
    $out .= '<div class="text-center">';
    $out .= '<i class="'.$icon.'"></i>';
    $out .= '<span>'.$number.'</span>';
    $out .= '<h5>'.$heading.'</h5>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('facts', 'facts_shortcode');
// Product Fresh Arrival
function product_fresh_arrival_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 8;
    }
    if(!empty($atts['style'])){
        $style = $atts['style'];
    } else {
        $style = 'plain';
    }
    if(!empty($atts['columns'])){
        $columns = $atts['columns'];
    } else {
        $columns = 'col-md-6';
    }
    if(!empty($atts['view_all'])){
        $view_all = $atts['view_all'];
    } else {
        $view_all = '';
    }
    $enable_product_double_img = ecoshop_option('enable_product_double_img');
    if($enable_product_double_img == 1){
        $double_img = '';
    } else {
        $double_img = 'single-img-demos';
    }
    $out = '';
    $args = array(
        'post_type'            => 'product',
        'ignore_sticky_posts'  => 1,
        'no_found_rows'        => 1,
        'posts_per_page'       => $number
    );
    $products = new WP_Query( $args );
    if($style == 'plain'){
        $out .= '<div class="arrival-block '.$double_img.'">';
        if ( $products->have_posts() ) :
            while ( $products->have_posts() ) : $products->the_post();
                $double_image = ecoshop_get_field_by_id('double_image',get_the_ID());
                global $product;
                $out .= '<div class="item">';
                $out .= '<img class="img-1" src="'.ecoshop_get_feature_image_url(get_the_ID()).'" alt="">';
                if(!empty($double_image)){
                    $out .= '<img class="img-2" src="'.$double_image.'" alt="">';
                }
                $out .= '<div class="overlay">';
                $out .= '<span class="price">'.$product->get_price_html().'</span>';
                $out .= '<div class="position-center-center">';
                $out .= '<a href="'.ecoshop_get_feature_image_url(get_the_ID()).'" data-lighter><i class="icon-magnifier"></i></a>';
                $out .= '</div>';
                $out .= '</div>';
                $out .= '<div class="item-name">';
                $out .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
                $out .= '<p>'.ecoshop_shortcode_excerpt(35).'</p>';
                $out .= '</div>';
                $out .= '</div>';
            endwhile;
            wp_reset_postdata();
        endif;
        $out .= '</div>';
    } else {
        if ( $products->have_posts() ) :
            $out .= '<div class="new-arrival-list '.$double_img.'">';
            $out .= '<ul class="row" id="iso">';
            while ( $products->have_posts() ) : $products->the_post();
                $double_image = ecoshop_get_field_by_id('double_image',get_the_ID());
                global $product;
                $out .= '<li class="'.$columns.'">';
                $out .= '<article>';
                if(has_post_thumbnail()){
                    $out .= '<img class="img-responsive" src="'.ecoshop_get_feature_image_url(get_the_ID()).'" alt="">';
                }
                $out .= '<div class="position-center-center">';
                $out .= '<h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
                $out .= '<a href="'.get_the_permalink().'" class="btn btn-small btn-round">'.esc_html__('MORE','ecoshop').'</a>';
                $out .= '</div>';
                $out .= '</article>';
                $out .= '</li>';
            endwhile;
            wp_reset_postdata();
            $out .= '</ul>';
            if(!empty($view_all)){
                $out .= '<div class="text-center margin-top-50">';
                $out .= '<a href="'.$view_all.'" class="btn btn-small btn-round">'.esc_html__('VIEW ALL','ecoshop').'</a>';
                $out .= '</div>';
            }
            $out .= '</div>';
        endif;
    }
    return $out;
}
add_shortcode('product_fresh_arrival', 'product_fresh_arrival_shortcode');
// Popular Products
function popular_products_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 8;
    }
    $enable_product_double_img = ecoshop_option('enable_product_double_img');
    if($enable_product_double_img == 1){
        $double_img = '';
    } else {
        $double_img = 'single-img-demos';
    }
    $out = '';
    $out .= '<div class="papular-block block-slide '.$double_img.'">';
    $args = array(
        'post_type'            => 'product',
        'ignore_sticky_posts'  => 1,
        'no_found_rows'        => 1,
        'posts_per_page'       => $number,
        'orderby'   => 'comment_count',
        'order'  => 'DESC'
    );
    $products = new WP_Query( $args );
    if ( $products->have_posts() ) :
        while ( $products->have_posts() ) : $products->the_post();
            $double_image = ecoshop_get_field_by_id('double_image',get_the_ID());
            global $product;
            $out .= '<div class="item">';
            $out .= '<div class="item-img">';
            $out .= '<img class="img-1" src="'.ecoshop_get_feature_image_url(get_the_ID()).'" alt="" >';
            if(!empty($double_image)){
                $out .= '<img class="img-2" src="'.$double_image.'" alt="" >';
            }
            $out .= '<div class="overlay">';
            $out .= '<div class="position-center-center">';
            $out .= '<div class="inn">';
            $out .= '<a data-toggle="tooltip" data-placement="top" title="'.esc_html__("View Image","ecoshop").'" href="'.ecoshop_get_feature_image_url(get_the_ID()).'" data-lighter><i class="icon-magnifier"></i></a>';
            $out .= apply_filters( 'woocommerce_loop_add_to_cart_link',
                sprintf( '<a data-toggle="tooltip" data-placement="top" title="'.esc_html__("Add To Cart","ecoshop").'" rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><i class="icon-basket"></i></a>',
                    esc_url( $product->add_to_cart_url() ),
                    esc_attr( isset( $quantity ) ? $quantity : 1 ),
                    esc_attr( $product->id ),
                    esc_attr( $product->get_sku() ),
                    esc_attr( isset( $class ) ? $class : 'product_type_simple add_to_cart_button ajax_add_to_cart' ),
                    esc_html( $product->add_to_cart_text() )
                ),
                $product );
            // Wishlist
            if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) {
                $out .= '<span data-toggle="tooltip" data-placement="top" title="'.esc_html__('Add To WishList','ecoshop').'">';
                $out .= do_shortcode('[yith_wcwl_add_to_wishlist]');
                $out .= '</span>';
            }
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '<div class="item-name">';
            $out .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
            $out .= '<p>'.ecoshop_shortcode_excerpt(35).'</p>';
            $out .= '</div>';
            $out .= '<span class="price">'.$product->get_price_html().'</span>';
            $out .= '</div>';
        endwhile;
        wp_reset_postdata();
    endif;
    $out .= '</div>';
    return $out;
}
add_shortcode('popular_products', 'popular_products_shortcode');
// Blog Posts Shortcode
function blog_posts_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 3;
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    if(!empty($atts['cat_slug'])){
        $cat_slug = $atts['cat_slug'];
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $number,
            'order' => $order,
            'category_name' => $cat_slug
        );
    } else {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $number,
            'order' => $order
        );
    }
    $out = '';
    $blog_query = new WP_Query($args);
    $out .= '<div class="knowledge-share">';
    $out .= '<ul class="row">';
    $count = 1;
    while($blog_query->have_posts()): $blog_query->the_post();
        $out .= '<li class="col-md-6">';
        $out .= '<div class="date">';
        $out .= '<span>'.get_the_time('F').'</span>';
        $out .= '<span class="huge">'.get_the_time('d').'</span>';
        $out .= '</div>';
        $out .= '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
        $out .= '<p>'.ecoshop_shortcode_excerpt(175).'</p>';
        $out .= '<span>'.esc_html__('By','ecoshop').' <strong>'.get_the_author().'</strong></span>';
        $out .= '</li>';
        $count++;
    endwhile;
    wp_reset_postdata();
    $out .= '</ul>';
    $out .= '</div>';
    return $out;
}
add_shortcode('blog_posts', 'blog_posts_shortcode');
// Testimonials Shortcode
function testimonials_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 3;
    }
    if(!empty($atts['order'])){
        $order = $atts['order'];
    } else {
        $order = 'ASC';
    }
    if(!empty($atts['grp_slug'])){
        $grp_slug = $atts['grp_slug'];
        $args = array(
            'post_type' => 'ecoshop-testimonials',
            'posts_per_page' => $number,
            'order' => $order,
            'tax_query' => array(
                array(
                    'taxonomy' => 'ecoshop_testimonials_genre',
                    'field'    => 'slug',
                    'terms'    => $grp_slug,
                ),
            ),
        );
    } else {
        $args = array(
            'post_type' => 'ecoshop-testimonials',
            'posts_per_page' => $number,
            'order' => $order
        );
    }
    $out = '';
    $out .= '<div class="testimonial">';
    $out .= '<div class="single-slide">';
    $testimonials_query = new WP_Query($args);
    while($testimonials_query->have_posts()): $testimonials_query->the_post();
        $testimonial_text = ecoshop_get_field('testimonial_text');
        $testimonial_author = ecoshop_get_field('testimonial_author');
        $out .= '<div class="testi-in">';
        $out .= '<i class="fa fa-quote-left"></i>';
        $out .= '<p>'.$testimonial_text.'</p>';
        $out .= '<h5>'.$testimonial_author.'</h5>';
        $out .= '</div>';
    endwhile;
    wp_reset_postdata();
    $out .= '</div>';
    $out .= '</div>';
    return $out;
}
add_shortcode('testimonials', 'testimonials_shortcode');
// Feature Products
function feature_products_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['number'])){
        $number = $atts['number'];
    } else {
        $number = 8;
    } if(!empty($atts['bg_color'])){
        $bg_color = $atts['bg_color'];
    } else {
        $bg_color = '';
    }
    $enable_product_double_img = ecoshop_option('enable_product_double_img');
    if($enable_product_double_img == 1){
        $double_img = '';
    } else {
        $double_img = 'single-img-demos';
    }
    $out = '';
    if(!empty($bg_color)){
        $out .= '<style type="text/css">
            .top-shop-feature .col-md-6.light,.top-shop-feature .col-md-6.light:before,
             .top-shop-feature .left.light:before {
                background: '.$bg_color.';
            }
        </style>';
    }
    $out .= '<div class="top-shop-feature '.$double_img.'">';
    $args = array(
        'post_type'            => 'product',
        'ignore_sticky_posts'  => 1,
        'no_found_rows'        => 1,
        'posts_per_page'       => $number,
        'meta_key' 	=> '_featured',
        'meta_value' => 'yes'
    );
    $products = new WP_Query( $args );
    if ( $products->have_posts() ) :
        $pro_count = 1;
        while ( $products->have_posts() ) : $products->the_post();
            if($pro_count % 2 == 0){
                $class = 'text-left';
            } else {
                $class= 'text-right';
            }
            $color1 = '';
            $color2 = '';
            if($pro_count == 2 || $pro_count == 6 || $pro_count == 10 || $pro_count == 14 || $pro_count == 18 || $pro_count == 22 || $pro_count == 26 || $pro_count == 30){
                $color1 = 'light';
            } if($pro_count == 3 || $pro_count == 7 || $pro_count == 11 || $pro_count == 15 || $pro_count == 19 || $pro_count == 23 || $pro_count == 27 || $pro_count == 31 ) {
                $color2 = 'left light';
            }
            global $product;
            $out .= '<div class="col-md-6 '.$color2.' '.$color1.'">';
            $out .= '<div class="'.$class.'">';
            if(has_post_thumbnail()){
                $out .= '<img src="'.ecoshop_get_feature_image_url(get_the_ID()).'" alt="" >';
            }
            $out .= '<div class="clearfix clear"></div>';
            $out .= '<article>';
            $out .= '<span class="price">'.$product->get_price_html().'</span>';
            $out .= '<h4>'.get_the_title().'</h4>';
            $out .= '<p>'.ecoshop_shortcode_excerpt(125).'</p>';
            $out .= '<a href="'.get_the_permalink().'" class="btn btn-small btn-round">'.esc_html__('SHOP NOW','ecoshop').'</a>';
            $out .= '</article>';
            $out .= '</div>';
            $out .= '</div>';
            $pro_count++;
        endwhile;
        wp_reset_postdata();
    endif;
    $out .= '</div>';
    return $out;
}
add_shortcode('feature_products', 'feature_products_shortcode');
// Special Offer Box
function product_special_offer_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
    ), $atts));
    if(!empty($atts['main_heading'])){
        $main_heading = $atts['main_heading'];
    } else {
        $main_heading = '';
    }
    if(!empty($atts['sale_heading'])){
        $sale_heading = $atts['sale_heading'];
    } else {
        $sale_heading = '';
    }
    if(!empty($atts['shop_now_link'])){
        $shop_now_link = $atts['shop_now_link'];
    } else {
        $shop_now_link = '';
    }
    if(!empty($atts['image'])){
        $image_info = wp_get_attachment_image_src( $atts['image'], 'full' );
        $image = 'style="background: #f7f7f7 url('.$image_info[0].')  top center no-repeat; background-size: cover;"';
    } else {
        $image = '';
    }

    $out = '';
    $out .= '<section class="special-offers" '.$image.'>';
    $out .= '<div class="container">';
    $out .= '<div class="col-md-8 center-block">';
    $out .= '<h4>'.$main_heading.'</h4>';
    $out .= '<h1 class="extra-huge-text">'.$sale_heading.'</h1>';
    if(!empty($shop_now_link)){
        $out .= '<a href="'.$shop_now_link.'" class="btn btn-round margin-top-50">'.esc_html__('SHOP NOW','ecoshop').'</a>';
    }
    $out .= '</div>';
    $out .= '</div>';
    $out .= '</section>';
    return $out;
}
add_shortcode('product_special_offer', 'product_special_offer_shortcode');
// Text Widget Shortcode Readable
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');