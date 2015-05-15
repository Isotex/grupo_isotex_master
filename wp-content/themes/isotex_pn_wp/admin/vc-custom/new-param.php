<?php
function number_settings_field($settings, $value)
{
	$dependency = vc_generate_dependencies_attributes($settings);
	$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	$type = isset($settings['type']) ? $settings['type'] : '';
	$min = isset($settings['min']) ? $settings['min'] : '';
	$max = isset($settings['max']) ? $settings['max'] : '';
	$suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
	$class = isset($settings['class']) ? $settings['class'] : '';
	$output = '<input type="number" min="'.$min.'" max="'.$max.'" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" style="max-width:100px; margin-right: 10px;" />'.$suffix;
	return $output;
}
add_shortcode_param('number', 'number_settings_field');

function typetaxonomy_settings_field($settings, $value)
{
	$dependency = vc_generate_dependencies_attributes($settings);
	$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	$type = isset($settings['type']) ? $settings['type'] : '';
	$postype = isset($settings['postype']) ? $settings['postype'] : '';
	$taxonomies_array = getTaxonomies();
	$output = '';
	
	
		foreach($taxonomies_array as $taxonomy)
		{
			$output .= '<input type="radio" name="'.$taxonomy.'" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . '">';
			$output .= '<label for="'. $param_name .'">'.$taxonomy.'</label>';
		}
	
	
	return $output;
}
add_shortcode_param('typetaxonomy', 'typetaxonomy_settings_field');

function radioimage_settings_field($settings, $value)
{
	$dependency = vc_generate_dependencies_attributes($settings);
	$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	$type = isset($settings['type']) ? $settings['type'] : '';
	$radios = isset($settings['options']) ? $settings['options'] : '';
	$output = '';
	if($radios != '' && is_array($radios))
	{
		foreach($radios as $radio => $img)
		{
			$output .= '<input type="radio" name="'.$radio.'" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . '">';
			$output .= '<label for="'. $param_name .'"><img src="'.$img.'"></label>';
		}
	}
	return $output;
}
add_shortcode_param('radioimage', 'radioimage_settings_field');

