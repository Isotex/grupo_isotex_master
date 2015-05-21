<?php
$opacity = array("1" => "1", "0.9" => "0.9", "0.8" => "0.8", "0.7" => "0.7", "0.6" => "0.6", "0.5" => "0.5", "0.4" => "0.4", "0.3" => "0.3", "0.2" => "0.2", "0.1" => "0.1", "0" => "0");

$video_quality = array("default" => "default", "small" => "small", "medium" => "medium", "large" => "large", "hd720" => "hd720", "hd1080" => "hd1080", "highres" => "highres" );

$animation = array(
  "type" => "dropdown",
  "heading" => __("CSS Animation", "js_composer"),
  "param_name" => "css_animation",
  "admin_label" => true,
  "value" => array("No" => "", "Top to Bottom" => "fadeInDown", "Bottom to Top" => "fadeInUp", "Left to Right" => "fadeInLeft", "Right to Left" => "fadeInRight", "Appear from Center" => "bigEntrance" ),
  "description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "js_composer")
);


$colors_arr = array(__("Orange", "js_composer") => " color1", __("Yelow Green", "js_composer") => " color2", __("Blue", "js_composer") => " color3", __("Dodger Blue", "js_composer") => " color4", __("Red", "js_composer") => " color5", __("Aqua", "js_composer") => " color6", __("chocolate", "js_composer") => " color7", __("Cadet Blue", "js_composer") => " color8", __("Aqua Marine", "js_composer") => " color9");


$size_arr = array(__("Medium", "js_composer") => " medium", __("Large", "js_composer") => " large", __("Small", "js_composer") => " small");

$floating = array(__("Center", "js_composer") => " center", __("Left", "js_composer") => " left", __("Right", "js_composer") => " right");

$target_arr = array(__("Same window", "js_composer") => "_self", __("New window", "js_composer") => "_blank");

