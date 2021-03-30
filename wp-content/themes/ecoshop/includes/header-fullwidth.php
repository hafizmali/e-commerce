<header>
    <div class="sticky">
        <div class="container full-header">
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php $primary_logo = ecoshop_option('primary_logo');
                    if(!empty($primary_logo)){ ?>
                        <img class="img-responsive" src="<?php echo esc_url($primary_logo); ?>" alt="" >
                    <?php } else{ ?>
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="" >
                    <?php } ?>
                </a>
            </div>
            <nav class="navbar ownmenu">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only"><?php esc_attr_e('Toggle navigation','ecoshop'); ?></span> <span class="icon-bar"><i class="fa fa-navicon"></i></span> </button>
                </div>

                <!-- NAV -->
                <div class="collapse navbar-collapse" id="nav-open-btn">
                    <ul class="nav">
                        <?php require_once(get_template_directory() . "/includes/mega-menu/mega-menu.php"); ?>
                    </ul>
                </div>

                <!-- Nav Right -->
                <div class="nav-right">
                    <ul class="navbar-right">
                        <?php $hide_cart_icon = ecoshop_option('hide_cart_icon');
                        $hide_search_icon = ecoshop_option('hide_search_icon');
                        $hide_account_icon = ecoshop_option('hide_account_icon');
                        if($hide_account_icon != 1){ ?>
                            <!-- USER INFO -->
                            <li class="dropdown user-acc">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><i class="icon-user"></i> </a>
                                <ul class="dropdown-menu">
                                    <?php global $woocommerce;
                                    if(function_exists('wc_get_cart_url')){
                                        $cart_url = wc_get_cart_url();
                                    } else {
                                        $cart_url = '';
                                    }
                                    $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
                                    if ( $myaccount_page_id ) {
                                        $myaccount_page_url = get_permalink( $myaccount_page_id );
                                    } else{
                                        $myaccount_page_url = '';
                                    } $current_user = wp_get_current_user();
                                    $user_name = $current_user->display_name; ?>
                                    <li>
                                        <h6>
                                            <?php esc_attr_e('HELLO! ','ecoshop');
                                            if(!empty($user_name)){
                                                echo esc_attr($user_name);
                                            } else {
                                                esc_attr_e('Guest','ecoshop');
                                            } ?>
                                        </h6>
                                    </li>
                                    <?php if(!empty($cart_url)){ ?>
                                        <li><a href="<?php echo esc_url($cart_url); ?>"><?php esc_attr_e('MY CART','ecoshop'); ?></a></li>
                                    <?php } if(!empty($myaccount_page_url)){ ?>
                                        <li><a href="<?php echo esc_url($myaccount_page_url); ?>"><?php esc_attr_e('ACCOUNT INFO','ecoshop'); ?></a></li>
                                    <?php } if(is_user_logged_in()){ ?>
                                        <li><a href="<?php echo wp_logout_url(); ?>"><?php esc_attr_e('LOG OUT','ecoshop'); ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } if($hide_cart_icon != 1){ ?>
                            <!-- USER BASKET -->
                            <li class="dropdown user-basket"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="icon-basket-loaded"></i> </a>
                                <ul class="dropdown-menu append-here">

                                    <?php global $woocommerce;
                                    if ( function_exists('WC') && ! WC()->cart->is_empty() ) : ?>
                                        <div class="overflow">
                                            <?php
                                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                                    $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                                    $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                    $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                                    ?>
                                                    <li>
                                                        <div class="media-left">
                                                            <div class="cart-img">
                                                                <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                                                    <?php echo ''.$thumbnail; ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading"><?php echo esc_attr($product_name); ?></h6>
                                                            <?php echo ''.$product_price; ?>
                                                            <span class="qty"><?php esc_attr_e('QTY','ecoshop'); ?>:
                                                                <?php echo esc_attr($cart_item['quantity']); ?>
                            </span>
                                                        </div>
                                                    </li>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php if ( ! WC()->cart->is_empty() ) : ?>
                                            <li>
                                                <h5 class="text-center"><?php esc_attr_e('SUBTOTAL','ecoshop'); ?>: <?php echo WC()->cart->get_cart_subtotal(); ?></h5>
                                            </li>
                                            <li class="margin-0">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <?php global $woocommerce;
                                                        $cart_url = wc_get_cart_url(); ?>
                                                        <a href="<?php echo esc_url($cart_url); ?>" class="btn"><?php esc_attr_e('VIEW CART','ecoshop'); ?></a>
                                                    </div>
                                                    <div class="col-xs-6 ">
                                                        <?php $check_out_url = wc_get_checkout_url(); ?>
                                                        <a href="<?php echo esc_url($check_out_url); ?>" class="btn"><?php esc_attr_e('CHECK OUT','ecoshop'); ?></a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php else :
                                        if(function_exists('wc_get_page_id')){
                                            $shop_id = wc_get_page_id( 'shop' );
                                        } else {
                                            $shop_id = '';
                                        } $shop_page_url = get_permalink( $shop_id ); ?>
                                        <li class="margin-0">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <a href="<?php echo esc_url($shop_page_url); ?>" class="btn"><?php esc_attr_e('VISIT SHOP','ecoshop'); ?></a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php } if($hide_search_icon != 1){ ?>
                            <!-- SEARCH BAR -->
                            <li class="dropdown"> <a href="javascript:void(0);" class="search-open"><i class=" icon-magnifier"></i></a>
                                <div class="search-inside animated bounceInUp"> <i class="icon-close search-close"></i>
                                    <div class="search-overlay"></div>
                                    <div class="position-center-center">
                                        <div class="search">
                                            <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                                                <input type="search" name="s" required="required" placeholder="<?php esc_attr_e('Search Shop','ecoshop'); ?>">
                                                <input type="hidden" name="post_type" value="product" />
                                                <button type="submit"><i class="icon-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>