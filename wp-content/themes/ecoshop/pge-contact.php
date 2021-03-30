<?php
/*
  * Template Name: Contact Page
  */
get_header();
global $ecoshop_allowedtags;
while(have_posts()) : the_post();
    $form_heading = ecoshop_get_field('form_heading');
    $form_shortcode = ecoshop_get_field('form_shortcode');
    $address_heading = ecoshop_get_field('address_heading');
    $contact_address = ecoshop_get_field('contact_address');
    $contact_phone = ecoshop_get_field('contact_phone');
    $contact_email = ecoshop_get_field('contact_email');
    $contact_extra_info = ecoshop_get_field('contact_extra_info');
    $map_latitude = ecoshop_get_field('map_latitude');
    $map_longitude = ecoshop_get_field('map_longitude');
    $map_zoom_level = ecoshop_get_field('map_zoom_level');
    $map_title = ecoshop_get_field('map_title');
    $map_marker = ecoshop_get_field('map_marker');
    ?>
        <!--======= CONATACT  =========-->
        <section class="contact padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="contact-form">
                    <?php if(!empty($form_heading)){ ?>
                        <h5><?php echo esc_attr($form_heading); ?></h5>
                    <?php } ?>
                    <div class="row">
                        <?php if(!empty($form_shortcode)){ ?>
                            <div class="col-md-8">
                                <!--======= FORM  =========-->
                                <div id="contact_form" class="contact-form">
                                    <?php echo do_shortcode($form_shortcode); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <!--======= ADDRESS INFO  =========-->
                        <div class="col-md-4">
                            <div class="contact-info">
                                <?php if(!empty($address_heading)){ ?>
                                    <h6><?php echo esc_attr($address_heading); ?></h6>
                                <?php } ?>
                                <ul>
                                    <?php if(!empty($contact_address)){ ?>
                                        <li> <i class="icon-map-pin"></i> <?php echo wp_kses($contact_address,$ecoshop_allowedtags); ?> </li>
                                    <?php } if(!empty($contact_phone)){ ?>
                                        <li> <i class="icon-call-end"></i> <?php echo esc_attr($contact_phone); ?></li>
                                    <?php } if(!empty($contact_email)){ ?>
                                        <li> <i class="icon-envelope"></i> <a href="mailto:<?php echo esc_attr($contact_email); ?>" target="_top"><?php echo esc_attr($contact_email); ?></a> </li>
                                    <?php } if(!empty($contact_extra_info)){ ?>
                                        <li>
                                            <p><?php echo wp_kses($contact_extra_info,$ecoshop_allowedtags); ?></p>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======= MAP =========-->
        <?php if(!empty($map_latitude) && !empty($map_longitude)){ ?>
            <div id="map" data-map-lat="<?php echo esc_attr($map_latitude); ?>" data-map-lng="<?php echo esc_attr($map_longitude); ?>" data-map-marker="<?php echo esc_url($map_marker); ?>" data-map-zoom="<?php echo esc_attr($map_zoom_level); ?>" data-map-title="<?php echo esc_attr($map_title); ?>"></div>
        <?php }
endwhile;
get_footer(); ?>