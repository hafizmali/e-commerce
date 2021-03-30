<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
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
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
    <div class="container padding-bottom-100">
        <div class="item-decribe">
            <ul class="nav nav-tabs animate fadeInUp" data-wow-delay="0.4s" role="tablist">
                <?php $ii = 1;
                foreach ( $tabs as $key => $tab ) : ?>
                    <li role="presentation" class="<?php if($ii == 1){ ?>active <?php } echo esc_attr( $key ); ?>_tab">
                        <a role="tab" data-toggle="tab" href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
                    </li>
                <?php $ii++;
                endforeach; ?>
            </ul>
            <div class="tab-content animate fadeInUp" data-wow-delay="0.4s">
                <?php $cnt = 1;
                foreach ( $tabs as $key => $tab ) : ?>
                    <div role="tabpanel" class="tab-pane <?php if($cnt == 1){ ?> fade in active <?php } ?>" id="tab-<?php echo esc_attr( $key ); ?>">
                        <?php call_user_func( $tab['callback'], $key, $tab ); ?>
                    </div>
                <?php $cnt++;
                endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
