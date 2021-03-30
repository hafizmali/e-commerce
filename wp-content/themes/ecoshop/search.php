<?php get_header(); ?>
    <!-- Blog List -->
    <section class="blog-list padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="col-md-9">
                <?php if ( have_posts() ) :
                while(have_posts()) : the_post(); ?>
                    <article>
                        <?php if(has_post_thumbnail()){ ?>
                            <!-- Post Img -->
                            <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
                        <?php } ?>
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
                            <div class="clear clearfix"></div>
                            <a href="<?php the_permalink(); ?>" class="btn"><?php esc_attr_e('READ MORE','ecoshop'); ?></a>
                        </div>
                    </article>
                <?php endwhile;
                else: ?>
                    <h5 class="shop-tittle"><?php esc_attr_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'ecoshop' ); ?></h5>
                    <form role="search" method="get" id="searchform" class="searchform search-f margin-top-50" action="<?php echo esc_url(home_url('/')); ?>">
                        <div>
                            <input type="text" value="" name="s" id="s" class="form-control" placeholder="<?php esc_attr_e('Search here','ecoshop'); ?>">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                <?php endif;
                ecoshop_pagination($pages = '', $range = 2); ?>
            </div>
            <div class="col-md-3">
                <?php get_sidebar('blog'); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>