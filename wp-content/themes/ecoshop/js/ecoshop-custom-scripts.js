jQuery(document).ready(function(){
    "use strict"
    // Search Widget
    jQuery('.searchform,.woocommerce-product-search').each(function(){
        jQuery(this).addClass('searchform search-f');
        jQuery(this).find('#s').addClass('form-control');
        jQuery(this).find('#woocommerce-product-search-field').addClass('form-control');
        jQuery(this).find('#woocommerce-product-search-field').attr('type','text');
        jQuery(this).find('#searchsubmit').after('<button type="submit"><i class="fa fa-search"></i></button>');
        jQuery(this).find('#woocommerce-product-search-field').next().after('<button type="submit"><i class="fa fa-search"></i></button>');
        jQuery(this).find('#searchsubmit').hide();
        jQuery(this).find('#searchsubmit').remove();
    });
	// Change submit HTML
    jQuery("p.form-submit").each(function () {
    	jQuery(this).replaceWith("<li class='col-sm-12'>" + jQuery(this).html() + "</li>");
    });
   	// Add class to the children comments
    jQuery(".comments ul.children").each(function () {
    	jQuery(this).addClass('padding-left-100');
    });         
    // Adding Reply Class
    jQuery( ".logged-in-as" ).addClass( "col-sm-12" );
    jQuery( ".comment-reply-link" ).addClass( "raply" );
    jQuery( '.raply' ).html( '<i class="icon-bubble primary-color"></i> Reply' );       
    // Categories Widget
    jQuery('.widget_categories,.widget_archive,.widget_product_categories').each(function(){
        jQuery(this).find('ul').addClass('shop-cate');
    });
    jQuery('.papu-post .media-left img').each(function(){
        jQuery(this).addClass('media-object');
    });
    jQuery('#review_form .form-submit').each(function(){
        jQuery(this).addClass('col-sm-6 pull-right');
    });
    jQuery('.single_add_to_cart_button').each(function(){
        jQuery(this).addClass('btn');
    });
    jQuery('.form-row.form-row-wide.create-account').each(function(){
        jQuery(this).addClass('checkbox');
    });
    jQuery('header .user-basket .cart-img img').each(function(){
        jQuery(this).addClass('media-object img-responsive');
    });
    jQuery('.yith-wcwl-add-button').each(function(){
        jQuery(this).append('<i class="icon-heart"></i>');
    });
    jQuery('ul.nav .menu-item-has-children').each(function(){
        jQuery(this).addClass('dropdown');
    });
    jQuery('ul.cd-primary-nav .menu-item-has-children').each(function(){
        jQuery(this).addClass('drop-menu');
    });
    jQuery('ul.nav .menu-item-has-children > a').each(function(){
        jQuery(this).addClass('dropdown-toggle');
        jQuery(this).attr('data-toggle','dropdown');
    });
    jQuery('ul.cd-primary-nav .menu-item-has-children > a').each(function(){
        jQuery(this).addClass('title collapsed');
        jQuery(this).attr('data-toggle','collapse');
        jQuery(this).attr('data-target','#down-1');
    });
    jQuery("ul.cd-primary-nav .sub-menu").each(function () {
        jQuery(this).replaceWith("<div class='collapse' id='down-1'><div class='well'><ul>" + jQuery(this).html() + "</ul></div></div>");
    });
    // Comments Reply
    jQuery(".comment-reply-link").on('click',function(e) {
        e.preventDefault();
        jQuery('html,body').animate({
                scrollTop: jQuery("#postYourComments").offset().top
            },
            'slow');
        var cID = jQuery(this).next().val();
        jQuery('#comment_parent').val(cID);
    });
    jQuery(".comment-reply-link").each(function(){
        jQuery(this).removeAttr('onclick');
    });
    // Mini Cart
    jQuery(document).on('click','.add_to_cart_button',function(){
        setTimeout(ecoshop_mini_cart, 3000);
    });
    function ecoshop_mini_cart(){
        var home_url = jQuery('body').attr('data-home-url');
        var ajaxurl = home_url+'/wp-admin/admin-ajax.php';
        // This does the ajax request
        jQuery.ajax({
            url: ajaxurl,
            data: {
                'action':'ecoshop_mini_cart'
            },
            success:function(data) {
                // This outputs the result of the ajax request
                jQuery('.append-here').text('');
                jQuery('.append-here').html(data);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
    }
});