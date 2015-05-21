<?php
add_filter( 'oembed_fetch_url','add_param_oembed_fetch_url', 10, 3);
add_filter( 'oembed_result', 'add_player_id_to_iframe', 10, 3);

/** add extra parameters to vimeo request api (oEmbed) */
function add_param_oembed_fetch_url( $provider, $url, $args) {
    // unset args that WP is already taking care
    $newargs = $args;
    unset( $newargs['discover'] );
    unset( $newargs['width'] );
    unset( $newargs['height'] );

    // build the query url
    $parameters = urlencode( http_build_query( $newargs ) );

    return $provider . '&'. $parameters;
}

/** add player id to iframe id on vimeo */
function add_player_id_to_iframe( $html, $url, $args ) {
    if( isset( $args['player_id'] ) ) {
        $html = str_replace( '<iframe', '<iframe id="'. $args['player_id'] .'"', $html );
    }
    return $html;
}

// Filter video output
add_filter('oembed_result','lc_oembed_result', 10, 3);
function lc_oembed_result($html, $url, $args) {
 
    // $args includes custom argument
 
	$newargs = $args;
	// get rid of discover=true argument
	array_pop( $newargs );
 
	$parameters = http_build_query( $newargs );
 
	// Modify video parameters
	$html = str_replace( '?feature=oembed', '?feature=oembed'.'&amp;'.$parameters, $html );
 
    return $html;
}

// Category Widget Customize
add_filter('wp_list_categories', 'add_span_count');
function add_span_count($links) {
	$links = str_replace('</a> (', '<span>(', $links);
	$links = str_replace(')', ')</span> </a>', $links);
	return $links;
}

// Archives Widget Customize
add_filter('get_archives_link', 'archive_count_inline');
function archive_count_inline($links) {
	$links = str_replace('</a>&nbsp;(', '<span>(', $links);
	$links = str_replace(')', ')</span> </a>', $links);
	return $links;
}

// Tags Widget Customize
add_filter ( 'wp_tag_cloud', 'tag_cloud_class' );
function tag_cloud_class( $return ) {
	$tags = explode(',', $return);
	foreach( $tags as $tag ) {
	$class[] = str_replace('tag-link', 'toptip tag-link', $tag);
	}
	$return = implode(',', $class);
return $return;
}
// ------ Get rid of the font-size on the tagcloud widget ------//
add_filter( "widget_tag_cloud_args", 'my_widget_tag_cloud_args' );
function my_widget_tag_cloud_args( $args ) {
	$args['largest'] = 12;
	$args['smallest'] = 12;
	$args['number'] = 14;
	$args['unit'] = 'px';
	return $args;
}


//String Limit by words
function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function string_limit_words($string, $word_limit)
{
	if($word_limit!=0 && $word_limit!=''){
		$words = explode(' ', $string, ($word_limit + 1));
		
		if(count($words) > $word_limit) {
			array_pop($words);
		}
		
		return implode(' ', $words);
	}
	else{
		return;
	}
}
function excerpt($limit) {
	if($limit!='' && $limit !=0){
		  $excerpt = explode(' ', get_the_excerpt(), $limit);
		  if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		  } else {
			$excerpt = implode(" ",$excerpt);
		  }	
		  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		  return $excerpt;
	}
	else{
		return;
	}
}

// Check Widgets is found
function is_sidebar_active($index) {
	global $wp_registered_sidebars;

	$widgetcolums = wp_get_sidebars_widgets();

	if ($widgetcolums[$index])
		return true;

	return false;
}

// Pagination
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='clear'></div><div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='pagi arrow' href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a class='pagi arrow' href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='pagi current'>".$i."</span>":"<a class='pagi' href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a class='pagi arrow' href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='pagi arrow' href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}
function new_pagination($pages = '', $range = 2)
{  
	$out='';
    $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         $out.= "<div class='clear'></div><div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) $out.= "<a class='pagi arrow' href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) $out.= "<a class='pagi arrow' href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                $out.= ($paged == $i)? "<span class='pagi current'>".$i."</span>":"<a class='pagi inactive' href='".get_pagenum_link($i)."' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) $out.= "<a class='pagi arrow' href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $out.= "<a class='pagi arrow' href='".get_pagenum_link($pages)."'>&raquo;</a>";
         $out.= "</div>\n";
     }
	 return $out;
}

// Comments Count
function comments_count($disqus_shortname){
	if($disqus_shortname){
		$write_comments = '<script type="text/javascript">
		var disqus_shortname = "'.$disqus_shortname.'";
		(function () {
		var s = document.createElement("script"); s.async = true;
		s.type = "text/javascript";
		s.src = "http://" + disqus_shortname + ".disqus.com/count.js";
		(document.getElementsByTagName("HEAD")[0] || document.getElementsByTagName("BODY")[0]).appendChild(s);
		}());
	</script><a href="'. get_permalink( get_the_ID() ) .'#disqus_thread"></a>';
	}
	else{
		$num_comments = get_comments_number();
		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				$comments = __('No Comments','orion');
			} elseif ( $num_comments > 1 ) {
				$comments = $num_comments . __(' Comments','orion');
			} else {
				$comments = __('1 Comment','orion');
			}
				$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
		} else {
			$write_comments =  __('Comments off','orion');
		}
	}
	return $write_comments;
}

