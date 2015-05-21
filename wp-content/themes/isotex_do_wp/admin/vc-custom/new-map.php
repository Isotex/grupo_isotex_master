<?php
/* Google Maps
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Google Maps", "js_composer"),
    "base" => "gmap",
    "category"  => __('Content', "js_composer"),
    "icon" => "icon-wpb-map-pin",
    "description" => __('Map Block', 'js_composer'),
    "params" => array(
		array(
		  "type" => "textfield",
		  "heading" => __("Widget title", "js_composer"),
		  "param_name" => "title",
		  "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Latitude", "js_composer"),
		  "param_name" => "latitude",
		  "admin_label" => true,
		  "description" => __('Enter map latitude. Example: -7.796873', "js_composer")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Longitude", "js_composer"),
		  "param_name" => "longitude",
		  "admin_label" => true,
		  "description" => __('Enter map longitude. Example: 110.369180', "js_composer")
		),
		array(
		  "type" => "textfield",
		  "heading" => __("Map height", "js_composer"),
		  "param_name" => "size",
		  "description" => __('Enter map height in pixels. Example: 200', "js_composer")
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Map Zoom", "js_composer"),
		  "param_name" => "zoom",
		  "value" => array(__("14 - Default", "js_composer") => 14, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20)
		),
	)
) );

/* Space
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Space", "js_composer"),
    "base" => "space",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-space",
    "description" => __('Space height between elements', 'js_composer'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Space Height", "js_composer"),
            "param_name" => "height",
			"admin_label" => true,
            "description" => __("Enter value on PIXEL. Example '30', default value is 30", "js_composer")
        ),
	)
) );

/* Title
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Title & Desc", "js_composer"),
    "base" => "big_title",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-title",
    "description" => __('Title for Landing Page or Block', 'js_composer'),
    "params" => array(
        array(
            "type" => "textarea",
            "heading" => __("Title", "js_composer"),
            "param_name" => "title",
			"admin_label" => true,
			"value" => "Sample of <strong>Themeforest</strong> Title",
            "description" => __("Use the <strong>strong</strong> tag if you want to show colored text.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Title Font Size", "js_composer"),
            "param_name" => "title_size",
            "value" => "28px",
        ),
		array(
		  "type" => "dropdown",
		  "heading" => __("Title Tag", "js_composer"),
		  "param_name" => "title_tag",
		  "value" => array("H1"=>"h1", "H2"=>"h2", "H3"=>"h3", "H4"=>"h4" )
		 ),
		array(
            "type" => "textarea",
            "heading" => __("Desription", "js_composer"),
            "param_name" => "description",
            "description" => __("What text use as a description.", "js_composer")
        ),
		
		array(
		  "type" => "dropdown",
		  "heading" => __("Text Align", "js_composer"),
		  "param_name" => "align",
		  "value" => $floating
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Separator below Heading", "js_composer"),
		  "param_name" => "sep",
		  "value" => array(
					"No" => "",
					"Yes" => "yes",
				),
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
		  "dependency" => Array('element' => "sep", 'value' => array('yes')),
		),
		array(
		  "type" => "colorpicker",
		  "heading" => __("Custom Border Color", "js_composer"),
		  "param_name" => "accent_color",
		  "description" => __("Select border color for your element.", "js_composer"),
		   "dependency" => Array('element' => "sep", 'value' => array('yes')),
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
		  "description" => __("Separator style.", "js_composer"),
		   "dependency" => Array('element' => "sep", 'value' => array('yes')),
		),
		
		$animation,
	)
) );


/* Share
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Share", "js_composer"),
    "base" => "share",
    "category"  => __('Theme Features', "js_composer"),
	"icon" => "icon-wpb-share",
    "description" => __('Show the share icons', 'js_composer'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", "js_composer"),
            "param_name" => "title",
			"admin_label" => true,
			"value" => "Share",
            "description" => __("What text use as a title.", "js_composer")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Share", "js_composer"),
            "param_name" => "share_item",
            "value" => array("Twitter" => "twitter", "Facebook" => "facebook", "Google Plus" => "google", "Pinterest" => "pinterest", "Linkedin" => "linkedin", "Tumblr" => "tumblr", "Email" => "email")
        ),
		
	)
) );

/* Social Icons
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Social Icons", "js_composer"),
    "base" => "icon_social",
    "category"  => __('Theme Features', "js_composer"),
	"icon" => "icon-wpb-share",
    "description" => __('Show the social icons', 'js_composer'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Email", "js_composer"),
            "param_name" => "email",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Twitter URL", "js_composer"),
            "param_name" => "twitter",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Facebook URL", "js_composer"),
            "param_name" => "facebook",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Dribbble URL", "js_composer"),
            "param_name" => "dribbble",
        ),
		array(
            "type" => "textfield",
            "heading" => __("RSS URL", "js_composer"),
            "param_name" => "rss",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Github URL", "js_composer"),
            "param_name" => "github",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Linkedin URL", "js_composer"),
            "param_name" => "linkedin",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Pinterest URL", "js_composer"),
            "param_name" => "pinterest",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Google Plus URL", "js_composer"),
            "param_name" => "google",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Skype URL", "js_composer"),
            "param_name" => "skype",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Soundcloud URL", "js_composer"),
            "param_name" => "soundcloud",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Youtube URL", "js_composer"),
            "param_name" => "youtube",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Tumblr URL", "js_composer"),
            "param_name" => "tumblr",
        ),
		array(
            "type" => "textfield",
            "heading" => __("Flickr URL", "js_composer"),
            "param_name" => "flickr",
        ),
		array(
			"type" => "number",
			"class" => "",
			"heading" => __("Icon Size", "js_composer"),
			"param_name" => "size",
			"value" => 30,
			"min" => 16,
			"max" => 100,
			"suffix" => "px",
			"description" => __("Select the icon size.", "js_composer")
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Select Icon Color:", "js_composer"),
			"param_name" => "icon_color",
			"value" => "#e0e0e0",
			"description" => __("Select the icon color.", "js_composer"),
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Icon Align", "js_composer"),
		  "param_name" => "align",
		  "value" => $floating
		),
		$animation,
	)
) );

/* Icons
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Icon Font", "js_composer"),
    "base" => "icon_font",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-icon-font",
    "description" => __('Put the Awesome or Metrize icon', 'js_composer'),
    "params" => array(
		// Play with icon selector
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Icon:", "js_composer"),
			"param_name" => "icon",
			"value" => array(
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
		array(
			"type" => "number",
			"class" => "",
			"heading" => __("Icon Size", "js_composer"),
			"param_name" => "size",
			"value" => 32,
			"min" => 16,
			"max" => 100,
			"suffix" => "px",
			"description" => __("Select the icon size.", "js_composer")
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Select Icon Color:", "js_composer"),
			"param_name" => "icon_color",
			"value" => "#ff6600",
			"description" => __("Select the icon color.", "js_composer"),
		),
		array(
            "type" => "textfield",
            "heading" => __("Link", "js_composer"),
            "param_name" => "link",
            "description" => __("Leave blank if you not give a link", "js_composer")
        ),
		array(
		  "type" => "dropdown",
		  "heading" => __("Icon Align", "js_composer"),
		  "param_name" => "align",
		  "value" => $floating
		),
		$animation,
	
       
	)
) );

/* Service One
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Service One", "js_composer"),
    "base" => "service_one",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-service",
    "description" => __('Service style one', 'js_composer'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Service title", "js_composer"),
            "param_name" => "title",
			"admin_label" => true,
            "description" => __("What text use as a service title. Leave blank if no title is needed.", "js_composer")
        ),
		array(
            "type" => "textarea",
            "heading" => __("Service Description", "js_composer"),
            "param_name" => "description",
            "description" => __("What text use as a service description.", "js_composer")
        ),
		// Play with icon selector
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Icon:", "js_composer"),
			"param_name" => "icon",
			"value" => array(
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
		array(
            "type" => "textfield",
            "heading" => __("More Detail Text", "js_composer"),
            "param_name" => "more",
			"value" => "More Detail",
            "description" => __("What text use as a more detail. Leave blank if no more detail is needed.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("More Detail Link", "js_composer"),
            "param_name" => "link",
            "description" => __("What link use as a more detail. Ex: http://google.com", "js_composer")
        ),
		
	
       
	)
) );

/* Service Two
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Service Two", "js_composer"),
    "base" => "service_two",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-service",
    "description" => __('Service with Icon or Image', 'js_composer'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Service title", "js_composer"),
            "param_name" => "title",
			"admin_label" => true,
            "description" => __("What text use as a service title. Leave blank if no title is needed.", "js_composer")
        ),
		array(
            "type" => "textarea",
            "heading" => __("Service Description", "js_composer"),
            "param_name" => "description",
            "description" => __("What text use as a service description.", "js_composer")
        ),
		array(
		  "type" => "dropdown",
		  "heading" => __("Align", "js_composer"),
		  "param_name" => "align",
		  "value" => array(
				"Centered" => "s_center",
				"Left" => "s_left",
				"Right" => "s_right",
			),
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Icon/Image:", "js_composer"),
			"param_name" => "icon",
			"value" => array(
				"Font Awesome Icon" => "font-awesome",
				"Metrize Icon" => "metrize",
				"Custom Image" => "custom",
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
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => "",
			"param_name" => "icon_img",
			"value" => "",
			"description" => __("Upload the custom image icon.", "js_composer"),
			"dependency" => Array("element" => "icon","value" => array("custom")),
		),
		 array(
			"type" => "textfield",
			"heading" => __("Image size", "js_composer"),
			"param_name" => "img_size",
			"description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'full' size.", "js_composer"),
			 "dependency" => Array("element" => "icon","value" => array("custom")),
		),
		array(
            "type" => "textfield",
            "heading" => __("More Detail Text", "js_composer"),
            "param_name" => "more",
            "description" => __("What text use as a more detail. Leave blank if no more detail is needed.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("More Detail Link", "js_composer"),
            "param_name" => "link",
            "description" => __("What link use as a more detail. Ex: http://google.com", "js_composer")
        ),
		$animation,
		
	
       
	)
) );

/* Icon Box
---------------------------------------------------------- */
vc_map( 
	array(
		"name"		=> __("Icon Box", "js_composer"),
		"base"		=> "icon_box",
		"icon"		=> "icon-wpb-service",
		"class"	   => "icon_box",
		"category"  => __('Theme Features', "js_composer"),
		"description" => "Adds icon box with icons",
		"controls" => "full",
		"show_settings_on_create" => true,
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Title", "js_composer"),
				"param_name" => "title",
				"admin_label" => true,
				"value" => "This is an icon box.",
				"description" => __("Provide the title for this icon box.", "js_composer"),
			),
			array(
				"type" => "textarea",
				"class" => "",
				"heading" => __("Description", "js_composer"),
				"param_name" => "desc",
				"value" => "Write a short description, that will describe the title or something informational and useful.",
				"description" => __("Provide the description for this icon box.", "js_composer")
			),
			array(
				"type" => "vc_link",
				"class" => "",
				"heading" => __("Add Link", "js_composer"),
				"param_name" => "link",
				"value" => "",
				"description" => __("Provide the link that will be applied to this icon box.", "js_composer")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Apply link to:", "js_composer"),
				"param_name" => "read_more",
				"value" => array(
					"Complete Box" => "",
					"Box Title" => "title",
					"Display Read More" => "more",
				),
				"description" => __("Select whether to use color for icon or not.", "js_composer")
			),
			// Link to traditional read more
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Read More Text", "js_composer"),
				"param_name" => "read_text",
				"value" => "Read More",
				"description" => __("Customize the read more text.", "js_composer"),
				"dependency" => Array("element" => "read_more","value" => array("more")),
			),
			
			// Play with icon selector
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon to display:", "js_composer"),
				"param_name" => "icon_type",
				"value" => array(
					"Font Awesome Icon" => "font-awesome",
					"Custom Image Icon" => "custom",
				),
				"description" => __("Select which icon you would like to use", "js_composer")
			),
			// Play with icon selector
			array(
				"type" => "icon",
				"class" => "",
				"heading" => __("Select Icon:", "js_composer"),
				"param_name" => "icon",
				"admin_label" => true,
				"value" => "android",
				"description" => __("Select the icon from the list.", "js_composer"),
				"dependency" => Array("element" => "icon_type","value" => array("font-awesome")),
			),
			// Play with icon selector
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => __("Upload Image Icon:", "js_composer"),
				"param_name" => "icon_img",
				"admin_label" => true,
				"value" => "",
				"description" => __("Upload the custom image icon.", "js_composer"),
				"dependency" => Array("element" => "icon_type","value" => array("custom")),
			),
			array(
				"type" => "number",
				"class" => "",
				"heading" => __("Icon Size", "js_composer"),
				"param_name" => "size",
				"value" => 32,
				"min" => 16,
				"max" => 100,
				"suffix" => "px",
				"description" => __("Select the icon size.", "js_composer")
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon Color:", "js_composer"),
				"param_name" => "color",
				"value" => array(
					"Use Default" => "",
					"Custom Color" => "color",
				),
				"description" => __("Select whether to use color for icon or not.", "js_composer"),
				"dependency" => Array("element" => "icon_type","value" => array("font-awesome")),
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Select Icon Color:", "js_composer"),
				"param_name" => "icon_color",
				"value" => "#89BA49",
				"description" => __("Select the icon color.", "js_composer"),
				"dependency" => array(
								"element" => "color",
								"not_empty" => true,
							),
				"dependency" => Array("element" => "icon_type","value" => array("font-awesome")),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Icon Border:", "js_composer"),
				"param_name" => "border",
				"value" => array(
					"No Border" => "",
					"Square Border" => "square",
					"Square Border With Background" => "square-solid",
					"Circle Border" => "circle",
					"Circle Border With Background" => "circle-solid",
				),
				"description" => __("Select if you want to display border around icon.", "js_composer")
			),
			array(
				"type" => "number",
				"class" => "",
				"heading" => __("Icon Border Spacing", "js_composer"),
				"param_name" => "padding",
				"value" => 5,
				"min" => 0,
				"max" => 20,
				"suffix" => "px",
				"description" => __("Select spacing between icon and border.", "js_composer"),
				"dependency" => array(
								"element" => "border",
								"not_empty" => true,
							),
			),
			array(
				"type" => "number",
				"class" => "",
				"heading" => __("Icon Border Width", "js_composer"),
				"param_name" => "width",
				"value" => "",
				"min" => 1,
				"max" => 10,
				"suffix" => "px",
				"description" => __("Select border width for icon.", "js_composer"),
				"dependency" => array(
								"element" => "border",
								"not_empty" => true,
							),
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Icon Border Color:", "js_composer"),
				"param_name" => "icon_border_color",
				"value" => "",
				"description" => __("Select the color for icon border.", "js_composer"),
				"dependency" => array(
								"element" => "border",
								"not_empty" => true,
							),
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Icon Background Color:", "js_composer"),
				"param_name" => "icon_bg_color",
				"value" => "",
				"description" => __("Select the color for icon background.", "js_composer"),
				"dependency" => array(
								"element" => "border",
								"not_empty" => true,
							),
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Box Style:", "js_composer"),
				"param_name" => "pos",
				"value" => array(
					"Icon at Left with heading" => "default",
					"Icon at Left" => "left",
					"Icon at Top" => "top",
					"Icon at Top with Box" => "top_box",
				),
				"description" => __("Select icon position. Icon box style will be changed according to the icon position.", "js_composer")
			),
			$animation,
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Extra Class", "js_composer"),
				"param_name" => "el_class",
				"value" => "",
				"description" => __("Add extra class name that will be applied to the icon box, and you can use this class for your customizations.", "js_composer"),
			),
		) 
	) 
); 


