<?php
vc_set_as_theme();
vc_disable_frontend();
if (is_admin()){
	function teaser_meta_boxes() 
	{
		remove_meta_box('vc_teaser', 'post', 'side');
		remove_meta_box('vc_teaser', 'page', 'side');
		remove_meta_box('vc_teaser', 'portfolio', 'side');
		remove_meta_box('vc_teaser', 'product', 'side');
	}
	add_action( 'add_meta_boxes', 'teaser_meta_boxes' );
}
	
// visual composer rewrite classes
function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if ($tag=='vc_row' || $tag=='vc_row_inner') {
        $class_string = str_replace('vc_row-fluid', 'row', $class_string);
    }
    if ($tag=='vc_column' || $tag=='vc_column_inner' || $tag == 'vc_teaser_grid_li') {
        $class_string = preg_replace('/vc_span(\d{1,2})/', 'grid_$1', $class_string);
    }
    return $class_string;
}
add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);

add_filter('wpb_widget_title', 'override_widget_title', 10, 2);
function override_widget_title($output = '', $params = array('')) {
	return '<h3 class="block-title">'.$params['title'].'</h3>';
}

// visual composer custom
require_once ( 'vc-custom/custom-map.php' );
require_once ( 'vc-custom/function-row.php' );
require_once ( 'vc-custom/new-param.php' );
require_once ( 'vc-custom/new-map.php' );

// Deactive Default Block 
vc_remove_element("vc_posts_grid"); 
vc_remove_element("vc_carousel"); 
vc_remove_element("vc_button2"); 
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_gmaps");

// Disable plugin update check
function disable_filter_plugin_updates($value) {
    unset($value->response['js_composer/js_composer.php']);
    return $value;
}
 
add_filter('site_transient_update_plugins', 'disable_filter_plugin_updates');
