jQuery.noConflict();
jQuery(document).ready(function($){
	"use strict";
	// if clicked on import data button
	$('#button_import').live('click', function(e) {
		var confirm = window.confirm('WARNING: Clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete. Importing data is recommended on fresh installs only once. Importing on sites with content or importing twice will duplicate menus, pages and all posts.');

		if(confirm == false) {
			return false;
		} else {
			return true;
		}
	});
});