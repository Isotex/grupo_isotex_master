<?php 
	global $woocommerce, $author, $wp_query, $post;
	
	if(class_exists('Woocommerce')){
		if(is_shop()) {
			$pageID = get_option('woocommerce_shop_page_id');
		} 
		else{
			$pageID = $post->ID;
		}
	}
	else {
		$pageID = $post->ID;
	}
			
	$userdata = get_userdata($author);	
	$bread_align = $bread_layout = '';
	
	if(get_field( 'breadcrumb_custom' ) == 1){
		if(get_field( 'breadcrumb_align', $pageID )){$bread_align = get_field( 'breadcrumb_align', $pageID ); }
		if(get_field( 'breadcrumb_layout', $pageID )){$bread_layout = get_field( 'breadcrumb_layout', $pageID ); }
	}

	if($bread_align == ''){$bread_align = rd_options('reedwan_breadcrumb_align');}
	if($bread_layout == ''){$bread_layout = rd_options('reedwan_breadcrumb_layout');}
	
	
?>

<?php if (get_field( 'breadcrumb_show', $pageID ) != '0' || get_field( 'breadcrumb_show', $pageID )==''): ?>
<div class="breadcrumb-place<?php echo $bread_align; echo $bread_layout; ?>">
	<div class="breadcrumb-row row clearfix">
	<div class="breadcrumb-wrap">
		<div class="title-breadcrumb">
			<h1 class="page-title">
				<?php 
				if(is_search()){ ?>
					<?php _e('Search Result for  ', 'corporative'); ?>
					<span class="search-terms">
						&#32;&#34;<?php echo get_search_query(); ?>&#34;
					</span> 
				
				<?php
				}
				if((is_archive() && !is_woocommerce() && !is_bbpress() && !is_search())){
					if(is_day()) { echo get_the_date(); }
					else if (is_month()) { echo get_the_date('F Y'); }
					else if (is_year()) { echo get_the_date('Y'); }
					else if (is_category() || is_tax('portfolio_category')) { single_tag_title(); }
					else if (is_tag()) { single_tag_title(); }
					else if (is_author()) { _e('All posts by ', 'corporative'); echo $userdata->display_name; }
					else { _e('Archives', 'corporative'); }
				}
				if(((is_page() || is_single() || is_singular('portfolio'))) && !is_bbpress() && !is_woocommerce()){
					the_title();
				}
				if(class_exists('Woocommerce')){
					if(is_woocommerce()){
						if((is_product() || is_shop()) && !is_search()){
							if( is_product()) { the_title(); }
							else{ woocommerce_page_title(); }
						}
						elseif(is_tax('product_cat') || is_tax('product_tag')){
							if(is_day()) { echo get_the_date(); }
							else if (is_month()) { echo get_the_date('F Y'); }
							else if (is_year()) { echo get_the_date('Y'); }
							else if (is_author()) { _e('All products by ', 'corporative'); echo $userdata->display_name; }
							else { single_tag_title(); }
						}
					}
				}
				if(class_exists('bbPress')){ 
					if(is_bbpress()){
						the_title();
					}
				}

					
				?>
			</h1>
			
			<?php if(rd_options('reedwan_show_breadcrumb')==1): ?>
			<div class="breadcrumbIn">
				<?php 
					if(is_search() || is_page() || (is_singular() && !is_woocommerce() && !is_bbpress() ) || (is_archive() && !is_woocommerce() && !is_bbpress() )) {
						breadcrumb();
					}
					if(class_exists('Woocommerce')){
						if(is_woocommerce()){
							woocommerce_breadcrumb(array(
								'wrap_before' => '<ul class="breadcrumb">',
								'wrap_after' => '</ul>',
								'before' => '<li>',
								'after' => '</li>',
								'delimiter' => ''
							)); 
						}
					}
					if(class_exists('bbPress')){
						if(is_bbpress()){
							bbp_breadcrumb( array ( 
								'before' => '<ul class="breadcrumb">', 
								'after' => '</ul>', 'sep' => ' ', 
								'crumb_before' => '<li>', 
								'crumb_after' => '</li>', 
								'home_text' => __('Home', 'corporative')
							));
						}
		
					}
					
				?> 
			</div>
			<?php endif; ?>
		</div>
		<?php if((is_singular('post') && rd_options('reedwan_post_nav')==1) || (is_singular('product') && rd_options('reedwan_post_nav')==1) || (is_singular('portfolio' )&& rd_options('reedwan_portfolio_nav')==1)): ?>
		<div class="single-navs">
			<div class="nav-prev">
				<?php previous_post_link( '%link', '<i class="icons-arrow-left-thin"></i>'); ?>
			</div>
			<div class="nav-next">
				<?php next_post_link( '%link', '<i class="icons-arrow-right-thin"></i>' ); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	</div><!-- row -->
</div>
<?php endif; ?>
