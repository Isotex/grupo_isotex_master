<?php
require_once('codes.php');

function pre_process_shortcode($content) {
    global $shortcode_tags;
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();
	
	add_shortcode('highlight', 'shortcode_highlight');
	add_shortcode('dropcap', 'shortcode_dropcap');
		
    // Do the shortcode (only the one above is registered)
    $content = do_shortcode($content);
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
    return $content;
}
add_filter('the_content', 'pre_process_shortcode', 7);


// Add buttons to tinyMCE
add_action('init', 'add_button');
function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
	 add_filter('mce_buttons', 'general_button');
   }  
}  
function general_button($buttons) {  
   array_push($buttons, "dropcap", "highlight");  
   return $buttons;  
}   

function add_plugin($plugin_array) {
	$plugin_array['dropcap'] = get_template_directory_uri().'/functions/shortcodes/customcodes.js';
	$plugin_array['highlight'] = get_template_directory_uri().'/functions/shortcodes/customcodes.js';
   return $plugin_array;  
}  