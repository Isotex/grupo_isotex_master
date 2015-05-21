<?php 
	get_header();
?>
<div class="page-content">
	<div class="row clearfix">
		<div class="row_inner">
			<div class="grid_12">
				<div class="tac error-page clearfix">
					<i class="fa fa-exclamation-triangle errori"></i>
					<h2 class="tac mtt"> <?php echo rd_options('reedwan_404_title'); ?></h2> <p> <?php echo rd_options('reedwan_404_decription'); ?> </p>
					<a href="<?php echo home_url('/') ?>" class="tbutton medium"><span><i class="icons-arrow-left mi"></i> <?php _e('Back To Homepage','corporative');?></span></a>
				</div>
			</div>
		</div>
	</div>
</div><!-- end page content -->
<?php get_footer(); ?>