<?php $pro_layout = ecoshop_option('shop_layout');
$spl = ecoshop_option('shop_single_layout');
// Remove Default Wrapper
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
// Remove Page Title
function ecoshop_woocommerce_show_page_title() {
    return false;
}
add_filter( 'woocommerce_show_page_title', 'ecoshop_woocommerce_show_page_title' );
// Add Product Wrapper
function ecoshop_woocommerce_before_single_product() {
    echo '<div>';
}
function ecoshop_woocommerce_after_single_product() {
    echo '</div>';
}
add_action( 'woocommerce_before_single_product', 'ecoshop_woocommerce_before_single_product', 10 );
add_action( 'woocommerce_after_single_product', 'ecoshop_woocommerce_after_single_product', 10 );
// Shop Posts Per Page
function ecoshop_woocommerce_shop_posts_per_page() {
    $products = ecoshop_option('number_of_products_display');
    return $products;
}
add_filter( 'loop_shop_per_page', 'ecoshop_woocommerce_shop_posts_per_page' );
if($pro_layout == 'one' || $pro_layout == 'two' || $pro_layout == 'three'){
    // Shop Thumbnail Layout 1, 2, 3
    function ecoshop_woocommerce_shop_thumbnail() {
        GLOBAL $product;
        $id = get_the_ID();
        $double_image = ecoshop_get_field_by_id('double_image',get_the_ID()); ?>
        <div class="item-img">
            <img class="img-1" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
            <?php if(!empty($double_image)){ ?>
                <img class="img-2" src="<?php echo esc_url($double_image); ?>" alt="" >
            <?php } ?>
            <!-- Overlay -->
            <div class="overlay">
                <div class="position-center-center">
                    <div class="inn">
                        <a data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('View Image','ecoshop'); ?>" href="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" data-lighter><i class="icon-magnifier"></i></a>
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
        <?php  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    }
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'ecoshop_woocommerce_shop_thumbnail', 10 );
} else {
    // Shop Thumbnail Layout 4
    function ecoshop_woocommerce_shop_thumbnail() {
        GLOBAL $product;
        $id = get_the_ID();
        $double_image = ecoshop_get_field_by_id('double_image',get_the_ID()); ?>
        <div class="item-img">
            <img class="img-1" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
            <?php if(!empty($double_image)){ ?>
                <img class="img-2" src="<?php echo esc_url($double_image); ?>" alt="" >
            <?php } ?>
            <!-- Overlay -->
            <div class="inn">
                <a data-toggle="tooltip" data-placement="top" title="<?php esc_attr_e('View Image','ecoshop'); ?>" href="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" data-lighter><i class="icon-magnifier"></i></a>
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
        <span class="price block">
            <?php echo do_shortcode($product->get_price_html()); ?>
        </span>
        <?php remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    }
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
    add_action( 'woocommerce_after_shop_loop_item_title', 'ecoshop_woocommerce_shop_thumbnail', 10 );
}
// Add Excerpt Under Title
function ecoshop_loop_item_title(){
    GLOBAL $product;
    $id = get_the_ID(); ?>
    <div class="item-name">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <p><?php ecoshop_excerpt(35); ?></p>
    </div>
<?php }
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'ecoshop_loop_item_title', 9 );
// Remove Cart Cross Cells
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' , 10 );
// remove the action 
remove_action( 'woocommerce_ajax_added_to_cart', 'action_woocommerce_ajax_added_to_cart', 10, 1 );
// Remove Rating
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
// Add Sale Badge After Title
function ecoshop_woocommerce_shop_sale_flash() {
    GLOBAL $product; ?>
    <div class="on-sale">
        <?php if($product->is_type( 'variable' )){ ?>
            <span class="simple-sale"><?php esc_attr_e('SALE','ecoshop'); ?></span>
        <?php } else {
            echo get_woocommerce_currency_symbol();
            echo esc_attr($product->regular_price-$product->sale_price); ?>
            <span><?php esc_attr_e('OFF','ecoshop'); ?></span>
        <?php } ?>
    </div>
<?php }
add_action( 'woocommerce_single_product_summary', 'ecoshop_woocommerce_shop_sale_flash', 10 );
// Add Product Categories Under Title
if($spl == 'one' || $spl == 'two' || $spl == 'three'){
    function ecoshop_category_under_title(){
        GLOBAL $product; ?>
        <ul class="item-owner">
            <?php echo ''.$product->get_categories( ', ', ' <li>' . _n( 'CATEGORY:', 'CATEGORIES:', sizeof( get_the_terms( $product->ID, 'ecoshop' ) ), 'ecoshop' ) . ' ', '.</li>' ); ?>
            <?php if($product->get_sku()){ ?>
                <li><?php esc_attr_e('SKU','ecoshop'); ?>:<span> <?php echo do_shortcode($product->get_sku()); ?></span></li>
            <?php } ?>
        </ul>
    <?php }
    add_action( 'woocommerce_single_product_summary', 'ecoshop_category_under_title', 10 );
}
// Remove Plugin Settings
function ecoshop_woocommerce_remove_plugin_settings( $settings ) {
    foreach ( $settings as $key => $setting ) {
        $id = $setting['id'];
        if ( $id == 'image_options' || $id == 'shop_catalog_image_size' || $id == 'shop_single_image_size' || $id == 'shop_thumbnail_image_size' ) {
            unset( $settings[$key] );
        }
    }
    return $settings;
}
add_filter( 'woocommerce_product_settings', 'ecoshop_woocommerce_remove_plugin_settings', 10 );
