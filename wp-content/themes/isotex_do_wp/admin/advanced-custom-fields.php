<?php
define( 'ACF_LITE' , true );
include_once(ABSPATH . 'wp-admin/includes/plugin.php'); // Require plugin.php to use is_plugin_active() below
$revsliders = array();
$layer_sliders = array();
if (is_plugin_active('LayerSlider/layerslider.php')) {
    global $wpdb;
    $ls = $wpdb->get_results(
      "
      SELECT id, name, date_c
      FROM ".$wpdb->prefix."layerslider
      WHERE flag_hidden = '0' AND flag_deleted = '0'
      ORDER BY date_c ASC LIMIT 999
      "
    );
    if ($ls) {
      foreach ( $ls as $slider ) {
        $layer_sliders[$slider->id] = $slider->name;
      }
    } else {
      $layer_sliders["No sliders found"] = 0;
	}
}
 if (is_plugin_active('revslider/revslider.php')) {
    global $wpdb;
    $rs = $wpdb->get_results(
      "
      SELECT id, title, alias
      FROM ".$wpdb->prefix."revslider_sliders
      ORDER BY id ASC LIMIT 999
      "
    );
    if ($rs) {
      foreach ( $rs as $slider ) {
        $revsliders[$slider->alias] = $slider->title;
      }
    } else {
      $revsliders["No sliders found"] = 0;
    }
}