// Post Nav Custom
function filter_next_post_link($link) {
    global $post;
    $link = str_replace("rel=", 'class="toptip" title="'.__('Next','corporative').'" rel=', $link);
    return $link;
}
add_filter('next_post_link', 'filter_next_post_link');
function filter_previous_post_link($link) {
    global $post;
    $link = str_replace("rel=", 'class="toptip" title="'.__('Previous','corporative').'" rel=', $link);
    return $link;
}
add_filter('previous_post_link', 'filter_previous_post_link');

// ----- Disqus Comment -------//
function disqus_embed($disqus_shortname) {
	if($disqus_shortname){
		global $post;
		wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
		echo '<div id="disqus_thread"></div>
		<script type="text/javascript">
			var disqus_shortname = "'.$disqus_shortname.'";
			var disqus_title = "'.$post->post_title.'";
			var disqus_url = "'.get_permalink($post->ID).'";
			var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
		</script>';
	}
	else{
		echo 'Make sure you have input your disqus <strong>shortname</strong>. Go to here <strong><em>Appearances->Theme Options->General->Disqus Shortname</em></strong>';
	}
}

// ----- Upload Mimes -------//
add_filter('upload_mimes', 'corp_filter_mime_types');
function corp_filter_mime_types($mimes)
{
	$mimes['ttf'] = 'font/ttf';
	$mimes['woff'] = 'font/woff';
	$mimes['svg'] = 'font/svg';
	$mimes['eot'] = 'font/eot';

	return $mimes;
}

// ----- Google Analytics -------//
function google_analytics(){
	$output = rd_options('reedwan_analytic');
	if ( $output <> "" )
		echo stripslashes($output) . "\n";
}
add_action( 'wp_footer','google_analytics' );


// add conditional statements for mobile devices
function is_ipad() {
	$is_ipad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
	if ($is_ipad)
		return true;
	else return false;
}
function is_iphone() {
	$cn_is_iphone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPhone');
	if ($cn_is_iphone)
		return true;
	else return false;
}
function is_ipod() {
	$cn_is_iphone = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPod');
	if ($cn_is_iphone)
		return true;
	else return false;
}
function is_ios() {
	if (is_iphone() || is_ipad() || is_ipod())
		return true;
	else return false;
}
function is_android() { // detect ALL android devices
	$is_android = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');
	if ($is_android)
		return true;
	else return false;
}
function is_android_mobile() { // detect ALL android devices
	$is_android   = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');
	$is_android_m = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Mobile');
	if ($is_android && $is_android_m)
		return true;
	else return false;
}
function is_android_tablet() { // detect android tablets
	if (is_android() && !is_android_mobile())
		return true;
	else return false;
}
function is_mobile_device() { // detect ALL mobile devices
	if (is_android_mobile() || is_iphone() || is_ipod())
		return true;
	else return false;
}
function is_tablet() { // detect ALL tablets
	if ((is_android() && !is_android_mobile()) || is_ipad())
		return true;
	else return false;
}

// add browser name to body class
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome, $is_iphone;
	if(!wp_is_mobile()) {
		if($is_gecko) $classes[] = 'browser-gecko';
		elseif($is_opera) $classes[] = 'browser-opera';
		elseif($is_safari) $classes[] = 'browser-safari';
		elseif($is_chrome) $classes[] = 'browser-chrome';
        elseif($is_IE) {
            $classes[] = 'browser-ie';
            if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
            $classes[] = 'ie-version-'.$browser_version[1];
        }
		else $classes[] = 'browser-unknown';
	} else {
    	if(is_iphone()) $classes[] = 'browser-iphone';
        elseif(is_ipad()) $classes[] = 'browser-ipad';
        elseif(is_ipod()) $classes[] = 'browser-ipod';
        elseif(is_android()) $classes[] = 'browser-android';
        elseif(is_tablet()) $classes[] = 'device-tablet';
        elseif(is_mobile_device()) $classes[] = 'device-mobile';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false) $classes[] = 'browser-kindle';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false) $classes[] = 'browser-blackberry';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) $classes[] = 'browser-opera-mini';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false) $classes[] = 'browser-opera-mobi';
	}
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'Windows') !== false) $classes[] = 'os-windows';
        elseif(is_android()) $classes[] = 'os-android';
        elseif(is_ios()) $classes[] = 'os-ios';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Macintosh') !== false) $classes[] = 'os-mac';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Linux') !== false) $classes[] = 'os-linux';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false) $classes[] = 'os-kindle';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false) $classes[] = 'os-blackberry';
	return $classes;
}

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
?>