<?php
/*
 * Category Layout 3 Template
 */
$category_page_sidebar = ecoshop_get_field('category_page_sidebar');
if($category_page_sidebar != 'hide'){ ?>
    <div class="row">
    <?php if($category_page_sidebar == 'left'){ ?>
        <div class="col-md-3">
            <?php get_sidebar('blog'); ?>
        </div>
        <div class="col-md-9">
    <?php } else {
        echo '<div class="col-md-9">';
    }
}
while(have_posts()) : the_post(); ?>
    <!-- Article -->
    <article>
        <div class="row">
            <?php $lt = 'col-sm-12';
            if(has_post_thumbnail()){
                $lt = 'col-sm-7'; ?>
                <div class="col-sm-5">
                    <!-- Post Img -->
                    <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
                </div>
            <?php } ?>
            <div class="<?php echo esc_attr($lt); ?>">
                <!-- Tittle -->
                <div class="post-tittle left">
                    <a href="<?php the_permalink(); ?>" class="tittle"><?php the_title(); ?></a>
                    <!-- Post Info -->
                    <span><i class="primary-color icon-user"></i> <?php esc_attr_e('by','ecoshop'); echo ' '.get_the_author(); ?></span>
                    <span><i class="primary-color icon-calendar"></i> <?php echo get_the_time('F d, Y'); ?></span>
                    <span><i class="primary-color icon-bubble"></i> <?php echo get_comments_number( '0', '1', '%' ); ?></span>
                    <span>
                    <?php $posttags = get_the_tags();
                        if ($posttags) { ?>
                            <i class="primary-color icon-tag"></i>
                            <?php $i = 0;
                            $len = count($posttags);
                            foreach($posttags as $tag) {
                                if ($i == $len - 1) {
                                    echo esc_attr($tag->name);
                                } else {
                                    echo esc_attr($tag->name).', ';
                                }
                                $i++;
                            }
                        } ?>
                    </span>
                </div>
                <!-- Post Content -->
                <div class="text-left">
                    <p><?php ecoshop_excerpt(400); ?></p>
                    <div class="clearfix"></div>
                    <a href="<?php the_permalink(); ?>" class="btn"><?php esc_attr_e('READ MORE','ecoshop'); ?></a>
                </div>
            </div>
        </div>
    </article>
<?php endwhile;
ecoshop_pagination($pages = '', $range = 2);
if($category_page_sidebar != 'hide'){
    if($category_page_sidebar == 'right'){ ?>
        </div>
        <!-- Side Bar -->
        <div class="col-md-3">
            <?php get_sidebar('blog'); ?>
        </div>
    <?php } else{ ?>
        </div>
        </div>
    <?php }
} ?>