function icon_settings_field($settings, $value)
{
	$dependency = vc_generate_dependencies_attributes($settings);
	$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	$type = isset($settings['type']) ? $settings['type'] : '';
	$class = isset($settings['class']) ? $settings['class'] : '';
	$icons = array('ambulance','h-square','hospital-o','medkit','plus-square','stethoscope','user-md','wheelchair','adn','android','apple','bitbucket','bitbucket-square','bitcoin','btc','css3','dribbble','dropbox','facebook','facebook-square','flickr','foursquare','github','github-alt','github-square','gittip','google-plus','google-plus-square','html5','instagram','linkedin','linkedin-square','linux','maxcdn','pagelines','pinterest','pinterest-square','renren','skype','stack-exchange','stack-overflow','trello','tumblr','tumblr-square','twitter','twitter-square','vimeo-square','vk','weibo','windows','xing','xing-square','youtube','youtube-play','youtube-square','arrows-alt','backward','compress','eject','expand','fast-backward','fast-forward','forward','pause','play','play-circle','play-circle-o','step-backward','step-forward','stop','youtube-play','rub','ruble','rouble','pagelines','stack-exchange','arrow-circle-o-right','arrow-circle-o-left','caret-square-o-left','toggle-left','dot-circle-o','wheelchair','vimeo-square','try','turkish-lira','plus-square-o','adjust','anchor','archive','arrows','arrows-h','arrows-v','asterisk','ban','bar-chart-o','barcode','bars','beer','bell','bell-o','bolt','book','bookmark','bookmark-o','briefcase','bug','building-o','bullhorn','bullseye','calendar','calendar-o','camera','camera-retro','caret-square-o-down','caret-square-o-left','caret-square-o-right','caret-square-o-up','certificate','check','check-circle','check-circle-o','check-square','check-square-o','circle','circle-o','clock-o','cloud','cloud-download','cloud-upload','code','code-fork','coffee','cog','cogs','comment','comment-o','comments','comments-o','compass','credit-card','crop','crosshairs','cutlery','dashboard','desktop','dot-circle-o','download','edit','ellipsis-h','ellipsis-v','envelope','envelope-o','eraser','exchange','exclamation','exclamation-circle','exclamation-triangle','external-link','external-link-square','eye','eye-slash','female','fighter-jet','film','filter','fire','fire-extinguisher','flag','flag-checkered','flag-o','flash','flask','folder','folder-o','folder-open','folder-open-o','frown-o','gamepad','gavel','gear','gears','gift','glass','globe','group','hdd-o','headphones','heart','heart-o','home','inbox','info','info-circle','key','keyboard-o','laptop','leaf','legal','lemon-o','level-down','level-up','lightbulb-o','location-arrow','lock','magic','magnet','mail-forward','mail-reply','mail-reply-all','male','map-marker','meh-o','microphone','microphone-slash','minus','minus-circle','minus-square','minus-square-o','mobile','mobile-phone','money','moon-o','music','pencil','pencil-square','pencil-square-o','phone','phone-square','picture-o','plane','plus','plus-circle','plus-square','plus-square-o','power-off','print','puzzle-piece','qrcode','question','question-circle','quote-left','quote-right','random','refresh','reply','reply-all','retweet','road','rocket','rss','rss-square','search','search-minus','search-plus','share','share-square','share-square-o','shield','shopping-cart','sign-in','sign-out','signal','sitemap','smile-o','sort','sort-alpha-asc','sort-alpha-desc','sort-amount-asc','sort-amount-desc','sort-asc','sort-desc','sort-down','sort-numeric-asc','sort-numeric-desc','sort-up','spinner','square','square-o','star','star-half','star-half-empty','star-half-full','star-half-o','star-o','subscript','suitcase','sun-o','superscript','tablet','tachometer','tag','tags','tasks','terminal','thumb-tack','thumbs-down','thumbs-o-down','thumbs-o-up','thumbs-up','ticket','times','times-circle','times-circle-o','tint','toggle-down','toggle-left','toggle-right','toggle-up','trash-o','trophy','truck','umbrella','unlock','unlock-alt','unsorted','upload','user','users','video-camera','volume-down','volume-off','volume-up','warning','wheelchair','wrench','check-square','check-square-o','circle','circle-o','dot-circle-o','minus-square','minus-square-o','plus-square','plus-square-o','square','square-o','bitcoin','btc','cny','dollar','eur','euro','gbp','inr','jpy','krw','money','rmb','rouble','rub','ruble','rupee','try','turkish-lira','usd','won','align-center','align-justify','align-left','align-right','bold','chain','chain-broken','clipboard','columns','copy','cut','dedent','eraser','file','file-o','file-text','file-text-o','files-o','floppy-o','font','indent','italic','link','list','list-alt','list-ol','list-ul','outdent','paperclip','paste','repeat','rotate-left','rotate-right','save','scissors','strikethrough','table','text-height','text-width','th','th-large','th-list','underline','undo','unlink','angle-double-down','angle-double-left','angle-double-right','angle-double-up','angle-down','angle-left','angle-right','angle-up','arrow-circle-down','arrow-circle-left','arrow-circle-o-down','arrow-circle-o-left','arrow-circle-o-right','arrow-circle-o-up','arrow-circle-right','arrow-circle-up','arrow-down','arrow-left','arrow-right','arrow-up','arrows','arrows-alt','arrows-h','arrows-v','caret-down','caret-left','caret-right','caret-square-o-down','caret-square-o-left','caret-square-o-right','caret-square-o-up','caret-up','chevron-circle-down','chevron-circle-left','chevron-circle-right','chevron-circle-up','chevron-down','chevron-left','chevron-right','chevron-up','hand-o-down','hand-o-left','hand-o-right','hand-o-up','long-arrow-down','long-arrow-left','long-arrow-right','long-arrow-up','toggle-down','toggle-left','toggle-right','toggle-up',);

	$output = '<input type="hidden" name="'.$param_name.'" class="wpb_vc_param_value '.$param_name.' '.$type.' '.$class.'" value="'.$value.'" id="trace1"/>
			<div class="icon-preview icon-preview1"><i class=" fa fa-'.$value.'"></i></div>';
	$output .='<input class="search" id="search1" type="text" placeholder="Search" />';
	$output .='<div id="icon-dropdown" class="icon-drop">';
	$output .= '<ul class="icon-list" id="icon-list1">';
	$n = 1;
	foreach($icons as $icon)
	{
		$selected = ($icon == $value) ? 'class="selected"' : '';
		$id = 'icon-'.$n;
		$output .= '<li '.$selected.' data-awesome="'.$icon.'"><i class="icon fa fa-'.$icon.'"></i><label class="icon">'.$icon.'</label></li>';
		$n++;
	}
	$output .='</ul>';
	$output .='</div>';
	$output .= '<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#search1").keyup(function(){
			 
					// Retrieve the input field text and reset the count to zero
					var filter = jQuery(this).val(), count = 0;
			 
					// Loop through the icon list
					jQuery("#icon-list1 li").each(function(){
			 
						// If the list item does not contain the text phrase fade it out
						if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
							jQuery(this).fadeOut();
						} else {
							jQuery(this).show();
							count++;
						}
					});
				});
			});

			jQuery("#icon-dropdown li").click(function() {
				jQuery(this).attr("class","selected").siblings().removeAttr("class");
				var icon1 = jQuery(this).attr("data-awesome");
				jQuery("#trace1").val(icon1);
				jQuery(".icon-preview1").html("<i class=\'icon fa fa-"+icon1+"\'></i>");
			});
	</script>';
	return $output;
}
add_shortcode_param('icon', 'icon_settings_field');

