<?php
$output = $title = $el_class = $active = $css_animation = $animated = $animated_data = '';
extract(shortcode_atts(array(
    'title' => '',
	'css_animation' => '',
    'el_class' => ''
), $atts));

//wp_enqueue_script('jquery-ui-tabs');

$el_class = $this->getExtraClass($el_class);
$animated = $animated_data = '';
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}

$element = 'wpb_tabs';
if ( 'vc_tour' == $this->shortcode) $element = 'wpb_tour';

// Extract tab titles
preg_match_all( '/vc_tab title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();

/**
 * vc_tabs
 *
 */

if ( isset($matches[0]) ) { $tab_titles = $matches[0]; }
$tabs_nav = '';
$tabs_nav .= '<ul class="tabs">';
foreach ( $tab_titles as $tab ) {
    preg_match('/title="([^\"]+)"(\stab_id\=\"([^\"]+)\"){0,1}/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
    if(isset($tab_matches[1][0])) {
        $tabs_nav .= '<li><a href="#t-'. (isset($tab_matches[3][0]) ? $tab_matches[3][0] : sanitize_title( $tab_matches[1][0] ) ) .'">' . $tab_matches[1][0] . '</a></li>';

    }

}
$tabs_nav .= '</ul>'."\n";

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim($element.' wpb_content_element '.$el_class), $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.$animated.'"'.$animated_data.'>';
$output .= "\n\t\t".'<div class="wpb_wrapper clearfix">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));
$output .= "\n\t\t\t".$tabs_nav;
$output .= "\n\t\t\t\t".'<ul class="tabs-content">';
$output .= "\n\t\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t\t".'</ul>';
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($element);

echo $output;