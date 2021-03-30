<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
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
/** Order Form In Shipping Form */
?>
<div class="col-sm-12">
    <h6><?php esc_attr_e('YOUR ORDER','ecoshop'); ?></h6>
    <div class="order-place">
        <div class="order-detail">
            <?php
            do_action( 'woocommerce_review_order_before_cart_contents' );
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    ?>
                    <p class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                        <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
                        <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
                        <?php //echo WC()->cart->get_item_data( $cart_item ); ?>
                        <span class="product-total">
                            <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                        </span>
                    </p>
                <?php
                }
            }
            do_action( 'woocommerce_review_order_after_cart_contents' );
            ?>
            <!-- SUB TOTAL -->
            <p><strong><?php esc_attr_e('SUBTOTAL','ecoshop'); ?> <span> <?php wc_cart_totals_subtotal_html(); ?></span></strong></p>
            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                <p class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                    <?php wc_cart_totals_coupon_label( $coupon ); ?>
                    <span><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
                </p>
            <?php endforeach; ?>
            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                <p>
                    <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
                    <?php wc_cart_totals_shipping_html(); ?>
                    <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
                </p>
            <?php endif; ?>
            <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                <p class="fee">
                    <?php echo esc_html( $fee->name ); ?>
                    <span><?php wc_cart_totals_fee_html( $fee ); ?></span>
                </p>
            <?php endforeach; ?>
            <?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
                <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                        <p class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                            <?php echo esc_html( $tax->label ); ?>
                            <span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                        </p>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="tax-total">
                        <?php echo esc_html( WC()->countries->tax_or_vat() ); ?>
                        <span><?php wc_cart_totals_taxes_total_html(); ?></span>
                    </p>
                <?php endif; ?>
            <?php endif; ?>
            <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
            <p class="order-total all-total">
                <?php _e( 'Total', 'ecoshop' ); ?>
                <span><?php wc_cart_totals_order_total_html(); ?></span>
            </p>
            <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
        </div>
        <div class="pay-meth">
            <?php if ( ! is_ajax() ) {
            do_action( 'woocommerce_review_order_before_payment' );
            }
            ?>
            <div id="payment" class="woocommerce-checkout-payment">
                <?php if ( WC()->cart->needs_payment() ) : ?>
                    <ul class="wc_payment_methods payment_methods methods">
                        <?php
                        if ( ! empty( $available_gateways ) ) {
                            foreach ( $available_gateways as $gateway ) {
                                wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
                            }
                        } else {
                            echo '<li>' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_country() ? __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'ecoshop' ) : __( 'Please fill in your details above to see available payment methods.', 'ecoshop' ) ) . '</li>';
                        }
                        ?>
                    </ul>
                <?php endif; ?>
                <div class="form-row place-order">
                    <noscript>
                        <?php _e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'ecoshop' ); ?>
                        <br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'ecoshop' ); ?>" />
                    </noscript>

                    <?php wc_get_template( 'checkout/terms.php' ); ?>

                    <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

                    <?php echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' ); ?>

                    <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

                    <?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
                </div>
            </div>
        <?php
        if ( ! is_ajax() ) {
            do_action( 'woocommerce_review_order_after_payment' );
        } ?>
        </div>
    </div>
</div>
