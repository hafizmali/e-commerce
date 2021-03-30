<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$pro_layout = ecoshop_option('shop_layout');
$pro_class1 = '';
$pro_class2 = '';
if($pro_layout == 'one'){
    $pro_class1 = 'col-md-3';
    $pro_class2 = 'item';
} elseif($pro_layout == 'two'){
    $pro_class1 = 'col-md-4';
    $pro_class2 = 'item';
} elseif($pro_layout == 'three'){
    $pro_class1 = 'col-md-4';
    $pro_class2 = 'item';
} else {
    $pro_class1 = 'col-md-6';
    $pro_class2 = 'item ly-four';
} ?>
<div class="<?php echo esc_attr($pro_class1); ?>">
<div class="<?php echo esc_attr($pro_class2); ?>">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</div>
</div>
<?php global $counto;
if($pro_layout == 'one'){
    if($counto % 4 == 0){
        echo '<div class="clearfix"></div>';
    }
} elseif($pro_layout == 'two'){
    if($counto % 3 == 0){
        echo '<div class="clearfix"></div>';
    }
} elseif($pro_layout == 'three'){
    if($counto % 3 == 0){
        echo '<div class="clearfix"></div>';
    }
} else {
    if($counto % 2 == 0){
        echo '<div class="clearfix"></div>';
    }
}
$counto++; ?>