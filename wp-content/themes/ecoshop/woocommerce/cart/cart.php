<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

    <?php do_action( 'woocommerce_before_cart_table' ); ?>
    <section class="padding-top-100 padding-bottom-100 pages-in chart-page">
        <div class="container">
            <!-- Payments Steps -->
            <div class="shopping-cart text-center shop_table cart">
                <div class="cart-head">
                    <ul class="row">
                        <!-- PRODUCTS -->
                        <li class="col-sm-2 text-left">
                            &nbsp;
                        </li>
                        <!-- NAME -->
                        <li class="col-sm-4 text-left">
                            <h6><?php esc_attr_e('PRODUCT','ecoshop'); ?></h6>
                        </li>
                        <!-- PRICE -->
                        <li class="col-sm-2">
                            <h6><?php esc_attr_e('PRICE','ecoshop'); ?></h6>
                        </li>
                        <!-- QTY -->
                        <li class="col-sm-1">
                            <h6><?php esc_attr_e('QUANTITY','ecoshop'); ?></h6>
                        </li>

                        <!-- TOTAL PRICE -->
                        <li class="col-sm-2">
                            <h6><?php esc_attr_e('TOTAL','ecoshop'); ?></h6>
                        </li>
                        <li class="col-sm-1"> </li>
                    </ul>
                </div>
                <?php do_action( 'woocommerce_before_cart_contents' ); ?>
                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
                        <!-- Cart Details -->
                        <ul class="row cart-details cart_item">
                            <li class="col-sm-6">
                                <div class="media">
                                    <!-- Media Image -->
                                    <div class="media-left media-middle">
                                        <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                        if ( ! $product_permalink ) {
                                            echo ''.$thumbnail;
                                        } else {
                                            printf( '<a class="item-img" href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                        }
                                        ?>
                                    </div>
                                    <!-- Item Name -->
                                    <div class="media-body">
                                        <div class="position-center-center">
                                            <h5 class="product-name" data-title="<?php _e( 'Product', 'ecoshop' ); ?>"><?php
                                                if ( ! $product_permalink ) {
                                                    echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
                                                } else {
                                                    echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
                                                }

                                                // Meta data
                                                echo WC()->cart->get_item_data( $cart_item );

                                                // Backorder notification
                                                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                    echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'ecoshop' ) . '</p>';
                                                }
                                                ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- PRICE -->
                            <li class="col-sm-2">
                                <div class="position-center-center">
                        <span class="price product-price" data-title="<?php _e( 'Price', 'ecoshop' ); ?>">
                            <?php
                            echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                            ?>
                        </span>
                                </div>
                            </li>
                            <!-- QTY -->
                            <li class="col-sm-1">
                                <div class="position-center-center">
                                    <div class="quinty product-quantity" data-title="<?php _e( 'Quantity', 'ecoshop' ); ?>">
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            $product_quantity = woocommerce_quantity_input( array(
                                                'input_name'  => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                                'min_value'   => '0'
                                            ), $_product, false );
                                        }

                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <!-- TOTAL PRICE -->
                            <li class="col-sm-2">
                                <div class="position-center-center">
                        <span class="price product-subtotal" data-title="<?php _e( 'Total', 'ecoshop' ); ?>">
                            <?php
                            echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                            ?>
                        </span>
                                </div>
                            </li>
                            <!-- REMOVE -->
                            <li class="col-sm-1">
                                <div class="position-center-center product-remove">
                                    <?php
                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                        '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                        esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
                                        __( 'Remove this item', 'ecoshop' ),
                                        esc_attr( $product_id ),
                                        esc_attr( $_product->get_sku() )
                                    ), $cart_item_key );
                                    ?>
                                </div>
                            </li>
                        </ul>
                    <?php
                    }
                }
                do_action( 'woocommerce_cart_contents' ); ?>
            </div>
        </div>
    </section>
    <?php do_action( 'woocommerce_after_cart_contents' ); ?>
    <?php do_action( 'woocommerce_after_cart_table' ); ?>
    <div class="cart-collaterals">
        <?php do_action( 'woocommerce_cart_collaterals' ); ?>
    </div>
</form>
<?php do_action( 'woocommerce_after_cart' ); ?>
