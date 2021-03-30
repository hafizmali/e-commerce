<?php get_header();
$hide_feature_image = ecoshop_option('hide_feature_image');
$hide_tags = ecoshop_option('hide_tags');
$hide_author = ecoshop_option('hide_author');
$hide_social_share = ecoshop_option('hide_social_share');
$hide_related_posts = ecoshop_option('hide_related_posts');
?>
    <!-- Blog List -->
    <section class="blog-list blog-list-3 single-post padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <?php while(have_posts()) : the_post(); ?>
                        <!-- Article -->
                        <article>
                            <?php if(has_post_thumbnail() && $hide_feature_image != 1){ ?>
                                <img class="img-responsive" src="<?php echo ecoshop_get_feature_image_url(get_the_ID()); ?>" alt="" >
                            <?php } ?>
                            <!-- Tittle -->
                            <div class="post-tittle left">
                                <a href="javascript:void(0);" class="tittle"><?php the_title(); ?></a>
                                <!-- Post Info -->
                                <span><i class="primary-color icon-user"></i> <?php esc_attr_e('by','ecoshop'); echo ' '.get_the_author(); ?></span>
                                <span><i class="primary-color icon-calendar"></i> <?php echo get_the_time('F d, Y'); ?></span>
                                <span><i class="primary-color icon-bubble"></i> <?php echo get_comments_number( '0', '1', '%' ); ?></span>
                                <span>
                                    <i class="primary-color ion-ios-photos"></i>
                                    <?php the_category( ', ' ); ?>
                                </span>
                            </div>
                            <!-- Post Content -->
                            <div class="text-left">
                                <?php the_content(); ?>
                                <div class="clear"></div>
                                <?php posts_nav_link(); ?>
                                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . esc_html__( 'Pages:', 'ecoshop' ), 'after' => '</div>' ) ); ?>
                                <div class="clearfix"></div>
                                <!-- Tags -->
                                <div class="row margin-top-50">
                                    <?php if($hide_tags != 1){
                                        $posttags = get_the_tags();
                                        if (is_array($posttags) && count($posttags) > 0) { ?>
                                            <div class="col-md-8">
                                                <h5 class="shop-tittle"><?php esc_attr_e('POST TAGS','ecoshop'); ?></h5>
                                                <ul class="shop-tags padding-left-15">
                                                    <?php $y = 0;
                                                    $len = count($posttags);
                                                    foreach($posttags as $tag) {
                                                        if ($y == $len - 1) {
                                                            echo '<li><a href="javascript:void(0);">';
                                                            echo esc_attr($tag->name);
                                                            echo '</a></li>';
                                                        } else {
                                                            echo '<li><a href="javascript:void(0);">';
                                                            echo esc_attr($tag->name);
                                                            echo '</a>, </li>';
                                                        }
                                                        $y++;
                                                    } ?>
                                                </ul>
                                            </div>
                                        <?php }
                                    } ?>
                                    <!-- Share With -->
                                    <div class="col-md-4">
                                        <?php if($hide_social_share != 1){ ?>
                                            <h5 class="shop-tittle"><?php esc_attr_e('Share with','ecoshop'); ?></h5>
                                            <ul class="share-post">
                                                <li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="icon-social-facebook"></i> <?php esc_attr_e('Facebook','ecoshop'); ?></a></li>
                                                <li><a target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&tw_p=tweetbutton&url=<?php the_permalink(); ?>&via=<?php bloginfo( 'name' ); ?>"><i class="icon-social-twitter"></i> <?php esc_attr_e('Twitter','ecoshop'); ?></a></li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php if($hide_author != 1){
                                    $blog_author_xx = ecoshop_get_user_field('blog_author_xx');
                                    $author_designation_xx = ecoshop_get_user_field('author_designation_xx');
                                    $author_description_xx = ecoshop_get_user_field('author_description_xx');
                                    $facebook_xx = ecoshop_get_user_field('facebook_xx');
                                    $twitter_xx = ecoshop_get_user_field('twitter_xx');
                                    $linkedin_xx = ecoshop_get_user_field('linkedin_xx');
                                    $pinterest_xx = ecoshop_get_user_field('pinterest_xx');
                                    $instagram_xx = ecoshop_get_user_field('instagram_xx');
                                    $email_xx = ecoshop_get_user_field('email_xx');
                                    if($blog_author_xx != '' && $author_designation_xx != '' && $author_description_xx != ''){ ?>
                                        <!-- ADMIN info -->
                                        <div class="admin-info">
                                            <div class="media-left">
                                                <div class="admin-pic">
                                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 127 ); ?>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6><?php echo esc_attr($blog_author_xx); ?> <span><?php echo esc_attr($author_designation_xx); ?></span></h6>
                                                <p><?php echo esc_attr($author_description_xx); ?></p>
                                                <div class="admin-social">
                                                    <?php if(!empty($facebook_xx)){ ?>
                                                        <a href="<?php echo esc_url($facebook_xx); ?>"><i class="icon-social-facebook"></i></a>
                                                    <?php } if(!empty($twitter_xx)){ ?>
                                                        <a href="<?php echo esc_url($twitter_xx); ?>"><i class="icon-social-twitter"></i></a>
                                                    <?php } if(!empty($linkedin_xx)){ ?>
                                                        <a href="<?php echo esc_url($linkedin_xx); ?>"><i class="fa fa-linkedin"></i></a>
                                                    <?php } if(!empty($pinterest_xx)){ ?>
                                                        <a href="<?php echo esc_url($pinterest_xx); ?>"><i class="fa fa-pinterest-p"></i></a>
                                                    <?php } if(!empty($instagram_xx)){ ?>
                                                        <a href="<?php echo esc_url($instagram_xx); ?>"><i class="fa fa-instagram"></i></a>
                                                    <?php } if(!empty($email_xx)){ ?>
                                                        <a href="mailto:<?php echo esc_attr($email_xx); ?>"><i class="icon-envelope"></i></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                                <!--=======  COMMENTS =========-->
                                <?php comments_template(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    <hr>
                    <?php if($hide_related_posts != 1){ ?>
                        <!--  You May Like -->
                        <?php get_template_part('includes/similar','posts');
                    } ?>
                </div>
                <!-- Sider Bar -->
                <div class="col-md-3">
                    <?php get_sidebar('blog'); ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>