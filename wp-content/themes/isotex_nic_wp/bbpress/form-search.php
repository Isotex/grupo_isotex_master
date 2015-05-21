<?php

/**
 * Search
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<div class="widget_search">
<form role="search" method="get" action="<?php bbp_search_url(); ?>">
	<div>
		<label class="screen-reader-text hidden" for="bbp_search"><?php _e( 'Search for:', 'bbpress' ); ?></label>
		<input type="hidden" name="action" value="bbp-search-request" />
		<input tabindex="<?php bbp_tab_index(); ?>" type="text" value="<?php echo esc_attr( bbp_get_search_terms() ); ?>" placeholder="<?php _e( 'Search the Forum...', 'corporative' ); ?>" name="bbp_search" id="bbp_search" />
		<button type="submit" class="toptip" title="Start Search"><i class="fa-search"></i></button>
	</div>
</form>
</div>