<?php
$output = $title = '';

extract(shortcode_atts(array(
	'title' => __("Section", "js_composer")
), $atts));

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'sub-accordion', $this->settings['base']);
$output .= "\n\t\t\t" . '<li class="'.$css_class.'">';
    $output .= "\n\t\t\t\t" . '<div class="accordion-head"><div class="accordion-head-sign"></div><p>'.$title.'</p></div>';
    $output .= "\n\t\t\t\t" . '<div class="accordion-content">';
        $output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
        $output .= "\n\t\t\t\t" . '</div>';
    $output .= "\n\t\t\t" . '</li> ' . $this->endBlockComment('.wpb_accordion_section') . "\n";

echo $output;