// Row Update
$vc_row_setting = array (
  "params" => array(
	array(
      "type" => "dropdown",
      "heading" => __('Row Layout', 'wpb'),
      "param_name" => "row_layout",
      "value" => array(
                        __("Default", 'wpb') => '',
                        __("Fullwidth", 'wpb') => ' fullwidth',
                      ),
      "description" => __("Select layout for your row", "js_composer")
    ),
	array(
      "type" => "dropdown",
      "heading" => __('Theme Layout', 'wpb'),
      "param_name" => "font_color",
      "value" => array(
                        __("Light", 'wpb') => '',
                        __("Dark", 'wpb') => ' dark',
                        
                      ),
      "description" => __("If you select the dark theme, your fonts will be light so you must set your background be dark", "js_composer")
    ),
	array(
      "type" => "dropdown",
      "heading" => __('Background', 'wpb'),
      "param_name" => "row_bg",
      "value" => array(
                        __("None", 'wpb') => 'default',
                        __("Grey Background", 'wpb') => 'grey',
						__("Image Background", 'wpb') => 'image',
						__("Youtube Video Background", 'wpb') => 'video',
						__("HTML5 Video Background", 'wpb') => 'html5_video',
                      ),
      "description" => __("Select layout for your row", "js_composer")
    ),
	
	array(
      "type" => "textfield",
      "heading" => __("Mp4 Video URL", "js_composer"),
      "param_name" => "mp4_video",
      "description" => __("Input the Mp4 Video URL URL here.", "js_composer"),
	  "dependency" => Array('element' => "row_bg", 'value' => array('html5_video'))
    ),
	array(
      "type" => "textfield",
      "heading" => __("Webm Video URL", "js_composer"),
      "param_name" => "webm_video",
      "description" => __("Input the Webm Video URL URL here.", "js_composer"),
	  "dependency" => Array('element' => "row_bg", 'value' => array('html5_video'))
    ),
	array(
      "type" => "textfield",
      "heading" => __("Ogg Video URL", "js_composer"),
      "param_name" => "ogg_video",
      "description" => __("Input the Ogg Video URL URL here.", "js_composer"),
	  "dependency" => Array('element' => "row_bg", 'value' => array('html5_video'))
    ),
	array(
      "type" => "attach_image",
      "heading" => __('Video Poster Image', 'js_composer'),
      "param_name" => "poster_video",
      "description" => __("Image used for the video poster attribute", "js_composer"),
	  "dependency" => Array('element' => "row_bg", 'value' => array('html5_video'))
    ),
	array(
      "type" => "dropdown",
      "heading" => __('Video Opacity', 'wpb'),
      "param_name" => "html_opacity",
      "value" => $opacity,
      "description" => __("Set the opacity of the video player", "js_composer"),
      "dependency" => Array('element' => "row_bg", 'value' => array('html5_video'))
    ),
	array(
      "type" => 'checkbox',
      "heading" => __("Video Raster?", "js_composer"),
      "param_name" => "html_raster",
      "description" => __("Showing the Grid background on video.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'yes'),
	  "dependency" => Array('element' => "row_bg", 'value' => array('html5_video'))
    ),

	array(
      "type" => "textfield",
      "heading" => __("Youtube Video URL", "js_composer"),
      "param_name" => "bg_video",
      "description" => __("Input the Youtube Video URL here.", "js_composer"),
	  "dependency" => Array('element' => "row_bg", 'value' => array('video'))
    ),
	array(
      "type" => 'checkbox',
      "heading" => __("Video Raster?", "js_composer"),
      "param_name" => "video_raster",
      "description" => __("Showing the Grid background on video.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'yes'),
	  "dependency" => Array('element' => "row_bg", 'value' => array('video'))
    ),
	array(
      "type" => 'checkbox',
      "heading" => __("Video Autoplay?", "js_composer"),
      "param_name" => "video_autoplay",
      "description" => __("Play video automaticly.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'yes'),
	  "dependency" => Array('element' => "row_bg", 'value' => array('video'))
    ),
	array(
      "type" => 'checkbox',
      "heading" => __("Audio Mute?", "js_composer"),
      "param_name" => "video_mute",
      "description" => __("Mute the audio.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'yes'),
	  "dependency" => Array('element' => "row_bg", 'value' => array('video'))
    ),
	array(
      "type" => 'checkbox',
      "heading" => __("Video Player Control?", "js_composer"),
      "param_name" => "video_control",
      "description" => __("Showing the video player contol.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'yes'),
	  "dependency" => Array('element' => "row_bg", 'value' => array('video'))
    ),
	array(
      "type" => "dropdown",
      "heading" => __('Video Opacity', 'wpb'),
      "param_name" => "video_opacity",
      "value" => $opacity,
      "description" => __("Set the opacity of the video player", "js_composer"),
      "dependency" => Array('element' => "row_bg", 'value' => array('video'))
    ),
	array(
      "type" => "dropdown",
      "heading" => __('Video Quality', 'wpb'),
      "param_name" => "video_quality",
      "value" => $video_quality,
      "description" => __("Select the video quality", "js_composer"),
      "dependency" => Array('element' => "row_bg", 'value' => array('video'))
    ),
    array(
      "type" => "attach_image",
      "heading" => __('Background Image', 'wpb'),
      "param_name" => "bg_image",
      "description" => __("Select background image for your row", "js_composer"),
	  "dependency" => Array('element' => "row_bg", 'value' => array('image'))
    ),
	array(
      "type" => 'checkbox',
      "heading" => __("Paralax Background?", "js_composer"),
      "param_name" => "bg_paralax",
      "description" => __("If selected,  the background will moves slightly slower than the user scrolls.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'yes'),
	  "dependency" => Array('element' => "row_bg", 'value' => array('image'))
    ),
    array(
      "type" => "dropdown",
      "heading" => __('Background Repeat', 'wpb'),
      "param_name" => "bg_image_repeat",
      "value" => array(
                        __("Default", 'wpb') => '',
                        __("Cover", 'wpb') => 'cover',
                        __('Contain', 'wpb') => 'contain',
						__('Repeat', 'wpb') => 'repeat',
						__('Repeat X', 'wpb') => 'repeat-x',
						__('Repeat Y', 'wpb') => 'repeat-y',
                        __('No Repeat', 'wpb') => 'no-repeat',
                      ),
      "description" => __("Select how a background image will be repeated", "js_composer"),
      "dependency" => Array('element' => "row_bg", 'value' => array('image'))
    ),
	
	array(
      "type" => "colorpicker",
      "heading" => __("Custom Background Color", "js_composer"),
      "param_name" => "bg_color",
      "description" => __("Select backgound color for your row", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __('Padding Top', 'wpb'),
      "param_name" => "padding_top",
      "description" => __("You can use px, em, %, etc. or enter just number and it will use pixels. ", "js_composer")
    ),
	array(
      "type" => "textfield",
      "heading" => __('Padding Bottom', 'wpb'),
      "param_name" => "padding_bottom",
      "description" => __("You can use px, em, %, etc. or enter just number and it will use pixels. ", "js_composer")
    ),
	array(
      "type" => "textfield",
      "heading" => __('Top margin', 'wpb'),
      "param_name" => "margin_top",
      "description" => __("You can use px, em, %, etc. or enter just number and it will use pixels. ", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __('Bottom margin', 'wpb'),
      "param_name" => "margin_bottom",
      "description" => __("You can use px, em, %, etc. or enter just number and it will use pixels. ", "js_composer")
    ),
	array(
      "type" => "colorpicker",
      "heading" => __("Border top Color", "js_composer"),
      "param_name" => "border_top",
      "description" => __("Select border top color for your row, leave blank if no border", "js_composer")
    ),
	array(
      "type" => "colorpicker",
      "heading" => __("Border bottom Color", "js_composer"),
      "param_name" => "border_bottom",
      "description" => __("Select border bottom color for your row, leave blank if no border", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  ),
);
vc_map_update('vc_row', $vc_row_setting);

// Video Update
$vc_video_setting = array (
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "js_composer"),
      "param_name" => "title",
      "description" => __("Enter text which will be used as widget title. Leave blank if no title is needed.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Video link", "js_composer"),
      "param_name" => "link",
      "admin_label" => true,
      "description" => sprintf(__('Link to the video. More about supported formats at %s.', "js_composer"), '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>')
    ),
	$animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    ),
  )
);
vc_map_update('vc_video', $vc_video_setting);

// Text Separator
$vc_separator_setting = array (
  "name" => __("Separator with Text/Icon", "js_composer"),
  "params" => array(
    array(
        "type" => "textfield",
        "heading" => __("Title", "js_composer"),
        "param_name" => "title",
        "holder" => "div",
        "value" => __("Title", "js_composer"),
        "description" => __("Separator title.", "js_composer")
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Title position", "js_composer"),
        "param_name" => "title_align",
        "value" => array(__('Align center', "js_composer") => "separator_align_center", __('Align left', "js_composer") => "separator_align_left", __('Align right', "js_composer") => "separator_align_right"),
        "description" => __("Select title location.", "js_composer")
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Color", "js_composer"),
        "param_name" => "color",
        "value" => array(
			'Blue' => 'blue', // Why __( 'Blue', 'js_composer' ) doesn't work?
			'Turquoise' => 'turquoise',
			'Pink' => 'pink',
			'Violet' => 'violet',
			'Peacoc' => 'peacoc',
			'Chino' => 'chino',
			'Mulled Wine' => 'mulled_wine',
			'Vista Blue' => 'vista_blue',
			'Black' => 'black',
			'Grey' => 'grey',
			'Orange' => 'orange',
			'Sky' => 'sky',
			'Green' => 'green',
			'Juicy pink' => 'juicy_pink',
			'Sandy brown' => 'sandy_brown',
			'Purple' => 'purple',
			'White' => 'white'
		),
        "std" => 'grey',
        "description" => __("Separator color.", "js_composer"),
        "param_holder_class" => 'vc-colored-dropdown'
      ),
      array(
        "type" => "colorpicker",
        "heading" => __("Custom Border Color", "wpb"),
        "param_name" => "accent_color",
        "description" => __("Select border color for your element.", "wpb")
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Style", "js_composer"),
        "param_name" => "style",
        "value" => array(
			'Border' => '',
			'Dashed' => 'dashed',
			'Dotted' => 'dotted',
			'Double' => 'double'
		),
        "description" => __("Separator style.", "js_composer")
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Element width", "js_composer"),
        "param_name" => "el_width",
        "value" => array(
			'100%' => '',
			'90%' => '90',
			'80%' => '80',
			'70%' => '70',
			'60%' => '60',
			'50%' => '50'
		),
        "description" => __("Separator element width in percents.", "js_composer")
      ),
	// Play with icon selector
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Icon:", "js_composer"),
		"param_name" => "icon",
		"value" => array(
			"None" => "",
			"Metrize Icon" => "metrize",
			"Font Awesome Icon" => "font-awesome",
		),
		"description" => __("Note, this can make your title is HIDDEN", "js_composer")
	),
	array(
		"type" => "icon",
		"class" => "",
		"heading" => "",
		"param_name" => "icon_awesome",
		"value" => "android",
		"description" => __("Select the icon from the list.", "js_composer"),
		"dependency" => Array("element" => "icon","value" => array("font-awesome")),
	),
	array(
		"type" => "icon2",
		"class" => "",
		"heading" => "",
		"param_name" => "icon_metrize",
		"value" => "waves",
		"description" => __("Select the icon from the list.", "js_composer"),
		"dependency" => Array("element" => "icon","value" => array("metrize")),
	),
	array(
		"type" => "number",
		"class" => "",
		"heading" => __("Icon Size", "js_composer"),
		"param_name" => "size",
		"value" => 20,
		"min" => 16,
		"max" => 100,
		"suffix" => "px",
		"description" => __("Select the icon size.", "js_composer"),
		"dependency" => Array("element" => "icon","value" => array("metrize")),
		"dependency" => Array("element" => "icon","value" => array("font-awesome")),
	),
	array(
		"type" => "colorpicker",
		"class" => "",
		"heading" => __("Select Icon Color:", "js_composer"),
		"param_name" => "icon_color",
		"value" => "#ff6600",
		"description" => __("Select the icon color.", "js_composer"),
		"dependency" => Array("element" => "icon","value" => array("metrize")),
		"dependency" => Array("element" => "icon","value" => array("font-awesome")),
	),
	array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_text_separator', $vc_separator_setting);

// Text Block Update
$vc_text_block_setting = array (
	"params" => array(
	array(
      "type" => "textfield",
      "heading" => __("Title", "js_composer"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
    ),
    array(
      "type" => "textarea_html",
      "holder" => "div",
      "heading" => __("Text", "js_composer"),
      "param_name" => "content",
      "value" => __("<p>I am text block. Click edit button to change this text.</p>", "js_composer")
    ),
    $animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_column_text', $vc_text_block_setting);

// Message Box Update
$vc_message_setting = array (
	"params" => array(
    array(
      "type" => "dropdown",
      "heading" => __("Message box type", "js_composer"),
      "param_name" => "color",
      "value" => array(__('Informational', "js_composer") => "info", __('Warning', "js_composer") => "warning", __('Success', "js_composer") => "success", __('Error', "js_composer") => "error"),
      "description" => __("Select message type.", "js_composer")
    ),
    array(
      "type" => "textarea_html",
      "holder" => "div",
      "class" => "messagebox_text",
      "heading" => __("Message text", "js_composer"),
      "param_name" => "content",
      "value" => __("<p>I am message box. Click edit button to change this text.</p>", "js_composer")
    ),
    $animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_message', $vc_message_setting);

// Toggle Update
$vc_toggle = array (
	"params" => array(
    array(
      "type" => "textfield",
      "holder" => "h4",
      "class" => "toggle_title",
      "heading" => __("Toggle title", "js_composer"),
      "param_name" => "title",
      "value" => __("Toggle title", "js_composer"),
      "description" => __("Toggle block title.", "js_composer")
    ),
    array(
      "type" => "textarea_html",
      "holder" => "div",
      "class" => "toggle_content",
      "heading" => __("Toggle content", "js_composer"),
      "param_name" => "content",
      "value" => __("<p>Toggle content goes here, click edit button to change this text.</p>", "js_composer"),
      "description" => __("Toggle block content.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_toggle', $vc_toggle);

// Separator Update
$vc_separator = array (
	"params" => array(
      array(
        "type" => "dropdown",
        "heading" => __("Color", "js_composer"),
        "param_name" => "color",
        "value" => array(
			'Blue' => 'blue', // Why __( 'Blue', 'js_composer' ) doesn't work?
			'Turquoise' => 'turquoise',
			'Pink' => 'pink',
			'Violet' => 'violet',
			'Peacoc' => 'peacoc',
			'Chino' => 'chino',
			'Mulled Wine' => 'mulled_wine',
			'Vista Blue' => 'vista_blue',
			'Black' => 'black',
			'Grey' => 'grey',
			'Orange' => 'orange',
			'Sky' => 'sky',
			'Green' => 'green',
			'Juicy pink' => 'juicy_pink',
			'Sandy brown' => 'sandy_brown',
			'Purple' => 'purple',
			'White' => 'white'
		),
        "std" => 'grey',
        "description" => __("Separator color.", "js_composer"),
        "param_holder_class" => 'vc-colored-dropdown'
      ),
      array(
        "type" => "colorpicker",
        "heading" => __("Custom Border Color", "wpb"),
        "param_name" => "accent_color",
        "description" => __("Select border color for your element.", "wpb")
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Style", "js_composer"),
        "param_name" => "style",
        "value" => array(
			'Border' => '',
			'Dashed' => 'dashed',
			'Dotted' => 'dotted',
			'Double' => 'double'
		),
        "description" => __("Separator style.", "js_composer")
      ),
      array(
        "type" => "dropdown",
        "heading" => __("Element width", "js_composer"),
        "param_name" => "el_width",
        "value" => array(
			'100%' => '',
			'90%' => '90',
			'80%' => '80',
			'70%' => '70',
			'60%' => '60',
			'50%' => '50'
		),
        "description" => __("Separator element width in percents.", "js_composer")
      ),
      array(
        "type" => "textfield",
        "heading" => __("Extra class name", "js_composer"),
        "param_name" => "el_class",
        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
      )
    )
);
vc_map_update('vc_separator', $vc_separator);

// Accordion Update
$vc_accordion = array (
	"params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "js_composer"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
    ),
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Style:", "js_composer"),
		"param_name" => "style",
		"value" => array(
			"Style One" => "style1",
			"Style Two" => "style2",
		),
		"description" => __("Select which style you would like to use", "js_composer")
	),
	$animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_accordion', $vc_accordion);

/* Toggle (FAQ)
---------------------------------------------------------- */
$vc_toggle = array (
  "params" => array(
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Style:", "js_composer"),
		"param_name" => "style",
		"value" => array(
			"Style One" => "style1",
			"Style Two" => "style2",
		),
		"description" => __("Select which style you would like to use", "js_composer")
	),
    array(
      "type" => "textfield",
      "holder" => "h4",
      "class" => "toggle_title",
      "heading" => __("Toggle title", "js_composer"),
      "param_name" => "title",
      "value" => __("Toggle title", "js_composer"),
      "description" => __("Toggle block title.", "js_composer")
    ),
    array(
      "type" => "textarea_html",
      "holder" => "div",
      "class" => "toggle_content",
      "heading" => __("Toggle content", "js_composer"),
      "param_name" => "content",
      "value" => __("<p>Toggle content goes here, click edit button to change this text.</p>", "js_composer"),
      "description" => __("Toggle block content.", "js_composer")
    ),
    $animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_toggle', $vc_toggle);


// Tabs Update
$vc_tabs = array (
	"params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "js_composer"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
    ),
	$animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  ),
);
vc_map_update('vc_tabs', $vc_tabs);

// Tour Update
$vc_tour = array (
	"params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "js_composer"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
    ),
	$animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_tour', $vc_tabs);

// Single Image Update
$vc_single_image = array (
	"params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "js_composer"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
    ),
	$animation,
    array(
      "type" => "attach_image",
      "heading" => __("Image", "js_composer"),
      "param_name" => "image",
      "value" => "",
      "description" => __("Select image from media library.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Image size", "js_composer"),
      "param_name" => "img_size",
      "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "js_composer")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Image alignment", "js_composer"),
      "param_name" => "alignment",
      "value" => array(__("Align left", "js_composer") => "", __("Align right", "js_composer") => "right", __("Align center", "js_composer") => "center"),
      "description" => __("Select image alignment.", "js_composer")
    ),
    array(
      "type" => 'checkbox',
      "heading" => __("Link to large image?", "js_composer"),
      "param_name" => "img_link_large",
      "description" => __("If selected, image will be linked to the bigger image.", "js_composer"),
      "value" => Array(__("Yes, please", "js_composer") => 'yes')
    ),
    array(
      "type" => "textfield",
      "heading" => __("Image link", "js_composer"),
      "param_name" => "img_link",
      "description" => __("Enter url if you want this image to have link.", "js_composer"),
      "dependency" => Array('element' => "img_link_large", 'is_empty' => true, 'callback' => 'wpb_single_image_img_link_dependency_callback')
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Link Target", "js_composer"),
      "param_name" => "img_link_target",
      "value" => $target_arr,
      "dependency" => Array('element' => "img_link", 'not_empty' => true)
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_single_image', $vc_single_image);


// Gallery Image Update
$vc_gallery = array (
	"params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "js_composer"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
    ),
	array(
      "type" => "dropdown",
      "heading" => __("Gallery type", "js_composer"),
      "param_name" => "type",
      "value" => array(__("Image grid", "js_composer") => "image_grid", __("Slides", "js_composer") => "slides", __("Slides with Thumb", "js_composer") => "slides_thumb"),
      "description" => __("Select gallery type.", "js_composer")
    ),
	 array(
      "type" => "attach_images",
      "heading" => __("Images", "js_composer"),
      "param_name" => "images",
      "value" => "",
      "description" => __("Select images from media library.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Image size", "js_composer"),
      "param_name" => "img_size",
      "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'large' size.", "js_composer")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("On click", "js_composer"),
      "param_name" => "onclick",
      "value" => array(__("Open prettyPhoto", "js_composer") => "link_image", __("Do nothing", "js_composer") => "link_no", __("Open custom link", "js_composer") => "custom_link"),
      "description" => __("What to do when slide is clicked?", "js_composer")
    ),
    array(
      "type" => "exploded_textarea",
      "heading" => __("Custom links", "js_composer"),
      "param_name" => "custom_links",
      "description" => __('Enter links for each slide here. Divide links with linebreaks (Enter).', 'js_composer'),
      "dependency" => Array('element' => "onclick", 'value' => array('custom_link'))
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Custom link target", "js_composer"),
      "param_name" => "custom_links_target",
      "description" => __('Select where to open  custom links.', 'js_composer'),
      "dependency" => Array('element' => "onclick", 'value' => array('custom_link')),
      'value' => $target_arr
    ),
	
	array(
	  "type" => "checkbox",
	  "heading" => __("Navigation", "js_composer"),
	  "param_name" => "navigation",
	  "value" => array(__("Show navigation slides?", "js_composer") => "yes"),
	  "dependency" => Array('element' => "type", 'value' => array('slides', 'slides_thumb'))
	),
	array(
	  "type" => "dropdown",
	  "heading" => __("Auto rotate", "js_composer"),
	  "param_name" => "autoplay",
	  "value" => array(__("Disable", "js_composer") => 0, 1, 2, 3, 4, 5, 10, 15),
	  "description" => __("Auto rotate each X seconds.", "js_composer"),
	  "dependency" => Array('element' => "type", 'value' => array('slides', 'slides_thumb'))
	),
	array(
      "type" => "textfield",
      "heading" => __("Thumb size", "js_composer"),
      "param_name" => "thumb_size",
      "description" => __("Enter thumb size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "js_composer"),
	  "dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
    ),
	array(
		"type" => "textfield",
		"heading" => __("Thumb Columns Number (Desktop)", "js_composer"),
		"param_name" => "grid",
		"value" => 4,
		"description" => __("Enter the column number on desktop screen.", "js_composer"),
		 "dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
	),
	array(
		"type" => "textfield",
		"heading" => __("Thumb Columns Number (Tablet Landscape)", "js_composer"),
		"param_name" => "tablet",
		"value" => 4,
		"description" => __("Enter the column number on Tablet Lanscape screen.", "js_composer"),
		"dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
	),
	array(
		"type" => "textfield",
		"heading" => __("Thumb Columns Number (Tablet Portrait)", "js_composer"),
		"param_name" => "tabletsmall",
		"value" => 4,
		"description" => __("Enter the column number on Tablet Portrait screen.", "js_composer"),
		 "dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
	),
	array(
		"type" => "textfield",
		"heading" => __("Thumb Columns Number (Mobile Landscape)", "js_composer"),
		"param_name" => "mobile",
		"value" =>4,
		"description" => __("Enter the column number on Mobile Lanscape screen.", "js_composer"),
		"dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
	),
	array(
		"type" => "textfield",
		"heading" => __("Thumb Columns Number (Mobile Portrait)", "js_composer"),
		"param_name" => "mobilesmall",
		"value" =>4,
		"description" => __("Enter the column number on Mobile Portrait screen.", "js_composer"),
		"dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
	),
		
	$animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_gallery', $vc_gallery);

// Carousel Image Update
$vc_images_carousel = array (
		"params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget title", "js_composer"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
        ),
        array(
            "type" => "attach_images",
            "heading" => __("Images", "js_composer"),
            "param_name" => "images",
            "value" => "",
            "description" => __("Select images from media library.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Image size", "js_composer"),
            "param_name" => "img_size",
            "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("On click", "js_composer"),
            "param_name" => "onclick",
            "value" => array(__("Open prettyPhoto", "js_composer") => "link_image", __("Do nothing", "js_composer") => "link_no", __("Open custom link", "js_composer") => "custom_link"),
            "description" => __("What to do when slide is clicked?", "js_composer")
        ),
        array(
            "type" => "exploded_textarea",
            "heading" => __("Custom links", "js_composer"),
            "param_name" => "custom_links",
            "description" => __('Enter links for each slide here. Divide links with linebreaks (Enter).', 'js_composer'),
            "dependency" => Array('element' => "onclick", 'value' => array('custom_link'))
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Custom link target", "js_composer"),
            "param_name" => "custom_links_target",
            "description" => __('Select where to open  custom links.', 'js_composer'),
            "dependency" => Array('element' => "onclick", 'value' => array('custom_link')),
            'value' => $target_arr
        ),
		array(
		  "type" => "checkbox",
		  "heading" => __("Item Padding", "js_composer"),
		  "param_name" => "padding",
		  "value" => array(__("Padding on item?", "js_composer") => "carousel_padding")
		),
		array(
            "type" => "textfield",
            "heading" => __("Columns Number (Desktop)", "js_composer"),
            "param_name" => "grid",
			"value" => 4,
            "description" => __("Enter the column number on desktop screen.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Columns Number (Tablet Landscape)", "js_composer"),
            "param_name" => "tablet",
			"value" => 3,
            "description" => __("Enter the column number on Tablet Lanscape screen.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Columns Number (Tablet Portrait)", "js_composer"),
            "param_name" => "tabletsmall",
			"value" => 2,
            "description" => __("Enter the column number on Tablet Portrait screen.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Columns Number (Mobile Landscape)", "js_composer"),
            "param_name" => "mobile",
			"value" =>2,
            "description" => __("Enter the column number on Mobile Lanscape screen.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Columns Number (Mobile Portrait)", "js_composer"),
            "param_name" => "mobilesmall",
			"value" =>1,
            "description" => __("Enter the column number on Mobile Portrait screen.", "js_composer")
        ),
		array(
		  "type" => "checkbox",
		  "heading" => __("Slide Pagination", "js_composer"),
		  "param_name" => "pagination",
		  "value" => array(__("Show carousel pagination?", "js_composer") => "yes")
		),
		array(
		  "type" => "checkbox",
		  "heading" => __("Navigation", "js_composer"),
		  "param_name" => "navigation",
		  "value" => array(__("Show navigations?", "js_composer") => "yes")
		),
		array(
		  "type" => "checkbox",
		  "heading" => __("Outer Navigation", "js_composer"),
		  "param_name" => "outer_navigation",
		  "value" => array(__("Show navigations outer from items?", "js_composer") => " outer_nav"),
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Auto rotate", "js_composer"),
		  "param_name" => "autoplay",
		  "value" => array(__("Disable", "js_composer") => 0, 1, 2, 3, 4, 5, 10, 15),
		  "description" => __("Auto rotate each X seconds.", "js_composer")
		),
		$animation,
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        )
    )
);
vc_map_update('vc_images_carousel', $vc_images_carousel);


// Button Update
$vc_button = array (
	"params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Text on the button", "js_composer"),
      "holder" => "button",
      "class" => "wpb_button",
      "param_name" => "title",
      "value" => __("Text on the button", "js_composer"),
      "description" => __("Text on the button.", "js_composer")
    ),
	array(
      "type" => "dropdown",
      "heading" => __("Button position", "js_composer"),
      "param_name" => "position",
      "value" => array(__("Align left", "js_composer") => " fll",__("Align right", "js_composer") => " flr", __("Align center", "js_composer") => " tac"),
      "description" => __("Select button alignment.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("URL (Link)", "js_composer"),
      "param_name" => "href",
      "description" => __("Button link.", "js_composer")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Target", "js_composer"),
      "param_name" => "target",
      "value" => $target_arr,
      "dependency" => Array('element' => "href", 'not_empty' => true)
    ),
	
	array(
		  "type" => "dropdown",
		  "heading" => __("Button Style", "js_composer"),
		  "param_name" => "style",
		  "value" => array(
					"With Background" => " background",
					"With Border" => " border",
				),
		),
    array(
      "type" => "colorpicker",
      "heading" => __("Custom Background Color", "js_composer"),
      "param_name" => "color",
      "description" => __("Select backgound color for your button", "js_composer"),
	  "dependency" => Array('element' => "style", 'value' => array(' background')),
    ),
	array(
      "type" => "colorpicker",
      "heading" => __("Custom Border Color", "js_composer"),
      "param_name" => "border_color",
      "description" => __("Select backgound color for your button", "js_composer"),
	  "dependency" => Array('element' => "style", 'value' => array(' border')),
    ),
	array(
      "type" => "colorpicker",
      "heading" => __("Custom Font Color", "js_composer"),
      "param_name" => "font_color",
      "description" => __("Select font color for your button", "js_composer")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Size", "js_composer"),
      "param_name" => "size",
      "value" => $size_arr,
      "description" => __("Button size.", "js_composer")
    ),
	// Play with icon selector
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Icon:", "js_composer"),
		"param_name" => "icon",
		"value" => array(
			"None" => "none",
			"Metrize Icon" => "metrize",
			"Font Awesome Icon" => "font-awesome",
		),
		"description" => __("Select which icon you would like to use", "js_composer")
	),
	array(
		"type" => "icon",
		"class" => "",
		"heading" => "",
		"param_name" => "icon_awesome",
		"value" => "android",
		"description" => __("Select the icon from the list.", "js_composer"),
		"dependency" => Array("element" => "icon","value" => array("font-awesome")),
	),
	array(
		"type" => "icon2",
		"class" => "",
		"heading" => "",
		"param_name" => "icon_metrize",
		"value" => "waves",
		"description" => __("Select the icon from the list.", "js_composer"),
		"dependency" => Array("element" => "icon","value" => array("metrize")),
	),
	$animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    ),
  )
);
vc_map_update('vc_button', $vc_button);

// CTA Button Update
$vc_cta_button = array (
	"params" => array(
	array(
      "type" => "dropdown",
      "heading" => __("Action Theme", "js_composer"),
      "param_name" => "theme",
      "value" => array(__("Simple", "js_composer") => " simple_action", __("Light", "js_composer") => "", __("Grey", "js_composer") => " grey_action",  __("Dark", "js_composer") => " dark_action"),
      "description" => __("Select action box theme.", "js_composer")
    ),
    array(
      "type" => "textarea",
      'admin_label' => true,
      "heading" => __("Text", "js_composer"),
      "param_name" => "call_text",
      "value" => __("Click edit button to change this text.", "js_composer"),
      "description" => __("Enter your content.", "js_composer")
    ),
	array(
      "type" => "textarea",
      'admin_label' => true,
      "heading" => __("Second Text", "js_composer"),
      "param_name" => "call_second_text",
      "description" => __("Enter your content.", "js_composer")
    ),
	array(
      "type" => "dropdown",
      "heading" => __("Button position", "js_composer"),
      "param_name" => "position",
      "value" => array(__("Align right", "js_composer") => "", __("Align left", "js_composer") => " rev", __("Align bottom", "js_composer") => " tac"),
      "description" => __("Select button alignment.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Text on the button", "js_composer"),
      "param_name" => "title",
      "value" => __("Text on the button", "js_composer"),
      "description" => __("Text on the button.", "js_composer")
    ),
    array(
      "type" => "textfield",
      "heading" => __("URL (Link)", "js_composer"),
      "param_name" => "href",
      "description" => __("Button link.", "js_composer")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Target", "js_composer"),
      "param_name" => "target",
      "value" => $target_arr,
      "dependency" => Array('element' => "href", 'not_empty' => true)
    ),
    array(
		  "type" => "dropdown",
		  "heading" => __("Button Style", "js_composer"),
		  "param_name" => "style",
		  "value" => array(
					"With Background" => " background",
					"With Border" => " border",
				),
		),
    array(
      "type" => "colorpicker",
      "heading" => __("Botton Background Color", "js_composer"),
      "param_name" => "color",
      "description" => __("Select backgound color for your button", "js_composer"),
	  "dependency" => Array('element' => "style", 'value' => array(' background')),
    ),
	array(
      "type" => "colorpicker",
      "heading" => __("Botton Border Color", "js_composer"),
      "param_name" => "border_color",
      "description" => __("Select backgound color for your button", "js_composer"),
	  "dependency" => Array('element' => "style", 'value' => array(' border')),
    ),
	array(
      "type" => "colorpicker",
      "heading" => __("Botton Font Color", "js_composer"),
      "param_name" => "font_color",
      "description" => __("Select font color for your button", "js_composer")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Size", "js_composer"),
      "param_name" => "size",
      "value" => $size_arr,
      "description" => __("Button size.", "js_composer")
    ),
	// Play with icon selector
	array(
		"type" => "dropdown",
		"class" => "",
		"heading" => __("Icon:", "js_composer"),
		"param_name" => "icon",
		"value" => array(
			"None" => "none",
			"Metrize Icon" => "metrize",
			"Font Awesome Icon" => "font-awesome",
		),
		"description" => __("Select which icon you would like to use", "js_composer")
	),
	array(
		"type" => "icon",
		"class" => "",
		"heading" => "",
		"param_name" => "icon_awesome",
		"value" => "android",
		"description" => __("Select the icon from the list.", "js_composer"),
		"dependency" => Array("element" => "icon","value" => array("font-awesome")),
	),
	array(
		"type" => "icon2",
		"class" => "",
		"heading" => "",
		"param_name" => "icon_metrize",
		"value" => "waves",
		"description" => __("Select the icon from the list.", "js_composer"),
		"dependency" => Array("element" => "icon","value" => array("metrize")),
	),
    $animation,
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    )
  )
);
vc_map_update('vc_cta_button', $vc_cta_button);

// Progress Update
$vc_progress = array (
	"params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Widget title", "js_composer"),
      "param_name" => "title",
      "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
    ),
    array(
      "type" => "exploded_textarea",
      "heading" => __("Graphic values", "js_composer"),
      "param_name" => "values",
      "description" => __('Input graph values here. Divide values with linebreaks (Enter). Example: 90|Development', 'js_composer'),
      "value" => "90|Development,80|Design,70|Marketing"
    ),
    array(
      "type" => "textfield",
      "heading" => __("Units", "js_composer"),
      "param_name" => "units",
      "description" => __("Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.", "js_composer")
    ),
    array(
      "type" => "dropdown",
      "heading" => __("Bar color", "js_composer"),
      "param_name" => "bgcolor",
      "value" => array(__("Orange", "js_composer") => "color1", __("Yelow Green", "js_composer") => "color2", __("Blue", "js_composer") => "color3", __("Dodger Blue", "js_composer") => "color4", __("Red", "js_composer") => "color5", __("Aqua", "js_composer") => "color6", __("chocolate", "js_composer") => "color7", __("Cadet Blue", "js_composer") => "color8", __("Aqua Marine", "js_composer") => "color9", __("Custom Color", "js_composer") => "custom"),
      "admin_label" => true
    ),
    array(
      "type" => "colorpicker",
      "heading" => __("Bar custom color", "js_composer"),
      "param_name" => "custombgcolor",
      "description" => __("Select custom background color for bars.", "js_composer"),
      "dependency" => Array('element' => "bgcolor", 'value' => array('custom'))
    ),
    array(
      "type" => "checkbox",
      "heading" => __("Options", "js_composer"),
      "param_name" => "options",
      "value" => array(__("Add Stripes?", "js_composer") => " stripes")
    ),
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    ),
  )
);
vc_map_update('vc_progress_bar', $vc_progress);

// Pie Update
$vc_pie = array (
	"params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Widget title", "js_composer"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer"),
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Pie value", "js_composer"),
            "param_name" => "value",
            "description" => __('Input graph value here. Witihn a range 0-100.', 'js_composer'),
            "value" => "50",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Pie label value", "js_composer"),
            "param_name" => "label_value",
            "description" => __('Input integer value for label. If empty "Pie value" will be used.', 'js_composer'),
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => __("Units", "js_composer"),
            "param_name" => "units",
            "description" => __("Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.", "js_composer")
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Bar color", "js_composer"),
            "param_name" => "color",
            "value" => array(__("Orange", "js_composer") => "color1", __("Yelow Green", "js_composer") => "color2", __("Blue", "js_composer") => "color3", __("Dodger Blue", "js_composer") => "color4", __("Red", "js_composer") => "color5", __("Aqua", "js_composer") => "color6", __("chocolate", "js_composer") => "color7", __("Cadet Blue", "js_composer") => "color8", __("Aqua Marine", "js_composer") => "color9", __("Dark", "js_composer") => "color10"),
            "description" => __("Select pie chart color.", "js_composer"),
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        ),

    )
);
vc_map_update('vc_pie', $vc_pie);

