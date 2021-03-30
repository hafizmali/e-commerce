<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

if ( ! $related = $product->get_related( $posts_per_page ) ) {
	return;
}
$enable_product_double_img = ecoshop_option('enable_product_double_img');
if($enable_product_double_img == 1){
    $double_img = '';
} else {
    $double_img = 'single-img-demos';
}
$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'related';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );

if ( $products->have_posts() ) : ?>

	<div class="related products light-gray-bg padding-top-150 padding-bottom-150">
        <div class="container">
            <div class="heading text-center">
                <h4><?php _e( 'Related Products', 'ecoshop' ); ?></h4>
            </div>

		<?php woocommerce_product_loop_start(); ?>
            <div class="papular-block block-slide <?php echo esc_attr($double_img); ?>">
			<?php while ( $products->have_posts() ) : $products->the_post();
                    $double_image = ecoshop_get_field_by_id('double_image',get_the_ID());
                    global $product; ?>
                    <div class="item">
                        <!-- Item img -->
                        <div class="item-img">
                            <?php if(has_post_thumbnail()){ ?>
                                <img class="img-1" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
                            <?php } if(!empty($double_image)){ ?>
                                <img class="img-2" src="<?php echo esc_url($double_image); ?>" alt="" >
                            <?php } ?>
                            <!-- Overlay -->
                            <div class="overlay">
                                <div class="position-center-center">
                                    <div class="inn">
                                        <a data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('View Image','ecoshop'); ?>" href="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" data-lighter>
                                            <i class="icon-magnifier"></i>
                                        </a>
                                        <?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                            sprintf( '<a data-toggle="tooltip" data-placement="top" title="'.esc_html__("Add To Cart","ecoshop").'" rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s"><i class="icon-basket"></i></a>',
                                                esc_url( $product->add_to_cart_url() ),
                                                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                esc_attr( $product->id ),
                                                esc_attr( $product->get_sku() ),
                                                esc_attr( isset( $class ) ? $class : 'product_type_simple add_to_cart_button ajax_add_to_cart' ),
                                                esc_html( $product->add_to_cart_text() )
                                            ),
                                            $product );
                                        // Wishlist
                                        if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) { ?>
                                            <span data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('Add To WishList','ecoshop'); ?>">
                                                <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item Name -->
                        <div class="item-name">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <p><?php ecoshop_excerpt(35); ?></p>
                        </div>
                        <!-- Price -->
                        <span class="price">
                            <?php echo ''.$product->get_price_html(); ?>
                        </span>
                    </div>
			<?php endwhile; // end of the loop. ?>
            </div>
		<?php woocommerce_product_loop_end(); ?>
        </div>
	</div>
<?php endif;
wp_reset_postdata();
