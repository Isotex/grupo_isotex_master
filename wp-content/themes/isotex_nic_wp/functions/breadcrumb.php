<?php
function breadcrumb() {
	$out = '';
	$text['home']     = __('Home', 'corporative'); // text for the 'Home' link
	$text['category'] = __('Archive by Category "%s"', 'corporative'); // text for a category page
	$text['search']   = __('Search Results for "%s"', 'corporative'); // text for a search results page
	$text['tag']      = __('Posts Tagged "%s"', 'corporative'); // text for a tag page
	$text['author']   = __('Articles Posted by %s', 'corporative'); // text for an author page
	$text['404']      = __('Error 404', 'corporative'); // text for the 404 page

	$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = ''; // delimiter between crumbs
	$before         = '<li class="current">'; // tag before the current crumb
	$after          = '</li>'; // tag after the current crumb

	global $post;
	$home_link    = home_url('/');
	$link_before  = '<li typeof="v:Breadcrumb">';
	$link_after   = '<i class="icon-right-open-big"></i></li>';
	$link_attr    = ' rel="v:url" property="v:title"';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id = '';
	if(isset($post->post_parent)){
	$parent_id    = $post->post_parent;
	}
	$frontpage_id = get_option('page_on_front');
	
	if ( ( ! is_home() && ! is_front_page() && ! is_post_type_archive() ) || is_paged() ) 
	{
		echo '<ul class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">';
		if ($show_home_link == 1) echo sprintf($link, $home_link, $text['home']);
		if ($parent_id != $frontpage_id && $show_home_link == 1) echo $delimiter;

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) {echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;}

		} 
		elseif ( is_tax() ) {
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$parents = array();
			$parent = $term->parent;
			while ($parent):
				$parents[] = $parent;
				$new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
				$parent = $new_parent->parent;
			endwhile;
			if(!empty($parents)):
				$parents = array_reverse($parents);
				foreach ($parents as $parent):
					$item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
					$url = home_url('/').$item->taxonomy.'/'.$item->slug;
					echo $link_before. '<a'.$link_attr.' href="'.$url.'">'.$item->name.'</a>' .$link_after;
				endforeach;
				
			endif;
			if ($show_current == 1){echo $before . sprintf($text['category'], $term->name). $after;}
		}
		
		elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() == 'portfolio' ){
				if ( $terms = wp_get_object_terms( $post->ID, 'portfolio_category' ) ) {
				$term = current( $terms );
				$parents = array();
				$parent = $term->parent;
				while ( $parent ) {
					$parents[] = $parent;
					$new_parent = get_term_by( 'id', $parent, 'portfolio_category' );
					$parent = $new_parent->parent;
				}
				if ( ! empty( $parents ) ) {
					$parents = array_reverse($parents);
					foreach ( $parents as $parent ) {
						$item = get_term_by( 'id', $parent, 'portfolio_category');
						echo $link_before. '<a'.$link_attr.' href="' . get_term_link( $item->slug, 'portfolio_category' ) . '">' . $item->name . '</a>' . $link_after;
					}
				}
				echo $link_before. '<a'.$link_attr.' href="' . get_term_link( $term->slug, 'portfolio_category' ) . '">' . $term->name . '</a>' . $link_after;
				}
				if ($show_current == 1) {echo $before . get_the_title() . $after;}
			}
			elseif ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) {echo $delimiter . $before . get_the_title() . $after;}
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) {$cats = preg_replace('/ title="(.*?)"/', '', $cats);}
				echo $cats;
				if ($show_current == 1) {echo $before . get_the_title() . $after;}
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
			$cats = str_replace('</a>', '</a>' . $link_after, $cats);
			if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($parent_id != $frontpage_id || $show_home_link == 1) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page','corporative') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</ul><!-- .breadcrumbs -->';
	}
}

?>