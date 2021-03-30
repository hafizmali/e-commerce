<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $favicon = ecoshop_option("favicon");
    if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="icon" href="<?php echo esc_url($favicon); ?>">
    <?php }
    wp_head(); ?>
</head>
<body <?php body_class(); ?> data-home-url="<?php echo esc_url(home_url('/')); ?>">
<?php $disable_site_loader = ecoshop_option('disable_site_loader');
if($disable_site_loader != 1){ ?>
<!-- LOADER -->
<div id="loader">
    <div class="position-center-center">
        <div class="ldr"></div>
    </div>
</div>
<?php } ?>
<!-- Wrap -->
<div id="wrap">
<?php if((function_exists('is_woocommerce') && is_woocommerce()) || is_home() || is_tag() || is_author() || is_date() || is_day() || is_year() || is_month() || is_time() || is_search() || is_404() || is_attachment()){
        $select_page_header_type = ecoshop_option('general_pages_menu');
    } else {
        $select_page_header_type = ecoshop_get_field('select_page_header_type');
    } if($select_page_header_type == 'header-plain-transparent'):
        get_template_part('includes/header','plain-transparent');
    elseif($select_page_header_type == 'header-hamburg'):
        get_template_part('includes/header','hamburg');
    elseif($select_page_header_type == 'header-top-bar'):
        get_template_part('includes/header','top-bar');
    elseif($select_page_header_type == 'header-full-width'):
        get_template_part('includes/header','fullwidth');
    else:
        get_template_part('includes/header','plain');
    endif;
    ?>
<!-- Content -->
<div id="content">
<?php if ( get_header_image() ) : ?>
    <div class="clear"></div>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
        </a>
    </div>
    <div class="clear"></div>
<?php endif;
 // Banners
get_template_part('includes/ecoshop','banners'); ?>