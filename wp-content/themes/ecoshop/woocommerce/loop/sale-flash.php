<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>
    <div class="on-sale">
        <?php if($product->is_type( 'variable' )){ ?>
            <span class="simple-sale"><?php esc_attr_e('SALE','ecoshop'); ?></span>
        <?php } else {
            echo get_woocommerce_currency_symbol();
            echo esc_attr($product->regular_price-$product->sale_price); ?>
            <span><?php esc_attr_e('OFF','ecoshop'); ?></span>
        <?php } ?>
    </div>
	<?php //echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale!', 'ecoshop' ) . '</span>', $post, $product ); ?>

<?php endif; ?>
