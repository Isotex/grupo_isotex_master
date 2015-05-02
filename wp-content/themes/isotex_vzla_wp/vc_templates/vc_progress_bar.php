<?php
$output = $title = $values = $units = $bgcolor = $custombgcolor = $options = $el_class = $customColor = $barColor = $bar_options = '';
extract( shortcode_atts( array(
    'title' => '',
    'values' => '',
    'units' => '',
    'bgcolor' => 'bar_grey',
    'custombgcolor' => '',
    'options' => '',
    'el_class' => ''
), $atts ) );


$el_class = $this->getExtraClass($el_class);

if ($bgcolor=='custom' && $custombgcolor!='') { $customColor=' style="background-color:'.$custombgcolor.';"'; }
elseif ($bgcolor=='custom' && $custombgcolor=='') { $barColor='class="color1" '; }
else { $barColor='class="'.$bgcolor.'" '; }

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'progress-bars wpb_content_element'.$el_class, $this->settings['base']);
$output = '<div class="'.$css_class.'">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_progress_bar_heading'));

$graph_lines = explode(",", $values);
$max_value = 0.0;
$graph_lines_data = array();
foreach ($graph_lines as $line) {
    $new_line = array();
    $color_index = 2;
    $data = explode("|", $line);
    $new_line['value'] = isset($data[0]) ? $data[0] : 0;
    $new_line['percentage_value'] = isset($data[1]) && preg_match('/^\d{1,2}\%$/', $data[1]) ? (float)str_replace('%', '', $data[1]) : false;
    if($new_line['percentage_value']!=false) {
        $color_index+=1;
        $new_line['label'] = isset($data[2]) ? $data[2] : '';
    } else {
        $new_line['label'] = isset($data[1]) ? $data[1] : '';
    }

    if($new_line['percentage_value']===false && $max_value < (float)$new_line['value']) {
        $max_value = $new_line['value'];
    }

    $graph_lines_data[] = $new_line;
}

foreach($graph_lines_data as $line) {
    $unit = ($units!='') ? ' <span> - ' .  $line['value'] . $units . '</span>' : '';
    $output .= '<div class="progress-bar'.$options.'">';
	
		if($line['percentage_value']!==false) {
			$percentage_value = $line['percentage_value'];
		} elseif($max_value > 100.00) {
			$percentage_value = (float)$line['value'] > 0 && $max_value > 100.00 ? round((float)$line['value']/$max_value*100, 4) : 0;
		} else {
			$percentage_value = $line['value'];
		}
		
		$output .= '<span '.$barColor.'rel="'.$percentage_value.'"'.$customColor.'></span>';
		
		$output .= '<div class="progress-bar-text">'. $line['label'] . $unit .'</div>';
    
    
    $output .= '</div>';
}

$output .= '</div>';

echo $output . $this->endBlockComment('progress_bar') . "\n";