/* Images Content
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Images Content", "js_composer"),
    "base" => "images_content",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-content-image",
    "description" => __('Custom image and content', 'js_composer'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Content title", "js_composer"),
            "param_name" => "title",
			"admin_label" => true,
            "description" => __("What text use as a content title. Leave blank if no title is needed.", "js_composer")
        ),
		array(
            "type" => "textarea_html",
            "heading" => __("Content Description", "js_composer"),
            "param_name" => "description",
            "description" => __("What text use as a content description.", "js_composer")
        ),
		array(
		  "type" => "dropdown",
		  "heading" => __("Align", "js_composer"),
		  "param_name" => "align",
		  "value" => array(
				"Centered" => "s_center",
				"Left" => "s_left",
				"Right" => "s_right",
			),
		),
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => "",
			"param_name" => "content_img",
			"value" => "",
			"description" => __("Upload the custom image.", "js_composer"),
		),
		 array(
			"type" => "textfield",
			"heading" => __("Image size", "js_composer"),
			"param_name" => "img_size",
			"description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'full' size.", "js_composer"),
		),
		array(
            "type" => "textfield",
            "heading" => __("More Detail Text", "js_composer"),
            "param_name" => "more",
            "description" => __("What text use as a more detail. Leave blank if no more detail is needed.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("More Detail Link", "js_composer"),
            "param_name" => "link",
            "description" => __("What link use as a more detail. Ex: http://google.com", "js_composer")
        ),
		$animation,
	)
) );
/* List With Icon
---------------------------------------------------------- */
vc_map( array(
    "name" => __("List with Icon", "js_composer"),
    "base" => "list_icon",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-lists",
    "description" => __('List With Icon', 'js_composer'),
    "params" => array(
        array(
		  "type" => "exploded_textarea",
		  "heading" => __("List Text", "js_composer"),
		  "param_name" => "list_text",
		  "admin_label" => true,
		  "description" => __('Input lists text here. Divide list with linebreaks (Enter).', 'js_composer'),
		  "value" => "Ipsum user agent internal link validation bob rains linkscape,Directories ip delivery fake pagerank redirect nofollow link,Search engine optimization google bot social networking keyword internal"
		),
		// Play with icon selector
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Icon:", "js_composer"),
			"param_name" => "icon",
			"value" => array(
				"Font Awesome Icon" => "font-awesome",
				"Metrize Icon" => "metrize",
			
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
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Color:", "js_composer"),
			"param_name" => "icon_color",
			"value" => "",
			"description" => __("Select the color for icon.", "js_composer"),
		),
		
	)
) );

