<?php
/**
 * ACF Config File
**/

if ( ! class_exists( 'ACF' ) ) {
  return;
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Cirion Theme General Settings',
        'menu_title'    => 'Cirion Theme Settings',
        'menu_slug'     => 'cirion-theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));   
}

if( function_exists('acf_add_local_field_group') ):
	// Theme Setting Fields
	acf_add_local_field_group(array(
		'key' => 'top_bar_styles_group',
		'title' => 'Top Bar Styles',
		'fields' => array(
			array(
				'key' => 'field_top_bar_background_color',
				'label' => 'Background Color',
				'name' => 'top_bar_background_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_search_placeholder_text',
				'label' => 'Search Placeholder Text',
				'name' => 'search_placeholder_text',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_top_bar_menu_text_color',
				'label' => 'Menu Text Color',
				'name' => 'top_bar_menu_text_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_top_bar_menu_text_hover_color',
				'label' => 'Menu Text Hover Color',
				'name' => 'top_bar_menu_text_hover_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'cirion-theme-general-settings',
				),
			),
		),
		'menu_order' => 1,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

	acf_add_local_field_group(array(
		'key' => 'main_navigation_styles',
		'title' => 'Main Navigation Styles',
		'fields' => array(
			array(
				'key' => 'field_main_nav_background_color',
				'label' => 'Background Color',
				'name' => 'main_nav_background_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_main_nav_menu_text_color',
				'label' => 'Menu Text Color',
				'name' => 'main_nav_menu_text_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_main_nav_menu_text_hover_color',
				'label' => 'Menu Text Hover Color',
				'name' => 'main_nav_menu_text_hover_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_main_nav_menu_text_hover_line_color',
				'label' => 'Menu Text Hover Line Color',
				'name' => 'main_nav_menu_text_hover_line_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_main_nav_sub_menu_hover_background_color_level1',
				'label' => 'Sub Menu Hover Background Color - Level 1',
				'name' => 'main_nav_sub_menu_hover_background_color_level1',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_main_nav_sub_menu_hover_background_color_level2',
				'label' => 'Sub Menu Hover Background Color - Level 2',
				'name' => 'main_nav_sub_menu_hover_background_color_level2',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'cirion-theme-general-settings',
				),
			),
		),
		'menu_order' => 2,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

	acf_add_local_field_group(array(
		'key' => 'footer_styles_group',
		'title' => 'Footer Styles',
		'fields' => array(
			array(
				'key' => 'field_footer_background_color',
				'label' => 'Background Color',
				'name' => 'footer_background_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_footer_menu_heading_text_color',
				'label' => 'Menu Heading Color',
				'name' => 'footer_menu_heading_text_hover_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_footer_menu_text_color',
				'label' => 'Menu Text Color',
				'name' => 'footer_menu_text_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_footer_menu_text_hover_color',
				'label' => 'Menu Text Hover Color',
				'name' => 'footer_menu_text_hover_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_footer_horizontal_line_color',
				'label' => 'Horizontal Line Color',
				'name' => 'footer_horizontal_line_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
			array(
				'key' => 'field_copyright_text',
				'label' => 'Copyright Text',
				'name' => 'copyright_text',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'rows' => '',
				'placeholder' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_footer_copyright_text_color',
				'label' => 'Copyright Text Color',
				'name' => 'footer_copyright_text_color',
				'aria-label' => '',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'enable_opacity' => 0,
				'return_format' => 'string',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'cirion-theme-general-settings',
				),
			),
		),
		'menu_order' => 3,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
	
	// Mega Menu Fields
	acf_add_local_field_group(array(
		'key' => 'mega_menu_group',
		'title' => 'Menu',
		'fields' => array(
			array(
				'key' => 'field_need_mega_menu',
				'label' => 'Need Mega Menu',
				'name' => 'need_mega_menu',
				'aria-label' => '',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_menu_group',
				'label' => 'Menu Group Start&End',
				'name' => 'menu_group',
				'aria-label' => '',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'group_start' => 'Group Start',
					'group_startend' => 'Group Start & End',
					'group_end' => 'Group End',
				),
				'default_value' => false,
				'return_format' => 'value',
				'multiple' => 0,
				'allow_null' => 1,
				'ui' => 0,
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_group_alignment',
				'label' => 'Need Group Alignment Right',
				'name' => 'group_alignment',
				'aria-label' => '',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_menu_group',
							'operator' => '==',
							'value' => 'group_start',
						),
					),
					array(
						array(
							'field' => 'field_menu_group',
							'operator' => '==',
							'value' => 'group_startend',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_menu_title',
				'label' => 'Menu Title',
				'name' => 'menu_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_menu_group',
							'operator' => '==',
							'value' => 'group_start',
						),
					),
					array(
						array(
							'field' => 'field_menu_group',
							'operator' => '==',
							'value' => 'group_startend',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'nav_menu_item',
					'operator' => '==',
					'value' => 'all',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

	// Search Page Styles 
	acf_add_local_field_group(array(
		'key' => 'search_page_styles_group',
		'title' => 'Search Page Styles',
		'fields' => array(
			array(
				'key' => 'field_search_page_heading_text',
				'label' => 'Search Page Heading',
				'name' => 'search_page_heading_text',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_search_page_result_found_text',
				'label' => 'Result Found Text',
				'name' => 'search_page_result_found_text',
				'aria-label' => '',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_search_page_tab_all_text',
				'label' => 'Tab - All Text',
				'name' => 'search_page_tab_all_text',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_search_page_tab_solutions_text',
				'label' => 'Tab - Solutions Text',
				'name' => 'search_page_tab_solutions_text',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_search_page_tab_products_text',
				'label' => 'Tab - Products Text',
				'name' => 'search_page_tab_products_text',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_search_page_tab_use_cases_text',
				'label' => 'Tab - Use Cases Text',
				'name' => 'search_page_tab_use_cases_text',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_search_page_no_results_text',
				'label' => 'No Results Text',
				'name' => 'search_page_no_results_text',
				'aria-label' => '',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'cirion-theme-general-settings',
				),
			),
		),
		'menu_order' => 5,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
endif;

function cirion_theme_options_style() {
	$theme_folder_path = get_template_directory();
	$inline_style_file = fopen($theme_folder_path."/assets/css/inline-styles.css", "w") or die("Unable to open file!");
	
	$styles = "/* Top Bar Styles */
	.cron-topbar {
		background: ".get_field('top_bar_background_color', 'option').";
	}
	.cron-search-box input::placeholder {
		color: ".get_field('top_bar_menu_text_color', 'option')." !important;
	}
	.cron-topbar .cron-navigation > ul > li > a {
		color: ".get_field('top_bar_menu_text_color', 'option').";
	}
	.cron-topbar .dropdown-nav > li > a {
		color: ".get_field('top_bar_menu_text_color', 'option').";
	}
	.cron-topbar .dropdown-nav > li > a:hover {
		color: ".get_field('top_bar_menu_text_hover_color', 'option').";
	}
	.cron-topbar .cron-navigation > ul > li > a:hover {
		color: ".get_field('top_bar_menu_text_hover_color', 'option').";
	}
	
	/* Main Navigation Styles */
	.cron-main-navigation {
		background-color: ".get_field('main_nav_background_color', 'option').";
	}
	.cron-navigation ul li a {
		color: ".get_field('main_nav_menu_text_color', 'option').";
	}
	.cron-navigation ul li a:hover {
		color: ".get_field('main_nav_menu_text_hover_color', 'option').";
	}
	.cron-navigation > ul > li > a:before {
		background: ".get_field('main_nav_menu_text_hover_line_color', 'option').";
	}
	.dropdown-nav > li > a:before {
		background: ".get_field('main_nav_menu_text_hover_line_color', 'option').";
	}
	.cron-navigation .navigation-wrap .dropdown-nav {
		background: ".get_field('main_nav_background_color', 'option').";
	}
	.dropdown-nav > li:hover > a, .dropdown-nav > li > a:hover {
		background: ".get_field('main_nav_sub_menu_hover_background_color_level1', 'option').";
	}
	.dropdown-nav .dropdown-nav > li > a:hover {
		background: ".get_field('main_nav_sub_menu_hover_background_color_level2', 'option').";
	}
	
	/* Footer Styles */
	.cron-footer {
		background: ".get_field('footer_background_color', 'option').";
	}
	.footer-widget h3 {
		color: ".get_field('footer_menu_heading_text_hover_color', 'option').";
	}
	.footer-wrap {
		color: ".get_field('footer_menu_text_color', 'option').";
	}
	.footer-wrap ul {
		color: ".get_field('footer_menu_text_color', 'option').";
	}
	.footer-wrap ul li a:hover {
		color: ".get_field('footer_menu_text_hover_color', 'option').";
	}
	.cron-footer .cron-social a {
		color: ".get_field('footer_menu_text_color', 'option').";
	}
	.cron-footer .cron-social a:hover {
		color: ".get_field('footer_menu_text_hover_color', 'option').";
	}
	.cron-copyright {
		border-color: ".get_field('footer_horizontal_line_color', 'option').";
	}
	.cron-copyright p {
		color: ".get_field('footer_copyright_text_color', 'option').";
	}";
	fwrite($inline_style_file, $styles);
	fclose($inline_style_file);
}
add_action('acf/save_post', 'cirion_theme_options_style');


// Service_category_image_option
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'Service_category_image_option',
		'title' => 'Service Category Image',
		'fields' => array(
			array(
				'key' => 'Service_category_image_option_field',
				'label' => 'Image',
				'name' => 'image',
				'aria-label' => '',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
				'preview_size' => 'medium',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'services_category',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
	
	endif;		