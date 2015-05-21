<?php if ( is_sidebar_active('footer-one') || is_sidebar_active('footer-two') ) { ?>
<div class="row pad_foot clearfix">
	<div class="row_inner">
		<!-- Widget 1 -->
		<div class="grid_6">
			<?php
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-one')): 
			endif;
			?>
		</div>
			
		<!-- Widget 2 -->
		<div class="grid_6">
			<?php
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-two')): 
			endif;
			?>
		</div>
	</div><!-- row inner -->
</div><!-- row -->
<?php } ?>
		