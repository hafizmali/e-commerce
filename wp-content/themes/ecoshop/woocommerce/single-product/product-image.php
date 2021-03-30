<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $post, $product;
$spl = ecoshop_option('shop_single_layout');
if($spl == 'one'){ ?>
    <!-- Popular Images Slider -->
    <div class="col-md-7">
        <div class="images-slider">
            <ul class="slides">
                <?php
                if ( has_post_thumbnail() ) { ?>
                    <li data-thumb="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>">
                        <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>"  alt="">
                    </li>
                    <?php } else { ?>
                    <li data-thumb="<?php wc_placeholder_img_src(); ?>">
                        <img class="img-responsive" src="<?php wc_placeholder_img_src(); ?>"  alt="">
                    </li>
                    <?php }
                do_action( 'woocommerce_product_thumbnails' );
                ?>
            </ul>
        </div>
    </div>
<?php } elseif($spl == 'three'){ ?>
    <div class="col-md-7">
        <div id="slider-shop" class="flexslider">
            <ul class="slides">
                <?php
                if ( has_post_thumbnail() ) { ?>
                    <li>
                        <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>"  alt="">
                    </li>
                    <?php } else { ?>
                    <li>
                        <img class="img-responsive" src="<?php wc_placeholder_img_src(); ?>"  alt="">
                    </li>
                    <?php }
                do_action( 'woocommerce_product_thumbnails' );
                ?>
            </ul>
        </div>
        <div id="shop-thumb" class="flexslider">
            <ul class="slides">
                <?php
                if ( has_post_thumbnail() ) { ?>
                    <li>
                        <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>"  alt="">
                    </li>
                <?php } else { ?>
                    <li>
                        <img class="img-responsive" src="<?php wc_placeholder_img_src(); ?>"  alt="">
                    </li>
                <?php }
                do_action( 'woocommerce_product_thumbnails' );
                ?>
            </ul>
        </div>
    </div>
<?php } else{ ?>
    <div class="col-md-8">
        <div class="row">
                <?php
                if ( has_post_thumbnail() ) { ?>
                    <div class="col-sm-6 margin-bottom-30">
                        <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>"  alt="">
                    </div>
                <?php } ?>
                <?php  do_action( 'woocommerce_product_thumbnails' );
                ?>
        </div>
    </div>
<?php } ?>