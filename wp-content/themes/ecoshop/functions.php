<?php
/**
 * Theme Functions Page
 * @ Ecoshop Theme
 * @ Ecoshop Theme 1.0
 **/
// Load all scripts and stylesheets
function ecoshop_load_styles() {
    wp_enqueue_style( 'bootstrap' , get_template_directory_uri()."/css/bootstrap.min.css");
    wp_enqueue_style( 'font-awesome' , get_template_directory_uri()."/css/font-awesome.min.css");
    wp_enqueue_style( 'ionicons' , get_template_directory_uri()."/css/ionicons.min.css");
    wp_enqueue_style( 'ecoshop-main' , get_template_directory_uri()."/css/main.css");
	wp_enqueue_style( 'montserrat-fonts' , get_template_directory_uri()."/fonts/montserrat-fonts.css");
	wp_enqueue_style( 'ecoshop-animate' , get_template_directory_uri()."/css/animate.css");
    wp_enqueue_style( 'ecoshop-style' , get_template_directory_uri()."/css/ecoshop-style.css");
    wp_enqueue_style( 'ecoshop-responsive' , get_template_directory_uri()."/css/responsive.css");
    wp_enqueue_style( 'ecoshop-root-style' , get_template_directory_uri()."/style.css");
}
add_action('wp_enqueue_scripts', 'ecoshop_load_styles');
function ecoshop_load_scripts_footer() {
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '', false  );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true  );
    wp_enqueue_script('own-menu', get_template_directory_uri() . '/js/own-menu.js', array('jquery'), '', false  );
    wp_enqueue_script('jquery-lighter', get_template_directory_uri() . '/js/jquery.lighter.js', array('jquery'), '', true  );
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true  );
    wp_enqueue_script('msnry-pkgd', get_template_directory_uri() . '/js/msnry.pkgd.min.js', array('jquery'), '', true  );
    wp_enqueue_script('ecoshop-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true  );
    wp_enqueue_script('ecoshop-custom-scripts', get_template_directory_uri() . '/js/ecoshop-custom-scripts.js', array('jquery'), '', false  );
    if(is_page_template('pge-contact.php')){
        $map_api_key = ecoshop_option('map_api_key');
        if(!empty($map_api_key)){
            wp_enqueue_script('ecoshop-google-map', '//maps.googleapis.com/maps/api/js?key='.$map_api_key, array('jquery'), '', false  );
        } else {
            wp_enqueue_script('ecoshop-google-map', '//maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), '', false  );
        }
        wp_enqueue_script('ecoshop-map', get_template_directory_uri() . '/js/map.js', array('jquery'), '', true  );
    }
    // IE Scripts
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array('jquery'));
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js', array('jquery'));
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
}
// Load scripts in footer
add_action('wp_enqueue_scripts', 'ecoshop_load_scripts_footer');
// Google Fonts
if ( ! function_exists( 'ecoshop_fonts_url' ) ) :
    function ecoshop_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';
        if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'ecoshop' ) ) {
            $fonts[] = 'Montserrat:400,700';
        }
        if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'ecoshop' ) ) {
            $fonts[] = 'Playfair Display:400,700,900';
        }
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
endif;
function ecoshop_fonts_scripts() {
    wp_enqueue_style( 'ecoshop-fonts', ecoshop_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'ecoshop_fonts_scripts' );
// After Theme Setup
function ecoshop_theme_setup() {
    // Add custom backgroud support
    add_theme_support( 'custom-background' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Add editor style support
    add_editor_style();
    // Add editor style support
    add_editor_style('css/editor-style.css');
    // Title Tag
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'ecoshop_theme_setup' );
// Text Domain
load_theme_textdomain( 'ecoshop', get_template_directory() . '/languages' );
// Add custom background support
require get_template_directory() . '/lib/custom-header.php';
// Add Thumbnail Support
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}
// Content Width
if ( !isset( $content_width ) ) $content_width = 1000;
// Registering sidebars
function ecoshop_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__( 'Category / Post Sidebar','ecoshop' ),
        'id' => 'blog',
        'description' => esc_html__( 'Widgets in this area will be shown at blog post sidebar position.','ecoshop' ),
        'before_title' => '<h5 class="shop-tittle margin-bottom-30">',
        'after_title' => '</h5>',
        'after_widget' => '</div><div class="clearfix "></div>',
        'before_widget' => '<div id="%1$s" class="widget margin-bottom-60 %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Shop Sidebar','ecoshop' ),
        'id' => 'shop',
        'description' => esc_html__( 'Widgets in this area will be shown at shop sidebar position.','ecoshop' ),
        'before_title' => '<h5 class="shop-tittle margin-bottom-30">',
        'after_title' => '</h5>',
        'after_widget' => '</div><div class="clearfix "></div>',
        'before_widget' => '<div id="%1$s" class="widget margin-bottom-60 %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Footer Widget Area 1','ecoshop' ),
        'id' => 'f1',
        'description' => esc_html__( 'Widgets in this area will be shown at footer widget area 1 position.','ecoshop' ),
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        'after_widget' => '</div><div class="clearfix margin-bottom-20"></div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Footer Widget Area 2','ecoshop' ),
        'id' => 'f2',
        'description' => esc_html__( 'Widgets in this area will be shown at footer widget area 2 position.','ecoshop' ),
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        'after_widget' => '</div><div class="clearfix margin-bottom-20"></div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Footer Widget Area 3','ecoshop' ),
        'id' => 'f3',
        'description' => esc_html__( 'Widgets in this area will be shown at footer widget area 3 position.','ecoshop' ),
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        'after_widget' => '</div><div class="clearfix margin-bottom-20"></div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">'
    ));
    register_sidebar(array(
        'name' => esc_html__( 'Footer Widget Area 4','ecoshop' ),
        'id' => 'f4',
        'description' => esc_html__( 'Widgets in this area will be shown at footer widget area 4 position.','ecoshop' ),
        'before_title' => '<h6>',
        'after_title' => '</h6>',
        'after_widget' => '</div><div class="clearfix margin-bottom-20"></div>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">'
    ));
}
add_action( 'widgets_init', 'ecoshop_widgets_init' );
// Registering Menus
function ecoshop_register_menu() {
    $locations = array(
        'primary-menu' => esc_html__( 'Primary Menu', 'ecoshop' ),
        'hamburg-menu' => esc_html__( 'Hamburg Menu', 'ecoshop' )
    );
    register_nav_menus( $locations );
}
add_action( 'init', 'ecoshop_register_menu' );
// Changing excerpt 'more' text
function ecoshop_new_excerpt_more($more) {
    global $post;
}
add_filter('excerpt_more', 'ecoshop_new_excerpt_more');
// Ecoshop multiple excerpt
function ecoshop_excerpt($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if(strlen($excerpt)>$charlength) {
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0) {
            echo do_shortcode(substr($subex,0,$excut));
        } else {
            echo do_shortcode($subex);
        }
        echo "..";
    } else {
        echo do_shortcode($excerpt);
    }
}
function ecoshop_shortcode_excerpt($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;
    if(strlen($excerpt)>$charlength) {
        $subex = substr($excerpt,0,$charlength-5);
        $exwords = explode(" ",$subex);
        $excut = -(strlen($exwords[count($exwords)-1]));
        if($excut<0) {
            return do_shortcode(substr($subex,0,$excut));
        } else {
            return do_shortcode($subex);
        }
    } else {
        return do_shortcode($excerpt);
    }
}
// Controlling excerpt length
function ecoshop_custom_excerpt_length( $length ) {
    return 150;
}
add_filter( 'excerpt_length', 'ecoshop_custom_excerpt_length', 999 );
// Get Feature Image URL By Post ID
function ecoshop_get_feature_image_url($post_id){
    $image_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
    return $image_url;
}
//Pagination
function ecoshop_pagination($pages = '', $range = 2){
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages){
        echo "<ul class='pagination in-center'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'><i class='fa fa-angle-left'></i></a></li>";
        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&laquo;</a></li>";
        for ($i=1; $i <= $pages; $i++){
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                echo ($paged == $i)? "<li class='active'><a>".sprintf('%02d', $i)."</a></li>":"<li class='inactive'><a href='".get_pagenum_link($i)."' >".sprintf('%02d', $i)."</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&raquo;</a></li>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'><i class='fa fa-angle-right'></i></a></li>";
        echo "</ul>\n";
    }
}
// Set avatar Class
add_filter('get_avatar','ecoshop_add_span_cat_count');
function ecoshop_add_span_cat_count($class) {
    $class = str_replace("class='avatar", "class='media-object img-responsive", $class);
    return $class;
}
// Registering custom Comments
function ecoshop_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = '';
        $add_below = 'div-comment';
    } ?>
    <li class="media">
    	<?php if(get_avatar( $comment, 70 )){ ?>
            <div class="media-left">
                <a href="javascript:void(0);" class="avatar">
                    <?php echo get_avatar( $comment, 70 ); ?> <br>
                </a>
            </div>
        <?php } ?>
        <div class="media-body">
            <h6 class="media-heading"><?php comment_author(); ?>
                <span>
                    <i class="icon-clock primary-color"></i>
                    <?php printf( esc_html__('%1$s at %2$s','ecoshop'), get_comment_date(),  get_comment_time()); ?>
                </span>
            </h6>
            <p><?php comment_text(); ?></p>
            <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
            <input type="hidden" class="cID" value="<?php echo get_comment_ID(); ?>" />
        </div>
    </li>
