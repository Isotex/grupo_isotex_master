<header id="header" class="header3">
	<?php if(rd_options('reedwan_show_top_header')==1 ):?>
	<div class="top-head dark">
		<div class="row clearfix">
			<?php if(rd_options('reedwan_phone')!='' && rd_options('reedwan_custom_top')=='' ):?>
			<div class="top-info mobile">
				<i class="fa-mobile-phone"></i>
				<span><?php echo rd_options('reedwan_phone'); ?></span>
			</div>
			<?php endif; ?>
			
			<?php if(rd_options('reedwan_address')!='' && rd_options('reedwan_custom_top')=='' ):?>
			<div class="top-info address">
				<i class="fa-map-marker"></i>
				<span><?php echo rd_options('reedwan_address'); ?></span>
			</div>
			<?php endif; ?>
			
			<?php if(rd_options('reedwan_custom_top')!='' ):?>
			<div class="top-info custom">
				<span><?php echo stripslashes(rd_options('reedwan_custom_top')); ?></span>
			</div>
			<?php endif; ?>
			<div class="top-info">
				<?php get_template_part('includes/language-switcher');?>
			</div>
			<?php get_template_part('includes/social-header');?>
		</div>
	</div>
	<?php endif; ?>
	<?php
		$sticky='';
		if(rd_options('reedwan_sticky_header')==1){
			$sticky=' my_sticky';
		}
		else{$sticky='';}
	?>
	<div class="head<?php echo $sticky; ?>">
		<div class="row clearfix">
			<div class="logo">
				<?php if(rd_options_array('reedwan_logo','url')) {$logo = rd_options_array('reedwan_logo','url');}else{$logo = get_template_directory_uri() . '/images/logo.png';}?>
				<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo?>" alt="<?php bloginfo('name'); ?>"></a>
			</div><!-- end logo -->
			<?php get_template_part('includes/menu-header');?>
		</div><!-- row -->
	</div><!-- head -->
</header><!-- end header -->
	
