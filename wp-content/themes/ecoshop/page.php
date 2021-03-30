<?php get_header();
while(have_posts()) : the_post(); ?>
        <?php if(function_exists('is_cart') && is_cart()){
            the_content();
        } elseif(function_exists('is_checkout') && is_checkout()){ ?>
            <section class="chart-page padding-top-100 padding-bottom-100">
                <div class="container">
                    <!-- Payments Steps -->
                    <div class="shopping-cart">
                        <!-- SHOPPING INFORMATION -->
                        <div class="cart-ship-info">
                            <div class="row">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } elseif(function_exists('is_account_page') && is_account_page()){ ?>
            <section class="chart-page padding-top-100 padding-bottom-100">
                <div class="shopping-cart">
                    <div class="cart-ship-info register">
                        <div class="container">
                            <div class="row">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } else{
            $page_layout = ecoshop_get_field('page_layout');
            $hide_page_title = ecoshop_get_field('hide_page_title');
            if($page_layout == 'full-width'){
                the_content();
            } else { ?>
                <section class="padding-top-30 padding-bottom-100">
                    <div class="container">
                        <div class="row">
                            <?php if($hide_page_title != 'yes'){ ?>
                                <h4 class="margin-bottom-30"><?php the_title(); ?></h4>
                            <?php }
                            the_content(); ?>
                            <!-- Theme Comments -->
                            <?php comments_template(); ?>
                        </div>
                    </div>
                </section>
            <?php }
        } ?>
<?php endwhile;
get_footer(); ?>