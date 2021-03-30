<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
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
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<section class="padding-top-100 padding-bottom-100 light-gray-bg shopping-cart small-cart">
    <div class="container">

        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
            <div class="row">

                <!-- DISCOUNT CODE -->
                <div class="col-sm-7 actions">
                    <?php if ( wc_coupons_enabled() ) { ?>
                        <h6><?php esc_attr_e('DISCOUNT CODE','ecoshop'); ?></h6>
                        <div class="coupon">
                            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'ENTER YOUR CODE IF YOU HAVE ONE', 'ecoshop' ); ?>" />
                            <input type="submit" class="button btn btn-small btn-dark" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'ecoshop' ); ?>" />
                            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                        </div>
                    <?php } ?>
                    <div class="coupn-btn">
                        <input type="submit" class="btn" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'ecoshop' ); ?>" />
                        <?php do_action( 'woocommerce_cart_actions' ); ?>
                        <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                        <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
                    </div>
                </div>

                <!-- SUB TOTAL -->
                <div class="col-sm-5">
                    <?php do_action( 'woocommerce_before_cart_totals' ); ?>
                    <h6><?php _e( 'Cart Totals', 'ecoshop' ); ?></h6>
                    <div class="grand-total">
                        <div class="order-detail">
                            <p><?php _e( 'Subtotal', 'ecoshop' ); ?> <span> <?php wc_cart_totals_subtotal_html(); ?> </span></p>
                            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                <p class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                                    <?php wc_cart_totals_coupon_label( $coupon ); ?>
                                    <span data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
                                </p>
                            <?php endforeach; ?>
                            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
                                <p><?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>
                                    <?php wc_cart_totals_shipping_html(); ?>
                                    <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?></p>
                            <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
                                <p class="shipping">
                                    <?php _e( 'Shipping', 'ecoshop' ); ?>
                                    <span data-title="<?php esc_attr_e( 'Shipping', 'ecoshop' ); ?>"><?php woocommerce_shipping_calculator(); ?></span>
                                </p>
                            <?php endif; ?>
                            <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                                <p class="fee">
                                    <?php echo esc_html( $fee->name ); ?>
                                    <span data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></span>
                                </p>
                            <?php endforeach; ?>
                            <?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) :
                                $taxable_address = WC()->customer->get_taxable_address();
                                $estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
                                    ? sprintf( ' <small>(' . __( 'estimated for %s', 'ecoshop' ) . ')</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
                                    : '';

                                if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                                        <p class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                                            <?php echo esc_html( $tax->label ) . $estimated_text; ?>
                                            <span data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                                        </p>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p class="tax-total">
                                        <?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?>
                                        <span data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></span>
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
                            <!-- SUB TOTAL -->
                            <p class="all-total"><?php esc_attr_e('TOTAL COST','ecoshop'); ?> <span> <?php wc_cart_totals_order_total_html(); ?></span></p>
                            <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
                            <?php do_action( 'woocommerce_after_cart_totals' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
