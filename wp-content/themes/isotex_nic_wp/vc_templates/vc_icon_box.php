<?php
if (!defined('ABSPATH')) die('-1');
add_shortcode( 'icon_box', 'icon_box' );

function icon_box($atts)
		{
			$out = $pos = $css_class = '';
			extract(shortcode_atts(array(
				'title'	  => '',
				'desc'	   => '',
				'link'	   => '',
				'icon_type'  => '',
				'icon_img'   => '',
				'icon'	   => '',
				'size'	   => '',
				'icon_color' => '',
				'color' 	  => '',
				'border'	 => '',
				'icon_border_color' => '',
				'icon_bg_color' => '',
				'pos'	    => '',
				'read_more'  => '',
				'read_text'  => '',
				'padding'	=> '',
				'width'	  => '',
				'el_class'	  => '',
				'css_animation'  => '',
				),$atts,'icon-box'));
			$animated = $animated_data = '';
			if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
			$html = '';
			$prefix = '<div class="wpb_content_element rdicon-component '.$el_class.$animated.'"'.$animated_data.'>';
			$suffix = '</div>';
			
			$ex_class = $xstyle =$ystyle = $half_size = '';
			if($border==''){
				$padding = 0;
				$width = 0;
				$icon_bg_color ='';
			}
			$half_size = ($size+($padding*2)+($width*2))/2;
			if($pos == 'top_box'){
				$xstyle = ' style="top:-'.$half_size.'px; "';
				$ystyle = ' style="margin-top:'.$half_size.'px; "';
			}
			if($pos != ''){
				$ex_class .= ' icon-'.$pos;
			}
			if($border != ''){
				$ex_class .= ' icon-'.$border;
			}
			$html .= '<div class="rdicon-box '.$ex_class.'"'.$ystyle.'>';
				if($icon_type == 'font-awesome')
				{
					$html .= '<div class="rdicon-icon"'.$xstyle.'>';
					$class = 'fa fa-'.$icon.' ';
					$border_width = ($width !== '') ? $width.'px' : ' 1px ';
					$style = ($color !== '') ? ' color:'.$icon_color.';' : ' ';
					$style .= ($size !== '') ? ' font-size:'.$size.'px;' : ' ';
					$style .= ($size !== '') ? ' width:'.$size.'px;' : ' ';
					$style .= ($size !== '') ? ' height:'.$size.'px;' : ' ';
					$style .= ($icon_border_color !== '') ? ' border: '.$border_width.' solid '.$icon_border_color.';' : ' ';
					$style .= ($icon_bg_color !== '') ? ' background: '.$icon_bg_color.';' : ' ';
					$style .= ($padding !== '') ? ' padding: '.$padding.'px;' : ' ';
					$html .= '<i class=" rdicon-box-icon '.$class.'" style="'.$style.'"></i>';
					$html .= '</div> <!-- icon -->';
				} else {
					$img = wp_get_attachment_image_src( $icon_img, 'large');
					$html .= '<div class="rdicon-icon"'.$xstyle.'>';
					$border_width = ($width !== '') ? $width.'px' : ' 1px ';
					$style = ($size !== '') ? ' width:'.$size.'px;height:'.$size.'px;' : ' ';
					$style .= ($icon_border_color !== '') ? ' border: '.$border_width.' solid '.$icon_border_color.';' : ' ';
					$style .= ($icon_bg_color !== '') ? ' background: '.$icon_bg_color.';' : ' ';
					$style .= ($padding !== '') ? ' padding: '.$padding.'px;' : ' ';
					$html .= '<img class=" rdicon-box-icon " style="'.$style.'" src="'.$img[0].'"/>';
					$html .= '</div> <!-- icon -->';
				}
				if($title !== ''){
					$html .= '<div class="rdicon-header">';
					$link_prefix = $link_sufix = '';
					if($link !== ''){
						if($read_more == 'title')
						{
							$href = vc_build_link($link);
							$link_prefix = '<a class="rdicon-box-link" href="'.$href['url'].'">';
							$link_sufix = '</a>';
						}
					}
					$html .= $link_prefix.'<h3 class="rdicon-title">'.$title.'</h3>'.$link_sufix;
					$html .= '</div> <!-- header -->';
				}
				if($desc !== ''){
					$html .= '<div class="rdicon-description">';
					$html .= $desc;
					if($link !== ''){
						if($read_more == 'more')
						{
							$href = vc_build_link($link);
							$more_link = '<a class="rdicon-read" href="'.$href['url'].'">';
							$more_link .= $read_text;
							$more_link .= '<i class="fa fa-caret-right"></i>';
							$more_link .= '</a>';
							$html .= $more_link;
						}
					}
					$html .= '</div> <!-- description -->';
				}

			$html .= '</div>';
			$out = $prefix.$html.$suffix;
			return $out;
		}