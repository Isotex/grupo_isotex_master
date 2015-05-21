<?php
function head_css_addons(){
?>
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=EmulateIE8; IE=EDGE" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- CSS Options -->
	<style type="text/css" media="screen">
		::selection{
			background:<?php echo rd_options('reedwan_general_color');?>;
		}
		::-moz-selection{
			background:<?php echo rd_options('reedwan_general_color');?>;
		}
		<?php if(rd_options('reedwan_responsive') != 1 ): ?>
		.full{
			min-width:1200px;
		}
		#mainnav{
			display:block !important;
		}
		<?php endif; ?>
		
		/*** Body Fonts ***/
		
		body {
			color: <?php echo rd_options_array('reedwan_body_font','color');?>;
			line-height: <?php echo rd_options_array('reedwan_body_font','line-height');?>;
			font-family: <?php echo rd_options_array('reedwan_body_font','font-family');?>;
			font-size: <?php echo rd_options_array('reedwan_body_font','font-size');?>;
			font-weight: <?php echo rd_options_array('reedwan_body_font','font-weight');?>;
			
			<?php if (rd_options_array('reedwan_background','background-image')):?>
				background-image: url('<?php echo rd_options_array('reedwan_background','background-image');?>');
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_background','background-position')):?>
				background-position: <?php echo rd_options_array('reedwan_background','background-position');?>;
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_background','background-color')):?>
				background-color: <?php echo rd_options_array('reedwan_background','background-color');?>;
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_background','background-repeat')):?>
				background-repeat: <?php echo rd_options_array('reedwan_background','background-repeat');?>;
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_background','background-attachment')):?>
				background-attachment: <?php echo rd_options_array('reedwan_background','background-attachment');?>;
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_background','background-size')):?>
				-webkit-background-size: <?php echo rd_options_array('reedwan_background','background-size');?>;
				-moz-background-size: <?php echo rd_options_array('reedwan_background','background-size');?>;
				-o-background-size: <?php echo rd_options_array('reedwan_background','background-size');?>;
				background-size: <?php echo rd_options_array('reedwan_background','background-size');?>;
			<?php endif; ?>
		}
		input, textarea, select, button, .sf-menu li li a{
			font-family: <?php echo rd_options_array('reedwan_body_font','font-family');?>;
		}
		.counter-title, .xactive .sf-mega-wrap .megamenu-title a, .xactive .sf-mega-wrap .megamenu-title{
			color: <?php echo rd_options_array('reedwan_body_font','color');?>;
		}
		
		/*** Head Fonts ***/
		h1, h2, h3, h4, h5, h6, 
		.product_list_widget li a, 
		.comment-head,
		.counter-value,
		.widget_calendar table#wp-calendar caption,
		.foot-menu li a{
			color: <?php echo rd_options_array('reedwan_heading_font','color');?>;
			font-family: 'estre'/*<?php echo rd_options_array('reedwan_heading_font','font-family');?>*/;
			font-weight: <?php echo rd_options_array('reedwan_heading_font','font-weight');?>;
			line-height: 1.5;
			text-transform: <?php echo rd_options_array('reedwan_heading_font','text-transform');?>;
		}
		.foot-menu li a{
			color:#909090;
		}
		.widget_calendar thead>tr>th,
		.pages_cont .woocommerce input,
		.pages_cont .woocommerce textarea,
		.woocommerce-page .pages_shop input,
		.woocommerce-page .pages_shop textarea,
		.pages_cont .woocommerce label,
		.woocommerce-page .pages_shop label,
		.shop_attributes tr th,
		#reviews .meta strong,
		.shop_table th,
		.cart-collaterals .cart_totals.calculated_shipping th,
		.product-subtotal .amount, .cart-subtotal .amount,
		.widget_shopping_cart_content .total,
		.accordion-head p,
		.toggle-head p{
			color: <?php echo rd_options_array('reedwan_heading_font','color');?>;
		}
		
		.sf-mega-wrap .megamenu-title, .sf-mega-wrap .megamenu-title a{
			font-family: <?php echo rd_options_array('reedwan_heading_font','font-family');?>;
			font-weight: <?php echo rd_options_array('reedwan_heading_font','font-weight');?>;
			text-transform: <?php echo rd_options_array('reedwan_heading_font','text-transform');?>;
		}
		.package-content li {
			font-weight: <?php echo rd_options_array('reedwan_heading_font','font-weight');?>;
		}
		
		/*** Link Color ***/
		a, .product_list_widget li a {
			color: #000;
		}
		
		/*** Menu Fonts ***/
		.sf-menu a {
			font-family: <?php echo rd_options_array('reedwan_nav_font','font-family');?>;
			color: <?php echo rd_options_array('reedwan_nav_font','color');?>;
			text-transform: <?php echo rd_options_array('reedwan_nav_font','text-transform');?>;
			font-weight: <?php echo rd_options_array('reedwan_nav_font','font-weight');?>;
			font-size: <?php echo rd_options_array('reedwan_nav_font','font-size');?>;
		}
		.sf-menu li.cart-nav:hover > a, .sf-menu li.cart-nav > a:hover{
			color: <?php echo rd_options_array('reedwan_nav_font','color');?>;
		}

		/*** General Color ***/
		a:hover, 
		.preve:hover, .nexte:hover,
		.breadcrumbIn ul li a:hover,
		.tagcloud a:hover,
		.sf-menu li:hover > a, 
		.sf-menu li > a:hover, 
		.sf-menu li.current_page_ancestor > a,
		.sf-menu li.current-menu-item > a,
		.sf-menu li.current_page_item > a,
		.sf-menu li.current-menu-ancestor > a,
		.top-head .information-head i,
		.top-head .top-info i,
		.header1 .search button:hover,
		.single-navs a:hover,
		.side-nav .current_page_item > a,
		.side-nav .current_page_item a,
		.filterable li.active a, 
		.filterable li a:hover,
		.link-edit a:hover,
		.f_meta a:hover, .meta-tag a:hover,
		.p_details a:hover,
		.widget ul li.current a, .widget > ul > li:hover > a,
		.dark .widget ul li.current a, .dark .widget > ul > li:hover > a,
		.widget_search button:hover .widget_product_search button:hover, 
		#newsletters button:hover,
		.posts-widget-block li:hover a,
		.list-icon ul li i,
		.counter-value.colored,
		.service .tbutton,
		.service-one:hover .s_icon,
		.service-two:hover .s_icon,
		.style2 .accordion-head i, 
		.style2 .toggle-head i,
		.dark a:hover,
		.flexslider ul.slides li .flex-caption a:hover,
		.flex-direction-nav a i,
		.required,
		.star-rating span:before,
		.price,
		.cart-collaterals .cart_totals.calculated_shipping .order-total td,
		.checkout .order-total .amount,
		.product_list_widget li a:hover,
		.dark .product_list_widget li a:hover,
		.top-lang.layout_dropdown .top-lang-current:before,
		.top-lang.layout_dropdown .top-lang-list .top-lang-item:hover,
		.pricing-table .head .price-table,
		.team small,
		.landing-title-tag strong,
		.p_details .p_bottom .p_bottom_cat a:hover,
		.wpb_content_element strong,
		.owl-caption a:hover, 
		span.bbp-admin-links a:hover,
		.bbp-reply-header a.bbp-reply-permalink:hover,
		#bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a {
			color: <?php echo rd_options('reedwan_general_color');?>;
		}
		
		/*** Background Color ***/
		.sticky-post,
		.pagination span,
		.pagination a:hover,
		.service .tbutton:hover, 
		.service.tbutton:active,
		.service-one:hover:after,
		#toTop:hover,
		.tipsy-inner,
		#mobilepro,
		.flex-direction-nav a:hover,
		.plus4, .text4,
		.cart-nav-count,
		.pages_cont .woocommerce .shop_table input[type="submit"].checkout-button,
		.woocommerce-page .pages_shop .shop_table input[type="submit"].checkout-button,
		.onsale,
		.woocommerce-message,
		.woocommerce-info,
		.woocommerce-error,
		.price_slider_amount .button:hover,
		.ui-slider-horizontal .ui-slider-range,
		.dropcap.style4,
		.pricing-table.featured .head,
		.pricing-button:hover, 
		.featured .pricing-button,
		.dark .pricing-button, .dark .pricing-button:hover,
		.owl-prev:hover, .owl-next:hover,
		.owl-carousel.outer_nav .owl-prev:hover, .owl-carousel.outer_nav .owl-next:hover,
		.form-submit input[type=submit]:hover, .contactForm #sendMessage:hover, #sendOrder:hover,
		#bbpress-forums div.bbp-topic-tags a:hover,
		.bbp-topic-pagination .current		{
			background-color:<?php echo rd_options('reedwan_general_color');?>;
		}
		
		/*** Border Color ***/
		.side-nav .current_page_item > a,
		.filterable li.active a, 
		.filterable li a:hover,
		.f_meta a:hover, .meta-tag a:hover,
		.widget_search input:focus, 
		.widget_product_search input:focus:focus, 
		#newsletters input:focus:focus,
		.dark .widget_search input:focus, 
		.dark .widget_product_search input:focus, 
		.dark #newsletters input:focus,
		.search-again-form input[type="text"]:focus,
		.bbp-topic-form input#bbp_topic_title:focus, 
		.bbp-topic-form input#bbp_topic_tags:focus, 
		.bbp-topic-form select#bbp_stick_topic_select:focus, 
		.bbp-topic-form select#bbp_topic_status_select:focus,
		 #bbpress-forums fieldset select#bbp_forum_id:focus,
		 #bbpress-forums fieldset select#bbp_forum_id:focus,
		 #bbpress-forums input#bbp_reply_move_destination_title:focus, 
		 #bbpress-forums input#bbp_topic_split_destination_title:focus,
		 #bbpress-forums input#bbp_topic_edit_reason:focus, 
		 #bbpress-forums input#bbp_reply_edit_reason:focus,
		 #bbpress-forums #bbp-your-profile fieldset input:focus,
		 #bbpress-forums #bbp-your-profile fieldset textarea:focus,
		 .bbp-login-form .bbp-username input:focus,
		.bbp-login-form .bbp-email input:focus,
		.bbp-login-form .bbp-password input:focus,
		.bbp-reply-form input#bbp_topic_tags:focus,
		.service .tbutton,
		.bbp-topic-pagination .page-numbers:hover,
		.service:hover .s_icon.awesome i,
		#commentform #author:focus, 
		#commentform #email:focus, 
		#commentform #url:focus,
		#commentform #comment:focus,
		#track_input:focus, 
		.contactForm #senderName:focus, 
		.contactForm #senderEmail:focus, 
		.contactForm #subject:focus,
		.contactForm #message:focus,
		.pages_cont .woocommerce input:focus,
		.pages_cont .woocommerce textarea:focus,
		.woocommerce-page .pages_shop input:focus,
		.woocommerce-page .pages_shop textarea:focus,
		.price_slider_amount .button:hover,
		
		.dropcap.style4,
		.owl-prev:hover, .owl-next:hover,
		.owl-carousel.outer_nav .owl-prev:hover, .owl-carousel.outer_nav .owl-next:hover,
		.owl-controls .owl-page.active, #bbpress-forums div.bbp-topic-tags a:hover,
		.bbp-topic-pagination .current{
			border-color: <?php echo rd_options('reedwan_general_color');?>;
		}
		
		/*** Border Top Color ***/
		.tabs li a.active,
		.dark .tabs li a.active,
		.action.tac .inner,
		.tipsy-s .tipsy-arrow:before,
		.tipsy-e .tipsy-arrow:before,
		.dark .action.tac .inner,
		.portfolio_carousel_wrap .show_all a:before,
		.header3 .sf-menu > li.current_page_ancestor > a,
		.header3 .sf-menu > li.current-menu-item > a,
		.header3 .sf-menu > li.current_page_item > a,
		.header3 .sf-menu > li.current-menu-ancestor > a
		{
			border-top-color: <?php echo rd_options('reedwan_general_color');?>;
		}
		
		/*** Border Left Color ***/
		.wpb_tour .tabs li a.active, 
		.dark .wpb_tour .tabs li a.active,
		.action .inner, .dark .action .inner, code, pre, blockquote  {
			border-left-color: <?php echo rd_options('reedwan_general_color');?>;
		}
		
		/*** Border Right Color ***/
		.action.rev .inner,
		.tipsy-w .tipsy-arrow:before,
		.dark .action.rev .inner{
			border-right-color: <?php echo rd_options('reedwan_general_color');?>;
		}
		
		/*** Border Bottom Color ***/
		.sf-menu li:hover > a, 
		.sf-menu li > a:hover, 
		.sf-menu li.current_page_ancestor > a,
		.sf-menu li.current-menu-item > a,
		.sf-menu li.current_page_item > a,
		.sf-menu li.current-menu-ancestor > a,
		.sf-menu li.current_page_ancestor > a:before,
		.sf-menu li.current-menu-item > a:before,
		.sf-menu li.current_page_item > a:before,
		.sf-menu li.current-menu-ancestor > a:before,
		.tipsy-n .tipsy-arrow:before,
		.header1 .search input:focus,
		.widget ul li.current a, .widget > ul > li:hover > a,
		.dark .widget ul li.current a, .dark .widget > ul > li:hover > a,
		.services .service-one:hover,
		.portfolio_carousel_wrap .show_all a{
			border-bottom-color: <?php echo rd_options('reedwan_general_color');?>;
		}
		.breadcrumb-place{
			<?php if (rd_options_array('reedwan_breadcrumb_bg','background-image')):?>
				background-image: url('<?php echo rd_options_array('reedwan_breadcrumb_bg','background-image');?>');
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_breadcrumb_bg','background-position')):?>
				background-position: <?php echo rd_options_array('reedwan_breadcrumb_bg','background-position');?>;
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_breadcrumb_bg','background-color')):?>
				background-color: <?php echo rd_options_array('reedwan_breadcrumb_bg','background-color');?>;
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_breadcrumb_bg','background-repeat')):?>
				background-repeat: <?php echo rd_options_array('reedwan_breadcrumb_bg','background-repeat');?>;
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_breadcrumb_bg','background-attachment')):?>
				background-attachment: <?php echo rd_options_array('reedwan_breadcrumb_bg','background-attachment');?>;
			<?php endif; ?>
			<?php if (rd_options_array('reedwan_breadcrumb_bg','background-size')):?>
				-webkit-background-size: <?php echo rd_options_array('reedwan_breadcrumb_bg','background-size');?>;
				-moz-background-size: <?php echo rd_options_array('reedwan_breadcrumb_bg','background-size');?>;
				-o-background-size: <?php echo rd_options_array('reedwan_breadcrumb_bg','background-size');?>;
				background-size: <?php echo rd_options_array('reedwan_breadcrumb_bg','background-size');?>;
			<?php endif; ?>
		}
		
		<?php
			$bread_bg = $bread_height = '';
			
			if(get_field( 'breadcrumb_custom' ) == 1){
				if(get_field( 'breadcrumb_height' )){$bread_height = get_field( 'breadcrumb_height' ); }
				if(get_field( 'breadcrumb_bg' )){$bread_bg = get_field( 'breadcrumb_bg' ); }
			}

			if($bread_height == ''){$bread_height = rd_options('reedwan_breadcrumb_height');}

		
		?>
			<?php if ($bread_bg): ?>
				.breadcrumb-place{background-image:url('<?php echo $bread_bg; ?>');}
			<?php endif; ?>
			<?php if ($bread_height): ?>
				.breadcrumb-row{height:<?php echo $bread_height; ?>;}
			<?php endif; ?>	
		
		
		
		
		/*** Color ***/
		pre, code, .author-title-social .author-social a:hover {
			color: #333;
		}
		.site_description, .top-head  .social a{
			color: #aaa;
		}
		.social a{
			color: #e0e0e0;
		}
		.sf-menu .search-pop-form input[type="text"],
		.search-again-form input[type="text"]{
			color:#969595;
		}
		.top-head .information-head,
		.top-head .top-info,
		.header1 .search button,
		.comment-info.comment-head,
		.errori{
			color:#ccc;
		}
		.header1 .search input{
			color: #C5C5C5;
		}
		.header1 .search input:focus{
			color: #191919;
		}
		.blockquote,
		.f_meta, .f_meta a,
		.pages_cont .woocommerce select,
		.woocommerce-page .pages_shop select{
			color:#888;
		}
		.link-edit a, .author-title-social .author-social a{
			color:#bdbdbd;
		}
		.post_format, 
		.post_count {
			color: #E1E1E1;
		}
		.meta-tag a{
			color:#adadad;
		}
		.widget_search input, .widget_product_search input, #newsletters input {
			color: #A7A7A7;
		}
		.widget_search button, .widget_product_search button, #newsletters button{
			color: #bbb;
		}
		.accordion-head,
		.toggle-head{
			color:#666;
		}
		.service-one .s_icon {
			color: #c2c2c2;
		}
		.tabs li a {
			color: #B1B1B1;
		}
		.disabled {
			color: #EEE !important;
		}
		.preve, .nexte {
			color: #cecece;
		}
		.price del{
			color:#7A7A7A;
		}
		
		
		<?php if(rd_options('reedwan_custom_css')):?>
			<?php echo stripslashes (rd_options('reedwan_custom_css')); ?>
		<?php endif;?>
			
	</style>
<?php }
add_action('wp_head','head_css_addons');