<?php
// Dropcap
	function shortcode_dropcap( $atts, $content = null ) {  
		extract(shortcode_atts(array(
        'style'      => '',
		), $atts));
		
		return '<span class="dropcap '.$style.'">' .do_shortcode($content). '</span>';  
		
}
// Highlight
	function shortcode_highlight($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'background' => '',
				'color' => ''
			), $atts);
				
			return '<span class="hightlight" style="background:' . $atts['background'] . '; color:' . $atts['color'] . ';">' .do_shortcode($content). '</span>';
	}
	