/* Pricing Table
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Pricing Table", "js_composer"),
    "base" => "pricing_table",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-table",
    "description" => __('Column of pricing table', 'js_composer'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Title", "js_composer"),
            "param_name" => "title",
			"admin_label" => true,
            "description" => __("What text use as a title table.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Pricing", "js_composer"),
            "param_name" => "table_pricing",
            "description" => __("Put the table pricing value. Ex <em>40</em>.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Currency", "js_composer"),
            "param_name" => "table_currency",
            "description" => __("Put the table currency. Ex <em>$</em>.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("time", "js_composer"),
            "param_name" => "table_time",
            "description" => __("Put the price time. Ex <em>Monthly</em>.", "js_composer")
        ),
        array(
		  "type" => "exploded_textarea",
		  "heading" => __("Table Feature", "js_composer"),
		  "param_name" => "table_feature",
		  "description" => __('Input table feature text here. Divide with linebreaks (Enter).', 'js_composer'),
		  "value" => "Up to 30 GB,Domain,24/7 services,Ads discount,Cloud hosting,Adm free,Free vacation,Free tax"
		),
		
		array(
            "type" => "textfield",
            "heading" => __("Table Button", "js_composer"),
            "param_name" => "table_button",
            "description" => __("What text use as a table button. Leave blank if no more detail is needed.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Table Button Link", "js_composer"),
            "param_name" => "table_link",
            "description" => __("What link use as a table button. Ex: http://google.com", "js_composer")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Featured", "js_composer"),
            "param_name" => "featured",
            "value" => array(__("Yes, please", "js_composer") => "yes"),
            "description" => __("Make this table be featured .", "js_composer")
        ),
	)
) );

/* Testimonial
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Testimonial", "js_composer"),
    "base" => "testimonial",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-testimonial",
    "description" => __('Client Testimonial', 'js_composer'),
    "params" => array(
		array(
            "type" => "dropdown",
            "heading" => __("Style", "js_composer"),
            "param_name" => "style",
            "value" => array(__("Style One", "js_composer") => "style1", __('Style Two', "js_composer") => 'style2'),
            "description" => __("Select the testimonial style.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Name", "js_composer"),
            "param_name" => "name",
			"admin_label" => true
        ),
		array(
            "type" => "textfield",
            "heading" => __("Company", "js_composer"),
            "param_name" => "company"
        ),
		array(
		  "type" => "attach_image",
		  "heading" => __("Image", "js_composer"),
		  "param_name" => "photo",
		  "value" => "",
		  "description" => __("Select image from media library.", "js_composer")
		),
		array(
            "type" => "textarea",
            "heading" => __("Testimoni", "js_composer"),
            "param_name" => "testimoni",
			"value" => ""
        ),
		$animation,
		
	)
) );

/* Testimonial Slider
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Testimonial Slider", "js_composer"),
    "base" => "testimonial_slider",
	"icon" => "icon-wpb-testimonial",
	"category"  => __('Theme Features', "js_composer"),
    "as_parent" => array('only' => 'testimonial_item' ),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
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
		  "type" => "dropdown",
		  "heading" => __("Auto rotate", "js_composer"),
		  "param_name" => "autoplay",
		  "value" => array(__("Disable", "js_composer") => 0, 1, 2, 3, 4, 5, 10, 15),
		  "description" => __("Auto rotate each X seconds.", "js_composer")
		),
        $animation,
    ),
    "js_view" => 'VcColumnView'
) );
vc_map( array(
    "name" => __("Testimonial Item", "js_composer"),
    "base" => "testimonial_item",
    "content_element" => true,
	"icon" => "icon-wpb-testimonial",
    "as_child" => array('only' => 'testimonial_slider'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Name", "js_composer"),
            "param_name" => "name",
			"admin_label" => true
        ),
		array(
            "type" => "textfield",
            "heading" => __("Company", "js_composer"),
            "param_name" => "company"
        ),
		array(
            "type" => "textarea",
            "heading" => __("Testimoni", "js_composer"),
            "param_name" => "testimoni",
			"value" => ""
        ),
		
    )
) );
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Testimonial_Slider extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Testimonial_Item extends WPBakeryShortCode {
    }
}

/* Counters
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Counter", "js_composer"),
    "base" => "counter",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-counter",
    "description" => __('Animated counter', 'js_composer'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Counter title", "js_composer"),
            "param_name" => "title",
            "description" => __("What text use as a counter title. Leave blank if no title is needed.", "js_composer"),
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "heading" => __("Counter value", "js_composer"),
            "param_name" => "value",
            "description" => __('Input integer value for label.', 'js_composer'),
            "value" => "3324"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Units Before", "js_composer"),
            "param_name" => "units_before",
            "description" => __("Enter measurement units (if needed) Eg. $, etc.", "js_composer")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Units after", "js_composer"),
            "param_name" => "units_after",
            "description" => __("Enter measurement units (if needed) Eg. %, px, points, etc.", "js_composer")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Colored", "js_composer"),
            "param_name" => "colored",
            "value" => array(__("Yes, please", "js_composer") => "yes"),
            "description" => __("Select this to give the color to value .", "js_composer")
        ),
		
	)
) );

/* Team
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Team", "js_composer"),
    "base" => "team_member",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-team",
    "description" => __('Team member', 'js_composer'),
    "params" => array(
		$animation,
		array(
            "type" => "textfield",
            "heading" => __("Name", "js_composer"),
            "param_name" => "name",
			"admin_label" => true,
            "description" => __("What text use as the name a member.", "js_composer")
        ),
		array(
		  "type" => "attach_image",
		  "heading" => __("Photo", "js_composer"),
		  "param_name" => "photo",
		  "value" => "",
		  "description" => __("Select image from media library.", "js_composer")
		),
		array(
            "type" => "checkbox",
            "heading" => __("Circle Photo", "js_composer"),
            "param_name" => "circle",
            "value" => array(__("Yes, please", "js_composer") => " circle")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Position", "js_composer"),
            "param_name" => "position",
            "description" => __("Input the member position. Ex <em>Designer</em>.", "js_composer")
        ),
		array(
            "type" => "textarea",
            "heading" => __("Biografi", "js_composer"),
            "param_name" => "biografi"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Email", "js_composer"),
            "param_name" => "email"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Phone", "js_composer"),
            "param_name" => "phone"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Twitter URL", "js_composer"),
            "param_name" => "twitter"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Facebook URL", "js_composer"),
            "param_name" => "facebook"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Dribbble URL", "js_composer"),
            "param_name" => "dribbble"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Rss URL", "js_composer"),
            "param_name" => "rss"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Github URL", "js_composer"),
            "param_name" => "github"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Linkedin URL", "js_composer"),
            "param_name" => "linkedin"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Pinterest URL", "js_composer"),
            "param_name" => "pinterest"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Google Plus URL", "js_composer"),
            "param_name" => "google"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Skype URL", "js_composer"),
            "param_name" => "skype"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Soundcloud URL", "js_composer"),
            "param_name" => "soundcloud"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Youtube URL", "js_composer"),
            "param_name" => "youtube"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Tumblr URL", "js_composer"),
            "param_name" => "tumblr"
        ),
		array(
            "type" => "textfield",
            "heading" => __("Flickr URL", "js_composer"),
            "param_name" => "flickr"
        ),
	)
) );

/* POST GRID
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Blog", "js_composer"),
    "base" => "posts",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-posts",
    "description" => __('Posts Layout', 'js_composer'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Widget title", "js_composer"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
        ),
		array(
			'type' => 'exploded_textarea',
			'heading' => __('Categories', 'js_composer'),
			'param_name' => 'cats',
			'description' => __('If you want to narrow output, enter category SLUG here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter).', 'js_composer')
		),
		array(
			'type' => 'textfield',
			'heading' => __('Post Count', 'js_composer'),
			'param_name' => 'number',
			'value' => 10,
			'description' => __('How many posts to show? Enter number.', 'js_composer')
		),
		array(
            "type" => "dropdown",
            "heading" => __("Columns count", "js_composer"),
            "param_name" => "column",
            "value" => array(3, 2, 1),
            "admin_label" => true,
            "description" => __("Select columns count.", "js_composer")
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout mode", "js_composer"),
            "param_name" => "layout_mode",
            "value" => array(__("Fit rows", "js_composer") => "fitRows", __('Masonry', "js_composer") => 'masonry'),
            "description" => __("Teaser layout template.", "js_composer")
        ),
		array(
            "type" => "textfield",
            "heading" => __("Excerpt length", "js_composer"),
			"value" => 50,
            "param_name" => "excerpt",
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Show social share icon", "js_composer"),
            "param_name" => "social",
            "value" => array(__("Yes, please", "js_composer") => "yes")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Show Post Meta", "js_composer"),
            "param_name" => "meta",
            "value" => array(__("Yes, please", "js_composer") => "yes")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Show read more link", "js_composer"),
            "param_name" => "more",
            "value" => array(__("Yes, please", "js_composer") => "yes")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Show pagination", "js_composer"),
            "param_name" => "pagination",
            "value" => array(__("Yes, please", "js_composer") => "yes")
        ),
	)
) );

/* POSTS CAROUSEL
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Blog Carousel", "js_composer"),
    "base" => "posts_carousel",
    "category"  => __('Theme Features', "js_composer"),
    "icon" => "icon-wpb-posts",
    "description" => __('Carousel Posts Layout', 'js_composer'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Widget title", "js_composer"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
        ),
		array(
			'type' => 'exploded_textarea',
			'heading' => __('Categories', 'js_composer'),
			'param_name' => 'cats',
			'description' => __('If you want to narrow output, enter category SLUG here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter).', 'js_composer')
		),
		array(
			'type' => 'textfield',
			'heading' => __('Post Count', 'js_composer'),
			'param_name' => 'number',
			'value' => 10,
			'description' => __('How many posts to show? Enter number.', 'js_composer')
		),
		array(
            "type" => "textfield",
            "heading" => __("Image size", "js_composer"),
            "param_name" => "img_size",
            "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'medium' size.", "js_composer")
        ),
		array(
		  "type" => "checkbox",
		  "heading" => __("Item Padding", "js_composer"),
		  "param_name" => "padding",
		  "value" => array(__("Padding on item?", "js_composer") => "carousel_padding")
		),
		array(
		  "type" => "checkbox",
		  "heading" => __("Title on Outside", "js_composer"),
		  "param_name" => "out_title",
		  "value" => array(__("Title on outside from image?", "js_composer") => "yes")
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
		
	)
) );

/* PORTFOLIO GRID
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Portfolio", "js_composer"),
    "base" => "portfolio",
    "icon" => "icon-wpb-portfolio",
	"category"  => __('Theme Features', "js_composer"),
    "description" => __('Portfolio Layout', 'js_composer'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Widget title", "js_composer"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
        ),
		array(
			'type' => 'exploded_textarea',
			'heading' => __('Portfolio Categories', 'js_composer'),
			'param_name' => 'cats',
			'description' => __('If you want to narrow output, enter category SLUG here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter).', 'js_composer')
		),
		array(
			'type' => 'textfield',
			'heading' => __('Portfolio Count', 'js_composer'),
			'param_name' => 'number',
			'value' => 10,
			'description' => __('How many portfolios to show? Enter number.', 'js_composer')
		),
		array(
            "type" => "dropdown",
            "heading" => __("Columns count", "js_composer"),
            "param_name" => "column",
            "value" => array(4, 3, 2),
            "admin_label" => true,
            "description" => __("Select columns count.", "js_composer")
        ),
		array(
            "type" => "dropdown",
            "heading" => __("Layout mode", "js_composer"),
            "param_name" => "layout_mode",
            "value" => array(__("Fit rows", "js_composer") => "fitRows", __('Masonry', "js_composer") => 'masonry'),
            "description" => __("Teaser layout template.", "js_composer")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Without padding/space", "js_composer"),
            "param_name" => "padding",
            "value" => array(__("Yes, please", "js_composer") => "yes")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Show filters", "js_composer"),
            "param_name" => "filters",
            "value" => array(__("Yes, please", "js_composer") => "yes")
        ),
		array(
            "type" => "checkbox",
            "heading" => __("With description", "js_composer"),
            "param_name" => "desc",
            "value" => array(__("Yes, please", "js_composer") => "yes")
        ),
		array(
		  "type" => "dropdown",
		  "heading" => __("With description", "js_composer"),
		  "param_name" => "desc",
		  "value" => array(
					"No" => "",
					"Yes" => "yes",
				),
		),
		array(
            "type" => "textfield",
            "heading" => __("Excerpt length", "js_composer"),
            "param_name" => "excerpt",
			"dependency" => Array('element' => "desc", 'value' => array('yes')),
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Show Category Info", "js_composer"),
            "param_name" => "cats_info",
            "value" => array(__("Yes, please", "js_composer") => "yes"),
			 "dependency" => Array('element' => "desc", 'value' => array('yes')),
        ),
		array(
		  "type" => "dropdown",
		  "heading" => __("Show View Project Text", "js_composer"),
		  "param_name" => "view_project",
		  "value" => array(
					"No" => "",
					"Yes" => "yes",
				),
		  "dependency" => Array('element' => "desc", 'value' => array('yes')),
		),
		array(
            "type" => "textfield",
            "heading" => __("View Project Text", "js_composer"),
			"value" => 'View Project',
            "param_name" => "view_project_text",
			"dependency" => Array('element' => "view_project", 'value' => array('yes')),
        ),
		array(
            "type" => "checkbox",
            "heading" => __("Show pagination", "js_composer"),
            "param_name" => "pagination",
            "value" => array(__("If you activated pagination, filtered category will not showing.", "js_composer") => "yes")
        ),
		
	)
) );

/* PORTFOLIO CAROUSEL
---------------------------------------------------------- */
vc_map( array(
    "name" => __("Portfolio Carousel", "js_composer"),
    "base" => "portfolio_carousel",
    "icon" => "icon-wpb-portfolio",
	"category"  => __('Theme Features', "js_composer"),
    "description" => __('Carousel Portfolio Layout', 'js_composer'),
    "params" => array(
		array(
            "type" => "textfield",
            "heading" => __("Widget title", "js_composer"),
            "param_name" => "title",
            "description" => __("What text use as a widget title. Leave blank if no title is needed.", "js_composer")
        ),
		array(
			'type' => 'exploded_textarea',
			'heading' => __('Portfolio Categories', 'js_composer'),
			'param_name' => 'cats',
			'description' => __('If you want to narrow output, enter category SLUG here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter).', 'js_composer')
		),
		array(
			'type' => 'textfield',
			'heading' => __('Portfolios Count', 'js_composer'),
			'param_name' => 'number',
			'value' => 10,
			'description' => __('How many portfolios to show? Enter number.', 'js_composer')
		),
		array(
            "type" => "textfield",
            "heading" => __("Image size", "js_composer"),
            "param_name" => "img_size",
            "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'medium' size.", "js_composer")
        ),
		 array(
		  "type" => "checkbox",
		  "heading" => __("Item Padding", "js_composer"),
		  "param_name" => "padding",
		  "value" => array(__("Padding on item?", "js_composer") => "carousel_padding")
		),
		array(
		  "type" => "checkbox",
		  "heading" => __("Title on Outside", "js_composer"),
		  "param_name" => "out_title",
		  "value" => array(__("Title on outside from image?", "js_composer") => "yes")
		),
		array(
		  "type" => "dropdown",
		  "heading" => __("Show view all portfolio button", "js_composer"),
		  "param_name" => "view_portfolio",
		  "value" => array(
					"No" => "",
					"Yes" => "yes",
				),
		),
		array(
            "type" => "textfield",
            "heading" => __("View all portfolio Text", "js_composer"),
			"value" => 'View All',
            "param_name" => "view_portfolio_text",
			"dependency" => Array('element' => "view_portfolio", 'value' => array('yes')),
        ),
		array(
            "type" => "textfield",
            "heading" => __("View all portfolio URL", "js_composer"),
			"value" => '#',
            "param_name" => "view_portfolio_url",
			"dependency" => Array('element' => "view_portfolio", 'value' => array('yes')),
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
		
	)
) );
