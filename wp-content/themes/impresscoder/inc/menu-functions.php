<?php
/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 *
 * @param 	string 	$uri  Social link.
 * @param 	int    	$size The icon size in pixels.
 * @return 	string
 */
function impresscoder_get_social_link_svg( $uri, $size = 24 ) {
	return Impresscoder\SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Displays SVG icons in the footer navigation.
 *
 * @param 	string   	$item_output 	The menu item's starting HTML output.
 * @param 	WP_Post  	$item        	Menu item data object.
 * @param 	int      	$depth       	Depth of the menu. Used for padding.
 * @param 	stdClass 	$args        	An object of wp_nav_menu() arguments.
 * @return 	string		The menu item output with social icon.
 */
function impresscoder_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( in_array($args->theme_location, ['social', 'footer_social']) ) {
		$svg = impresscoder_get_social_link_svg( $item->url, 24 );
		if ( ! empty( $svg ) ) {
			$item_output = str_replace( $args->link_before, $svg, $item_output );
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'impresscoder_nav_menu_social_icons', 10, 4 );

add_filter( 'wp_nav_menu_items', 'pd_logout_menu_link', 10, 2 );
function pd_logout_menu_link( $menu_items, $args ) {
   if ($args->theme_location == 'topbar') {
		$menu_items .= impresscoder_my_account_links();
   }
   return $menu_items;
}
