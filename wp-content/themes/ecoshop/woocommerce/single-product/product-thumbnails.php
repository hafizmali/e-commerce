<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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

global $post, $product, $woocommerce;

$spl = ecoshop_option('shop_single_layout');
if($spl == 'one'){
    $attachment_ids = $product->get_gallery_attachment_ids();
    if ( $attachment_ids ) {
        $loop 		= 0;
        $columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
        foreach ( $attachment_ids as $attachment_id ) {
            $classes = array( 'zoom' );
            if ( $loop === 0 || $loop % $columns === 0 ) {
                $classes[] = 'first';
            }
            if ( ( $loop + 1 ) % $columns === 0 ) {
                $classes[] = 'last';
            }
            $image_class = implode( ' ', $classes );
            $props       = wc_get_product_attachment_props( $attachment_id, $post );
            if ( ! $props['url'] ) {
                continue;
            } ?>

            <li data-thumb="<?php echo ''.$props['url']; ?>">
                <img class="img-responsive" src="<?php echo ''.$props['url']; ?>"  alt="">
            </li>

            <?php $loop++;
        } ?>
    <?php
    }
} elseif($spl == 'three'){
    $attachment_ids = $product->get_gallery_attachment_ids();
    if ( $attachment_ids ) {
        $loop 		= 0;
        $columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
        foreach ( $attachment_ids as $attachment_id ) {
            $classes = array( 'zoom' );
            if ( $loop === 0 || $loop % $columns === 0 ) {
                $classes[] = 'first';
            }
            if ( ( $loop + 1 ) % $columns === 0 ) {
                $classes[] = 'last';
            }
            $image_class = implode( ' ', $classes );
            $props       = wc_get_product_attachment_props( $attachment_id, $post );
            if ( ! $props['url'] ) {
                continue;
            } ?>
            <li>
                <img class="img-responsive" src="<?php echo ''.$props['url']; ?>"  alt="">
            </li>
            <?php $loop++;
        } ?>
    <?php
    }
} else {
    $attachment_ids = $product->get_gallery_attachment_ids();
    if ( $attachment_ids ) {
        $loop 		= 0;
        $columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
        foreach ( $attachment_ids as $attachment_id ) {
            $classes = array( 'zoom' );
            if ( $loop === 0 || $loop % $columns === 0 ) {
                $classes[] = 'first';
            }
            if ( ( $loop + 1 ) % $columns === 0 ) {
                $classes[] = 'last';
            }
            $image_class = implode( ' ', $classes );
            $props       = wc_get_product_attachment_props( $attachment_id, $post );
            if ( ! $props['url'] ) {
                continue;
            } ?>
            <div class="col-sm-6 margin-bottom-30">
                <img class="img-responsive" src="<?php echo ''.$props['url']; ?>"  alt="">
            </div>
            <?php $loop++;
        } ?>
    <?php
    }
}

