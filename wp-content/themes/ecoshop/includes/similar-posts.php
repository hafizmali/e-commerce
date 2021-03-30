<?php $categories = get_the_category( get_the_ID() );
$f_cat = $categories[0]->cat_ID;
$args = array(
    'category__in' => array( $f_cat ),
    'post__not_in' => array( get_the_ID() ),
    'posts_per_page' => 2
);
$related_posts = get_posts( $args );
if(is_array($related_posts) && count($related_posts) > 0){ ?>
<h5 class="shop-tittle margin-top-50 margin-bottom-50"><?php esc_attr_e('you may like','ecoshop'); ?></h5>
<div class="alos-like padding-left-15">
    <!-- Article -->
    <?php foreach( $related_posts as $post ): setup_postdata( $post ); ?>
        <article>
            <div class="row">
                <?php $classo = 'col-sm-12';
                if(has_post_thumbnail()){
                    $classo = 'col-sm-7'; ?>
                    <div class="col-sm-5">
                        <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
                    </div>
                <?php } ?>
                <div class="<?php echo esc_attr($classo); ?>">
                    <div class="post-tittle left">
                        <a href="<?php the_permalink(); ?>" class="tittle"><?php the_title(); ?></a>
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
                    <div class="text-left">
                        <p><?php ecoshop_excerpt(300); ?></p>
                        <a href="<?php the_permalink(); ?>" class="red-more"><?php esc_attr_e('READ MORE','ecoshop'); ?></a>
                    </div>
                </div>
            </div>
        </article>
    <?php endforeach;
    wp_reset_postdata(); ?>
</div>
<?php } ?>