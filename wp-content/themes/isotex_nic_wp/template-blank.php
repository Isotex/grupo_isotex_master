<?php /* Template Name: Blank */ ?>
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
	
	<?php
	wp_localize_script('ReedwanStyle', 'ReedwanVars', array(
	'ajaxUrl' => admin_url('admin-ajax.php'),
	));
	?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="frame_" class="blank-page" >
		<div id="layout" class="blank-page <?php echo rd_options('reedwan_theme_layout'); ?>">
		<?php 
			if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
			elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
			else { $paged = 1; }
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="blank-page-middle">
			<div class="blank-page-content">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); endif; ?>
<?php 
	$showFooterNavigation = rd_options('reedwan_show_footer_nav');
	$credits = rd_options('reedwan_credits_footer');
	$widgetFooter = rd_options('reedwan_footer_widget');
	$footerVersion = rd_options('reedwan_footer_version');
?>
	</div><!-- end layout -->
		</div><!-- end frame -->
		<?php wp_footer(); ?>
	</body>
</html>