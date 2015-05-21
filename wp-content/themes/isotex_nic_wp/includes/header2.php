<header id="header" class="header2">
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
	<div class="head">
		<div class="row clearfix">
			<div class="row_inner">
				<div class="grid_12">
					<div class="logo">
						<?php if(rd_options_array('reedwan_logo','url')) {$logo = rd_options_array('reedwan_logo','url');}else{$logo = get_template_directory_uri() . '/images/logo.png';}?>
						<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo?>" alt="<?php bloginfo('name'); ?>"></a>
						<?php if(get_bloginfo( 'description' )!=''):?>
						<h2 class="site_description"><?php echo  get_bloginfo( 'description' ); ?></h2><!-- end description -->
						<?php endif; ?>
					</div><!-- end logo -->
				</div>
			</div><!-- row inner -->
		</div><!-- row -->
	</div><!-- head -->
	
	<?php
		$sticky='';
		if(rd_options('reedwan_sticky_header')==1){
			$sticky=' my_sticky';
		}
		else{$sticky='';}
	?>
	<div class="headdown<?php echo $sticky; ?>">
		<div class="row clearfix">
			<div class="row_inner">
				<div class="grid_12">
					<?php if(rd_options('reedwan_show_top_header')==1 ):?>
						<?php get_template_part('includes/social-header');?>
					<?php endif; ?>
					<?php get_template_part('includes/menu-header');?>
				</div>
			</div><!-- row inner -->
		</div><!-- row -->
	</div><!-- headdown -->
</header><!-- end header -->
	
