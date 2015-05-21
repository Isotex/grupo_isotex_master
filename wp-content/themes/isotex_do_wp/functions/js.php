<?php
function footer_scripts() {
?>
	<!-- JS Options -->
	<script type="text/javascript">
		var retina = window.devicePixelRatio > 1 ? true : false;
		<?php 
			$width = 157; $height = 29; 
			if(rd_options_array('reedwan_logo','url')){
				$width = rd_options_array('reedwan_logo','width'); $height = rd_options_array('reedwan_logo','height'); 
			}
		?>
        <?php if(rd_options_array('reedwan_logo_retina','url')): ?>
        if(retina) {
        	jQuery('.head .logo img').attr('src', '<?php echo rd_options_array('reedwan_logo_retina','url'); ?>');
        	jQuery('.head .logo img').attr('width', '<?php echo $width; ?>');
        	jQuery('.head .logo img').attr('height', '<?php echo $height; ?>');
        }
        <?php endif; ?>
		
	</script>
<?php }
add_action( 'wp_footer', 'footer_scripts' );