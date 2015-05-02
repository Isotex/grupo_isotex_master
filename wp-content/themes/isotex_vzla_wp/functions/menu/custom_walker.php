<?php
class reedwan_mega_walker extends Walker_Nav_Menu
{
	private $megamenu;
	private $column;
	public function start_lvl( &$output,  $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			
			if( $depth === 0 && $this->megamenu == 1 ) {
				$output .= "\n$indent<div class=\"sf-mega-wrap column".$this->column." clearfix\" >\n<ul class=\"sub-menu sf-mega\" >\n";
			}  else {
				$output .= "\n$indent<ul class=\"sub-menu\">\n";
			}
		}

	public function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat( "\t", $depth );
			if($depth === 0 && $this->megamenu == 1){
				$output .= "\n</ul>\n</div>\n";
			} else {
				$output .= "\n</ul>\n";
			}
	}
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
      {
           if($depth === 0){            
                $this->column = get_post_meta( $item->ID, '_menu_item_column', true );
                $this->megamenu = get_post_meta( $item->ID, '_menu_item_megamenu', true );	
           }
		   $this->megatitle = get_post_meta( $item->ID, '_menu_item_nav_label', true );

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $class_section_megamenu = $class_megamenu = $item_output = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );     
		   
		   if($depth === 1 && $this->megamenu == 1){
				$class_section_megamenu = ' sf-mega-section';
				$class_names = ' class="'. esc_attr( $class_names ) .$class_section_megamenu. '"';
				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $class_names.'>';
			}
			else if($depth === 0 && $this->megamenu == 1){
				$class_megamenu = ' megamenu';
				$class_names = ' class="'. esc_attr( $class_names ) .$class_megamenu. '"';
				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $class_names.'>';
			}
			else{
				$class_names = ' class="'. esc_attr( $class_names ).'"';
				$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $class_names.'>';
			}
           
           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $item_output .= $args->before;
			 
			if($depth === 1 && $this->megamenu == 1){
			$title = apply_filters( 'the_title', $item->title, $item->ID );
				if( $this->megatitle == 1 && $title != "-" && $title != '"-"' ) {
					$heading = do_shortcode($title);
					$link = '';
					$link_closing = '';

					if( ! empty($item->url) && $item->url != "#" && $item->url != 'http://') {
						$link = '<a href="' . $item->url . '">';
						$link_closing = '</a>';
					}

					$heading = sprintf( '%s%s%s', $link, $title, $link_closing );
					$item_output .= "<h3 class='megamenu-title'>" . $heading . "</h3>";
				}
			}
			else{
			 
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );            
				$item_output .= $args->link_after;
				$item_output .= '</a>';
			}
            
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
	


}