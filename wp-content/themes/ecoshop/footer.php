<?php
/*
 * Footer Template
 */
if((function_exists('is_woocommerce') && is_woocommerce()) || is_home() || is_tag() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_404() || is_attachment()){
    $hide_about_section = ecoshop_option('hide_about_section');
    $about_shop_heading = ecoshop_option('about_shop_heading');
    $about_shop_description = ecoshop_option('about_shop_description');
    $hide_newsletter_section = ecoshop_option('hide_newsletter_section');
    $newsletter_style = ecoshop_option('newsletter_style');
    $newsletter_heading = ecoshop_option('newsletter_heading');
    $newsletter_description = ecoshop_option('newsletter_description');
    $newsletter_shortcode = ecoshop_option('newsletter_shortcode');
} else {
    $hide_about_section = ecoshop_get_field('hide_about_section');
    $about_shop_heading = ecoshop_get_field('about_shop_heading');
    $about_shop_description = ecoshop_get_field('about_shop_description');
    $hide_newsletter_section = ecoshop_get_field('hide_newsletter_section');
    $newsletter_style = ecoshop_get_field('newsletter_style');
    $newsletter_heading = ecoshop_get_field('newsletter_heading');
    $newsletter_description = ecoshop_get_field('newsletter_description');
    $newsletter_shortcode = ecoshop_get_field('newsletter_shortcode');
}
if($hide_about_section == 'no'){ ?>
<!-- About -->
<section class="small-about padding-top-150 padding-bottom-150">
    <div class="container">
        <!-- Main Heading -->
        <div class="heading text-center">
            <?php if(!empty($about_shop_heading)){ ?>
                <h4><?php echo esc_attr($about_shop_heading); ?></h4>
            <?php } if(!empty($about_shop_description)){ ?>
            <p><?php echo esc_attr($about_shop_description); ?></p>
            <?php } ?>
        </div>
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
</section>
<?php } if($hide_newsletter_section == 'no'){
    if($newsletter_style == 'color'){
        $style = 'style-2';
    } else {
      $style = '';
    } ?>
<!-- News Letter -->
<section class="news-letter <?php echo esc_attr($style); ?> padding-top-150 padding-bottom-150">
    <div class="container">
        <div class="heading light-head text-center margin-bottom-30">
            <?php if(!empty($newsletter_heading)){ ?>
                <h4><?php echo esc_attr($newsletter_heading); ?></h4>
            <?php } if(!empty($newsletter_description)){ ?>
                <span><?php echo esc_attr($newsletter_description); ?></span>
            <?php } ?>
        </div>
        <?php echo do_shortcode($newsletter_shortcode); ?>
    </div>
</section>
<?php } ?>
</div>
<!--======= FOOTER =========-->
<footer>
    <div class="container">
        <!-- ABOUT Location -->
        <div class="col-md-3">
            <div class="about-footer">
                <?php if ( is_active_sidebar( 'f1' )  ) :
                    dynamic_sidebar( 'f1' );
                endif; ?>
            </div>
        </div>

        <!-- HELPFUL LINKS -->
        <div class="col-md-3">
            <?php if ( is_active_sidebar( 'f2' )  ) :
                dynamic_sidebar( 'f2' );
            endif; ?>
        </div>

        <!-- SHOP -->
        <div class="col-md-3">
            <?php if ( is_active_sidebar( 'f3' )  ) :
                dynamic_sidebar( 'f3' );
            endif; ?>
        </div>

        <!-- MY ACCOUNT -->
        <div class="col-md-3">
            <?php if ( is_active_sidebar( 'f4' )  ) :
                dynamic_sidebar( 'f4' );
            endif; ?>
        </div>
        <!-- Rights -->
        <div class="rights">
            <?php $footer_copyright = ecoshop_option('footer_copyright');
            if(!empty($footer_copyright)){ ?>
                <p><?php echo esc_attr($footer_copyright); ?></p>
            <?php } ?>
            <div class="scroll">
                <a href="#wrap" class="go-up">
                    <i class="lnr lnr-arrow-up"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>