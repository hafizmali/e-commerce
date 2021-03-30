<?php get_header(); ?>
    <!-- Blog List -->
    <section class="blog-list padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php while(have_posts()) : the_post();
                        if(is_sticky()){
                          $sticky = 'class=sticky-post';
                        } else {
                            $sticky = '';
                        } ?>
                        <article <?php echo esc_attr($sticky); ?>>
                            <?php if(has_post_thumbnail()){ ?>
                                <!-- Post Img -->
                                <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
                            <?php } if(is_sticky()){ echo '<div class="sticky-inn">'; } ?>
                            <!-- Tittle -->
                            <div class="post-tittle left">
                                <a href="<?php the_permalink(); ?>" class="tittle"><?php the_title(); ?></a>
                                <!-- Post Info -->
                                <span><i class="primary-color icon-user"></i> <?php esc_attr_e('by','ecoshop'); echo ' '.get_the_author(); ?></span>
                                <span><i class="primary-color icon-calendar"></i> <?php echo get_the_time('F d, Y'); ?></span>
                                <span><i class="primary-color icon-bubble"></i> <?php echo get_comments_number( '0', '1', '%' ); ?></span>
                            </div>
                            <!-- Post Content -->
                            <div class="text-left">
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn"><?php esc_attr_e('READ MORE','ecoshop'); ?></a>
                            </div>
                            <?php if(is_sticky()){ echo '</div>'; } ?>
                        </article>
                    <?php endwhile;
                    ecoshop_pagination($pages = '', $range = 2); ?>
                </div>
                <div class="col-md-3">
                    <?php get_sidebar('blog'); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>