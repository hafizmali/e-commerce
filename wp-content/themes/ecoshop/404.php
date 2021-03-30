<?php get_header();
$error_404 = ecoshop_option('error_404'); ?>
<!-- History -->
<section class="history-block padding-top-100 padding-bottom-100">
    <div class="container text-center">
        <?php if(!empty($error_404)){
            echo do_shortcode($error_404);
        } else{ ?>
            <h3 class="padding-bottom-50"><?php esc_attr_e('PAGE NOT FOUND!','ecoshop'); ?></h3>
            <h5 class="shop-tittle"><?php esc_html_e('Looks like the page you’re trying to visit doesn’t exist. Please check the URL and try your luck again.','ecoshop'); ?></5>
        <?php } ?>
    </div>
</section>
<?php get_footer(); ?>