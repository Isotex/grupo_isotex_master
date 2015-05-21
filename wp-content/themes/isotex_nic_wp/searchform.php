<form action="<?php echo home_url(); ?>" method="GET">

	<input name="s" type="text" onfocus="if (this.value=='<?php _e('Buscador...','corporative')?>') this.value = '';" onblur="if (this.value=='') this.value = '<?php _e('Buscador...','corporative')?>';" value="<?php _e('Buscador...','corporative')?>" placeholder="<?php _e('Buscador...','corporative')?>">

	<button type="submit" class="toptip" title="Buscador"><i class="fa-search"></i></button>

</form><!-- end form -->