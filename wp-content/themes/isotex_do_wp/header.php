<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>
	<?php
	if ( defined('WPSEO_VERSION') ) {
		wp_title('');
	} else {
		bloginfo('name'); ?> <?php wp_title(' - ', true, 'left');
	}
	?>
	</title>
    <meta charset="<?php bloginfo( 'charset' );?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if(rd_options('reedwan_responsive') == 1): ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php endif; ?>
	<?php if(rd_options('reedwan_feedburner')): ?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo rd_options('reedwan_feedburner'); ?>" /> 
	<?php endif; ?>
	
	<?php if(rd_options_array('reedwan_favicon','url')): ?>
		<link rel="shortcut icon" href="<?php echo rd_options_array('reedwan_favicon','url'); ?>" type="image/x-icon" />
	<?php endif; ?>
	
	<?php if(rd_options_array('reedwan_iphone_icon','url')): ?>
		<!-- For iPhone -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo rd_options_array('reedwan_iphone_icon','url'); ?>">
	<?php endif; ?>

	<?php if(rd_options_array('reedwan_iphone_icon_retina','url')): ?>
		<!-- For iPhone 4 Retina display -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo rd_options_array('reedwan_iphone_icon_retina','url'); ?>">
	<?php endif; ?>

	<?php if(rd_options_array('reedwan_ipad_icon','url')): ?>
		<!-- For iPad -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo rd_options_array('reedwan_ipad_icon','url'); ?>">
	<?php endif; ?>

	<?php if(rd_options_array('reedwan_ipad_icon_retina','url')): ?>
		<!-- For iPad Retina display -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo rd_options_array('reedwan_ipad_icon_retina','url'); ?>">
	<?php endif; ?>
	
	<link type="text/css" rel="stylesheet" href="<?php echo WP_SIMPLE_DL_MONITOR_URL; ?>/includes/templates/fancy2/sdm-fancy-2-styles.css?ver=<?php echo WP_SIMPLE_DL_MONITOR_VERSION; ?>;" />
	<link rel="stylesheet" type="text/css" title="<?php bloginfo('name'); ?> RSS Feed" href="http://www.grupoisotex.com/wp-content/themes/isotex_vzla_wp/css/home.css" /> 
	<?php
	wp_localize_script('ReedwanStyle', 'ReedwanVars', array(
	'ajaxUrl' => admin_url('admin-ajax.php'),
	));
	?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="frame_" >
		<div id="layout" class="<?php echo rd_options('reedwan_theme_layout'); ?>">
			<?php 
			if(rd_options('reedwan_header_style')=='header1'){
				get_template_part('includes/header1');
			}
			else if (rd_options('reedwan_header_style')=='header2'){
				get_template_part('includes/header2');
			}
			else if (rd_options('reedwan_header_style')=='header3'){
				get_template_part('includes/header3');
			}
			else{
				get_template_part('includes/header4');
			}
			
			if(!is_home() && !is_front_page() && !is_page_template('template-homepage.php') && !is_404()){
				get_template_part('includes/title-breadcrumb');
			}
			if(!is_404()){
			/* Main Slider */
			global $post;
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
			if(get_field( 'show_slider', $pageID ) != 'none' && get_field( 'show_slider', $pageID )&& get_field( 'show_slider', $pageID )!==null){
				if(get_field( 'show_slider', $pageID ) == 'layer' && get_field( 'layer_slider', $pageID )){
					echo '<div class="main-slider">';
					echo do_shortcode('[layerslider id="'.get_field( 'layer_slider', $pageID ).'"]');
					echo '</div>';
				}
				if(get_field( 'show_slider', $pageID ) == 'revolution' && get_field( 'revolution_slider', $pageID ) && class_exists('UniteFunctionsRev')){
					echo '<div class="main-slider">';
					putRevSlider( get_field( 'revolution_slider', $pageID ) );
					echo '</div>';
				}
			}
			}
			?>
