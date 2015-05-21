<?php if ( is_sidebar_active('footer-one') ) { ?>
	<div class="row pad_foot clearfix">
	<div class="row_inner">
		<!-- Widget 1 -->
		<div class="grid_12">
			<?php
			if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-one')): 
			endif;
			?>
		</div>
	</div><!-- row inner -->
</div><!-- row -->
<?php } ?>