if(function_exists("register_field_group")){

/*	Plugin Slider
----------------------------------------------------------------------*/
$slider_choice = '';
if (is_plugin_active('LayerSlider/layerslider.php') && !is_plugin_active('revslider/revslider.php')){
	$slider_choice = array ('none' => 'None','layer' => 'Layer Slider');
}
else if(!is_plugin_active('LayerSlider/layerslider.php') && is_plugin_active('revslider/revslider.php')){
	$slider_choice = array ('none' => 'None','revolution' => 'Revolution Slider');
}
else if(is_plugin_active('LayerSlider/layerslider.php') && is_plugin_active('revslider/revslider.php')){
	$slider_choice = array ('none' => 'None','layer' => 'Layer Slider','revolution' => 'Revolution Slider');
}
else{
	$slider_choice='';
}

if (is_plugin_active('LayerSlider/layerslider.php') || is_plugin_active('revslider/revslider.php')) {
register_field_group(array (
		'id' => 'acf_sliders-options',
		'title' => 'Sliders Options',
		'fields' => array (
			array (
				'key' => 'field_801',
				'label' => 'Show Main Slider?',
				'name' => 'show_slider',
				'type' => 'radio',
				'choices' => $slider_choice,
				'other_choice' => 0,
				'save_other_choice' => 0,
				
				'default_value' =>'none',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_803',
				'label' => 'Revolution Slider Name',
				'name' => 'revolution_slider',
				'type' => 'select',
				'column_width' => '',
				'choices' => $revsliders,
				'allow_null' => 0,
				'multiple' => 0,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_801',
							'operator' => '==',
							'value' =>'revolution',
						),
					),
					'allorany' => 'all',
				),
			),
			array (
				'key' => 'field_802',
				'label' => 'Layer Slider Name',
				'name' => 'layer_slider',
				'type' => 'select',
				'column_width' => '',
				'choices' => $layer_sliders,
				'allow_null' => 0,
				'multiple' => 0,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_801',
							'operator' => '==',
							'value' =>'layer',
						),
					),
					'allorany' => 'all',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '!=',
					'value' => 'attachment',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/*	Posts
----------------------------------------------------------------------*/
	register_field_group(array (
		'id' => 'acf_format-audio',
		'title' => 'Format Audio',
		'fields' => array (
			array (
				'key' => 'field_01',
				'label' => 'Add SoundCloud Audio',
				'name' => 'post_audio',
				'type' => 'text',
				'instructions' => 'Paste page URL from SoundCloud',
				'default_value' => '',
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'audio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_format-gallery',
		'title' => 'Format Gallery',
		'fields' => array (
			array (
				'key' => 'field_02',
				'label' => 'Upload gallery image',
				'name' => 'post_gallery',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'gallery',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_format-video',
		'title' => 'Format Video',
		'fields' => array (
			array (
				'key' => 'field_03',
				'label' => 'Add Video',
				'name' => 'post_video',
				'type' => 'text',
				'instructions' => 'Paste video page URL',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'video',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_post-options',
		'title' => 'Post Options',
		'fields' => array (
			array (
				'key' => 'field_991',
				'label' => 'Show Fetured Media',
				'name' => 'post_media',
				'type' => 'radio',
				'choices' => array (
					'media_default' => 'Default',
					'1' => 'Show',
					'none' => 'Not Show',
					
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'media_default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_04',
				'label' => 'Style',
				'name' => 'post_style',
				'type' => 'radio',
				'choices' => array (
					'style_default' => 'Default',
					'style_one' => 'Style One',
					'style_two' => 'Style Two',
					
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'style_default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_05',
				'label' => 'Sidebar Position',
				'name' => 'post_sidebar',
				'type' => 'radio',
				'choices' => array (
					'sidebar_default' => 'Default',
					'sidebar_right' => 'Right',
					'sidebar_left' => 'Left',
					'sidebar_none' => 'None(Fullwidth)',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'sidebar_default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_06',
				'label' => 'Comments Type',
				'name' => 'post_comment',
				'type' => 'radio',
				'choices' => array (
					'comment_default' => 'Default',
					'comment_wordpress' => 'Wordpress',
					'comment_disqus' => 'Disqus',
					'comment_none' => 'None',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'comment_default',
				'layout' => 'horizontal',
			),
			/*
			array (
				'key' => 'field_07',
				'label' => 'Custom Breadcrumb Background',
				'name' => 'post_breadcrumb',
				'type' => 'image',
				'column_width' => '',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_08',
				'label' => 'Custom Background (For Boxed Layout)',
				'name' => 'post_background',
				'type' => 'image',
				'column_width' => '',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),*/
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
/*	Product
----------------------------------------------------------------------*/
	register_field_group(array (
		'id' => 'acf_product-options',
		'title' => 'Product Sidebar Options',
		'fields' => array (
			array (
				'key' => 'field_1111',
				'label' => 'Sidebar Position',
				'name' => 'product_sidebar',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'sidebar_right' => 'Right',
					'sidebar_left' => 'Left',
					'sidebar_none' => 'None(Fullwidth)',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
			),
			
			
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	
	
	
/*	Breadcrumb
----------------------------------------------------------------------*/	
	
	register_field_group(array (
		'id' => 'acf_breadcrumb-options',
		'title' => 'Breadcrumb & Title Options',
		'fields' => array (
			array (
				'key' => 'field_931',
				'label' => 'Show Title & Breadcrumb',
				'name' => 'breadcrumb_show',
				'type' => 'radio',
				'choices' => array (
					0 => 'No',
					1 => 'Yes',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				
				'default_value' => 1,
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_932',
				'label' => 'Custom Title & Breadcrumb',
				'name' => 'breadcrumb_custom',
				'type' => 'radio',
				'choices' => array (
					0 => 'No',
					1 => 'Yes',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				
				'default_value' => 0,
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_936',
				'label' => 'Layout',
				'name' => 'breadcrumb_layout',
				'type' => 'radio',
				'choices' => array (
					'' => 'Default',
					' bdark' => 'Dark',
					' blight' => 'Light',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_932',
							'operator' => '==',
							'value' => 1,
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_933',
				'label' => 'Height',
				'name' => 'breadcrumb_height',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_932',
							'operator' => '==',
							'value' => 1,
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '120px',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_934',
				'label' => 'Background',
				'name' => 'breadcrumb_bg',
				'type' => 'image',
				'column_width' => '',
				'save_format' => 'url',
				'library' => 'all',
				'preview_size' => 'thumbnail',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_932',
							'operator' => '==',
							'value' => 1,
						),
					),
					'allorany' => 'all',
				),
			),
			array (
				'key' => 'field_935',
				'label' => 'Text Align',
				'name' => 'breadcrumb_align',
				'type' => 'radio',
				'choices' => array (
					'' => 'Default',
					' xleft' => 'Left',
					' xright' => 'Right',
					' xcenter' => 'Center',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'horizontal',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_932',
							'operator' => '==',
							'value' => 1,
						),
					),
					'allorany' => 'all',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '!=',
					'value' => 'attachment',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	
/*	Page
----------------------------------------------------------------------*/
	register_field_group(array (
		'id' => 'acf_page-options',
		'title' => 'Page Options',
		'fields' => array (
			array (
				'key' => 'field_11',
				'label' => 'Sidebar Position',
				'name' => 'page_sidebar',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'sidebar_right' => 'Right',
					'sidebar_left' => 'Left',
					'sidebar_none' => 'None(Fullwidth)',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_12',
				'label' => 'Comments Type',
				'name' => 'page_comment',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'comment_wordpress' => 'Wordpress',
					'comment_disqus' => 'Disqus',
					'comment_none' => 'None',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
			),
			
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	/*	Contact */
	register_field_group(array (
		'id' => 'acf_template-contact',
		'title' => 'Contact Settings',
		'fields' => array (
			array (
				'key' => 'field_40',
				'label' => 'Email (Never be Pusblished)',
				'name' => 'contact_email',
				'type' => 'text',
				'instructions' => 'Enter your email address that you want the contact form to send emails to. Leave it empty to use the admin email address instead',
				'default_value' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_41',
				'label' => 'Map Height',
				'name' => 'contact_height',
				'type' => 'text',
				'instructions' => 'Enter map height in pixels',
				'default_value' => '500',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_42',
				'label' => 'Latitude',
				'name' => 'contact_latitude',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_43',
				'label' => 'Longitude',
				'name' => 'contact_longitude',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_44',
				'label' => 'Zoom',
				'name' => 'contact_zoom',
				'type' => 'text',
				'instructions' => '',
				'default_value' => '16',
				'formatting' => 'none',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	
	
/*	Portfolio
----------------------------------------------------------------------*/
register_field_group(array (
		'id' => 'acf_portfolio-options',
		'title' => 'Portfolio Options',
		'fields' => array (
			
			array (
				'key' => 'field_31',
				'label' => 'Media Column',
				'name' => 'portfolio_style',
				'type' => 'radio',
				'choices' => array (
					'style_default' => 'Default',
					'style_32' => '2/3 Media',
					'style_full' => 'Full Media',
					'style_custom' => 'Custom'
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'style_default',
				'layout' => 'horizontal',
			),
			
			array (
				'key' => 'field_32',
				'label' => 'Sidebar Position',
				'name' => 'portfolio_sidebar',
				'type' => 'radio',
				'choices' => array (
					'sidebar_default' => 'Default',
					'sidebar_right' => 'Right',
					'sidebar_left' => 'Left',
					'sidebar_none' => 'None(Fullwidth)',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'sidebar_default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_33',
				'label' => 'Comments Type',
				'name' => 'portfolio_comment',
				'type' => 'radio',
				'choices' => array (
					'comment_default' => 'Default',
					'comment_wordpress' => 'Wordpress',
					'comment_disqus' => 'Disqus',
					'comment_none' => 'None',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'comment_default',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => 'acf_portfolio-settings',
		'title' => 'Portfolio Settings',
		'fields' => array (
			array (
				'key' => 'field_35',
				'label' => 'Media Format',
				'name' => 'portfolio_format',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default (Featured Image)',
					'video' => 'Video',
					'gallery' => 'Gallery',
					
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_37',
				'label' => 'Add Video',
				'name' => 'portfolio_video',
				'type' => 'text',
				'instructions' => 'Paste video page URL',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_35',
							'operator' => '==',
							'value' => 'video',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_38',
				'label' => 'Upload gallery image',
				'name' => 'portfolio_gallery',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_35',
							'operator' => '==',
							'value' => 'gallery',
						),
					),
					'allorany' => 'all',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

/*	Category
----------------------------------------------------------------------*/
	register_field_group(array (
		'id' => 'acf_category-options',
		'title' => 'Category Options',
		'fields' => array (
			array (
				'key' => 'field_51',
				'label' => 'Column',
				'name' => 'category_column',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'column_1' => '1 Column',
					'column_2' => '2 Column',
					'column_3' => '3 Column',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_52',
				'label' => 'Masonry',
				'name' => 'category_masonry',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'1' => 'Yes',
					'no' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
				
			),
			array (
				'key' => 'field_53',
				'label' => 'Social Share',
				'name' => 'category_share',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'1' => 'Yes',
					'no' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
				
			),
			array (
				'key' => 'field_54',
				'label' => 'Sidebar Position',
				'name' => 'category_sidebar',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'sidebar_right' => 'Right',
					'sidebar_left' => 'Left',
					'sidebar_none' => 'None(Fullwidth)',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_55',
				'label' => 'Post Meta',
				'name' => 'category_post_meta',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'1' => 'Yes',
					'no' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
				'instructions' => 'Select yes if you want to show post information',
			),
			array (
				'key' => 'field_56',
				'label' => 'Post Readmore',
				'name' => 'category_post_more',
				'type' => 'radio',
				'choices' => array (
					'default' => 'Default',
					'1' => 'Yes',
					'no' => 'No',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'default',
				'layout' => 'horizontal',
				'instructions' => 'Select yes if you want to show post readmore link',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
// Add-Ons
function rd_register_fields(){
	include_once('acf/acf-gallery/gallery.php');
}
add_action('acf/register_fields', 'rd_register_fields'); 