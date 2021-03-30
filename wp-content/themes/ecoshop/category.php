<?php get_header();
$category_page_layout = ecoshop_get_field('category_page_layout');
$cat_class = 'blog-list padding-top-100 padding-bottom-100';
if($category_page_layout == 'style-1'){
    $cat_class = 'blog-list padding-top-100 padding-bottom-100';
} elseif($category_page_layout == 'style-2'){
    $cat_class = 'blog-list padding-top-100 padding-bottom-100';
} elseif($category_page_layout == 'style-3'){
    $cat_class = 'blog-list blog-list-3 padding-top-100 padding-bottom-100';
}
?>
        <!-- Blog List -->
        <section class="<?php echo esc_attr($cat_class); ?>">
            <div class="container">
                <?php if($category_page_layout == 'style-2'){
                    get_template_part('includes/post-categories/layout','two');
                } elseif($category_page_layout == 'style-3'){
                    get_template_part('includes/post-categories/layout','three');
                } else{
                    get_template_part('includes/post-categories/layout','one');
                }?>
            </div>
        </section>
<?php get_footer(); ?>