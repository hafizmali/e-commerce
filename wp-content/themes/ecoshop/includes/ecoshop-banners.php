<?php
/*
 * Theme Banners
 */
if((function_exists('is_woocommerce') && is_woocommerce()) || is_home() || is_tag() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_404() || is_attachment()){
    $banner_type = ecoshop_option('general_pages_banner');
} else {
    $banner_type = ecoshop_get_field('banner_type');
}
if($banner_type == 'parallax-breadcrumb'){
    if((function_exists('is_woocommerce') && is_woocommerce()) || is_home() || is_tag() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_404() || is_attachment()){
        $main_heading_bread = ecoshop_option('main_heading_bread');
        $small_description_bread = ecoshop_option('small_description_bread');
        $background_image_bread = ecoshop_option('background_image_bread');
    } else {
        $main_heading_bread = ecoshop_get_field('main_heading_bread');
        $small_description_bread = ecoshop_get_field('small_description_bread');
        $background_image_bread = ecoshop_get_field('background_image_bread');
    }
    ?>
    <section class="sub-bnr" data-stellar-background-ratio="0.5" style="background: url(<?php echo esc_url($background_image_bread); ?>) no-repeat;">
        <div class="position-center-center">
            <div class="container">
                <?php if(!empty($main_heading_bread)){ ?>
                    <h4><?php echo esc_attr($main_heading_bread); ?></h4>
                <?php } if(!empty($small_description_bread)){ ?>
                    <p><?php echo esc_attr($small_description_bread); ?></p>
                <?php } ?>
                <ol class="breadcrumb">
                    <?php if(function_exists('ecoshop_breadcrumbs')){
                        ecoshop_breadcrumbs();
                    } ?>
                </ol>
            </div>
        </div>
    </section>
<?php } elseif($banner_type == 'parallax-feature-product'){
    if((function_exists('is_woocommerce') && is_woocommerce()) || is_home() || is_tag() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_404() || is_attachment()){
        $currency_symbol_feature = ecoshop_option('currency_symbol_feature');
        $price_feature = ecoshop_option('price_feature');
        $main_heading_feature = ecoshop_option('main_heading_feature');
        $feature_heading_feature = ecoshop_option('feature_heading_feature');
        $shop_link_feature = ecoshop_option('shop_link_feature');
        $background_image_feature = ecoshop_option('background_image_feature');
    } else {
        $currency_symbol_feature = ecoshop_get_field('currency_symbol_feature');
        $price_feature = ecoshop_get_field('price_feature');
        $main_heading_feature = ecoshop_get_field('main_heading_feature');
        $feature_heading_feature = ecoshop_get_field('feature_heading_feature');
        $shop_link_feature = ecoshop_get_field('shop_link_feature');
        $background_image_feature = ecoshop_get_field('background_image_feature');
    }
    ?>
    <section class="home-slider simple-head" data-stellar-background-ratio="0.5" style="background: url(<?php echo esc_url($background_image_feature); ?>) no-repeat;background-size: cover;">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <div class="position-center-center">
                <!-- Header Text -->
                <div class="col-lg-7 col-lg-offset-5">
                    <span class="price">
                        <?php if(!empty($currency_symbol_feature)){ ?>
                            <small><?php echo esc_attr($currency_symbol_feature); ?></small>
                        <?php } if(!empty($price_feature)){ echo esc_attr($price_feature); } ?>
                    </span>
                    <?php if(!empty($main_heading_feature)){ ?>
                        <h4><?php echo esc_attr($main_heading_feature); ?></h4>
                    <?php } if(!empty($feature_heading_feature)){ ?>
                        <h1 class="extra-huge-text"><?php echo esc_attr($feature_heading_feature); ?></h1>
                    <?php } if(!empty($shop_link_feature)){ ?>
                        <div class="text-center">
                            <a href="<?php echo esc_url($shop_link_feature); ?>" class="btn btn-round margin-top-40"><?php esc_attr_e('SHOP NOW','ecoshop'); ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } elseif($banner_type == 'slider-revolution'){
    if((function_exists('is_woocommerce') && is_woocommerce()) || is_home() || is_tag() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_404() || is_attachment()){
        $slider_revolution_alias = ecoshop_option('slider_revolution_alias');
    } else {
        $slider_revolution_alias = ecoshop_get_field('slider_revolution_alias');
    }
    ?>
    <section class="home-slider">
        <?php if(function_exists('putRevSlider')){
            putRevSlider($slider_revolution_alias, $slider_revolution_alias);
        } ?>
    </section>
<?php } ?>