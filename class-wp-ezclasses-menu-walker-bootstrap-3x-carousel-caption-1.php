<?php
/**
 * Class Name: Class_WP_ezClasses_Menu_Walker_Bootstrap_3x_Carousel_Caption_1 
 * GitHub URI: hhttps://github.com/WPezClasses/class-wp-ezclasses-menu-walker-bootstrap-3x-carousel-caption-1
 * Description: Use a WP menu and the Bootstrap 3.x javascript carousel to populate / manage the contents of a text-only "slider". 
 * Version: 0.5.0
 * Author: 
 * License: MIT
 * License URI: TODO
 *
 *
 * @package WPezClasses
 * @author Mark Simchock <mark.simchock@alchemyunited.com>
 * @since 0.5.0
 * @license MIT
 */
 
/**
 * == Change Log ==
 *
 * -- 0.5.0 - Wed 11 February 2015
 * ---- Pop the champagne! 
 */
 
/**
 * == TODOs ==
 *
 */

if ( !defined('ABSPATH') ) {
	header('HTTP/1.0 403 Forbidden');
    die();
}

class Class_WP_ezClasses_Menu_Walker_Bootstrap_3x_Carousel_Caption_1 extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	  
	  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	  
	  $class_names = $value = '';
	  $classes_all = empty( $item->classes ) ? array() : (array) $item->classes;
	  $classes[0] = $classes_all[0];
	  
	  $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	  $class_names = $class_names ? ' class="carousel-caption ' . esc_attr( $class_names ) . '"' :  ' class="carousel-caption"';
	  
	  $id = apply_filters( 'nav_menu_item_id', 'slider-caption-item-'. $item->ID, $item, $args );
	  $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	  
	  $str_menu_order_one = '';
	  if ( $item->menu_order == 1 ){
	    $str_menu_order_one = ' active ';
	  }
	  
	  $output .= $indent . '<div class="item' . $str_menu_order_one . '">';		
	  $output .= '<div' . $id . $value . $class_names .'>';
	  
	  $atts = array();
	  $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	  $atts['target'] = ! empty( $item->target )	? $item->target	: '';
	  $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
	  $atts['data-description'] = ! empty( $item->description ) ? $item->description : '';
	  $atts['href'] = ! empty( $item->url ) ? $item->url : '';
	  
	  $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
	  
	  $bool_href = false;
	  $attributes = '';
	  foreach ( $atts as $attr => $value ) {
	    if ( ! empty( $value ) ) {
		  if ( $attr === 'href' ){
		    $value = esc_url( $value );
			$bool_href = true;
		  }
		  $attributes .= ' ' . $attr . '="' . $value . '"';
		}
	  }
	  
	  $item_output = $args->before;
	  if ( $bool_href ){
	    $item_output .= '<a '. $attributes .'>';
	  }
	  
	  $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	  
	  if ( $bool_href ){
	    $item_output .= '</a>';
	  }
	  
	  $item_output .= $args->after;
	  $item_output .= '</div>';
	  
	  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	public function end_el(&$output, $item, $depth=0, $args=array()) {
	  $output .= "</div>\n";
    }

}