<?php // Styling Options
function ecoshop_styling_typography() {
    $so = '';
    $heading_h1 = ecoshop_option("heading_h1");
    $heading_h2 = ecoshop_option("heading_h2");
    $heading_h3 = ecoshop_option("heading_h3");
    $heading_h4 = ecoshop_option("heading_h4");
    $heading_h5 = ecoshop_option("heading_h5");
    $heading_h6 = ecoshop_option("heading_h6");

    $menu_normal = ecoshop_option("menu_normal");
    $menu_active = ecoshop_option("menu_active");
    $header_bg = ecoshop_option("header_bg");
    $sub_menu_bg = ecoshop_option("sub_menu_bg");

    $body_color = ecoshop_option("body_color");
    $general_color = ecoshop_option("general_color");

    $footer_bg = ecoshop_option("footer_bg");
    $footer_color = ecoshop_option("footer_color");

    $newsletter_bg_color = ecoshop_option("newsletter_bg_color");
    $newsletter_txt_color = ecoshop_option("newsletter_txt_color");

    $links_normal = ecoshop_option("links_normal");
    $links_hover = ecoshop_option("links_hover");

    $header_social_color = ecoshop_option("header_social_color");

    if(!empty($heading_h1)){
        $so .= "h1 {color: {$heading_h1};}";
    } if(!empty($heading_h2)){
        $so .= "h2 {color: {$heading_h2};}";
    } if(!empty($heading_h3)){
        $so .= "h3 {color: {$heading_h3};}";
    } if(!empty($heading_h4)){
        $so .= "h4 {color: {$heading_h4};}";
    } if(!empty($heading_h5)){
        $so .= "h5 {color: {$heading_h5};}";
    } if(!empty($heading_h6)){
        $so .= "h6 { color: {$heading_h6};}";
    }

    if(!empty($menu_normal)){
        $so .= "header .navbar li a,header.light-head .navbar li a,.cd-nav .cd-primary-nav a {color: {$menu_normal} !important;}";
    } if(!empty($menu_active)){
        $so .= "header .navbar li.current-menu-item a,header.light-head .navbar li.current-menu-item a,.cd-nav .cd-primary-nav .current-menu-item a {color: {$menu_active} !important;}";
    } if(!empty($header_bg)){
        $so .= "header .sticky,.header-1,header .is-sticky .sticky,.header-1 .is-sticky .sticky,.navigation-is-open .header-2 { background: {$header_bg} !important;}";
    } if(!empty($sub_menu_bg)){
        $so .= ".ownmenu .nav .dropdown-menu,header.light-head .ownmenu .nav .dropdown-menu { background: {$sub_menu_bg} !important;}";
    }

    if(!empty($body_color)){
        $so .= "body,p { color: {$body_color} !important;}";
    } if(!empty($general_color)){
        $so .= ".yith-wcwl-add-button.hide i,.knowledge-share a:hover,.testimonial .testi-in i,
         .shop-detail .item-owner li a,.papular-block .item-name a:hover,.video-block a i,.fun-facts i,
          .huge-text,.primary-color,.shop-detail .item-owner li span{ color: {$general_color} !important;}";

        $so .= "header .navbar li.current-menu-item a:before,.arrival-block .overlay,
         .papular-block .overlay,.testimonial .owl-dots .owl-dot.active,.on-sale,
          .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,
          .woocommerce-pagination li .page-numbers.current, .woocommerce-pagination li a:hover, .woocommerce-pagination li span:hover,
           .shop-detail .some-info .btn:hover,.woocommerce a.button.alt:hover,.woocommerce input.button:hover,.new-arrival-list li .btn:hover,
            #contact_form li .btn:hover,.woocommerce input.button:hover,.coupn-btn input[type='submit']:hover, .woocommerce .coupn-btn .checkout-button.button:hover,
            .shopping-cart .btn:hover,.heading.style-left h4:before,header .navbar li a:before { background: {$general_color} !important;}";

        $so .= ".item-decribe .nav-tabs>li.active>a,.item-decribe .nav-tabs>li>a:hover,.new-arrival-list li .btn:hover,
         .contact-info,.shopping-cart .order-place,.shopping-cart .cart-ship-info .grand-total{ border-color: {$general_color} !important;}";

    }

    if(!empty($footer_bg)){
        $so .= "footer { background: {$footer_bg} !important;}";
    } if(!empty($footer_color)){
        $so .= "footer h6,footer p,footer li a,.rights .go-up { color: {$footer_color} !important; }";
    }

    if(!empty($newsletter_bg_color)){
        $so .= ".news-letter { background: {$newsletter_bg_color} !important;}";
    } if(!empty($newsletter_txt_color)){
        $so .= ".news-letter,.heading span { color: {$newsletter_txt_color} !important; }";
    }

    if(!empty($links_normal)){
        $so .= "a { color: {$links_normal};}";
    } if(!empty($links_hover)){
        $so .= "a:hover,a:focus { color: {$links_hover};}";
    }

    if(!empty($header_social_color)){
        $so .= ".nav-right i { color: {$header_social_color};}";
    }

    // Typography
    $heading_font = ecoshop_option("headings_font_face");
    $heading_weight = ecoshop_option("headings_font_weight");
    $meta_font = ecoshop_option("meta_font_face");
    $meta_weight = ecoshop_option("meta_font_weight");
    $body_font = ecoshop_option("body_font_face");
    $body_weight = ecoshop_option("body_font_weight");

    $body_size = intval(ecoshop_option("body_font_size"));
    $h1_size = intval(ecoshop_option("h1_font_size"));
    $h2_size = intval(ecoshop_option("h2_font_size"));
    $h3_size = intval(ecoshop_option("h3_font_size"));
    $h4_size = intval(ecoshop_option("h4_font_size"));
    $h5_size = intval(ecoshop_option("h5_font_size"));
    $h6_size = intval(ecoshop_option("h6_font_size"));
    $menu_size = intval(ecoshop_option("menu_font_size"));
    if(!empty($heading_font)){
        $so .= "h1,h2,h3 {
            font-family: {$heading_font};
            font-weight: {$heading_weight};
        }";
    } if(!empty($meta_font)){
        $so .= "h4,h5,h6,.footer-info h6,.side-tittle,.heading h4 {
            font-family: {$meta_font};
            font-weight: {$meta_weight};
        }";
    } if(!empty($body_font)){
        $so .= "html,body,p,header a {
            font-family: {$body_font} !important;
            font-weight: {$body_weight};
        }";
    }

    if(!empty($body_size)){
        $so .= "body,p {
            font-size: {$body_size}px;
        }";
    } if(!empty($h1_size)){
        $so .= "h1 {
            font-size: {$h1_size}px;
        }";
    } if(!empty($h2_size)){
        $so .= "h2 {
            font-size: {$h2_size}px;
        }";
    } if(!empty($h3_size)){
        $so .= "h3 {
            font-size: {$h3_size}px;
        }";
    } if(!empty($h4_size)){
        $so .= "h4 {
            font-size: {$h4_size}px;
        }";
    } if(!empty($h5_size)){
        $so .= "h5 {
            font-size: {$h5_size}px;
        }";
    } if(!empty($h6_size)){
        $so .= "h6 {
            font-size: {$h6_size}px;
        }";
    }

    if(!empty($menu_size)){
        $so .= "header .navbar li a,header .navbar li a,header.light-head .navbar li a,.cd-nav .cd-primary-nav a {
            font-size: {$menu_size}px;
        }";
    }
    return $so;
}
// Adding Theme Options Styles
function ecoshop_theme_options_css(){
    $custom_css = ecoshop_option("custom_css");
    return $custom_css;
}
function ecoshop_theme_options_styles() {
    $custom_css = '';
    $custom_css .= ecoshop_styling_typography();
    $custom_css .= ecoshop_theme_options_css();
	//$custom_css .= ecshop_sticky_header();
    wp_add_inline_style( 'ecoshop-root-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ecoshop_theme_options_styles' );
// Sticky Header
function ecshop_sticky_header(){
    $sticky_js = '';
    if(is_admin_bar_showing()){
        $sticky_js = 'jQuery(document).ready(function(jQuery) {
        "use strict"
        jQuery(".sticky").sticky({topSpacing:32});
        });';
    } else {
        $sticky_js = 'jQuery(document).ready(function(jQuery) {
        "use strict"
        jQuery(".sticky").sticky({topSpacing:0});
        });';
    }
    return $sticky_js;
}
// Theme Options JS
function ecoshop_theme_options_js(){
    $custom_js = ecoshop_option("custom_js");
    return $custom_js;
}
function ecoshop_theme_all_custom_scripts() {
    $custom_js = '';
    $custom_js .= ecshop_sticky_header();
    $custom_js .= ecoshop_theme_options_js();
    wp_add_inline_script( 'ecoshop-custom-scripts', $custom_js );
}
add_action( 'wp_enqueue_scripts', 'ecoshop_theme_all_custom_scripts' );