<?php 
	function mediaholder($type, $format, $imagesize, $videoURL, $audioURL, $gallery ){
		$out=$post_thumbnail_big=$thumbnail_big= '';
		$rand = rand();
		$out .='<div class="single-media clearfix">';
			if($format == 'Video' && $videoURL){ 
				$out.= '<div class="video-container">';
				$embed_args = array(
					'title' => 0,
					'byline' => 0,
					'portrait' => 0,
					'color' => 'ffffff',
					'rel' => 0,
					'showinfo' => 0,
				);
				$out.= wp_oembed_get( $videoURL, $embed_args );
				$out.= '</div>';
			}
			else if($format == 'Audio' && $audioURL){
				$out.= '<div class="audio-container">';
				$out.= wp_oembed_get( $audioURL ); 
				$out.= '</div>';
			}
			else if($format == 'Gallery' && $gallery){
				wp_enqueue_style('owl-carousel');
				wp_enqueue_script('owl-carousel');
				$out.='<div class="rd_slides" data-navigation="yes" data-auto="5">';
					foreach( $gallery as $image ):
						if ( !empty ( $image['alt'] ) ){
							$alt = $image['alt'];
						} else {
							$alt = $image['title'];
						}
						$img_src = $image['sizes'][$imagesize];
						$size = GetImageSize( $img_src );
						$out.='<div>';
							$out.= '<a href="'.$image['url'].'" title="' . $alt . '" data-gal="lightbox['.$rand.']" class="prettyphoto">';
								$out.= '<img src="'  . $img_src . '" alt="'  . $alt . '" width="'  . $size[0] . '" height="'  . $size[1] . '" />';
							$out.='</a>';
						$out.='</div>';
					endforeach;
				$out.='</div>';
			}
			else{
				if ( has_post_thumbnail() ) {
					$thumbnail_big = get_the_post_thumbnail(get_the_ID(),$imagesize);
					$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' ); 
					if ( $type == 'single' ){
						$out .= '<a href="'.$image_attributes[0].'" title="'. get_the_title(get_post_thumbnail_id(get_the_ID())).'" data-gal="lightbox" class="prettyphoto">'.$thumbnail_big.'</a>';
					}
					else{
						$out .= '<a href="'.get_permalink( get_the_ID() ).'" title="'. get_the_title( get_the_ID()).'">'.$thumbnail_big.'</a>';
					}
				}
				else{}
			}
		$out.='</div>';
		return $out;
	}
	
	function mediaholder_caption($title, $format, $width, $height, $imagesize, $videoURL, $audioURL, $gallery ){
		$out=$yformat=$noformat=$image_attributes=$title_scr='';
		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
		if($format=='Video' && $videoURL)					
			{ $yformat=$noformat='<a class="p_icon" title="" href="'.$videoURL.'" data-gal="lightbox"><i class="icons-play"></i></a>';}
		else if($format=='Gallery' && $gallery)
			{ $yformat=$noformat='<a class="p_icon" title="" href="'.get_permalink( get_the_ID() ).'"><i class="icons-sliders-vertical"></i></a>';}
		else if($format=='Audio' && $audioURL)
			{ $yformat=$noformat='<a class="p_icon" title="" href="'.get_permalink( get_the_ID() ).'"><i class="icons-music"></i></a>';}
		else
			{ $yformat='<a class="p_icon" href="'.$image_attributes[0].'" title="" data-gal="lightbox"><i class="icons-plus"></i></a>';$noformat='<a class="p_icon" href="http://placehold.it/500x300/ddd/fff/&text=INSERT+FEATURED+IMAGE" title="" data-gal="lightbox"><i class="icons-plus"></i></a>';}
		
		if ($title == 'with_title'){
			$title_scr .= '<div class="p_bottom">';
			$title_scr .= '<h2><a href="'.get_permalink( get_the_ID() ).'" title="'.get_the_title( get_the_ID() ).'">'.get_the_title( get_the_ID()).'</a></h2>';
			if(get_post_type( get_the_ID() ) == 'portfolio'){
				$title_scr .= '<span class="p_bottom_cat">'.get_the_term_list(get_the_ID(), 'portfolio_category', '', ', ', '').'</span>';
			}
			$title_scr .= '</div>';
		}
		$out .='<div class="mediaholder">';
			if(has_post_thumbnail())
			{
				$out .= '<a href="'.get_permalink( get_the_ID() ).'" title="">';
				$out .= get_the_post_thumbnail(get_the_ID(),$imagesize);;
				$out .= '</a>';
				$out .= '<div class="p_details">'.$yformat.$title_scr.'</div>';
			}
			else{
				$out .= '<a href="'.get_permalink( get_the_ID() ).'" title="">';
				$out .= '<img src="http://placehold.it/'.$width.'x'.$height.'/ddd/fff/&text=IMAGE" alt="" width="'.$width.'" height="'.$height.'">';
				$out .= '</a>';
				$out .= '<div class="p_details">'.$noformat.$title_scr.'</div>';
			}
		$out .= '</div>';
		return $out;
	}
	function mediaholder_gal_caption($title, $format, $width, $height, $imagesize, $videoURL, $audioURL, $gallery ){
		$out=$yformat=$noformat=$image_attributes=$title_scr=$post_thumbnail='';
		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
		if($format=='Video' && $videoURL)					
			{ $yformat=$noformat='<a class="p_icon" title="" href="'.$videoURL.'" data-gal="lightbox"><i class="icons-play"></i></a>';}
		else if($format=='Gallery' && $gallery)
			{ $yformat=$noformat='<a class="p_icon" title="" href="'.get_permalink( get_the_ID() ).'"><i class="icons-sliders-vertical"></i></a>';}
		else if($format=='Audio' && $audioURL)
			{ $yformat=$noformat='<a class="p_icon" title="" href="'.get_permalink( get_the_ID() ).'"><i class="icons-music"></i></a>';}
		else
			{ $yformat='<a class="p_icon" href="'.$image_attributes[0].'" title="" data-gal="lightbox"><i class="icons-plus"></i></a>';$noformat='<a class="p_icon" href="http://placehold.it/500x300/ddd/fff/&text=INSERT+FEATURED+IMAGE" title="" data-gal="lightbox"><i class="icons-plus"></i></a>';}
		
		if ($title == 'with_title'){
			$title_scr .= '<div class="p_bottom">';
			$title_scr .= '<h2><a href="'.get_permalink( get_the_ID() ).'" title="'.get_the_title( get_the_ID() ).'">'.get_the_title( get_the_ID()).'</a></h2>';
			if(get_post_type( get_the_ID() ) == 'portfolio'){
				$title_scr .= '<span class="p_bottom_cat">'.get_the_term_list(get_the_ID(), 'portfolio_category', '', ', ', '').'</span>';
			}
			if(get_post_type( get_the_ID() ) == 'post'){
				$title_scr .= '<span class="p_bottom_cat">'.get_the_category_list('', ', ', '').'</span>';
			}
			$title_scr .= '</div>';
		}
		$out .='<div class="mediaholder">';
			if(has_post_thumbnail())
			{
				$out .= '<a href="'.get_permalink( get_the_ID() ).'" title="">';
				$post_thumbnail = wpb_getImageBySize(array( 'post_id' => get_the_ID(), 'thumb_size' => $imagesize ));
				$out .= $post_thumbnail['thumbnail'];
				$out .= '</a>';
				$out .= '<div class="p_details">'.$yformat.$title_scr.'</div>';
			}
			else{
				$out .= '<a href="'.get_permalink( get_the_ID() ).'" title="">';
				$out .= '<img src="http://placehold.it/'.$width.'x'.$height.'/ddd/fff/&text=IMAGE" alt="" width="'.$width.'" height="'.$height.'">';
				$out .= '</a>';
				$out .= '<div class="p_details">'.$noformat.$title_scr.'</div>';
			}
		$out .= '</div>';
		return $out;
	}
	function post_meta($disqus_shortname, $author, $date, $comments, $views, $category){
		$out='';
		if($author=='view'){
			$out .= '<div><span>'.__('By','corporative').'</span> '.get_the_author_link().'</div>';
		}
		if($date=='view'){
			$out .= '<div><span>'.__('In','corporative').'</span> '.get_the_time('F j, Y').'</div>';
		}
		if($category=='view'){
			$out .= '<div><span>'.__('On','corporative').'</span> '.get_the_category_list(', ').'</div>';
		}
		if($comments=='view'){
			$out .= '<div>'. comments_count($disqus_shortname).'</div>';
		}
		if($views=='view'){
			$out .= '<div>'.getPostViews(get_the_ID()).'</div>';
		}
		return $out;
		
	}
?>