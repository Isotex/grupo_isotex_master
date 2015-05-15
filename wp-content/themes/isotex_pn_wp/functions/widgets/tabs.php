<?php

class corporative_tabber extends WP_Widget {
    var $defaults = array(
        'sidebar' => ''
    );

    public function __construct($id_base = false, $name = '', $widget_options = array(), $control_options = array()) {
        parent::__construct('tabber-tab', 'Corporative: Tabs', array('description' => 'Sidebar into tabbed widget.'));
    }

    public function widget($args, $instance) {
        add_filter('dynamic_sidebar_params', array(&$this, 'widget_sidebar_params'));

        extract($args, EXTR_SKIP);
		
        echo $before_widget;
            if ($args['id'] != $instance['sidebar']) {
                echo '<div class="tabber-widget">';
                    echo '<ul class="tabs"></ul>';
					echo '<ul class="tabs-content">';
						dynamic_sidebar($instance["sidebar"]);
					echo '</ul>';
                echo '</div>';
            } else {
                echo 'Tabber widget is not properly configured.';
            }
        echo $after_widget;

        remove_filter('dynamic_sidebar_params', array(&$this, 'widget_sidebar_params'));
    }

    public function form($instance) {
        global $wp_registered_sidebars;

        $instance = wp_parse_args((array)$instance, $this->defaults);

        ?>
		</p>
        
        <p><label>Sidebar:</label>
            <select style="background-color: white;" class="widefat tabber-sidebars" id="<?php echo $this->get_field_id('sidebar'); ?>" name="<?php echo $this->get_field_name('sidebar'); ?>">
                <?php
                foreach ($wp_registered_sidebars as $id => $sidebar) {
                    if ($id != 'wp_inactive_widgets') {
                        $selected = $instance['sidebar'] == $id ? ' selected="selected"' : '';
                        echo sprintf('<option value="%s"%s>%s</option>', $id, $selected, $sidebar['name']);
                    }
                }
                ?>
            </select><br/>
            <em>Make sure not to select Sidebar holding this widget. If you do that, Tabber will not be visible.</em>
        </p>

        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['sidebar'] = strip_tags(stripslashes($new_instance['sidebar']));

        return $instance;
    }

    public function widget_sidebar_params($params) {
        $params[0]['before_widget'] = '<li id="'.$params[0]['widget_id'].'" class="st-tab">';
        $params[0]['after_widget'] = '</li>';
        $params[0]['before_title'] = '<a href="#'.$params[0]['widget_id'].'" class="tab">';
        $params[0]['after_title'] = '</a>';

        return $params;
    }
}


add_action('widgets_init', 'st_widgets_init');


function st_widgets_init() {
    register_widget('corporative_tabber');
}

?>