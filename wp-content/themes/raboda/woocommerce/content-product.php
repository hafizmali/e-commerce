<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 41.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $road_showcountdown, $road_productrows, $road_productsfound;

//hide countdown on category page, show on all others
if(!isset($road_showcountdown)) {
	$road_showcountdown = true;
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Extra post classes
$classes = array();

$count   = $product->get_rating_count();

$colwidth = 3;

if($woocommerce_loop['columns'] > 0){
	$colwidth = round(12/$woocommerce_loop['columns']);
}

$classes[] = ' item-col col-xs-12 col-sm-'.$colwidth ;?>

<?php if ( ( 0 == ( $woocommerce_loop['loop'] ) % 3 ) && ( $woocommerce_loop['columns'] == 3 ) ) {
	if($road_productrows==3){
		echo '<div class="group">';
	}
} ?>

<div <?php post_class( $classes ); ?>>
	<div class="product-wrapper">
		
		<?php if ( $product->is_on_sale() ) : ?>
			<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale"><span class="sale-bg"></span><span class="sale-text">' . __( 'Sale', 'woocommerce' ) . '</span></span>', $post, $product ); ?>
		<?php endif; ?>
		<div class="list-col4">
			<div class="product-image">
				<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
					<?php 
					echo $product->get_image('shop_catalog', array('class'=>'primary_image'));
					
					$attachment_ids = $product->get_gallery_image_ids();
					if ( $attachment_ids ) {
						echo wp_get_attachment_image( $attachment_ids[0], apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), false, array('class'=>'secondary_image') );
					}
					?>
				
				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			</div>
		</div>
		<div class="list-col8">
			<?php if(!$road_showcountdown) { ?>
			<div class="actions">
				<div class="action-buttons">
					<div class="add-to-cart">
						<?php echo do_shortcode('[add_to_cart id="'.$product->get_id().'"]') ?>
					</div>
					<div class="add-to-links">
						<?php if ( class_exists( 'YITH_WCWL' ) ) {
							echo preg_replace("/<img[^>]+\>/i", " ", do_shortcode('[yith_wcwl_add_to_wishlist]'));
						} ?>
						<?php if( class_exists( 'YITH_Woocompare' ) ) {
							echo do_shortcode('[yith_compare_button]');
						} ?>
					</div>
					<div class="quickview-btn">
						<a class="detail-link quickview" data-quick-id="<?php the_ID();?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="square"></span><i class="fa fa-eye"><?php _e('Quick View', 'woocommerce');?></i></a>
					</div>
				</div>
			</div>
			<?php } ?>
			<h2 class="product-name-listview">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="ratings">
			<?php echo wc_get_rating_html($product->get_average_rating()); ?>
			</div>
			<div class="review-count">
				<a href="<?php the_permalink(); ?>#reviews" class="woocommerce-review-link" rel="nofollow"><?php printf( _n( '%s review', '%s reviews', $count, 'woocommerce' ), '<span class="count">' . $count . '</span>' ); ?><span class="add-review"> | <?php _e('Add your review', 'woocommerce');?></span></a>
			</div>
			<div class="product-desc">
				<?php the_excerpt(); ?>
			</div>
			<div class="price-box">
				<?php echo $product->get_price_html(); ?>
			</div>
			<div class="actions actions-listview">
				<div class="action-buttons">
					<div class="add-to-cart">
						<?php echo do_shortcode('[add_to_cart id="'.$product->get_id().'"]') ?>
					</div>
					<div class="add-to-links">
						<?php if ( class_exists( 'YITH_WCWL' ) ) {
							echo preg_replace("/<img[^>]+\>/i", " ", do_shortcode('[yith_wcwl_add_to_wishlist]'));
						} ?>
						<?php if( class_exists( 'YITH_Woocompare' ) ) {
							echo do_shortcode('[yith_compare_button]');
						} ?>
					</div>
					<div class="quickview-btn">
						<a class="detail-link quickview" data-quick-id="<?php the_ID();?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="square"></span><i class="fa fa-eye"><?php _e('Quick View', 'woocommerce');?></i></a>
					</div>
				</div>
			</div>
			<h2 class="product-name">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
		</div>
		<div class="clearfix"></div>
		
	</div>
</div>
<?php if ( ( ( 0 == $woocommerce_loop['loop'] % 3 || $road_productsfound == $woocommerce_loop['loop'] ) && $woocommerce_loop['columns'] == 3 )  ) { //for odd case: $road_productsfound == $woocommerce_loop['loop'] 
	if($road_productrows==3){
		echo '</div>';
	}
} ?>