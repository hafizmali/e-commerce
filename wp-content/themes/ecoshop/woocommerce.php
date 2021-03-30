<?php get_header();
$counto = 1;
$layout = ecoshop_option('shop_layout');
$spl = ecoshop_option('shop_single_layout');
if(function_exists('is_product') && is_product()){ ?>
    <?php if($spl == 'one'){
        woocommerce_content();
    } elseif($spl == 'two'){
        woocommerce_content();
    } else {
        woocommerce_content();
    }
} else{
    $enable_product_double_img = ecoshop_option('enable_product_double_img');
    if($enable_product_double_img == 1){
        $double_img = 'no-double';
    } else {
        $double_img = 'single-img-demos';
    }
    if($layout == 'one'){ ?>
        <!-- Popular Products -->
        <section class="shop-page padding-top-100 padding-bottom-100">
            <div class="container">
                <!-- Popular Item Slide -->
                <div class="papular-block row <?php echo esc_attr($double_img); ?>">
                    <?php woocommerce_content(); ?>
                </div>
            </div>
        </section>
    <?php } elseif($layout == 'two'){ ?>
        <!-- Products -->
        <section class="shop-page padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <!-- Shop SideBar -->
                    <div class="col-sm-3">
                        <?php get_sidebar('shop'); ?>
                    </div>
                    <!-- Item Content -->
                    <div class="col-sm-9">
                        <!-- Popular Item Slide -->
                        <div class="papular-block row <?php echo esc_attr($double_img); ?>">
                            <?php woocommerce_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } elseif($layout == 'three'){ ?>
        <!-- Products -->
        <section class="shop-page padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="row">
                    <!-- Item Content -->
                    <div class="col-sm-9">
                        <!-- Popular Item Slide -->
                        <div class="papular-block row <?php echo esc_attr($double_img); ?>">
                            <?php woocommerce_content(); ?>
                        </div>
                    </div>
                    <!-- Shop SideBar -->
                    <div class="col-sm-3">
                        <?php get_sidebar('shop'); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } elseif($layout == 'four'){ ?>
        <!-- Popular Products -->
        <section class="shop-page padding-top-100 padding-bottom-100">
            <div class="container">
                <!-- Popular Item Slide -->
                <div class="shop-items row hide-sec <?php echo esc_attr($double_img); ?>">
                    <?php woocommerce_content(); ?>
                </div>
            </div>
        </section>
    <?php }
} get_footer(); ?>