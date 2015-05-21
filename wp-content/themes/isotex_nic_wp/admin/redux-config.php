<?php
if ( !class_exists( "Redux_Framework_corporative_config" ) ) {
	class Redux_Framework_corporative_config {
		public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (  true == Redux_Helpers::isTheme(__FILE__) ) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }
		
		public function initSettings() {
            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setSections();

            if (!isset($this->args['opt_name'])) {
                return;
            }
			$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
		}
		public function setSections() {
			// Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;
			
			
            ob_start();
			
            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux_framework'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'redux_framework'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'redux_framework'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'redux_framework') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'redux_framework'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }
/* ---------------- General Settings ------------------- */	
			$this->sections[] = array (
			'title' => __('General','redux_framework'),
			'icon' => 'el-icon-cogs',
			'fields' => array (
                    array(
                        'id'        => 'reedwan_import_demo',
                        'type'      => 'raw',
						'align'		=> true,
						'title' 	=> __('Import Demo','redux_framework'),
                        'content'   => '<a href="'.admin_url('admin.php?page=_options&tab=0').'&import_data_content=true" class="button button-primary"  id="button_import">Import All Demo Content</a>',
						'desc' 		=> __('Importing demo content will copy sliders, theme options, posts, pages and portfolio posts, this will replicate the live demo. WARNING: clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete.','redux_framework'),
                    ),
					array (
						'id' 		=> 'reedwan_responsive',
						'type' 		=> 'switch',
						'title' 	=> __('Activated responsive layout','redux_framework'),
						'default' 	=> 1,
						'on'        => 'Enabled',
                        'off'       => 'Disabled',
					),
					array (
						'desc' 		=> __('You can put url of an ico image that will represent your website\'s favicon (16px x 16px).','redux_framework'),
						'id' 		=> 'reedwan_favicon',
						'type' 		=> 'media',
						'title' 	=> __('Custom Favicon','redux_framework'),
						'url' 		=> false,
					),
					array (
						'desc' 		=> __('Icon for Apple iPhone (57px x 57px)','redux_framework'),
						'id' 		=> 'reedwan_iphone_icon',
						'type' 		=> 'media',
						'title' 	=> __('Apple iPhone Icon Upload','redux_framework'),
						'url' 		=> false,
					),
					array (
						'desc' 		=> __('Icon for Apple iPhone Retina Version (114px x 114px)','redux_framework'),
						'id' 		=> 'reedwan_iphone_icon_retina',
						'type' 		=> 'media',
						'title' 	=> __('Apple iPhone Retina Icon Upload','redux_framework'),
						'url'	 	=> false,
					),
					array (
						'desc' 		=> __('Icon for Apple iPhone (72px x 72px)','redux_framework'),
						'id' 		=> 'reedwan_ipad_icon',
						'type' 		=> 'media',
						'title' 	=> __('Apple iPad Icon Upload','redux_framework'),
						'url' 		=> false,
					),
					array (
						'desc' 		=> __('Icon for Apple iPad Retina Version (144px x 144px)','redux_framework'),
						'id' 		=> 'reedwan_ipad_icon_retina',
						'type' 		=> 'media',
						'title' 	=> __('Apple iPad Retina Icon Upload','redux_framework'),
						'url' 		=> false,
					),
					array (
						'desc' 		=> __('This will used if you using DISQUS comment on single post','redux_framework'),
						'id' 		=> 'reedwan_disqus_shortname',
						'type' 		=> 'text',
						'title' 	=> __('Disqus Shortname','redux_framework'),
					),
					array (
						'id' => 'reedwan_show_breadcrumb',
						'type' => 'switch',
						'title' => __('Show breadcrumb','redux_framework'),
						'default' => 1,
					),
					array (
						'id' => 'reedwan_breadcrumb_layout',
						'type' => 'select',
						'options' => array (
							' bdark' => 'Dark',
							' blight' => 'Light',
						),
						'title' => __('Title & Breadcrumb layout','redux_framework'),
						'default' => ' bdark',
					),
					array (
						'id' => 'reedwan_breadcrumb_height',
						'type' => 'text',
						'default' => '120px',
						'title' => __('Title & Breadcrumb Height','redux_framework'),
					),
					array (
						'id' => 'reedwan_breadcrumb_align',
						'type' => 'select',
						'options' => array (
							' xcenter' => 'Center',
							' xleft' => 'Left',
							' xright' => 'Right',
						),
						'title' => __('Title & Breadcrumb text align','redux_framework'),
						'default' => ' xleft',
					),
				
					array( 'id'  => 'reedwan_breadcrumb_bg',
						'type'     => 'background',
						'title'    => __('Title & Breadcrumb Background','redux_framework'),
						'default'  => array(
							'background-color' => '#222222',
							'background-repeat' => 'repeat',
							'background-size' => 'cover',
							'background-attachment' => 'scroll',
							'background-position' => 'left center'),
					),
					
					array (
						'desc' 		=> __('Paste here your google analytics tracking code.','redux_framework'),
						'id' 		=> 'reedwan_analytic',
						'type' 		=> 'textarea',
						'title' 		=> 'Google Analytic',
					),
					array (
						'desc' 		=> __('Write your custom css here.','redux_framework'),
						'id' 		=> 'reedwan_custom_css',
						'type'      => 'ace_editor',
						'mode'      => 'css',
                        'theme'     => 'chrome',
						'title'		=> __('Custom CSS','redux_framework'),
					),
				)
			);
			
/* ---------------- Header Settings ------------------- */			
			$this->sections[] = array (
				'title' => __('Header','redux_framework'),
				'icon' => 'el-icon-screen',
				'fields' => array (
					array (
						'id' => 'reedwan_header_style',
						'type' => 'select',
						'options' => array (
							'header1' => 'Style One (Classic)',
							'header2' => 'Style Two (Centered)',
							'header3' => 'Style Three (Modern)',
							'header4' => 'Style Four (Classic + Minimal)',
						),
						'title' => 'Header Style',
						'default' => 'header4',
					),
					array (
						'desc' => __('Upload images using the native media uploader, or define the URL directly','redux_framework'),
						'id' => 'reedwan_logo',
						'type' => 'media',
						'title' => __('Logo','redux_framework'),
					),
					array (
						'desc' => __('Please choose an image file for the retina version of the logo. It should be 2x the size of main logo.','redux_framework'),
						'id' => 'reedwan_logo_retina',
						'type' => 'media',
						'title' => __('Logo (Retina Version @2x)','redux_framework'),
					),
					array (
						'id' => 'reedwan_sticky_header',
						'type' => 'switch',
						'title' => __('Activated sticky header','redux_framework'),
						'default' => 1,
					),
					array (
						'id' => 'reedwan_search_header',
						'type' => 'switch',
						'title' => __('Show search on main nav','redux_framework'),
						'default' => 1,
					),
					array (
						'id' => 'reedwan_menu_drop_indicator',
						'type' => 'switch',
						'title' => __('Show menu dropdown indicator','redux_framework'),
						'default' => 0,
					),
				
					array (
						'id' => 'reedwan_show_top_header',
						'type' => 'switch',
						'title' => __('Show Top Header (Extended Header)','redux_framework'),
						'default' => 0,
					),
					array (
						'desc' => __('Your phone number used or will showed on top header.','redux_framework'),
						'id' => 'reedwan_phone',
						'type' => 'text',
						'title' => __('Phone Number','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'desc' => __('Your address used or will showed on top header.','redux_framework'),
						'id' => 'reedwan_address',
						'type' => 'text',
						'title' => __('Address','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'desc' => __('It will overide Phone Number and Address text.','redux_framework'),
						'id' => 'reedwan_custom_top',
						'type' => 'textarea',
						'title' => __('Custom Text','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_language_switcher',
						'type' => 'switch',
						'title' => __('Show WPML Language Switcher','redux_framework'),
						'default' => 1,
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_top_social',
						'type' => 'switch',
						'title' => __('Show Social Icon','redux_framework'),
						'default' => 1,
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_email',
						'type' => 'text',
						'title' => __('Email','redux_framework'),
						'validate'  => 'email',
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_twitter',
						'type' => 'text',
						'title' => __('Twitter URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_facebook',
						'type' => 'text',
						'title' => __('Facebook URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_dribbble',
						'type' => 'text',
						'title' => __('Dribbble URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_rss',
						'type' => 'text',
						'title' => __('RSS URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_github',
						'type' => 'text',
						'title' => __('Github URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_linkedin',
						'type' => 'text',
						'title' => __('Linkedin URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_pinterest',
						'type' => 'text',
						'title' => __('Pinterest URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_google',
						'type' => 'text',
						'title' => __('Google Plus URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_skype',
						'type' => 'text',
						'title' => __('Skype URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_soundcloud',
						'type' => 'text',
						'title' => __('Soundcloud URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_youtube',
						'type' => 'text',
						'title' => __('Youtube URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_tumblr',
						'type' => 'text',
						'title' => __('Tumblr URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					array (
						'id' => 'reedwan_flickr',
						'type' => 'text',
						'title' => __('Flickr URL','redux_framework'),
						'required' => array('reedwan_show_top_header','=','1')
					),
					
				),
			);
			
/* ---------------- Footer Settings ------------------- */				
			$this->sections[] = array (
				'title' => __('Footer','redux_framework'),
				'icon' => 'el-icon-photo',
				'fields' => array (
					array (
						'id' => 'reedwan_footer_widget',
						'type' => 'select',
						'options' => array (
							'footer-1' => 'Footer 1',
							'footer-2' => 'Footer 2',
							'footer-3' => 'Footer 3',
							'footer-4' => 'Footer 4',
						),
						'title' => __('Footer Widget Layout','redux_framework'),
						'default' => 'footer-4',
					),
					array (
						'id' => 'reedwan_show_footer_nav',
						'type' => 'switch',
						'title' => __('Show footer navigation','redux_framework'),
						'default' => 1,
					),
					 array(
                        'id'        => 'reedwan_credits_footer',
                        'type'      => 'editor',
                        'title'     => __('Footer Text', 'redux_framework'),
                        'default'   => 'Powered by Wordpress.',
                    ),
				),
			);

/* ---------------- Appearances Settings ------------------- */
			$this->sections[] = array (
				'title' => __('Appearances','redux_framework'),
				'icon' => 'el-icon-tint',
				'fields' => array (
					array (
						'id' => 'reedwan_general_color',
						'type' => 'color',
						'title' => __('General Color','redux_framework'),
						'default' => '#ff6600',
						'transparent' => false
					),
					array (
						'id' => 'reedwan_theme_layout',
						'type' => 'select',
						'options' => array (
							'boxed' => 'Boxed',
							'boxed-margin' => 'Boxed Margin',
							'full' => 'Fullwidth',
						),
						'title' => __('Theme Layout','redux_framework'),
						'default' => 'full',
					),
					
					array( 'id'  => 'reedwan_background',
						'type'     => 'background',
						'title'    => __('Body Background', 'redux_framework'),
						'subtitle' => __('Body background with image, color, etc.', 'redux_framework'),
						'default'  => array(
							'background-color' => '#eeeeee',
							'background-repeat' => 'repeat',
							'background-size' => 'cover',
							'background-attachment' => 'fixed',
							'background-position' => 'center center'),
						'required' => array('reedwan_theme_layout','!=','full')
					),
					array(
                        'id'        => 'reedwan_body_font',
                        'type'      => 'typography',
                        'title'     => __('Body Font', 'redux_framework'),
                        'google'    => true,
						'text-align' => false,
						'subsets' 	 => false,
                        'default'   => array(
                            'color'         => '#444444',
                            'font-size'     => '14px',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '400',
							'line-height' 	=> '24px',
                        ),
                    ),
					array(
                        'id'        => 'reedwan_heading_font',
                        'type'      => 'typography',
                        'title'     => __('Heading Font', 'redux_framework'),
                        'google'    => true,
						'text-transform' => true,
						'font-size' => false,
						'line-height' => false,
						'text-align' => false,
						'subsets' 	 => false,
                        'default'   => array(
                            'color'         => '#222222',
                            'font-family'   => 'Oswald',
                            'font-weight'   => '400',
							'text-transform' => 'uppercase',
                        ),
                    ),
					array(
                        'id'        => 'reedwan_nav_font',
                        'type'      => 'typography',
                        'title'     => __('Navigation Font', 'redux_framework'),
                        'google'    => true,
						'text-transform' => true,
						'line-height' => false,
						'text-align' => false,
						'subsets' 	 => false,
                        'default'   => array(
                            'color'         => '#5A5A5A',
                            'font-family'   => 'Raleway',
                            'font-weight'   => '700',
							'font-size' 	=> '13px',
							'text-transform' => 'uppercase',
                        ),
                    ),
				),
			);
			
/* ---------------- Page Settings ------------------- */
			$this->sections[] = array (
				'title' => __('Page','redux_framework'),
				'icon' => 'el-icon-file',
				'fields' => array (
					array (
						'id' => 'reedwan_page_sidebar',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => __('Right','redux_framework'),
							'sidebar_left' => __('Left','redux_framework'),
							'sidebar_none' => __('None (Fullwidth)','redux_framework'),
						),
						'title' => __('Default Page Sidebar','redux_framework'),
						'default' => 'sidebar_right',
					),
					array (
						'id' => 'reedwan_page_comment',
						'type' => 'select',
						'options' => array (
							'comment_wordpress' => __('Wordpress','redux_framework'),
							'comment_disqus' => __('Disqus','redux_framework'),
							'comment_none' => __('None','redux_framework'),
						),
						'title' => __('Default Page Comment','redux_framework'),
						'default' => 'comment_none',
					),
					array (
						'id' => 'reedwan_side_navigation_sidebar',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => __('Right','redux_framework'),
							'sidebar_left' => __('Left','redux_framework'),
						),
						'title' => __('Side Navigation Page Sidebar','redux_framework'),
						'default' => 'sidebar_right',
					),
					array (
						'id' => 'forum_settings',
						'icon' => true,
						'type' => 'info',
						'raw' => __('bbPress Forum Settings','redux_framework'),
					),
					array (
						'id' => 'reedwan_forum_sidebar',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => __('Right','redux_framework'),
							'sidebar_left' => __('Left','redux_framework'),
							'sidebar_none' => __('None (Fullwidth)','redux_framework'),
						),
						'title' => __('Default Forum (bbPress) Sidebar','redux_framework'),
						'default' => 'sidebar_right',
					),
				),
			);
/* ---------------- Blog Settings ------------------- */
			$this->sections[] = array (
				'title' => __('Blog','redux_framework'),
				'icon' => 'el-icon-edit',
				'fields' => array (
					array (
						'id' => 'archive_post',
						'icon' => true,
						'type' => 'info',
						'raw' => __('BLOCK ARCHIVE (CATEGORY, TAGS, AUTHOR, DATE, ETC) SETTINGS','redux_framework'),
					),
					array (
						'id' => 'reedwan_archive_column',
						'type' => 'select',
						'options' => array (
							'column_1' => '1 Column',
							'column_2' => '2 Column',
							'column_3' => '3 Column',
						),
						'title' => __('Default Archive Column','redux_framework'),
						'default' => 'column_1',
					),
					array (
						'id' => 'reedwan_archive_sidebar',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => 'Right',
							'sidebar_left' => 'Left',
							'sidebar_none' => 'None (Fullwidth)',
						),
						'title' => __('Default Archive Sidebar','redux_framework'),
						'default' => 'sidebar_right',
					),
					array (
						'id' => 'reedwan_archive_masonry',
						'type' => 'switch',
						'title' => __('Masonry','redux_framework'),
						'default' => 1,
					),
					array (
						'id' => 'reedwan_archive_share',
						'type' => 'switch',
						'title' => __('Social Share','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Choose whether you want to show date, comment, author, category, etc in post.','redux_framework'),
						'id' => 'reedwan_archive_meta',
						'type' => 'switch',
						'title' => __('Archive Post Meta','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Choose whether you want to show readmore in post.','redux_framework'),
						'id' => 'reedwan_archive_readmore',
						'type' => 'switch',
						'title' => __('Archive Post Readmore','redux_framework'),
						'default' => 1,
					),
					array (
						'id' => 'single_post',
						'icon' => true,
						'type' => 'info',
						'raw' => __('SINGLE POST SETTINGS','redux_framework'),
					),
					array (
						'id' => 'reedwan_post_style',
						'type' => 'select',
						'options' => array (
							'style_one' => __('Style One','redux_framework'),
							'style_two' => __('Style Two','redux_framework'),
						),
						'title' => __('Default Post Style','redux_framework'),
						'default' => 'style_one',
					),
					array (
						'id' => 'reedwan_post_sidebar',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => __('Right','redux_framework'),
							'sidebar_left' => __('Left','redux_framework'),
							'sidebar_none' => __('None (Fullwidth)','redux_framework'),
						),
						'title' => __('Default Post Sidebar','redux_framework'),
						'default' => 'sidebar_right',
					),
					array (
						'id' => 'reedwan_post_comment',
						'type' => 'select',
						'options' => array (
							'comment_wordpress' => 'Wordpress',
							'comment_disqus' => 'Disqus',
							'comment_none' => 'None',
						),
						'title' => __('Default Post Comment','redux_framework'),
						'default' => 'comment_wordpress',
					),
					array (
						'desc' => __('Choose whether you want to show navigation in single post.','redux_framework'),
						'id' => 'reedwan_post_nav',
						'type' => 'switch',
						'title' => __('Show Navigation on Single Post','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Choose whether you want to show sharing buttons in single post.','redux_framework'),
						'id' => 'reedwan_post_sharing',
						'type' => 'switch',
						'title' => __('Show Social Sharing Button','redux_framework'),
						'default' => 1,
					),
					array (
						'id' => 'reedwan_post_sharing_list',
						'type' => 'checkbox',
						'options' => array (
							'twitter' => 'Twitter',
							'facebook' => 'Facebook',
							'google_plus' => 'Google Plus',
							'pinterest' => 'Pinterest',
							'linkedin' => 'Linkedin',
							'tumblr' => 'Tumblr',
							'email' => 'Email',
						),
						'default' => array (
							'twitter' =>'1',
							'facebook' =>'1',
							'google_plus' =>'1',
							'pinterest' =>'1',
							'linkedin' =>'1',
							'tumblr' =>'1',
							'email' =>'1',
						),
						'required' => array (
							0 => 'reedwan_post_sharing',
							1 => '=',
							2 => 1,
						),
					),
					array (
						'desc' => __('Choose whether you want to show media in single post.','redux_framework'),
						'id' => 'reedwan_post_media',
						'type' => 'switch',
						'title' => __('Show Post Media','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Choose whether you want to show date, comment, author, category, etc in single post.','redux_framework'),
						'id' => 'reedwan_post_meta',
						'type' => 'switch',
						'title' => __('Show Post Meta','redux_framework'),
						'default' => 1,
					),
					array (
						'id' => 'reedwan_post_meta_list',
						'type' => 'checkbox',
						'options' => array (
							'author' => __('Author','redux_framework'),
							'date' => __('Date','redux_framework'),
							'comments' => __('Comments','redux_framework'),
							'views' => __('Views','redux_framework'),
							'category' => __('Category','redux_framework'),
						),
						'default' => array (
							'author' => '1',
							'date' => '1',
							'comments' => '1',
							'views' => '1',
							'category' => '1',
						),
						'required' => array (
							0 => 'reedwan_post_meta',
							1 => '=',
							2 => 1,
						),
					),
					array (
						'desc' => __('Choose whether you want to show tags in single post.','redux_framework'),
						'id' => 'reedwan_tag_info',
						'type' => 'switch',
						'title' => __('Show Tags','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Choose whether you want to show author info box in single post.','redux_framework'),
						'id' => 'reedwan_post_author',
						'type' => 'switch',
						'title' => __('Show Author Info Box','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Choose whether you want to show similar items in single post.','redux_framework'),
						'id' => 'reedwan_post_similar',
						'type' => 'switch',
						'title' => __('Show Related Post','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Enter the number of related posts','redux_framework'),
						'id' => 'reedwan_post_similar_number',
						'type' => 'text',
						'title' => __('Related Posts Number','redux_framework'),
						'default' => '6',
						'required' => array (
							0 => 'reedwan_post_similar',
							1 => '=',
							2 => 1,
						),
					),
					array (
						'id' => 'reedwan_post_similar_by',
						'type' => 'select',
						'options' => array (
							'tag' => __('Tag','redux_framework'),
							'category' => __('Category','redux_framework'),
						),
						'title' => __('Related Posts By','redux_framework'),
						'default' => 'tag',
						'required' => array (
							0 => 'reedwan_post_similar',
							1 => '=',
							2 => 1,
						),
					),
					
				),
			);

/* ---------------- Portfolio Settings ------------------- */
			$this->sections[] = array (
				'title' => __('Portfolio','redux_framework'),
				'icon' => 'el-icon-book',
				'fields' => array (
					array (
						'id' => 'archive_portfolio',
						'icon' => true,
						'type' => 'info',
						'raw' => __('PORTFOLIO CATEGORY/ARCHIVE SETTINGS','redux_framework'),
					),
					array (
						'id' => 'reedwan_portfolio_archive_column',
						'type' => 'select',
						'options' => array (
							'column_2' => __('2 Column','redux_framework'),
							'column_3' => __('3 Column','redux_framework'),
							'column_4' => __('4 Column','redux_framework'),
						),
						'title' => __('Column','redux_framework'),
						'default' => 'column_3',
					),
					array (
						'id' => 'reedwan_portfolio_archive_sidebar',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => __('Right','redux_framework'),
							'sidebar_left' => __('Left','redux_framework'),
							'sidebar_none' => __('None (Fullwidth)','redux_framework'),
						),
						'title' => __('Sidebar','redux_framework'),
						'default' => 'sidebar_none',
					),
					array (
						'id' => 'reedwan_portfolio_archive_masonry',
						'type' => 'switch',
						'title' => __('Masonry','redux_framework'),
						'default' => 0,
					),
					array (
						'id' => 'reedwan_portfolio_archive_description',
						'type' => 'switch',
						'title' => __('With Description','redux_framework'),
						'default' => 1,
					),
					array (
						'id' => 'reedwan_portfolio_archive_excerpt',
						'type' => 'text',
						'title' => __('Excerpt Length','redux_framework'),
						'default' => '22',
						'required' => array (
							0 => 'reedwan_portfolio_archive_description',
							1 => '=',
							2 => 1,
						),
					),
					array (
						'id' => 'reedwan_portfolio_archive_category',
						'type' => 'switch',
						'title' => __('Show Category Info','redux_framework'),
						'default' => 1,
						'required' => array (
							0 => 'reedwan_portfolio_archive_description',
							1 => '=',
							2 => 1,
						),
					),
					array (
						'id' => 'reedwan_portfolio_archive_view',
						'type' => 'switch',
						'title' => __('Show View Project Text','redux_framework'),
						'default' => 0,
						'required' => array (
							0 => 'reedwan_portfolio_archive_description',
							1 => '=',
							2 => 1,
						),
					),
					array (
						'id' => 'reedwan_portfolio_archive_view_text',
						'type' => 'text',
						'title' => __('View Project Text','redux_framework'),
						'default' => 'View Project',
						'required' => array (
							0 => 'reedwan_portfolio_archive_view',
							1 => '=',
							2 => 1,
						),
					),
					array (
						'id' => 'reedwan_portfolio_archive_padding',
						'type' => 'switch',
						'title' => __('Without Padding/Space','redux_framework'),
						'default' => 0,
					),
					array (
						'id' => 'single_portfolio',
						'icon' => true,
						'type' => 'info',
						'raw' => __('SINGLE PORTFOLIO SETTINGS','redux_framework'),
					),
					array (
						'id' => 'reedwan_portfolio_style',
						'type' => 'select',
						'options' => array (
							'style_32' => '2/3 Media',
							'style_full' => 'Full Media',
							'style_custom' => 'Custom',
						),
						'title' => __('Default Portfolio Media Column','redux_framework'),
						'default' => 'style_32',
					),
					array (
						'id' => 'reedwan_portfolio_sidebar',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => __('Right','redux_framework'),
							'sidebar_left' => __('Left','redux_framework'),
							'sidebar_none' => __('None (Fullwidth)','redux_framework'),
						),
						'title' => __('Default Portfolio Sidebar','redux_framework'),
						'default' => 'sidebar_none',
					),
					array (
						'id' => 'reedwan_portfolio_comment',
						'type' => 'select',
						'options' => array (
							'comment_wordpress' => 'Wordpress',
							'comment_disqus' => 'Disqus',
							'comment_none' => 'None',
						),
						'title' => __('Default Portfolio Comment','redux_framework'),
						'default' => 'comment_none',
					),
					array (
						'desc' => 'Choose whether you want to show navigation in single portfolio.',
						'id' => 'reedwan_portfolio_nav',
						'type' => 'switch',
						'title' => __('Show Navigation','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Choose whether you want to show similar items in single portfolio.','redux_framework'),
						'id' => 'reedwan_portfolio_similar',
						'type' => 'switch',
						'title' => __('Show Related Portfolio','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Enter the number of related portfolios','redux_framework'),
						'id' => 'reedwan_portfolio_similar_number',
						'type' => 'text',
						'title' => __('Related Portfolios Number','redux_framework'),
						'default' => '6',
						'required' => array (
							0 => 'reedwan_portfolio_similar',
							1 => '=',
							2 => 1,
						),
					),
				),
			);
/* ---------------- Twitter Settings ------------------- */
			$this->sections[] = array (
				'title' => __('Twitter','redux_framework'),
				'icon' => 'el-icon-twitter',
				'fields' => array (
					array (
						'id' => 'OAuth',
						'icon' => true,
						'type' => 'info',
						'raw' => '<h3>OAuth Settings</h3><p>To display your latest Tweets or anything from the Twitter API you must register a <a href=\'https://dev.twitter.com/apps/new\'>new application</a>.</p>',
					),
					array (
						'id' => 'reedwan_tweet_consumer_key',
						'type' => 'text',
						'title' => __('Consumer key','redux_framework'),
					),
					array (
						'id' => 'reedwan_tweet_consumer_secret',
						'type' => 'text',
						'title' => __('Consumer secret','redux_framework'),
					),
					array (
						'id' => 'reedwan_tweet_access_token',
						'type' => 'text',
						'title' => __('Access token','redux_framework'),
					),
					array (
						'id' => 'reedwan_tweet_token_secret',
						'type' => 'text',
						'title' => __('Access token secret','redux_framework'),
					),
				),
			);
/* ---------------- Woocommerce Settings ------------------- */
			$this->sections[] = array (
				'title' => __('Woocommerce','redux_framework'),
				'icon' => 'el-icon-shopping-cart',
				'fields' => array (
					array (
						'desc' => __('Check the box to show the Cart icon, uncheck to disable. ','redux_framework'),
						'id' => 'reedwan_woo_cart_link_nav',
						'type' => 'switch',
						'title' => __('Show Woocommerce Cart Icon in Menu','redux_framework'),
						'default' => 1,
					),
					array (
						'desc' => __('Insert the number of products to display per page.','redux_framework'),
						'id' => 'reedwam_woo_items',
						'type' => 'text',
						'title' => __('Number of Products per Page','redux_framework'),
						'default' => '12',
					),
					array (
						'id' => 'reedwan_woo_product_sidebar_position',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => 'Right',
							'sidebar_left' => 'Left',
							'sidebar_none' => 'None (Fullwidth)',
						),
						'title' => __('Woocommerce Single Product Sidebar Position','redux_framework'),
						'default' => 'sidebar_none',
					),
					array (
						'id' => 'reedwan_woo_archive_sidebar_position',
						'type' => 'select',
						'options' => array (
							'sidebar_right' => 'Right',
							'sidebar_left' => 'Left',
							'sidebar_none' => 'None (Fullwidth)',
						),
						'title' => __('Woocommerce Archive/Category Sidebar Position','redux_framework'),
						'default' => 'sidebar_none',
					),
				),
			);
/* ---------------- 404 Settings ------------------- */
			$this->sections[] = array (
				'title' => __('404 Page','redux_framework'),
				'icon' => 'el-icon-error',
				'fields' => array (
					array (
						'id' => '404_page',
						'icon' => true,
						'type' => 'info',
						'raw' => '<h3>404 PAGE SETTINGS</h3>',
					),
					array (
						'id' => 'reedwan_404_title',
						'type' => 'text',
						'title' => __('404 Title','redux_framework'),
						'default' => 'PAGE NOT FOUND',
					),
					array (
						'id' => 'reedwan_404_decription',
						'type' => 'textarea',
						'title' => __('404 Description','redux_framework'),
						'default' => 'The page you are looking for might have been removed, had its name changed.',
					),
				),
			);
		}
		
		public function setArguments() {

            $theme = wp_get_theme();

            $this->args = array(
                'opt_name'          => 'reedwan_options',
                'display_name'      => $theme->get('Name'),     
                'display_version'   => $theme->get('Version'),  
                'menu_type'         => 'menu',                 
                'allow_sub_menu'    => true,                  
                'menu_title'        => __('Theme Options', 'redux_framework'),
                'page_title'        => __('Theme Options', 'redux_framework'),
                
               
                'google_api_key' => 'AIzaSyBDKfwXoqkvYxgJ1agEwDnRkA64LLxHL7A', 
                
                'async_typography'  => false,                    
                'admin_bar'         => true,                    
                'global_variable'   => '',                      
                'dev_mode'          => false,                   
                'customizer'        => true,                   
                
                'page_priority'     => null,                   
                'page_parent'       => 'themes.php',       
                'page_permissions'  => 'manage_options',        
                'menu_icon'         => '',                      
                'last_tab'          => '',                     
                'page_icon'         => 'icon-themes',           
                'page_slug'         => '_options',              
                'save_defaults'     => true,                    
                'default_show'      => false,                   
                'default_mark'      => '',                      
                'show_import_export' => true,                  
                
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    
                'output_tag'        => true,                   
                // 'footer_credit'     => '',                   
                
              
                'database'              => '', 
                'system_info'           => false, 

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );

			/*
            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el-icon-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon'  => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el-icon-linkedin'
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace('-', '_', $this->args['opt_name']);
                }
                $this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux_framework'), $v);
            } else {
                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux_framework');
            }

            // Add content after the form.
            $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux_framework');
			*/
        }
	}
    global $reduxConfig;
    $reduxConfig = new Redux_Framework_corporative_config();
}
		


			


