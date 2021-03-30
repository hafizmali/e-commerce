<?php
$theme_url = get_template_directory_uri();
return array(
	'title' => __('Ecoshop Theme', 'ecoshop'),
	'logo' => $theme_url. '/admin/logo.png',
	'menus' => array(
		array(
			'title' => __('General Settings', 'ecoshop'),
			'name' => 'menu_1',
			'icon' => 'font-awesome:fa-magic',
			'menus' => array(
				array(
					'title' => __('Header', 'ecoshop'),
					'name' => 'header',
					'icon' => 'font-awesome:fa-th-large',
					'controls' => array(
                        //Logo Image Section
                        array(
                            'type' => 'section',
                            'title' => __('Logo Image', 'ecoshop'),
                            'name' => 'image_logo_section',
                            'description' => __('Upload or select logo for header.', 'ecoshop'),
                            'fields' => array(
                                // Primary Logo
                                array(
                                    'type' => 'upload',
                                    'name' => 'primary_logo',
                                    'label' => __('Primary Logo', 'ecoshop'),
                                    'description' => __('Upload or choose custom logo', 'ecoshop'),
                                ),
                                // Transparent Header Logo
                                array(
                                    'type' => 'upload',
                                    'name' => 'transparent_header_logo',
                                    'label' => __('Transparent Header Logo', 'ecoshop'),
                                    'description' => __('Upload or choose custom logo', 'ecoshop'),
                                ),
                                // Hamburg Header Logo
                                array(
                                    'type' => 'upload',
                                    'name' => 'hamburg_header_logo',
                                    'label' => __('Hamburg Header Logo', 'ecoshop'),
                                    'description' => __('Upload or choose custom logo', 'ecoshop'),
                                ),
                                // Hamburg Menu BG
                                array(
                                    'type' => 'upload',
                                    'name' => 'hamburg_menu_bg',
                                    'label' => __('Hamburg Menu Background Image', 'ecoshop'),
                                    'description' => __('Upload or choose custom image, recommended size 1920*1100.', 'ecoshop'),
                                ),
                            ),
                        ),
                        // Favicon Section
						array(
							'type' => 'section',
							'title' => __('Favicon', 'ecoshop'),
							'name' => 'favicon_section',
							'description' => __('Image favicon', 'ecoshop'),
							'fields' => array(
                                // Favicon
                                array(
                                    'type' => 'upload',
                                    'name' => 'favicon',
                                    'label' => __('Favicon', 'ecoshop'),
                                    'description' => __('Upload 16x16 pixels favicon.', 'ecoshop'),
                                    'default' => '',
                                ),
                            ),
                        ),
                        // Other Details Section
                        array(
                            'type' => 'section',
                            'title' => __('Other Details', 'ecoshop'),
                            'name' => 'other_section',
                            'description' => __('Other Details', 'ecoshop'),
                            'fields' => array(
                                // General Pages Menu
                                array(
                                    'type' => 'select',
                                    'name' => 'general_pages_menu',
                                    'label' => __('General Pages Menu', 'ecoshop'),
                                    'items' => array(
                                        array(
                                            'value' => 'header-plain',
                                            'label' => __('Header Plain', 'ecoshop'),
                                        ),
                                        array(
                                            'value' => 'header-plain-transparent',
                                            'label' => __('Header Plain (Transparent)', 'ecoshop'),
                                        ),
                                        array(
                                            'value' => 'header-hamburg',
                                            'label' => __('Header Hamburg', 'ecoshop'),
                                        ),
                                        array(
                                            'value' => 'header-top-bar',
                                            'label' => __('Header Top Bar', 'ecoshop'),
                                        ),
                                        array(
                                            'value' => 'header-full-width',
                                            'label' => __('Header Full Width', 'ecoshop'),
                                        ),
                                    )
                                ),
                                // General Pages Banner
                                array(
                                    'type' => 'select',
                                    'name' => 'general_pages_banner',
                                    'label' => __('General Pages Banner', 'ecoshop'),
                                    'items' => array(
                                        array(
                                            'value' => 'hide',
                                            'label' => __('Hide', 'ecoshop'),
                                        ),
                                        array(
                                            'value' => 'parallax-breadcrumb',
                                            'label' => __('Parallax Breadcrumb', 'ecoshop'),
                                        ),
                                        array(
                                            'value' => 'parallax-feature-product',
                                            'label' => __('Parallax Feature Product', 'ecoshop'),
                                        ),
                                        array(
                                            'value' => 'slider-revolution',
                                            'label' => __('Slider Revolution', 'ecoshop'),
                                        )
                                    )
                                ),
                                array(
                                    'type' => 'notebox',
                                    'name' => 'bannerFields',
                                    'label' => __('BANNER FIELDS', 'ecoshop'),
                                    'description' => esc_html__('You can populate below banner fields for each individual banner options, select banner type from top and fill below required fields.', 'ecoshop'),
                                    'status' => 'normal',
                                ),
                                // Slider Revolution
                                array(
                                    'type' => 'textbox',
                                    'name' => 'slider_revolution_alias',
                                    'label' => __('Slider Revolution Alias', 'ecoshop'),
                                ),
                                // Parallax Breadcrumb Fields
                                array(
                                    'type' => 'textbox',
                                    'name' => 'main_heading_bread',
                                    'label' => __('Main Heading (Parallax Breadcrumb)', 'ecoshop'),
                                ),
                                array(
                                    'type' => 'textarea',
                                    'name' => 'small_description_bread',
                                    'label' => __('Small Description (Parallax Breadcrumb)', 'ecoshop'),
                                ),
                                array(
                                    'type' => 'upload',
                                    'name' => 'background_image_bread',
                                    'label' => __('Background Image (Parallax Breadcrumb)', 'ecoshop'),
                                    'description' => __('Upload background image.', 'ecoshop'),
                                ),
                                // Parallax Feature Product
                                array(
                                    'type' => 'textbox',
                                    'name' => 'currency_symbol_feature',
                                    'label' => __('Currency Symbol (Feature Product)', 'ecoshop'),
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'price_feature',
                                    'label' => __('Price (Feature Product)', 'ecoshop'),
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'main_heading_feature',
                                    'label' => __('Main Heading (Feature Product)', 'ecoshop'),
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'feature_heading_feature',
                                    'label' => __('Feature Heading (Feature Product)', 'ecoshop'),
                                ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'shop_link_feature',
                                    'label' => __('Shop Link (Feature Product)', 'ecoshop'),
                                ),
                                array(
                                    'type' => 'upload',
                                    'name' => 'background_image_feature',
                                    'label' => __('Background Image (Feature Product)', 'ecoshop'),
                                    'description' => __('Upload background image.', 'ecoshop'),
                                ),
                                // Disable Site Loader
                                array(
                                    'type' => 'toggle',
                                    'name' => 'disable_site_loader',
                                    'label' => __('Disable Site Loader', 'ecoshop'),
                                    'description' => __('You can disable site loader.', 'ecoshop'),
                                    'default' => '0',
                                ),
                                // Top Bar Email
                                array(
                                    'type' => 'textbox',
                                    'name' => 'top_bar_email',
                                    'label' => __('Top Bar Email', 'ecoshop'),
                                    'description' => __('Enter email address for top bar header.', 'ecoshop')
                                ),
                                // Hide Top Bar
                                array(
                                    'type' => 'toggle',
                                    'name' => 'hide_top_bar',
                                    'label' => __('Hide Top Bar', 'ecoshop'),
                                    'description' => __('You can hide top bar.', 'ecoshop'),
                                    'default' => '0',
                                ),
                                // Hide Cart Icon
                                array(
                                    'type' => 'toggle',
                                    'name' => 'hide_cart_icon',
                                    'label' => __('Hide Cart Icon', 'ecoshop'),
                                    'description' => __('You can hide cart icon.', 'ecoshop'),
                                    'default' => '0',
                                ),
                                // Hide Search Icon
                                array(
                                    'type' => 'toggle',
                                    'name' => 'hide_search_icon',
                                    'label' => __('Hide Search Icon', 'ecoshop'),
                                    'description' => __('You can hide search icon.', 'ecoshop'),
                                    'default' => '0',
                                ),
                                // Hide Account Icon
                                array(
                                    'type' => 'toggle',
                                    'name' => 'hide_account_icon',
                                    'label' => __('Hide Account Icon', 'ecoshop'),
                                    'description' => __('You can hide account icon.', 'ecoshop'),
                                    'default' => '0',
                                ),
                                // Google Map API Key
                                array(
                                    'type' => 'textbox',
                                    'name' => 'map_api_key',
                                    'label' => __('Google Map API Key', 'ecoshop'),
                                    'description' => __('Enter google map api key here.', 'ecoshop')
                                ),
                                // Custom CSS
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'custom_css',
                                    'label' => __('Custom CSS', 'ecoshop'),
                                    'description' => __('Write your custom css here.', 'ecoshop'),
                                    'theme' => 'github',
                                    'mode' => 'css',
                                ),
                                // Custom JS
                                array(
                                    'type' => 'codeeditor',
                                    'name' => 'custom_js',
                                    'label' => __('Custom JS', 'ecoshop'),
                                    'description' => __('Write your custom js here.', 'ecoshop'),
                                    'theme' => 'twilight',
                                    'mode' => 'javascript',
                                ),
                                // Footer Copyright
                                array(
                                    'type' => 'textbox',
                                    'name' => 'footer_copyright',
                                    'label' => __('Copyright Text', 'ecoshop'),
                                    'description' => __('Only alphabets and numbers allowed here.', 'ecoshop'),
                                    'default' => __('&copy; 2017 ecoshop All right reserved..', 'ecoshop')
                                ),
							),
						),
					),
				),
			),
		),
        // Styling Options
		array(
			'title' => __('Styling Options', 'ecoshop'),
			'name' => 'styling_options',
			'icon' => 'font-awesome:fa-gift',
			'controls' => array(
                // Heading Section
				array(
					'type' => 'section',
					'title' => __('Headings', 'ecoshop'),
                    'fields' => array(
                        // Heading H1
                        array(
                            'type' => 'color',
                            'name' => 'heading_h1',
                            'label' => __('Heading H1', 'ecoshop'),
                            'description' => __('Color Picker, you can set heading color.', 'ecoshop'),
                        ),
                        // Heading H2
                        array(
                            'type' => 'color',
                            'name' => 'heading_h2',
                            'label' => __('Heading H2', 'ecoshop'),
                            'description' => __('Color Picker, you can set heading color.', 'ecoshop'),
                        ),
                        // Heading H3
                        array(
                            'type' => 'color',
                            'name' => 'heading_h3',
                            'label' => __('Heading H3', 'ecoshop'),
                            'description' => __('Color Picker, you can set heading color.', 'ecoshop'),
                        ),
                        // Heading H4
                        array(
                            'type' => 'color',
                            'name' => 'heading_h4',
                            'label' => __('Heading H4', 'ecoshop'),
                            'description' => __('Color Picker, you can set heading color.', 'ecoshop'),
                        ),
                        // Heading H5
                        array(
                            'type' => 'color',
                            'name' => 'heading_h5',
                            'label' => __('Heading H5', 'ecoshop'),
                            'description' => __('Color Picker, you can set heading color.', 'ecoshop'),
                        ),
                        // Heading H6
                        array(
                            'type' => 'color',
                            'name' => 'heading_h6',
                            'label' => __('Heading H6', 'ecoshop'),
                            'description' => __('Color Picker, you can set heading color.', 'ecoshop'),
                        ),
                    ),
                ),
                // Header Section
                array(
                    'type' => 'section',
                    'title' => __('Header', 'ecoshop'),
                    'fields' => array(
                        // Menu Normal Color
                        array(
                            'type' => 'color',
                            'name' => 'menu_normal',
                            'label' => __('Menu Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set menu color.', 'ecoshop'),
                        ),
                        // Menu Active & Hover Color
                        array(
                            'type' => 'color',
                            'name' => 'menu_active',
                            'label' => __('Menu Active/Hover Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set menu active/hover color.', 'ecoshop'),
                        ),
                        // Header BG Color
                        array(
                            'type' => 'color',
                            'name' => 'header_bg',
                            'label' => __('Menu Header Background Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set background color.', 'ecoshop'),
                        ),
                        // Sub Menu BG Color
                        array(
                            'type' => 'color',
                            'name' => 'sub_menu_bg',
                            'label' => __('Sub Menu Background Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set background color.', 'ecoshop'),
                        ),
                    ),
                ),
                // Body Section
                array(
                    'type' => 'section',
                    'title' => __('Body', 'ecoshop'),
                    'fields' => array(
                        // Body Color
                        array(
                            'type' => 'color',
                            'name' => 'body_color',
                            'label' => __('Body Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set body color, general p tag.', 'ecoshop'),
                        ),
                        // General Color
                        array(
                            'type' => 'color',
                            'name' => 'general_color',
                            'label' => __('General Color', 'ecoshop'),
                            'description' => __('Color Picker, you can change general Yellow color.', 'ecoshop'),
                        ),
                    ),
                ),
                // Footer Section
                array(
                    'type' => 'section',
                    'title' => __('Footer', 'ecoshop'),
                    'fields' => array(
                        // Footer Background Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_bg',
                            'label' => __('Footer Background Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set footer background color.', 'ecoshop'),
                        ),
                        // Footer Color
                        array(
                            'type' => 'color',
                            'name' => 'footer_color',
                            'label' => __('Footer Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set footer color.', 'ecoshop'),
                        ),
                    ),
                ),
                // Other Styling
                array(
                    'type' => 'section',
                    'title' => __('Other Styling', 'ecoshop'),
                    'fields' => array(
                        // Newsletter Background Color
                        array(
                            'type' => 'color',
                            'name' => 'newsletter_bg_color',
                            'label' => __('Newsletter BG Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set Newsletter BG color.', 'ecoshop'),
                        ),
                        // Newsletter Text Color
                        array(
                            'type' => 'color',
                            'name' => 'newsletter_txt_color',
                            'label' => __('Newsletter Text Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set newsletter text color.', 'ecoshop'),
                        ),
                        // Links Color
                        array(
                            'type' => 'color',
                            'name' => 'links_normal',
                            'label' => __('Links Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set links color.', 'ecoshop'),
                        ),
                        // Links Color
                        array(
                            'type' => 'color',
                            'name' => 'links_hover',
                            'label' => __('Links Hover Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set links hover color.', 'ecoshop'),
                        ),
                        // Header Social Color
                        array(
                            'type' => 'color',
                            'name' => 'header_social_color',
                            'label' => __('Header Icons Color', 'ecoshop'),
                            'description' => __('Color Picker, you can set header icon color.', 'ecoshop'),
                        ),
					),
				),
			),
		),
        // Typography Options
        array(
            'title' => __('Typography Options', 'ecoshop'),
            'name' => 'typo_options',
            'icon' => 'font-awesome:fa-text-width',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => __('Headings Font Family', 'ecoshop'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'headings_font_face',
                            'label' => __('Headings Font Face: h1,h2,h3', 'ecoshop'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'headings_font_weight',
                            'label' => __('Headings Font Weight', 'ecoshop'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'headings_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // Meta Section
                array(
                    'type' => 'section',
                    'title' => __('Meta Data Font Family', 'ecoshop'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'meta_font_face',
                            'label' => __('Meta Data Font Face: h4,h5,h6, widget title etc.', 'ecoshop'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'meta_font_weight',
                            'label' => __('Meta Data Font Weight', 'ecoshop'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'meta_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // Body Section
                array(
                    'type' => 'section',
                    'title' => __('Body Font Family', 'ecoshop'),
                    'fields' => array(
                        array(
                            'type' => 'select',
                            'name' => 'body_font_face',
                            'label' => __('Body Font Face', 'ecoshop'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'function',
                                        'value' => 'vp_get_gwf_family',
                                    ),
                                ),
                            ),
                            //'default' => '{{first}}'
                        ),
                        array(
                            'type' => 'radiobutton',
                            'name' => 'body_font_weight',
                            'label' => __('Body Font Weight', 'ecoshop'),
                            'items' => array(
                                'data' => array(
                                    array(
                                        'source' => 'binding',
                                        'field' => 'body_font_face',
                                        'value' => 'vp_get_gwf_weight',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                // Font Sizes Section
                array(
                    'type' => 'section',
                    'title' => __('Font Sizes', 'ecoshop'),
                    'fields' => array(
                        // Body Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'body_font_size',
                            'label'   => __('Body Font Size (px)', 'ecoshop'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H1 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h1_font_size',
                            'label'   => __('H1 Font Size (px)', 'ecoshop'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H2 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h2_font_size',
                            'label'   => __('H2 Font Size (px)', 'ecoshop'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H3 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h3_font_size',
                            'label'   => __('H3 Font Size (px)', 'ecoshop'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H4 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h4_font_size',
                            'label'   => __('H4 Font Size (px)', 'ecoshop'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H5 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h5_font_size',
                            'label'   => __('H5 Font Size (px)', 'ecoshop'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // H6 Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'h6_font_size',
                            'label'   => __('H6 Font Size (px)', 'ecoshop'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        ),
                        // Menu Font Size
                        array(
                            'type'    => 'slider',
                            'name'    => 'menu_font_size',
                            'label'   => __('Menu Font Size (px)', 'ecoshop'),
                            'min'     => '0',
                            'max'     => '100',
                            'step'    => '1',
                        )
                    ),
                ),
            ),
        ),
        // Single Page Options
        array(
            'title' => __('Post Page Options', 'ecoshop'),
            'name' => 'post_options',
            'icon' => 'font-awesome:fa-files-o',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => __('Single Page Details', 'ecoshop'),
                    'fields' => array(
                        // Hide Feature Image
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_feature_image',
                            'label' => __('Hide Feature Image', 'ecoshop'),
                            'description' => __('You can hide the feature image.', 'ecoshop'),
                            'default' => '0',
                        ),
                        // Hide Tags
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_tags',
                            'label' => __('Hide Tags', 'ecoshop'),
                            'description' => __('You can hide tags.', 'ecoshop'),
                            'default' => '1',
                        ),
                        // Hide Author
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_author',
                            'label' => __('Hide Author Box', 'ecoshop'),
                            'description' => __('You can hide the author box.', 'ecoshop'),
                            'default' => '1',
                        ),
                        // Hide Social Share
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_social_share',
                            'label' => __('Hide Social Share', 'ecoshop'),
                            'description' => __('You can hide social share for post.', 'ecoshop'),
                            'default' => '0',
                        ),
                        // Hide Related Posts
                        array(
                            'type' => 'toggle',
                            'name' => 'hide_related_posts',
                            'label' => __('Hide Related Posts', 'ecoshop'),
                            'description' => __('You can hide related posts.', 'ecoshop'),
                            'default' => '0',
                        ),
                    ),
                ),
            ),
        ),
        // 404 Page Options
        array(
            'title' => __('404 Page Options', 'ecoshop'),
            'name' => 'page404_options',
            'icon' => 'font-awesome:fa-warning',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => __('404 Page Details', 'ecoshop'),
                    'fields' => array(
                        // 404 Editor
                        array(
                            'type' => 'codeeditor',
                            'name' => 'error_404',
                            'label' => __('Page Text', 'ecoshop'),
                            'description' => __('HTML tags are supported.', 'ecoshop'),
                            'theme' => 'github',
                            'mode' => 'html',
                        ),
                    ),
                ),
            ),
        ),
        // Woocommerce
        array(
            'title' => __('Woocommerce', 'ecoshop'),
            'name' => 'woocomerce_options',
            'icon' => 'font-awesome:fa-shopping-cart',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => __('Shop Details', 'ecoshop'),
                    'fields' => array(
                        // Shop Layout
                        array(
                            'type' => 'select',
                            'name' => 'shop_layout',
                            'label' => __('Shop Layout', 'ecoshop'),
                            'items' => array(
                                array(
                                    'value' => 'one',
                                    'label' => __('Layout 1 (4 Columns)', 'ecoshop'),
                                ),
                                array(
                                    'value' => 'two',
                                    'label' => __('Layout 2 (Left Sidebar)', 'ecoshop'),
                                ),
                                array(
                                    'value' => 'three',
                                    'label' => __('Layout 3 (Right Sidebar)', 'ecoshop'),
                                ),
                                array(
                                    'value' => 'four',
                                    'label' => __('Layout 4 (2 Columns Plain)', 'ecoshop'),
                                ),
                            ),
                            'default' => array(
                                'one',
                            ),
                        ),
                        // Shop Single Layout
                        array(
                            'type' => 'select',
                            'name' => 'shop_single_layout',
                            'label' => __('Shop Single Page Layout', 'ecoshop'),
                            'items' => array(
                                array(
                                    'value' => 'one',
                                    'label' => __('Layout 1', 'ecoshop'),
                                ),
                                array(
                                    'value' => 'two',
                                    'label' => __('Layout 2', 'ecoshop'),
                                ),
                                array(
                                    'value' => 'three',
                                    'label' => __('Layout 3', 'ecoshop'),
                                ),
                            ),
                            'default' => array(
                                'one',
                            ),
                        ),
                        // Number Of Products To Display
                        array(
                            'type' => 'textbox',
                            'name' => 'number_of_products_display',
                            'label' => __('Number Of Products To Display', 'ecoshop'),
                            'description' => __('Input numeric value only.', 'ecoshop'),
                            'default' => __('12', 'ecoshop')
                        ),
                        // Enable Double Image Mode
                        array(
                            'type' => 'toggle',
                            'name' => 'enable_product_double_img',
                            'label' => __('Enable Product Double Image Layout', 'ecoshop'),
                            'description' => __('You can enable double image view for products.', 'ecoshop'),
                            'default' => '0',
                        ),
                    ),
                ),
            ),
        ),
        // Social Options
        array(
            'title' => __('Footer & Social Options', 'ecoshop'),
            'name' => 'social_options',
            'icon' => 'font-awesome:fa-flag',
            'controls' => array(
                // Social Connect
                array(
                    'type' => 'section',
                    'title' => __('Social Connect', 'ecoshop'),
                    'fields' => array(
                        // Facebook
                        array(
                            'type' => 'textbox',
                            'name' => 'facebook',
                            'label' => __('Facebook', 'ecoshop'),
                            'description' => __('Leave empty if not required.', 'ecoshop'),
                            'default' => '#',
                        ),
                        // Twitter
                        array(
                            'type' => 'textbox',
                            'name' => 'twitter',
                            'label' => __('Twitter', 'ecoshop'),
                            'description' => __('Leave empty if not required.', 'ecoshop'),
                            'default' => '#',
                        ),
                        // Dribble
                        array(
                            'type' => 'textbox',
                            'name' => 'dribbble',
                            'label' => __('Dribbble', 'ecoshop'),
                            'description' => __('Leave empty if not required.', 'ecoshop'),
                            'default' => '',
                        ),
                        // Google Plus
                        array(
                            'type' => 'textbox',
                            'name' => 'google',
                            'label' => __('Google+', 'ecoshop'),
                            'description' => __('Leave empty if not required.', 'ecoshop'),
                            'default' => '',
                        ),
                        // Linkedin
                        array(
                            'type' => 'textbox',
                            'name' => 'linkedin',
                            'label' => __('LinkedIn', 'ecoshop'),
                            'description' => __('Leave empty if not required.', 'ecoshop'),
                            'default' => '',
                        ),
                        // Pinterest
                        array(
                            'type' => 'textbox',
                            'name' => 'pinterest',
                            'label' => __('Pinterest', 'ecoshop'),
                            'description' => __('Leave empty if not required.', 'ecoshop'),
                            'default' => '#',
                        ),
                        // Youtube
                        array(
                            'type' => 'textbox',
                            'name' => 'youtube',
                            'label' => __('Youtube', 'ecoshop'),
                            'description' => __('Leave empty if not required.', 'ecoshop'),
                            'default' => '#',
                        ),
                        // Instagram
                        array(
                            'type' => 'textbox',
                            'name' => 'instagram',
                            'label' => __('Instagram', 'ecoshop'),
                            'description' => __('Leave empty if not required.', 'ecoshop'),
                            'default' => '#',
                        ),
                    ),
                ),
                // Twitter API
                array(
                    'type' => 'section',
                    'title' => __('Twitter API Keys', 'ecoshop'),
                    'fields' => array(
                        // Username
                        array(
                            'type' => 'textbox',
                            'name' => 'tw_user_name',
                            'label' => __('User Name', 'ecoshop')
                        ),
                        // Consumer Key
                        array(
                            'type' => 'textbox',
                            'name' => 'tw_consumer_key',
                            'label' => __('Consumer Key', 'ecoshop')
                        ),
                        // Consumer Secret
                        array(
                            'type' => 'textbox',
                            'name' => 'tw_consumer_secret',
                            'label' => __('Consumer Secret', 'ecoshop')
                        ),
                        // Access Token
                        array(
                            'type' => 'textbox',
                            'name' => 'tw_access_token',
                            'label' => __('Access Token', 'ecoshop')
                        ),
                        // Access Token Secret
                        array(
                            'type' => 'textbox',
                            'name' => 'access_token_secret',
                            'label' => __('Access Token Secret', 'ecoshop')
                        )
                    ),
                ),
                // Footer Details
                array(
                    'type' => 'section',
                    'title' => __('Footer Details', 'ecoshop'),
                    'fields' => array(
                        // Hide About Section
                        array(
                            'type' => 'select',
                            'name' => 'hide_about_section',
                            'label' => __('Hide About Section', 'ecoshop'),
                            'items' => array(
                                array(
                                    'value' => 'yes',
                                    'label' => __('Yes', 'ecoshop'),
                                ),
                                array(
                                    'value' => 'no',
                                    'label' => __('No', 'ecoshop'),
                                )
                            )
                        ),
                        // About Shop
                        array(
                            'type' => 'textbox',
                            'name' => 'about_shop_heading',
                            'label' => __('About Shop Heading', 'ecoshop')
                        ),
                        // Shop Description
                        array(
                            'type' => 'textbox',
                            'name' => 'about_shop_description',
                            'label' => __('Shop Description', 'ecoshop')
                        ),
                        // Hide Newsletter Section
                        array(
                            'type' => 'select',
                            'name' => 'hide_newsletter_section',
                            'label' => __('Hide Newsletter Section', 'ecoshop'),
                            'items' => array(
                                array(
                                    'value' => 'yes',
                                    'label' => __('Yes', 'ecoshop'),
                                ),
                                array(
                                    'value' => 'no',
                                    'label' => __('No', 'ecoshop'),
                                )
                            )
                        ),
                        // Newsletter Style
                        array(
                            'type' => 'select',
                            'name' => 'newsletter_style',
                            'label' => __('Newsletter Style', 'ecoshop'),
                            'items' => array(
                                array(
                                    'value' => 'dark',
                                    'label' => __('Dark', 'ecoshop'),
                                ),
                                array(
                                    'value' => 'color',
                                    'label' => __('Color', 'ecoshop'),
                                )
                            )
                        ),
                        // Newsletter Heading
                        array(
                            'type' => 'textbox',
                            'name' => 'newsletter_heading',
                            'label' => __('Newsletter Heading', 'ecoshop')
                        ),
                        // Newsletter Description
                        array(
                            'type' => 'textbox',
                            'name' => 'newsletter_description',
                            'label' => __('Newsletter Description', 'ecoshop')
                        ),
                        // Newsletter Shortcode
                        array(
                            'type' => 'textbox',
                            'name' => 'newsletter_shortcode',
                            'label' => __('Newsletter Shortcode', 'ecoshop')
                        )
                    ),
                ),
            ),
        ),
        // Code Snippets
        array(
            'title' => __('Code Snippets', 'ecoshop'),
            'name' => 'codeSnippets_options',
            'icon' => 'font-awesome:fa-info',
            'controls' => array(
                // Headings Section
                array(
                    'type' => 'section',
                    'title' => __('HTML CODE SNIPPETS', 'ecoshop'),
                    'fields' => array(
                        // Footer Address
                        array(
                            'type' => 'notebox',
                            'name' => 'footer_address',
                            'label' => __('FOOTER ADDRESS', 'ecoshop'),
                            'description' => esc_html__('<div class="about-footer"><img class="margin-bottom-30" src="IMAGE_PATH" alt="" ><p><i class="icon-pointer"></i> Street No. 12, Newyork 12, <br>MD - 123, USA.</p><p><i class="icon-call-end"></i> 1.800.123.456789</p><p><i class="icon-envelope"></i> info@ecoshop.com</p></div>', 'ecoshop'),
                            'status' => 'normal',
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'links',
                            'label' => __('FOOTER LIST STYLE', 'ecoshop'),
                            'description' => esc_html__('<ul class="link"><li><a href="#."> Products</a></li><li><a href="#."> Find a Store</a></li></ul>', 'ecoshop'),
                            'status' => 'normal',
                        ),
                        array(
                            'type' => 'notebox',
                            'name' => 'contactForm',
                            'label' => __('CONTACT FORM 7', 'ecoshop'),
                            'description' => esc_html__('<ul class="row"><li class="col-sm-6"><label>full name * [text name class:form-control]</label></li><li class="col-sm-6"><label>Email * [email email class:form-control]</label></li><li class="col-sm-12"><button type="submit" value="submit" class="btn" id="btn_submit">SEND MAIL</button></li></ul>', 'ecoshop'),
                            'status' => 'normal',
                        ),
                    ),
                ),
            ),
        ),
	)
);
/**
 *EOF
 */