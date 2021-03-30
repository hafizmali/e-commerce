<?php
/*
 * Category Layout 1 Template
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
        <!-- Tittle -->
        <div class="post-tittle">
            <div class="tags">
                <?php $posttags = get_the_tags();
                if ($posttags) {
                    $i = 0;
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
            </div>
            <a href="<?php the_permalink(); ?>" class="tittle"><?php the_title(); ?></a>
            <span><?php esc_attr_e('by','ecoshop'); ?> <strong><?php the_author(); ?></strong></span>
        </div>
        <?php if(has_post_thumbnail()){ ?>
            <!-- Post Img -->
            <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
        <?php } ?>
        <!-- DATE -->
        <div class="media-left">
            <div class="post-date">
                <span><?php echo get_the_time('F'); ?></span>
                <span class="num"><?php echo get_the_time('d'); ?></span>
                <span class="coments"><i class="icon-bubble primary-color"></i> <?php echo get_comments_number( '0', '1', '%' ); ?> </span>
            </div>
        </div>
        <div class="media-body text-left">
            <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="btn"><?php esc_attr_e('READ MORE','ecoshop'); ?></a>
    </article>
<?php endwhile; ?>
    <!-- Pagination -->
<?php ecoshop_pagination($pages = '', $range = 2);
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