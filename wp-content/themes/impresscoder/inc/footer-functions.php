<?php
/*
control footer
*/
function impresscoder_total_footer_widgets(){
	return get_theme_mod('total_footer_widgets', 5);
}

//register footer widgets
if ( !function_exists( 'impresscoder_footer_widgets' ) ) {
	
	// Register Sidebars
	function impresscoder_footer_widgets() {
		for ($i=1; $i <= impresscoder_total_footer_widgets() ; $i++) { 
			$args = array(
				'id' => 'footer-widget-'.$i,
				'name' => sprintf(__( 'Footer Widget #%s', 'impresscoder' ), $i),
				'before_title' => '<h5 class="footer-widget-title mb-20">',
				'after_title' => '</h5>',
				'before_widget' => '<div id="%1$s" class="widget footer-widget footer-widget-'.$i.' %2$s">',
				'after_widget' => '</div>' 
			);
			register_sidebar( $args );
		}

	}
	add_action( 'widgets_init', 'impresscoder_footer_widgets' );
}

function impresscoder_is_active_footer_widgets(){
	for ($i=1; $i <= impresscoder_total_footer_widgets() ; $i++) { 
		$sidebar = 'footer-widget-'.$i;
		if ( is_active_sidebar( $sidebar ) ) {
			return true;
		}
	}
	return false;
}

function impresscoder_footer_widgets_classes(){
	return array(
		'footer-col-1 col-lg-4 col-sm-12', 
		'footer-col-2 col-lg-2 col-xs-6', 
		'footer-col-3 col-lg-2 col-xs-6', 
		'footer-col-4 col-lg-2 col-xs-6',
		'footer-col-5 col-lg-2 col-xs-6',
	);
}


/**
 * Retrieves an array of the class names for the footer element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function impresscoder_get_footer_class( $class = '' ) {
	$classes = array( 'footer-section', 'has-parallax'  );
	
    $footer_bg_color = get_theme_mod('footer_bg_color', 'bg-secondary');
	
    $classes[] = $footer_bg_color;
    $classes[] = in_array($footer_bg_color, ['bg-dark', 'bg-danger', 'bg-primary', 'bg-secondary'])? 'text-white' : '';		

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS footer class names for the current post or page.
	 *
	 * @param string[] $classes An array of footer class names.
	 * @param string[] $class   An array of additional class names added to the footer.
	 */
	$classes = apply_filters( 'impresscoder_footer_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Displays the class names for the footer element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function impresscoder_footer_class( $class = '' ) {
	// Separates class names with a single space, collates class names for footer element.
	echo 'class="' . esc_attr( implode( ' ', impresscoder_get_footer_class( $class ) ) ) . '"';
}

/**
 * Retrieves an array of the class names for the copyright element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function impresscoder_get_copyright_class( $class = '' ) {
	$classes = array( 'copyright-section', 'small'  );
	
    $copyright_bg_color = get_theme_mod('copyright_bg_color', 'bg-dark');
	
    $classes[] = $copyright_bg_color;
    $classes[] = in_array($copyright_bg_color, ['bg-dark', 'bg-danger', 'bg-primary', 'bg-secondary'])? 'text-white' : '';	
	$classes[] = ($copyright_bg_color == 'bg-tra' && in_array('text-white', impresscoder_get_footer_class()))? 'text-white' : '';	 

	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
	 * Filters the list of CSS copyright class names for the current post or page.
	 *
	 * @param string[] $classes An array of copyright class names.
	 * @param string[] $class   An array of additional class names added to the copyright.
	 */
	$classes = apply_filters( 'impresscoder_copyright_class', $classes, $class );

	return array_unique( $classes );
}


/**
 * Displays the class names for the copyright element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function impresscoder_copyright_class( $class = '' ) {
	// Separates class names with a single space, collates class names for copyright element.
	echo 'class="' . esc_attr( implode( ' ', impresscoder_get_copyright_class( $class ) ) ) . '"';
}