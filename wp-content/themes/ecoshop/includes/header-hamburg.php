<!-- Nav Popup -->
<?php $hamburg_menu_bg = ecoshop_option('hamburg_menu_bg'); ?>
<div id="cd-nav" class="cd-nav" <?php if(!empty($hamburg_menu_bg)){ ?> style="background: #fff url(<?php echo esc_url($hamburg_menu_bg); ?>) center center no-repeat;background-size: cover;" <?php } ?>>
    <div class="cd-navigation-wrapper">
        <div class="position-center-center">
            <div class="col-sm-5">
                <!-- Nav -->
                <nav>
                    <ul class="cd-primary-nav">
                        <?php if ( has_nav_menu( 'hamburg-menu' ) ) :
                            wp_nav_menu( array( 'theme_location' => 'hamburg-menu','container' => '','items_wrap' => '%3$s' ) );
                        else:
                            echo '<li><a>' . esc_html__( 'Define your hamburg menu.', 'ecoshop' ) . '</a></li>';
                        endif; ?>
                    </ul>
                </nav>
                <!-- Social Icons -->
                <ul class="social_icons">
                    <?php $facebook = ecoshop_option('facebook');
                    $twitter = ecoshop_option('twitter');
                    $dribbble = ecoshop_option('dribbble');
                    $google = ecoshop_option('google');
                    $linkedin = ecoshop_option('linkedin');
                    $pinterest = ecoshop_option('pinterest');
                    $youtube = ecoshop_option('youtube');
                    $instagram = ecoshop_option('instagram');
                    if(!empty($facebook)){ ?>
                        <li><a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="icon-social-facebook"></i></a></li>
                    <?php } if(!empty($twitter)){ ?>
                        <li><a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="icon-social-twitter"></i></a></li>
                    <?php } if(!empty($dribbble)){ ?>
                        <li><a href="<?php echo esc_url($dribbble); ?>" target="_blank"><i class="icon-social-dribbble"></i></a></li>
                    <?php } if(!empty($youtube)){ ?>
                        <li><a href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="icon-social-youtube"></i></a></li>
                    <?php } if(!empty($google)){ ?>
                        <li><a href="<?php echo esc_url($google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <?php } if(!empty($linkedin)){ ?>
                        <li><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <?php } if(!empty($pinterest)){ ?>
                        <li><a href="<?php echo esc_url($pinterest); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                    <?php } if(!empty($instagram)){ ?>
                        <li><a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- Right Section -->
            <div class="col-sm-7">
            </div>
        </div>
    </div>
</div>
<!-- Header -->
<header class="header-2">
    <div class="container-fluid">
        <div class="sticky">
            <!-- Nav Icon -->
            <a href="#cd-nav" class="cd-nav-trigger"><span class="cd-nav-icon"></span>
                <!-- Svg Icon -->
                <svg x="0px" y="0px" width="54px" height="54px" viewBox="0 0 54 54">
                    <circle fill="transparent" stroke="#2d3a4b" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
                </svg> </a>
            <!-- Logo -->
            <div class="logo logo-center">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php $hamburg_header_logo = ecoshop_option('hamburg_header_logo');
                    if(!empty($hamburg_header_logo)){ ?>
                        <img class="img-responsive" src="<?php echo esc_url($hamburg_header_logo); ?>" alt="" >
                    <?php }else{ ?>
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/logo-2.png" alt="" >
                    <?php } ?>
                </a>
            </div>
            <!-- Navigation -->
            <nav class="navbar">
                <!-- Nav Right -->
                <div class="nav-right">
                    <ul class="navbar-right">
                        <?php $hide_cart_icon = ecoshop_option('hide_cart_icon');
                        $hide_search_icon = ecoshop_option('hide_search_icon');
                        $hide_account_icon = ecoshop_option('hide_account_icon');
                        if($hide_account_icon != 1){ ?>
                            <!-- USER INFO -->
                            <li class="dropdown user-acc"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><i class="icon-user"></i> </a>
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
                            <li class="dropdown user-basket">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    <i class="icon-basket-loaded"></i>
                                </a>
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