<?php
}
function ecoshop_woocommerce_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = '';
        $add_below = 'div-comment';
    } ?>
    <div class="media">
        <div class="media-left">
            <!--  Image -->
            <div class="avatar max-w-none">
                <a href="javascript:void(0);">
                    <?php echo get_avatar( $comment, 50 ); ?>
                </a>
            </div>
        </div>
        <!--  Details -->
        <div class="media-body">
            <p class="font-playfair"><?php comment_text(); ?></p>
            <h6><?php comment_author(); ?>
                <span class="pull-right">
                    <?php printf( esc_html__('%1$s at %2$s','ecoshop'), get_comment_date(),  get_comment_time()); ?>
                </span>
            </h6>
        </div>
    </div>
<?php
}
// Setting Post Views Count
function ecoshop_getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, 0);
        return "0";
    }
    return $count;
}
function ecoshop_setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Theme Widgets
require_once(get_template_directory() . "/lib/widgets.php");
// Get Post/Pages Meta Fields
function ecoshop_get_field( $name ){
    if(function_exists('get_field')){
        if(is_category()){
            $queried_object = get_queried_object();
            return get_field($name,$queried_object);
        } else {
            return get_field($name);
        }
    } else{
        return '';
    }
}
function ecoshop_get_field_by_id( $name, $post_id ){
    if(function_exists('get_field')){
        return get_field($name,$post_id);
    } else{
        return '';
    }
}
// Get User Meta Fields
function ecoshop_get_user_field( $name ){
    if(function_exists('get_the_author_meta')){
        return get_the_author_meta($name);
    } else{
        return '';
    }
}
// Ecoshop Styles
include_once(get_template_directory() . '/ecoshop-styles-scripts.php');
// Google Web Fonts For Theme Options
function ecoshop_theme_options_fonts_url() {
    $heading_font = ecoshop_option("headings_font_face");
    if(empty($heading_font)){
        $heading_font = 'Dancing Script';
    }
    $heading_weight = ecoshop_option("headings_font_weight");
    if(empty($heading_weight)){
        $heading_weight = 400;
    }
    $meta_font = ecoshop_option("meta_font_face");
    if(empty($meta_font)){
        $meta_font = 'Roboto';
    }
    $meta_weight = ecoshop_option("meta_font_weight");
    if(empty($meta_weight)){
        $meta_weight = 700;
    }
    $body_font = ecoshop_option("body_font_face");
    if(empty($body_font)){
        $body_font = 'Oswald';
    }
    $body_weight = ecoshop_option("body_font_weight");
    if(empty($body_weight)){
        $body_weight = 700;
    }

    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'ecoshop' ) ) {
        $font_url = add_query_arg( 'family', urlencode( $heading_font.'|'.$meta_font.'|'.$body_font.':'.$heading_weight.','.$meta_weight.','.$body_weight ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
// Enqueue Fonts For Theme Options
function ecoshop_theme_options_scripts() {
    wp_enqueue_style( 'ecoshop-theme-options-fonts', ecoshop_theme_options_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'ecoshop_theme_options_scripts' );
//Plugin Activation Class
require_once(get_template_directory() .'/lib/plugin-activation.php');
add_action( 'tgmpa_register', 'ecoshop_register_required_plugins' );
function ecoshop_register_required_plugins() {
    $plugins = array(
        // Ecoshop Visual Composer
        array(
            'name'               => esc_html__('Visual Composer','ecoshop'),
            'slug'               => 'js_composer',
            'source'             => get_template_directory_uri() . '/lib/plugins/js_composer.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Ecoshop Shortcodes
        array(
            'name'               => esc_html__('Theme Shortcodes','ecoshop'),
            'slug'               => 'ecoshop-shortcodes',
            'source'             => get_template_directory_uri() . '/lib/plugins/ecoshop-shortcodes.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Ecoshop CPT's
        array(
            'name'               => esc_html__('Custom Post Types','ecoshop'),
            'slug'               => 'ecoshop-cpt',
            'source'             => get_template_directory_uri() . '/lib/plugins/ecoshop-cpt.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Ecoshop Framework
        array(
            'name'               => esc_html__('Ecoshop Framework','ecoshop'),
            'slug'               => 'ecoshop-framework',
            'source'             => get_template_directory_uri() . '/lib/plugins/ecoshop-framework.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Ecoshop Tweets
        array(
            'name'               => esc_html__('Ecoshop Tweets','ecoshop'),
            'slug'               => 'ecoshop-tweets',
            'source'             => get_template_directory_uri() . '/lib/plugins/ecoshop-tweets.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Ecoshop Revolution Slider
        array(
            'name'               => esc_html__('Revolution Slider','ecoshop'),
            'slug'               => 'revslider',
            'source'             => get_template_directory_uri() . '/lib/plugins/revslider.zip',
            'required'           => true,
            'version'            => '',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
            'is_callable'        => '',
        ),
        // Advanced Custom Fields
        array(
            'name'      => esc_html__('Advanced Custom Fields','ecoshop'),
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
        // WooCommerce
        array(
            'name'      => esc_html__('WooCommerce','ecoshop'),
            'slug'      => 'woocommerce',
            'required'  => true,
        ),
        //  Contact Form 7
        array(
            'name'      => esc_html__('Contact Form 7','ecoshop'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        //  Mailpoet Newsletter
        array(
            'name'      => esc_html__('MailPoet Newsletters','ecoshop'),
            'slug'      => 'wysija-newsletters',
            'required'  => false,
        ),
        //  Wishlist
        array(
            'name'      => esc_html__('WooCommerce Wishlist','ecoshop'),
            'slug'      => 'yith-woocommerce-wishlist',
            'required'  => true,
        ),

    );
    $config = array(
        'id'           => 'ecoshop',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

    );
    tgmpa( $plugins, $config );
}
// Check For Plugin Using Plugin Name
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// Advanced Custom Fields
if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
    function ecoshop_register_fields(){
        include_once(get_template_directory() . '/lib/advanced-custom-fields/add-ons/acf-gallery/gallery.php');
        include_once(get_template_directory() . '/lib/advanced-custom-fields/add-ons/acf-repeater/repeater.php');
    }
    add_action('acf/register_fields', 'ecoshop_register_fields');
    define( 'ACF_LITE', true );
    include_once(get_template_directory() . '/lib/advanced-custom-fields/custom-fields.php');
}
// Visual Composer Functions
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    require_once( get_template_directory() . '/lib/visual-composer.php' );
    function ecoshop_vc_styles() {
        wp_register_style( 'ecoshop_vc_icons', get_template_directory_uri() . '/lib/vc_icons/ecoshop_vc_icons.css', false, '1.0.0' );
        wp_enqueue_style( 'ecoshop_vc_icons' );
    }
    add_action( 'admin_enqueue_scripts', 'ecoshop_vc_styles' );
}
// Options Framework
if ( is_plugin_active( 'ecoshop-framework/vafpress.php' ) ) {
    $tmpl_opt  = get_template_directory() . '/admin/option.php';
    // Create instance of Options
    $theme_options = new VP_Option(array(
        'is_dev_mode'           => false,
        'option_key'            => 'vpt_option',
        'page_slug'             => 'vpt_option',
        'template'              => $tmpl_opt,
        'menu_page'             => 'themes.php',
        'use_auto_group_naming' => true,
        'use_util_menu'         => true,
        'minimum_role'          => 'edit_theme_options',
        'layout'                => 'fixed',
        'page_title'            => esc_html__( 'Theme Options', 'ecoshop' ),
        'menu_label'            => esc_html__( 'Theme Options', 'ecoshop' ),
    ));
}
//Option Hook
function ecoshop_option( $name ){
    if(function_exists('vp_option')){
        return vp_option( "vpt_option." . $name );
    } else{
        return '';
    }
}
// Add Span To Categories Count
add_filter('wp_list_categories', 'ecoshop2_add_span_cat_count');
function ecoshop2_add_span_cat_count($links) {
    $links = str_replace('</a> (', '</a> <span>(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
// Return Children Menu Items
function ecoshop_return_children_menu_items($parent_id){
    // Get Nav Slug
    $menu_name = 'primary-menu';
    $locations = get_nav_menu_locations();
    $menu_id = $locations[ $menu_name ] ;
    $nav_object = wp_get_nav_menu_object($menu_id);
    // End Get Nav Slug
    $all_nav_items = wp_get_nav_menu_items ($nav_object->slug);
    $children = array();
    foreach($all_nav_items as $row){
        if($row->menu_item_parent == $parent_id){
            $children[] = $row;
        }
    }
    return $children;
}
// Check If Menu Item Has Children Items
function ecoshop_check_if_menu_item_has_children_items($parent_id){
    $children = get_posts(
        array(
            'post_type' => 'nav_menu_item',
            'nopaging' => true,
            'numberposts' => 1,
            'meta_key' => '_menu_item_menu_item_parent',
            'meta_value' => $parent_id
        )
    );
    return $children;
}
function ecoshop_check_if_mega_menu_item_is_active($object_id,$top_id,$url){
    $home_url = get_home_url().'/';
    if($object_id == $top_id && $top_id != 1){
        echo 'id="active-item"';
    } elseif($url == $home_url && $top_id == 1 && !is_single()) {
        echo 'id="active-item"';
    }
}
// Ecoshop Get Post Thumbnail
function ecoshop_get_the_post_thumbnail($id,$width,$height){
    return get_the_post_thumbnail( $id, array( $width, $height) );
}
/* WooCommerce Integration */
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
    // Add Theme Support
    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    // Adding Hooks & Functions
    require_once(get_template_directory() . "/includes/woocommerce/woocommerce.php");
}
// Removing Woocommerce Class
add_filter( 'body_class', 'ecoshop_woo_body_class' );
function ecoshop_woo_body_class( $classes ) {
    if(function_exists('is_product') && is_product()){
        foreach ( $classes as $key => $value ) {
            if ( $value == 'woocommerce' ) unset( $classes[ $key ] );
        }
        return $classes;
    } else {
        return $classes;
    }
}
// Ecoshop Allowed Tags
$ecoshop_allowedtags = array(
    'a' => array(
        'href' => array (),
        'title' => array ()),
    'abbr' => array(
        'title' => array ()),
    'acronym' => array(
        'title' => array ()),
    'b' => array(),
    'blockquote' => array(
        'cite' => array ()),
    'cite' => array (),
    'del' => array(
        'datetime' => array ()),
    'em' => array (), 'i' => array (),
    'q' => array(
        'cite' => array ()),
    'strike' => array(),
    'strong' => array(),
    'h1' => array(),
    'h2' => array(),
    'h3' => array(),
    'h4' => array(),
    'h5' => array(),
    'h6' => array(),
    'p' => array(),
    'ul' => array(),
    'ol' => array(),
    'li' => array(),
    'span' => array(),
    'br' => array(),
    'iframe' => array(
        'src' => array (),
        'height' => array (),
        'width' => array (),
        'frameborder' => array (),
        'style' => array (),
        'allowfullscreen' => array (),
    ),
);
// Add Custom Classes
add_filter('body_class', 'ecoshop_add_body_classes');
function ecoshop_add_body_classes($classes) {
    $page_classes = ecoshop_get_field('page_classes');
    if(!empty($page_classes)){
        $classes[] = $page_classes;
    }
    return $classes;
}
// Remove Wishlist Plugin Page
function ecoshop_remove_wishlist(){
    remove_menu_page( 'yit_plugin_panel' );
}
add_action( 'admin_menu', 'ecoshop_remove_wishlist' );
// Mini Cart
function ecoshop_mini_cart() {
    $out = ''; ?>
    <div class="overflow">
    <?php global $woocommerce;
    if ( function_exists('WC') && ! WC()->cart->is_empty() ) : ?>
        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                $out .= '<li>';
                $out .= '<div class="media-left">';
                $out .= '<div class="cart-img">';
                $out .= '<a href="'.$_product->get_permalink( $cart_item ).'">';
                $out .= $thumbnail;
                $out .= '</a>';
                $out .= '</div>';
                $out .= '</div>';
                $out .= '<div class="media-body">';
                $out .= '<h6 class="media-heading">'.$product_name.'</h6>';
                $out .= $product_price;
                $out .= '<span class="qty">'.esc_html__('QTY','ecoshop').':';
                $out .= $cart_item['quantity'];
                $out .='</span>';
                $out .= '</div>';
                $out .= '</li>';
            }
        }
        $out .= '</div>';
        if ( ! WC()->cart->is_empty() ) :
            $out .= '<li>';
            $out .= '<h5 class="text-center">'.esc_html__('SUBTOTAL','ecoshop').':' .WC()->cart->get_cart_subtotal().'</h5>';
            $out .= '</li>';
            $out .= '<li class="margin-0">';
            $out .= '<div class="row">';
            $out .= '<div class="col-xs-6">';
            global $woocommerce;
            $cart_url = wc_get_cart_url();
            $out .= '<a href="'.esc_url($cart_url).'" class="btn">'.esc_html__('VIEW CART','ecoshop').'</a>';
            $out .= '</div>';
            $out .= '<div class="col-xs-6 ">';
            $check_out_url = wc_get_checkout_url();
            $out .= '<a href="'.esc_url($check_out_url).'" class="btn">'.esc_html__('CHECK OUT','ecoshop').'</a>';
            $out .= '</div>';
            $out .= '</div>';
            $out .= '</li>';
        endif;
    else :
        if(function_exists('wc_get_page_id')){
            $shop_id = wc_get_page_id( 'shop' );
        } else {
            $shop_id = '';
        } $shop_page_url = get_permalink( $shop_id );
        $out .= '<li class="margin-0">';
        $out .= '<div class="row">';
        $out .= '<div class="col-xs-12">';
        $out .= '<a href="'.esc_url($shop_page_url).'" class="btn">'.esc_html__('VISIT SHOP','ecoshop').'</a>';
        $out .= '</div>';
        $out .= '</div>';
        $out .= '</li>';
    endif;
    echo ''.$out;
    // Always die in functions echoing ajax content
    die();
}
add_action( 'wp_ajax_ecoshop_mini_cart', 'ecoshop_mini_cart' );
// If you wanted to also use the function for non-logged in users
add_action( 'wp_ajax_nopriv_ecoshop_mini_cart', 'ecoshop_mini_cart' );
// Modify Menu Classes
class Ecoshop_Plain_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 2, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }
}
// Ecoshop Breadcrumb
require_once(get_template_directory() . "/includes/ecoshop-breadcrumb.php");