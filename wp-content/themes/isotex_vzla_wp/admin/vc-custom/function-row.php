<?php
// Row Style Functions
function rowImage($row_bg, $bg_paralax, $bg_image, $bg_color, $bg_image_repeat, $padding_top, $padding_bottom, $margin_top, $margin_bottom, $border_top, $border_bottom) {
        $has_image = false;
        $style = '';
        if((int)$bg_image > 0 && ($image_url = wp_get_attachment_url( $bg_image, 'full' )) !== false && $row_bg=='image') {
            $has_image = true;
            $style .= "background-image:url(".$image_url."); ";
        }
        if(!empty($bg_color) && $row_bg != 'video' && $row_bg != 'html5_video') {
            $style .= 'background-color:'.$bg_color.'; ';
        }
        if(!empty($bg_image_repeat) && $has_image) {
            if($bg_image_repeat === 'cover') {
                $style .= "background-repeat:no-repeat; background-size:cover; ";
            } elseif($bg_image_repeat === 'contain') {
                $style .= "background-repeat:no-repeat; background-size:contain; ";
            } elseif($bg_image_repeat === 'no-repeat') {
                $style .= 'background-repeat: no-repeat; ';
            }elseif($bg_image_repeat === 'repeat-x') {
                $style .= 'background-repeat: repeat-x; ';
            }elseif($bg_image_repeat === 'repeat-y') {
                $style .= 'background-repeat: repeat-y; ';
            }elseif($bg_image_repeat === 'repeat') {
                $style .= 'background-repeat: repeat; ';
            }
        }
		if($bg_paralax=='yes' && $has_image) {
			$style .= 'background-attachment:fixed; ';
		}
        if( $padding_top != '' ) {
            $style .= 'padding-top:'.(preg_match('/(px|em|\%|pt|cm)$/', $padding_top) ? $padding_top : $padding_top.'px').'; ';
        }
		if( $padding_bottom != '' ) {
            $style .= 'padding-bottom:'.(preg_match('/(px|em|\%|pt|cm)$/', $padding_bottom) ? $padding_bottom : $padding_bottom.'px').'; ';
        }
		if( $margin_top != '' ) {
            $style .= 'margin-top:'.(preg_match('/(px|em|\%|pt|cm)$/', $margin_top) ? $margin_top : $margin_top.'px').'; ';
        }
        if( $margin_bottom != '' ) {
            $style .= 'margin-bottom:'.(preg_match('/(px|em|\%|pt|cm)$/', $margin_bottom) ? $margin_bottom : $margin_bottom.'px').'; ';
        }
		if( $border_top != '' ) {
            $style .= 'border-top:1px solid '.$border_top.'; ';
        }
		if( $border_bottom != '' ) {
            $style .= 'border-bottom:1px solid '.$border_bottom.'; ';
        }
        return empty($style) ? $style : ' style="'.$style.'"';
}
function rowVideo($bg_video = '', $video_raster = '', $video_autoplay = '', $video_mute = '', $video_control = '', $video_opacity = '', $video_quality = '') {
		$video = '';
		if( $bg_video != '' ) {
			$video .= "videoURL:'".$bg_video."',";
		}
		$video .= "containment:'self',";
		if( $video_autoplay != '' ) {
			$video .= "autoPlay:true,";
		}
		else{
			$video .= "autoPlay:false,";
		}
		if( $video_mute != '' ) {
			$video .= "mute:true,";
		}
		else{
			$video .= "mute:false,";
		}
		$video .= "startAt:0,";
		$video .= "opacity:".$video_opacity.",";
		$video .= "addRaster:true,";
		if( $video_raster != '' ) {
			$video .= "addRaster:true,";
		}
		else{
			$video .= "addRaster:false,";
		}
		$video .= "quality:'".$video_quality."',";
		if( $video_control != '' ) {
			$video .= "showControls:true,";
		}
		else{
			$video .= "showControls:false,";
		}
		$video .= "optimizeDisplay:true";
		return empty($video) ? $video : ' data-property="{'.$video.',optimizeDisplay:true}" ';
}