// Posts Slider Update
$vc_posts_slider = array (
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => __("Widget title", "js_composer"),
		  "param_name" => "title",
		  "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Slides type", "js_composer"),
		  "param_name" => "type",
		  "value" => array(__("Default", "js_composer") => "slides", __("Slides with Thumb", "js_composer") => "slides_thumb"),
		  "description" => __("Select gallery type.", "js_composer")
		),
		array(
		  "type" => "checkbox",
		  "heading" => __("Navigation", "js_composer"),
		  "param_name" => "navigation",
		  "value" => array(__("Show slides navigation?", "js_composer") => "yes"),
		  "dependency" => Array('element' => "type", 'value' => array('slides', 'slides_thumb'))
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Auto rotate", "js_composer"),
		  "param_name" => "autoplay",
		  "value" => array(__("Disable", "js_composer") => 0, 1, 2, 3, 4, 5, 10, 15),
		  "description" => __("Auto rotate each X seconds.", "js_composer"),
		  "dependency" => Array('element' => "type", 'value' => array('slides', 'slides_thumb'))
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Thumb size", "js_composer"),
		  "param_name" => "thumb_size",
		  "description" => __("Enter thumb size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", "js_composer"),
		  "dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
		),
		array(
			"type" => "textfield",
			"heading" => __("Thumb Columns Number (Desktop)", "js_composer"),
			"param_name" => "grid",
			"value" => 4,
			"description" => __("Enter the column number on desktop screen.", "js_composer"),
			 "dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
		),
		array(
			"type" => "textfield",
			"heading" => __("Thumb Columns Number (Tablet Landscape)", "js_composer"),
			"param_name" => "tablet",
			"value" => 4,
			"description" => __("Enter the column number on Tablet Lanscape screen.", "js_composer"),
			"dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
		),
		array(
			"type" => "textfield",
			"heading" => __("Thumb Columns Number (Tablet Portrait)", "js_composer"),
			"param_name" => "tabletsmall",
			"value" => 4,
			"description" => __("Enter the column number on Tablet Portrait screen.", "js_composer"),
			 "dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
		),
		array(
			"type" => "textfield",
			"heading" => __("Thumb Columns Number (Mobile Landscape)", "js_composer"),
			"param_name" => "mobile",
			"value" =>4,
			"description" => __("Enter the column number on Mobile Lanscape screen.", "js_composer"),
			"dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
		),
		array(
			"type" => "textfield",
			"heading" => __("Thumb Columns Number (Mobile Portrait)", "js_composer"),
			"param_name" => "mobilesmall",
			"value" =>4,
			"description" => __("Enter the column number on Mobile Portrait screen.", "js_composer"),
			"dependency" => Array('element' => "type", 'value' => array('slides_thumb'))
		),
		array(
		  "type" => "posttypes",
		  "heading" => __("Post types", "js_composer"),
		  "param_name" => "posttypes",
		  "description" => __("Select post types to populate posts from.", "js_composer")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Slides count", "js_composer"),
		  "param_name" => "count",
		  "description" => __('How many slides to show? Enter number or word "All".', "js_composer")
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Description", "js_composer"),
		  "param_name" => "slides_content",
		  "value" => array(__("No description", "js_composer") => "", __("Teaser (Excerpt)", "js_composer") => "teaser" ),
		  "description" => __("Some sliders support description text, what content use for it?", "js_composer"),
		),
		array(
		  "type" => 'textfield',
		  "heading" => __("Excerpt Length", "js_composer"),
		  "param_name" => "excerpt",
		  "description" => __("Leave BLANK if you want to show only Post Title", "js_composer"),
		  "value" => "",
		  "dependency" => Array('element' => "slides_content", 'value' => array('teaser')),
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Link", "js_composer"),
		  "param_name" => "link",
		  "value" => array(__("Link to post", "js_composer") => "link_post", __("Link to bigger image", "js_composer") => "link_image", __("Open custom link", "js_composer") => "custom_link", __("No link", "js_composer") => "link_no"),
		  "description" => __("Link type.", "js_composer")
		),
		array(
		  "type" => "exploded_textarea",
		  "heading" => __("Custom links", "js_composer"),
		  "param_name" => "custom_links",
		  "dependency" => Array('element' => "link", 'value' => 'custom_link'),
		  "description" => __('Enter links for each slide here. Divide links with linebreaks (Enter).', 'js_composer')
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Image size", "js_composer"),
		  "param_name" => "img_size",
		  "description" => __('Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height).', "js_composer")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Post/Page IDs", "js_composer"),
		  "param_name" => "posts_in",
		  "description" => __('Fill this field with page/posts IDs separated by commas (,), to retrieve only them. Use this in conjunction with "Post types" field.', "js_composer")
		),
		array(
		  "type" => "exploded_textarea",
		  "heading" => __("Categories", "js_composer"),
		  "param_name" => "categories",
		  "description" => __("If you want to narrow output, enter category names here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter).", "js_composer")
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Order by", "js_composer"),
		  "param_name" => "orderby",
		  "value" => array( "", __("Date", "js_composer") => "date", __("ID", "js_composer") => "ID", __("Author", "js_composer") => "author", __("Title", "js_composer") => "title", __("Modified", "js_composer") => "modified", __("Random", "js_composer") => "rand", __("Comment count", "js_composer") => "comment_count", __("Menu order", "js_composer") => "menu_order" ),
		  "description" => sprintf(__('Select how to sort retrieved posts. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Order by", "js_composer"),
		  "param_name" => "order",
		  "value" => array( __("Descending", "js_composer") => "DESC", __("Ascending", "js_composer") => "ASC" ),
		  "description" => sprintf(__('Designates the ascending or descending order. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
		),
		$animation,
		array(
		  "type" => "textfield",
		  "heading" => __("Extra class name", "js_composer"),
		  "param_name" => "el_class",
		  "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
		)
  ),
);
vc_map_update('vc_posts_slider', $vc_posts_slider);