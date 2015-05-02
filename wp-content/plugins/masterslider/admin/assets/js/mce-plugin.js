
/* Master Slider plugin for tinymce */

( function () {
	
	// skip is sliders list is not available
	if( ! __MS_EDITOR || ! __MS_EDITOR.sliders )
		return;

	
	tinymce.PluginManager.add( 'msp_shortcodes_button', function( editor, url ) {

		var menu_items = [],
			menu_item  = {}; 

		for ( slider_id in __MS_EDITOR.sliders ) {
			menu_item  = {};
			menu_item.text = __MS_EDITOR.sliders[ slider_id ];
			menu_item.onclick =  function() {
				editor.insertContent( '[masterslider id="' + slider_id + '"]' );
			};

			menu_items.push( menu_item );
		};


		var ed = tinymce.activeEditor;
		editor.addButton( 'msp_shortcodes_button', {
			text: false,
			icon: false,
			title:__MS_GLOBAL.plugin_name,
			type: 'menubutton',
			menu: menu_items
		});
	});

})();