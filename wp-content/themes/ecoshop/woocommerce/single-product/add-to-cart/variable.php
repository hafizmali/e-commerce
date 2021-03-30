<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.5
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );
$product_id = $product->id;
do_action( 'woocommerce_before_add_to_cart_form' );
// Layout
$spl = ecoshop_option('shop_single_layout'); ?>
<?php if($spl == 'one' || $spl == 'two' || $spl == 'three'){ ?>
    <form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $available_variations ) ) ?>">
        <?php do_action( 'woocommerce_before_variations_form' ); ?>

        <?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
            <p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'ecoshop' ); ?></p>
        <?php else : ?>
            <table class="variations" cellspacing="0">
                <tbody>
                <?php foreach ( $attributes as $attribute_name => $options ) : ?>
                    <tr>
                        <td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td>
                        <td class="value">
                            <?php
                            $selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) : $product->get_variation_default_attribute( $attribute_name );
                            wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
                            echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . __( 'Clear', 'ecoshop' ) . '</a>' ) : '';
                            ?>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>

            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

            <div class="single_variation_wrap">
                <?php
                /**
                 * woocommerce_before_single_variation Hook.
                 */
                do_action( 'woocommerce_before_single_variation' );

                /**
                 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
                 * @since 2.4.0
                 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
                 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
                 */
                do_action( 'woocommerce_single_variation' );

                /**
                 * woocommerce_after_single_variation Hook.
                 */
                do_action( 'woocommerce_after_single_variation' );
                ?>
            </div>
            <div class="some-info">
                <!-- INFORMATION -->
                <div class="inner-info">
                    <?php $delivery_information = ecoshop_get_field('delivery_information');
                    $delivery_information_string = ecoshop_get_field('delivery_information_string');
                    if(!empty($delivery_information)){ ?>
                        <h6><?php echo esc_attr($delivery_information_string); ?></h6>
                        <p><?php echo esc_attr($delivery_information); ?></p>
                    <?php } ?>
                        <h6><?php esc_attr_e('SHARE THIS PRODUCT','ecoshop'); ?></h6>
                    <!-- Social Icons -->
                    <ul class="social_icons">
                        <li>
                            <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>">
                                <i class="icon-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>">
                                <i class="icon-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title(); ?>&amp;source=<?php bloginfo( 'name' ); ?>">
                                <i class="ion-social-linkedin-outline"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink() ?>">
                                <i class="ion-social-googleplus-outline"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
        <?php endif; ?>

        <?php do_action( 'woocommerce_after_variations_form' ); ?>
    </form>
<?php } ?>
<?php
do_action( 'woocommerce_after_add_to_cart_form' );
