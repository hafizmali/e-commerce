<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
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
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
if ( ! $product->is_purchasable() ) {
	return;
}
// Layout
$spl = ecoshop_option('shop_single_layout'); ?>

<?php
	// Availability
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>
<?php if ( $product->is_in_stock() ) : ?>
	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<?php if($spl == 'one' || $spl == 'three' || $spl == 'two'){ ?>
        <form class="cart" method="post" enctype='multipart/form-data'>
            <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
            <div class="some-info">
                <ul class="row margin-top-30">
                    <li class="col-xs-4">
                        <div class="quinty">
                            <?php
                            if ( ! $product->is_sold_individually() ) {
                                woocommerce_quantity_input( array(
                                    'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
                                    'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
                                    'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
                                ) );
                            }
                            ?>
                            <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
                        </div>
                    </li>
                    <li class="col-xs-8"></li>
                    <div class="clearfix"></div>
                    <!-- ADD TO CART -->
                    <li class="col-xs-6">
                        <button type="submit" class="btn single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                    </li>
                </ul>
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
        </form>
    <?php } ?>
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php endif; ?>
