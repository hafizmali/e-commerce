<?php
/*
 * Category Layout 2 Template
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
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="btn"><?php esc_attr_e('READ MORE','ecoshop'); ?></a>
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