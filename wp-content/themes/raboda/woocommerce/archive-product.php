<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     41.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

global $road_opt, $road_showcountdown, $road_productrows;

$road_showcountdown = false;
$road_productrows = 1;
?>
<div class="main-container">
	<div class="page-content">
		<div class="container">
			
			<?php do_action( 'woocommerce_archive_description' ); ?>
			
			<?php
				/**
				 * woocommerce_before_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action( 'woocommerce_before_main_content' );
			?>
			<div class="row">
			
				<?php if( $road_opt['sidebar_pos']=='left' || !isset($road_opt['sidebar_pos']) ) :?>
					<?php get_sidebar('category'); ?>
				<?php endif; ?>
				
				<div id="archive-product" class="col-xs-12 col-md-9">
					
					<?php if ( is_search() ) : ?>
						<h1 class="search-title"><?php echo __( 'Search results for &ldquo;', 'woocommerce' ) . get_search_query() . '&rdquo;'; ?></h1>
					<?php endif; ?>
					
						
					<?php
						/**
						* remove message from 'woocommerce_before_shop_loop' and show here
						*/
						do_action( 'woocommerce_show_message' );
						do_action( 'woocommerce_show_breadcrumbs' );
					?>
					
					<?php if ( have_posts() ) : ?>	
					
						<?php woocommerce_product_loop_start(); ?>

							<?php $woocommerce_loop['columns'] = 4; ?>
									
							<?php woocommerce_product_subcategories();
								$woocommerce_loop['loop'] = 0; ?>
								
							<?php if ( woocommerce_products_will_display() ) { ?>
							<div class="toolbar">
								<div class="toolbar-inner">
									<div class="view-mode">
										<a href="#" class="grid active" title="<?php echo esc_attr__( 'Grid' ); ?>"></a>
										<a href="#" class="list" title="<?php echo esc_attr__( 'List' ); ?>"></a>
									</div>
									<?php
										/**
										 * woocommerce_before_shop_loop hook
										 *
										 * @hooked woocommerce_result_count - 20
										 * @hooked woocommerce_catalog_ordering - 30
										 */
										do_action( 'woocommerce_after_shop_loop' );
										do_action( 'woocommerce_before_shop_loop' );
									?>
									<div class="clearfix"></div>
								</div>
							</div>
							<?php } ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php if ( woocommerce_products_will_display() ) { ?>
						<div class="toolbar toolbar-bottom">
							<div class="view-mode">
								<a href="#" class="grid active" title="<?php echo esc_attr__( 'Grid' ); ?>"></a>
								<a href="#" class="list" title="<?php echo esc_attr__( 'List' ); ?>"></a>
							</div>
							<?php
								/**
								 * woocommerce_before_shop_loop hook
								 *
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_after_shop_loop' );
								do_action( 'woocommerce_before_shop_loop' );
							?>
							<div class="clearfix"></div>
						</div>
						<?php } ?>
						
					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php wc_get_template( 'loop/no-products-found.php' ); ?>

					<?php endif; ?>

				<?php
					/**
					 * woocommerce_after_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>

				<?php
					/**
					 * woocommerce_sidebar hook
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					//do_action( 'woocommerce_sidebar' );
				?>
				</div>
				<?php if($road_opt['sidebar_pos']=='right') :?>
					<?php get_sidebar('category'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer( 'shop' ); ?>