function icon2_settings_field($settings, $value)
{
	$dependency = vc_generate_dependencies_attributes($settings);
	$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	$type = isset($settings['type']) ? $settings['type'] : '';
	$class = isset($settings['class']) ? $settings['class'] : '';
	$icons = array('yen', 'world', 'wireframe-globe', 'wind', 'wifi', 'waves', 'viewport', 'viewport-video', 'user', 'user-remove', 'user-ban', 'user-add', 'upload', 'upload-selection', 'upload-selection-circle', 'underline', 'triple-points', 'top-bottom', 'three-points', 'three-points-top', 'three-points-bottom', 'text-width', 'text-size-upper', 'text-size-reduce', 'text-paragraph', 'text-normal', 'text-justify-right', 'text-justify-left', 'text-justify-center', 'text-height', 'text-center', 'text-bold', 'text-align-right', 'text-align-left', 'telephone', 'sunshine', 'sun', 'stop', 'star', 'speed', 'sound-on', 'sound-off', 'sos', 'social-zerply', 'social-youtube', 'social-yelp', 'social-yahoo', 'social-wordpress', 'social-virb', 'social-vimeo', 'social-viddler', 'social-twitter', 'social-tumblr', 'social-stumbleupon', 'social-soundcloud', 'social-skype', 'social-sharethis', 'social-quora', 'social-pinterest', 'social-photobucket', 'social-paypal', 'social-myspace', 'social-linkedin', 'social-last-fm', 'social-grooveshark', 'social-google-plus', 'social-github', 'social-forrst', 'social-flickr', 'social-facebook', 'social-evernote', 'social-envato', 'social-email', 'social-dribbble', 'social-digg', 'social-deviantart', 'social-blogger', 'social-behance', 'social-bebo', 'social-addthis', 'social-500px', 'snow', 'sliders', 'sliders-vertical', 'sign-male', 'sign-female', 'shield', 'settings', 'setting', 'select-square', 'select-circle', 'search', 'scale', 'rules', 'rss', 'retweet', 'report-comment', 'refresh', 'rec', 'random', 'quote', 'question', 'previous-fast-step', 'prev-step', 'pounds', 'podcast', 'plus', 'play', 'pin', 'pin-map', 'pig-money', 'pause', 'paperclip', 'paperclip-oblique', 'options-settings', 'officine', 'officine-2', 'off', 'number-zero', 'number-two', 'number-three', 'number-six', 'number-seven', 'number-one', 'number-nine', 'number-four', 'number-five', 'number-eight', 'next-step', 'next-fast-step', 'music', 'multi-borders', 'minus', 'marker', 'marker-points', 'marker-minus', 'marker-add', 'map', 'male-symbol', 'mailbox', 'mail', 'magnet', 'magic-wand', 'login-lock-refresh', 'locked', 'location', 'location-maps', 'list-square', 'list-circle', 'link-url', 'line-through', 'limit-directions', 'like-upload', 'like-remove', 'like-download', 'like-close', 'like-ban', 'like-add', 'left-right', 'leaf', 'layers', 'landscape', 'key', 'italic', 'info', 'idea', 'home-wifi', 'heart', 'hdd', 'hdd-raid', 'hdd-net', 'grids', 'grid-big', 'graphs', 'forward', 'fire', 'female-symbol', 'eye', 'eye-disabled', 'expand', 'expand-vertical', 'expand-horizontal', 'expand-directions', 'exclamation', 'euro', 'email-upload', 'email-spam', 'email-remove', 'email-luminosity', 'email-download', 'email-close', 'email-add', 'eject', 'drops', 'drop', 'download', 'download-selection', 'download-selection-circle', 'double-diamonds', 'dot-square', 'dot-line', 'dot-circle', 'dollar', 'documents', 'document', 'document-fill', 'directions', 'cross', 'credit-card', 'copy-paste-document', 'copy-document', 'contract-vertical', 'contract-horizontal', 'contract-directions', 'compass', 'compass-2', 'comments', 'comment', 'coins', 'cloud', 'cloud-upload', 'cloud-remove', 'cloud-download', 'cloud-add', 'clock', 'circles', 'check', 'chat', 'chart-down', 'cd-dvd-rom', 'camera', 'button-question', 'button-minus', 'button-exclamation', 'button-email', 'button-close', 'button-check', 'button-add', 'brush', 'browser-sizes', 'box-remove', 'box-close', 'box-blank', 'box-add', 'bolt', 'block-menu', 'blank', 'bezier', 'bars', 'ban-circle', 'bag', 'backward', 'axis-rules', 'atom', 'arrow-up', 'arrow-up-thin', 'arrow-up-light', 'arrow-up-bold', 'arrow-up-bold-round', 'arrow-up-big', 'arrow-right', 'arrow-right-thin', 'arrow-right-light', 'arrow-right-bold', 'arrow-right-bold-round', 'arrow-right-big', 'arrow-oblique-expand', 'arrow-oblique-expand-directions', 'arrow-oblique-contract', 'arrow-oblique-contract-directions', 'arrow-multi-line-up', 'arrow-multi-line-right', 'arrow-multi-line-left', 'arrow-multi-line-down', 'arrow-left', 'arrow-left-thin', 'arrow-left-light', 'arrow-left-bold', 'arrow-left-bold-round', 'arrow-left-big', 'arrow-fill-up', 'arrow-fill-right', 'arrow-fill-left', 'arrow-fill-down', 'arrow-down', 'arrow-down-thin', 'arrow-down-light', 'arrow-down-bold', 'arrow-down-bold-round', 'arrow-down-big', 'arrow-cycling', 'arrow-cycle', 'arrow-curve-right', 'arrow-curve-recycle', 'arrow-curve-left', 'animal-footprint', 'alarm-clock', 'air-plane', 'adjust', 'cube');

	$output = '<input type="hidden" name="'.$param_name.'" class="wpb_vc_param_value '.$param_name.' '.$type.' '.$class.'" value="'.$value.'" id="trace2"/>
			<div class="icon-preview icon-preview2"><i class=" icons-'.$value.'"></i></div>';
	$output .='<input class="search" id="search2" type="text" placeholder="Search" />';
	$output .='<div id="icon-dropdown2" class="icon-drop">';
	$output .= '<ul class="icon-list" id="icon-list2">';
	$n = 1;
	foreach($icons as $icon)
	{
		$selected = ($icon == $value) ? 'class="selected"' : '';
		$id = 'icon-'.$n;
		$output .= '<li '.$selected.' data-metrize="'.$icon.'"><i class="icon icons-'.$icon.'"></i><label class="icon">'.$icon.'</label></li>';
		$n++;
	}
	$output .='</ul>';
	$output .='</div>';
	$output .= '<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("#search2").keyup(function(){
			 
					// Retrieve the input field text and reset the count to zero
					var filter = jQuery(this).val(), count = 0;
			 
					// Loop through the icon list
					jQuery("#icon-list2 li").each(function(){
			 
						// If the list item does not contain the text phrase fade it out
						if (jQuery(this).text().search(new RegExp(filter, "i")) < 0) {
							jQuery(this).fadeOut();
						} else {
							jQuery(this).show();
							count++;
						}
					});
				});
			});

			jQuery("#icon-dropdown2 li").click(function() {
				jQuery(this).attr("class","selected").siblings().removeAttr("class");
				var icon2 = jQuery(this).attr("data-metrize");
				jQuery("#trace2").val(icon2);
				jQuery(".icon-preview2").html("<i class=\'icon icons-"+icon2+"\'></i>");
			});
	</script>';
	return $output;
}
add_shortcode_param('icon2', 'icon2_settings_field');

