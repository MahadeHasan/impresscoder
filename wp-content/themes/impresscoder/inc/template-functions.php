<?php
include __DIR__.'/helper.php';
include __DIR__.'/plugins.php';
include __DIR__.'/header-functions.php';
include __DIR__.'/menu-functions.php';
include __DIR__.'/footer-functions.php';
include __DIR__.'/template-tags.php';

add_action('wp_enqueue_scripts', 'impresscoder_enqueue_assets');
if( !function_exists('impresscoder_enqueue_assets') ){
    function impresscoder_enqueue_assets(){ 
		
		//swiper slider css
		wp_enqueue_style('swiper-bundle', get_theme_file_uri('assets/swiper/swiper-bundle.min.css'), false, '8.4.5');
		//slick slider css
		wp_enqueue_style('slick', get_theme_file_uri('assets/slick/slick.css'), [], '1.0.0');
		wp_enqueue_style('slicknav', get_theme_file_uri('assets/slick/slicknav.css'), [], '1.0.0');
		

		$suffix = is_rtl()? '.rtl' : '';
        wp_enqueue_style('magnific-popup', get_theme_file_uri('assets/css/magnific-popup.css'), [], '1.0.0');
        wp_enqueue_style('impresscoder-icons', get_theme_file_uri('assets/css/impresscoder-icons.css'), [], '1.0.0');
        wp_enqueue_style('impresscoder', get_theme_file_uri('assets/css/impresscoder'.$suffix.'.css'), [], '1.0.0');

        wp_enqueue_style('impresscoder-style', get_stylesheet_uri());
		wp_add_inline_style('impresscoder-style', impresscoder_dynamic_inline_style());
        

        // Javascripts
        wp_enqueue_script('bootstrap-bundle', get_theme_file_uri('assets/bootstrap/dist/js/bootstrap.bundle.min.js'), [], '5.0.3', true);
        wp_enqueue_script('magnific-popup', get_theme_file_uri('assets/js/jquery.magnific-popup.min.js'), ['jquery'], '5.0.3', true);

		wp_enqueue_script('isotope-js', get_theme_file_uri('assets/js/isotope.min.js'),['jquery'], '1.1.3', true); 		
		wp_enqueue_script('swiper-bundle', get_theme_file_uri('assets/swiper/swiper-bundle.min.js'), false , '8.4.5', true);

		//slick slider js
		wp_enqueue_script('slicknav-js', get_theme_file_uri('assets/slick/jquery.slicknav.js'), ['jquery'], '5.0.3', false);
		wp_enqueue_script('slick-js', get_theme_file_uri('assets/slick/slick.min.js'), ['jquery'], '5.0.3', false);

        wp_enqueue_script('impresscoder-main', get_theme_file_uri('assets/js/main.js'), ['jquery', 'jquery-masonry', 'swiper-bundle',], '5.0.0', true);
        wp_enqueue_script('impresscoder-menu', get_theme_file_uri('assets/js/menu.js'), ['jquery'], '5.0.0', true);
		$l10n = [
			'stikyNavbar' => get_theme_mod('sticky_navbar', true),
			'backtoTop' => (bool)get_theme_mod('display_back_to_top', true),
		];
		wp_localize_script('jquery', 'IMPRESSCODER', $l10n);
    }
}

function impresscoder_dynamic_inline_style(){
	$main_link_style = get_theme_mod('impresscoder_underline_style', 'underline');
	$css = '
	.entry-footer,
	.wp-block-group__inner-container,
	.comments-area,
	.entry-content{
		--impresscoder-link-color: initial;
		--impresscoder-link-hover-color: var(--impresscoder-primary);
		--impresscoder-link-decoration: '.$main_link_style.';
		--impresscoder-link-hover-decoration: '.$main_link_style.';
		
	}';
	
	return $css;
}

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package 	Impresscoder
 */

 /**
 * Header logo
 *
 * @return string
 */
function impresscoder_header_logo($echo = true){

	$blog_info    = get_bloginfo( 'name' );

	$html = '<img class="logo" src="'. get_template_directory_uri() . '/assets/images/logo/logo.png" alt="' . esc_attr( $blog_info ) . '">
	<img class="logo-white" src="'. get_template_directory_uri() . '/assets/images/logo/logo-white.png" alt="' . esc_attr( $blog_info ) . '">';

	if ( !is_page() && !get_theme_mod('enable_custom_logo', false) && has_custom_logo() ){
		$html = get_custom_logo();
	}

	else if(is_page() && get_post_meta(get_the_ID(), 'enable_custom_logo', true)){
		$logo = get_post_meta(get_the_ID(), 'custom_header_logo', true);
		$logo = wp_get_attachment_url($logo);

		$logo_white = get_post_meta(get_the_ID(), 'custom_header_logo_white', true);
		$logo_white = wp_get_attachment_url($logo_white);

		$html = '<img class="logo" src="'. esc_url($logo) . '" alt="' . esc_attr( $blog_info ) . '">
		<img class="logo-white" src="'. esc_url($logo_white) . '" alt="' . esc_attr( $blog_info ) . '">';
	}
	else if(!is_page() && get_theme_mod('enable_custom_logo', false)){
		$logo = get_theme_mod('custom_header_logo');
		$logo = wp_get_attachment_url($logo);

		$logo_white = get_theme_mod('custom_header_logo_white');
		$logo_white = wp_get_attachment_url($logo_white);

		$html = '<img class="logo" src="'. esc_url($logo) . '" alt="' . esc_attr( $blog_info ) . '">
		<img class="logo-white" src="'. esc_url($logo_white) . '" alt="' . esc_attr( $blog_info ) . '">';
	}

	if($echo){
		echo impresscoder_return_data($html);
	}
	else{
		return $html;
	}
}

function impresscoder_header_menu(){
	$menu = '';

	if(is_page()){
		if(get_post_meta(get_the_ID(), 'enable_custom_menu', true)){
			$menu = get_post_meta(get_the_ID(), 'custom_header_menu', true);
		}
	}
	else{
		if(get_theme_mod('enable_custom_menu', false)){
			$menu = get_theme_mod('custom_header_menu', '');
		}
	}

	return $menu;
}

function impresscoder_custom_header_buttons($echo = true){

	$defaults = [
		'title' => '',
		'url' => '',
		'target' => '',
		'outline' => '',
		'type' => '',
	];

	$buttons = [];
	if(is_page()){
		if(get_post_meta(get_the_ID(), 'enable_custom_buttons')){
			$buttons = get_post_meta(get_the_ID(), 'custom_header_buttons', true);
		}
	}
	else{
		if(get_theme_mod('enable_custom_buttons', false)){
			$buttons = get_theme_mod('custom_header_buttons', []);
		}
	}
	
	$html = '';
	if(!empty($buttons)){
		$html .= '<div class="d-flex gap-2">';
		foreach ($buttons as $button) {
			$button = wp_parse_args($button, $defaults);
			if(empty($button['title'])) continue;

			$outline = $button['outline'] ? 'outline-' : '';
			$class = !empty($button['type']) ? ' btn-'. $outline .esc_attr($button['type']) : '';

			if($button['type'] == 'custom-btn2')  $class = ' custom-btn2';

			$target = $button['target'] ? ' target="_blank"' : '';

			$html .= '<a href="'. esc_url($button['url']) .'" class="btn header-btn'. $class .'"' .$target .'>' . esc_attr($button['title']) . '</a>';
		}
		$html .= '</div>';
	}

	if($echo) echo impresscoder_return_data($html);
	else return $html;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param 	array 	$classes Classes for the body element.
 * @return 	array
 */
function impresscoder_body_classes( $classes ) {

	// Helps detect if JS is enabled or not.
	$classes[] = 'no-js';

	// Adds `singular` to singular pages, and `hfeed` to all other pages.
	$classes[] = is_singular() ? 'singular' : 'hfeed';

	// Add a body class if main navigation is active.
	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'has-main-navigation';
	}

	if(get_theme_mod('sticky_navbar', true)){
		$classes[] = 'has-sticky-navigation';
	}

	// Add a body class if there are no footer widgets.
	if ( impresscoder_get_layout() == 'full' ) {
		$classes[] = 'no-widgets';
		$classes[] = 'no-sidebar';
	}else{
		$classes[] = 'has-sidebar';
		$classes[] = impresscoder_get_layout() == 'ls'? 'left-sidebar' : 'right-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'impresscoder_body_classes' );

/**
 * Adds custom class to the array of posts classes.
 *
 * @param 	array 	$classes An array of CSS classes.
 * @return 	array
 */
function impresscoder_post_classes( $classes ) {
	$classes[] = 'entry';

	if(!is_singular()){
	}

	return $classes;
}
add_filter( 'post_class', 'impresscoder_post_classes', 10, 3 );

if(!function_exists('impresscoder_filter_excerpt_length')){
    add_filter( 'excerpt_length', 'impresscoder_filter_excerpt_length' );
    function impresscoder_filter_excerpt_length(int $length){
        $length = get_theme_mod('excerpt_length', 55);
        return $length;
    }
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @return void
 */
function impresscoder_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'impresscoder_pingback_header' );

/**
 * Remove the `no-js` class from body if JS is supported.
 *
 * @return void
 */
function impresscoder_supports_js() {
	echo '<script>document.body.classList.remove("no-js");</script>';
}
add_action( 'wp_footer', 'impresscoder_supports_js' );

/**
 * Changes comment form default fields.
 *
 * @param 	array 	$defaults The form defaults.
 * @return 	array
 */
function impresscoder_comment_form_defaults( $defaults ) {

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $defaults['comment_field'] );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'impresscoder_comment_form_defaults' );

/**
 * Determines if post thumbnail can be displayed.
 *
 * @return bool
 */
function impresscoder_can_show_post_thumbnail() {
/**
 * Filters whether post thumbnail can be displayed.
 *
 * @param bool 	$show_post_thumbnail Whether to show post thumbnail.
 */
	return apply_filters(
		'impresscoder_can_show_post_thumbnail',
		! post_password_required() && ! is_attachment() && has_post_thumbnail()
	);
}

/**
 * Returns the size for avatars used in the theme.
 *
 * @return int
 */
function impresscoder_get_avatar_size() {
	return 60;
}

/**
 * Creates continue reading text.
 */
function impresscoder_continue_reading_text() {
	$read_more_text = get_theme_mod('read_more_text', esc_attr__('Read more', 'impresscoder'));
	$continue_reading = sprintf(
		/* translators: %s: Post title. Only visible to screen readers. */
		esc_html__( '%s %s', 'impresscoder' ),
		esc_attr($read_more_text),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	);

	return $continue_reading;
}

function impresscoder_continue_reading_link(){
	return '<a class="more-link d-flex align-items-center gap-1 text-uppercase fw-semibold small letter-spacing-1" href="' . esc_url( get_permalink() ) . '">' . impresscoder_continue_reading_text() . impresscoder_get_icon_svg('ui', 'next2', 12) . '</a>';
}

function impresscoder_excerpt_length( $length ) {
	$custom = get_theme_mod( 'excerpt_length', $length );

	return $length;
}
add_filter( 'excerpt_length', 'impresscoder_excerpt_length' );

/**
 * Creates the continue reading link for excerpt.
 */
function impresscoder_excerpt_more() {
	if ( ! is_admin() ) {
		$GLOBALS['impresscoder_continue_link'] = true;
		return '&hellip;';
	}
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'impresscoder_excerpt_more' );

/**
 * Creates the continue reading link.
 */
function impresscoder_the_content_more_link() {
	if ( ! is_admin() ) {
		return '<div class="more-link-container">'.impresscoder_continue_reading_link().'</div>';
	}
}

// Filter the content more link.
add_filter( 'the_content_more_link', 'impresscoder_the_content_more_link' );

if ( ! function_exists( 'impresscoder_post_title' ) ) {
/**
 * Adds a title to posts and pages that are missing titles.
 *
 * @param 	string 	$title The title.
 * @return 	string
 */
	function impresscoder_post_title( $title ) {
		return '' === $title ? esc_html_x( 'Untitled', 'Added to posts and pages that are missing titles', 'impresscoder' ) : $title;
	}
}
add_filter( 'the_title', 'impresscoder_post_title' );

/**
 * Gets the SVG code for a given icon.
 *
 * @param 	string 	$group The icon group.
 * @param 	string 	$icon  The icon.
 * @param 	int    	$size  The icon size in pixels.
 * @return 	string
 */
function impresscoder_get_icon_svg( $group, $icon, $size = 24 ) {
	return Impresscoder\SVG_Icons::get_svg( $group, $icon, $size );
}

/**
 * Changes the default navigation arrows to svg icons
 *
 * @param 	string 	$calendar_output 	The generated HTML of the calendar.
 * @return 	string
 */
function impresscoder_change_calendar_nav_arrows( $calendar_output ) {
	$calendar_output = str_replace('wp-calendar-nav', 'wp-calendar-nav d-flex justify-content-between', $calendar_output);	
	return $calendar_output;
}
add_filter( 'get_calendar', 'impresscoder_change_calendar_nav_arrows' );


/**
 * Get custom CSS.
 *
 * Return CSS for non-latin language, if available, or null
 *
 * @param 	string 	$type 	Whether to return CSS for the "front-end", "block-editor", or "classic-editor".
 * @return 	string
 */
function impresscoder_get_non_latin_css( $type = 'front-end' ) {

	// Fetch site locale.
	$locale = get_bloginfo( 'language' );

/**
 * Filters the fallback fonts for non-latin languages.
 *
 * @param 	array 	$font_family 	An array of locales and font families.
 */
	$font_family = apply_filters(
		'impresscoder_get_localized_font_family_types',
		array(

			// Arabic.
			'ar'    => array( 'Tahoma', 'Arial', 'sans-serif' ),
			'ary'   => array( 'Tahoma', 'Arial', 'sans-serif' ),
			'azb'   => array( 'Tahoma', 'Arial', 'sans-serif' ),
			'ckb'   => array( 'Tahoma', 'Arial', 'sans-serif' ),
			'fa-IR' => array( 'Tahoma', 'Arial', 'sans-serif' ),
			'haz'   => array( 'Tahoma', 'Arial', 'sans-serif' ),
			'ps'    => array( 'Tahoma', 'Arial', 'sans-serif' ),

			// Chinese Simplified (China) - Noto Sans SC.
			'zh-CN' => array( '\'PingFang SC\'', '\'Helvetica Neue\'', '\'Microsoft YaHei New\'', '\'STHeiti Light\'', 'sans-serif' ),

			// Chinese Traditional (Taiwan) - Noto Sans TC.
			'zh-TW' => array( '\'PingFang TC\'', '\'Helvetica Neue\'', '\'Microsoft YaHei New\'', '\'STHeiti Light\'', 'sans-serif' ),

			// Chinese (Hong Kong) - Noto Sans HK.
			'zh-HK' => array( '\'PingFang HK\'', '\'Helvetica Neue\'', '\'Microsoft YaHei New\'', '\'STHeiti Light\'', 'sans-serif' ),

			// Cyrillic.
			'bel'   => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'bg-BG' => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'kk'    => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'mk-MK' => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'mn'    => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'ru-RU' => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'sah'   => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'sr-RS' => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'tt-RU' => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),
			'uk'    => array( '\'Helvetica Neue\'', 'Helvetica', '\'Segoe UI\'', 'Arial', 'sans-serif' ),

			// Devanagari.
			'bn-BD' => array( 'Arial', 'sans-serif' ),
			'hi-IN' => array( 'Arial', 'sans-serif' ),
			'mr'    => array( 'Arial', 'sans-serif' ),
			'ne-NP' => array( 'Arial', 'sans-serif' ),

			// Greek.
			'el'    => array( '\'Helvetica Neue\', Helvetica, Arial, sans-serif' ),

			// Gujarati.
			'gu'    => array( 'Arial', 'sans-serif' ),

			// Hebrew.
			'he-IL' => array( '\'Arial Hebrew\'', 'Arial', 'sans-serif' ),

			// Japanese.
			'ja'    => array( 'sans-serif' ),

			// Korean.
			'ko-KR' => array( '\'Apple SD Gothic Neo\'', '\'Malgun Gothic\'', '\'Nanum Gothic\'', 'Dotum', 'sans-serif' ),

			// Thai.
			'th'    => array( '\'Sukhumvit Set\'', '\'Helvetica Neue\'', 'Helvetica', 'Arial', 'sans-serif' ),

			// Vietnamese.
			'vi'    => array( '\'Libre Franklin\'', 'sans-serif' ),

		)
	);

	// Return if the selected language has no fallback fonts.
	if ( empty( $font_family[ $locale ] ) ) {
		return '';
	}

	/**
	 * Filters the elements to apply fallback fonts to.
	 *
	 * @param array $elements 	An array of elements for "front-end", "block-editor", or "classic-editor".
	 */
	$elements = apply_filters(
		'impresscoder_get_localized_font_family_elements',
		array(
			'front-end'      => array( 'body', 'input', 'textarea', 'button', '.button', '.faux-button', '.wp-block-button__link', '.wp-block-file__button', '.has-drop-cap:not(:focus)::first-letter', '.entry-content .wp-block-archives', '.entry-content .wp-block-categories', '.entry-content .wp-block-cover-image', '.entry-content .wp-block-latest-comments', '.entry-content .wp-block-latest-posts', '.entry-content .wp-block-pullquote', '.entry-content .wp-block-quote.is-large', '.entry-content .wp-block-quote.is-style-large', '.entry-content .wp-block-archives *', '.entry-content .wp-block-categories *', '.entry-content .wp-block-latest-posts *', '.entry-content .wp-block-latest-comments *', '.entry-content p', '.entry-content ol', '.entry-content ul', '.entry-content dl', '.entry-content dt', '.entry-content cite', '.entry-content figcaption', '.entry-content .wp-caption-text', '.comment-content p', '.comment-content ol', '.comment-content ul', '.comment-content dl', '.comment-content dt', '.comment-content cite', '.comment-content figcaption', '.comment-content .wp-caption-text', '.widget_text p', '.widget_text ol', '.widget_text ul', '.widget_text dl', '.widget_text dt', '.widget-content .rssSummary', '.widget-content cite', '.widget-content figcaption', '.widget-content .wp-caption-text' ),
			'block-editor'   => array( '.editor-styles-wrapper > *', '.editor-styles-wrapper p', '.editor-styles-wrapper ol', '.editor-styles-wrapper ul', '.editor-styles-wrapper dl', '.editor-styles-wrapper dt', '.editor-post-title__block .editor-post-title__input', '.editor-styles-wrapper .wp-block h1', '.editor-styles-wrapper .wp-block h2', '.editor-styles-wrapper .wp-block h3', '.editor-styles-wrapper .wp-block h4', '.editor-styles-wrapper .wp-block h5', '.editor-styles-wrapper .wp-block h6', '.editor-styles-wrapper .has-drop-cap:not(:focus)::first-letter', '.editor-styles-wrapper cite', '.editor-styles-wrapper figcaption', '.editor-styles-wrapper .wp-caption-text' ),
			'classic-editor' => array( 'body#tinymce.wp-editor', 'body#tinymce.wp-editor p', 'body#tinymce.wp-editor ol', 'body#tinymce.wp-editor ul', 'body#tinymce.wp-editor dl', 'body#tinymce.wp-editor dt', 'body#tinymce.wp-editor figcaption', 'body#tinymce.wp-editor .wp-caption-text', 'body#tinymce.wp-editor .wp-caption-dd', 'body#tinymce.wp-editor cite', 'body#tinymce.wp-editor table' ),
		)
	);

	// Return if the specified type doesn't exist.
	if ( empty( $elements[ $type ] ) ) {
		return '';
	}

	// Include file if function doesn't exist.
	if ( ! function_exists( 'impresscoder_generate_css' ) ) {
		require_once get_theme_file_path( 'inc/custom-css.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}

	// Return the specified styles.
	return impresscoder_generate_css( // @phpstan-ignore-line.
		implode( ',', $elements[ $type ] ),
		'font-family',
		implode( ',', $font_family[ $locale ] ),
		null,
		null,
		false
	);
}

/**
 * Print the first instance of a block in the content, and then break away.
 *
 * @param 	string      $block_name 	The full block type name, or a partial match.
 *                                		Example: `core/image`, `core-embed/*`.
 * @param 	string|null $content    	The content to search in. Use null for get_the_content().
 * @param 	int         $instances  	How many instances of the block will be printed (max). Default  1.
 * @return 	bool 		Returns true if a block was located & printed, otherwise false.
 */
function impresscoder_print_first_instance_of_block( $block_name, $content = null, $instances = 1 ) {
	$instances_count = 0;
	$blocks_content  = '';

	if ( ! $content ) {
		$content = get_the_content();
	}

	// Parse blocks in the content.
	$blocks = parse_blocks( $content );

	// Loop blocks.
	foreach ( $blocks as $block ) {

		// Sanity check.
		if ( ! isset( $block['blockName'] ) ) {
			continue;
		}

		// Check if this the block matches the $block_name.
		$is_matching_block = false;

		// If the block ends with *, try to match the first portion.
		if ( '*' === $block_name[-1] ) {
			$is_matching_block = 0 === strpos( $block['blockName'], rtrim( $block_name, '*' ) );
		} else {
			$is_matching_block = $block_name === $block['blockName'];
		}

		if ( $is_matching_block ) {
			// Increment count.
			$instances_count++;

			// Add the block HTML.
			$blocks_content .= render_block( $block );

			// Break the loop if the $instances count was reached.
			if ( $instances_count >= $instances ) {
				break;
			}
		}
	}

	if ( $blocks_content ) {
		/** This filter is documented in wp-includes/post-template.php */
		echo apply_filters( 'the_content', $blocks_content ); // phpcs:ignore WordPress.Security.EscapeOutput
		return true;
	}

	return false;
}

/**
 * Retrieve protected post password form content.
 * 
 * @since Corrected parameter name for `$output`,
 *                              added the `$post` parameter.
 *
 * @param 	string      $output 	The password form HTML output.
 * @param 	int|WP_Post $post   	Optional. Post ID or WP_Post object. Default is global $post.
 * @return 	string 		HTML content for password form for password protected post.
 */
function impresscoder_password_form( $output, $post = 0 ) {
	$post   = get_post( $post );
	$label  = 'pwbox-' . ( empty( $post->ID ) ? wp_rand() : $post->ID );
	$output = '<p class="post-password-message">' . esc_html__( 'This content is password protected. Please enter a password to view.', 'impresscoder' ) . '</p>
	<form action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
	<label class="post-password-form__label" for="' . esc_attr( $label ) . '">' . esc_html_x( 'Password', 'Post password form', 'impresscoder' ) . '</label><input class="post-password-form__input" name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" /><input type="submit" class="post-password-form__submit" name="' . esc_attr_x( 'Submit', 'Post password form', 'impresscoder' ) . '" value="' . esc_attr_x( 'Enter', 'Post password form', 'impresscoder' ) . '" /></form>
	';
	return $output;
}
add_filter( 'the_password_form', 'impresscoder_password_form', 10, 2 );

/**
 * Filters the list of attachment image attributes.
 *
 * @param 	string[]     	$attr       	Array of attribute values for the image markup, keyed by attribute name.
 *                                 			See wp_get_attachment_image().
 * @param 	WP_Post      	$attachment 	Image attachment post.
 * @param 	string|int[] 	$size       	Requested image size. Can be any registered image size name, or
 *                                 			an array of width and height values in pixels (in that order).
 * @return 	string[] 		The filtered attributes for the image markup.
 */
function impresscoder_get_attachment_image_attributes( $attr, $attachment, $size ) {

	if ( is_admin() ) {
		return $attr;
	}

	if ( isset( $attr['class'] ) && false !== strpos( $attr['class'], 'custom-logo' ) ) {
		return $attr;
	}

	$width  = false;
	$height = false;

	if ( is_array( $size ) ) {
		$width  = (int) $size[0];
		$height = (int) $size[1];
	} elseif ( $attachment && is_object( $attachment ) && $attachment->ID ) {
		$meta = wp_get_attachment_metadata( $attachment->ID );
		if ( isset( $meta['width'] ) && isset( $meta['height'] ) ) {
			$width  = (int) $meta['width'];
			$height = (int) $meta['height'];
		}
	}

	if ( $width && $height ) {

		// Add style.
		$attr['style'] = isset( $attr['style'] ) ? $attr['style'] : '';
		$attr['style'] = 'width:100%;height:' . round( 100 * $height / $width, 2 ) . '%;max-width:' . $width . 'px;' . $attr['style'];
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'impresscoder_get_attachment_image_attributes', 10, 3 );

function impresscoder_get_navbar_buttons($parts = ''){
	ob_start();
	get_template_part( 'template-parts/header/navbar-buttons', $parts );
	return ob_get_clean();
}

/**
 * Calculate classes for the main <html> element.
 *
 * @return void
 */
function impresscoder_the_html_classes() {
	/**
	 * Filters the classes for the main <html> element.
	 *
	 * @param string The list of classes. Default empty string.
	 */
	$classes = apply_filters( 'impresscoder_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 * @return void
 */
function impresscoder_add_ie_class() {
	?>
	<script>
	if ( -1 !== navigator.userAgent.indexOf( 'MSIE' ) || -1 !== navigator.appVersion.indexOf( 'Trident/' ) ) {
		document.body.classList.add( 'is-IE' );
	}
	</script>
	<?php
}
add_action( 'wp_footer', 'impresscoder_add_ie_class' );

if ( ! function_exists( 'wp_get_list_item_separator' ) ) :
	/**
	 * Retrieves the list item separator based on the locale.
	 *
	 * Added for backward compatibility to support pre-6.0.0 WordPress versions.
	 */
	function wp_get_list_item_separator() {
		/* translators: Used between list items, there is a space after the comma. */
		return __( ', ', 'impresscoder' );
	}
endif;

if(!function_exists('impresscoder_return_data')){
	function impresscoder_return_data($data){
		return $data;
	}
}

if(!function_exists('impresscoder_button_classes')){
	function impresscoder_button_classes(){
		$classes = [
			'' => __('Select type', 'impresscoder'),
			'custom-btn2' => __('Gradient', 'impresscoder'),
			'primary' => __('Primary', 'impresscoder'),
			'secondary' => __('Secondary', 'impresscoder'),
			'success' => __('Success', 'impresscoder'),
			'danger' => __('Danger', 'impresscoder'),
			'warning' => __('Warning', 'impresscoder'),
			'info' => __('Info', 'impresscoder'),
			'dark' => __('Dark', 'impresscoder'),
		];

		return $classes;
	}
}

function impresscoder_get_layout(){
	global $impresscoder;
	$layout = 'rs';
	if(is_page()){
		$layout = get_post_meta( get_the_ID(), 'layout', true );
		if( empty($layout)  ){
			$layout = 'full';
		}
	}

	if( get_post_type() == 'ctrl_listings' && !is_singular() ){		
		$layout = $impresscoder->meta['layout'];		
	}

	if( !is_active_sidebar( impresscoder_get_sidebar() ) ){
		$layout = 'full';
	}
	
	return apply_filters('impresscoder_layout',  $layout);
}

function impresscoder_get_sidebar(){
	global $impresscoder;
	$sidebar = '';
	if(get_post_type() == 'post'){
		$sidebar = 'sidebar-1';
	}

	if( get_post_type() == 'ctrl_listings' && !is_singular() ){
		$sidebar = $impresscoder->meta['sidebar'];
	}
	
	if(is_page()){
		$page_sidebar = get_post_meta( get_the_ID(), 'sidebar', true );
		if( !empty($page_sidebar)  ){
			$sidebar = $page_sidebar;
		}
	}
	return apply_filters('impresscoder_sidebar',  $sidebar);
}

function impresscoder_content( $title, $before = '', $after = '', $echo = true ) {
	if ( strlen( $title ) == 0 ) {
		return;
	}

	$title = $before . wp_kses_post($title)  . $after;

	if ( $echo ) {
		echo wp_kses_post($title);
	} else {
		return $title;
	}
}

function impresscoder_render_block_template($attributes, $is_preview = false, $post_id = null){
	// Fields data.
    if ( empty( $attributes['data'] ) ) {
        return;
    }	

	$template_file = 'template-parts/blocks/'.$attributes['name'].'.php'; 
	$located = locate_template($template_file);
	if($located){
		$atts = $attributes['data'];
		extract($atts);
		include $located;
		return;
	}else{
		if(is_user_logged_in()){
			printf(esc_attr__('%s template not found!!!', 'impresscoder'), '<code>'.$template_file.'</code>');
		}
		
	}	
	 
}

function impresscoder_render_section_template($attributes, $is_preview = false, $post_id = null){
	// Fields data.
    if ( empty( $attributes['data'] ) ) {
        return;
    }
	
	$template_file = 'template-parts/blocks/'.$attributes['name'].'.php';
	$section_template = locate_template($template_file); 
	$section = locate_template('template-parts/blocks/section.php'); 
	
	if($section_template){
		extract($attributes['data']);
		include $section_template;
		return;
	}elseif($section){
		if(!empty($attributes['data']['blocks'])){
			$content = '';
			$blocks = explode(',', $attributes['data']['blocks']);
			$atts = [];
			
			foreach ($blocks as $block) {
				$atts['name'] = str_replace('_', '-', $block);
				$atts['data'] = $attributes['data'][$block];
				ob_start();
				impresscoder_render_block_template($atts, $is_preview, $post_id);
				$content .= ob_get_clean();
			}	
			
		}		
		$atts = $attributes['data']['section'];		
		extract($atts);
		include $section;
		return;
	}else{
		if(is_user_logged_in()){
			printf(esc_attr__('%s template not found!!!', 'impresscoder'), '<code>'.$template_file.'</code>');
		}
		
	}
}

function impresscoder_is_enable_topbar(){
	if(current_user_can('edit_theme_options')) return true;
	if( empty(get_bloginfo('description'))  ) {
		$display_title_and_tagline = false;
	}else{
		$display_title_and_tagline = get_theme_mod('display_title_and_tagline', true);
	}

	if ( $display_title_and_tagline || has_nav_menu( 'social' ) || has_nav_menu( 'topbar' )  )
	return true;

	return false;
}

function impresscoder_get_post_content_style(){
	$value = get_theme_mod('content_style', 'grid');
	return ($value == 'grid')? 'content-grid' : 'content';
}

if(!function_exists('impresscoder_custom_button')){
	function impresscoder_custom_button($args = [], $echo = true){

		$defaults = [
			'text' => __('Button', 'impresscoder'),
			'class' => 'btn-primary',
			'link' => '#',			
			'extra_class' => 'rounded-pill',
			'target_link' => false,
		];
		$args = wp_parse_args($args, $defaults);
		extract($args);

		if (!empty($extra_class)) {
			$class .= ' ' . $extra_class;
		}

		$target_link = $target_link == 1 ? '_blank' : '_self';
		$html = sprintf(
			'<a class="btn  %3$s" target="%5$s" href="%4$s">%1$s %2$s</a>',
			impresscoder_get_icon_svg('ui', 'ticket', 22),
			$text,
			$class,
			$link,
			$target_link,
		);


		if($echo){
			echo impresscoder_return_data($html);
		}
		else{
			return $html;
		}

	}
}

//search icon in header
if( ! function_exists('impresscoder_search_icon') ){
	function impresscoder_search_icon( $extra_class = '', $echo=false ){

		if( !get_theme_mod('enable_header_search', true )) return;

		$atts = [];
		$atts['class'] = 'nav-link d-inline-block px-15 my-auto';
		$atts['href'] = '#';
		$atts['id'] = 'offcanvas-search-icon';  
		$atts['data-bs-toggle'] = 'offcanvas';  
		$atts['data-bs-target'] = '#offcanvassearch'; 

		if(!empty($extra_class)){
			$atts['class'] .= ' '.$extra_class;
		}

		extract($atts);
        foreach($atts as $name => $value){
            if(empty($name) || empty($value)) continue;
            $atts[] = ' '.$name . '="' . $value . '"';
            unset($atts[$name]);
        }
		
		$icon= '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
		<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
		</svg>';

		$search_icon = sprintf(
			'<a%1$s>%2$s</a>',
			implode(' ', $atts),
			$icon
		);

		if( $echo ) echo impresscoder_return_data($search_icon);
		else return $search_icon;
	}
}

//impresscoder_parse_link_text copyright text
if (!function_exists('impresscoder_parse_link_text')) {
	function impresscoder_parse_link_text($text, $link = '')
	{
		preg_match_all("/\{([^\}]*)\}/", $text, $matches);
		if (!empty($matches)) {
			foreach ($matches[1] as $value) {
				$find    = "{{$value}}";
				$replace = "<a href='{$link}' class='color-primary'>{$value}</a>";

				$text    = str_replace($find, $replace, $text);
			} //$matches[1] as $value
		} //!empty( $matches )

		$text = str_replace(" / ", "<span class='color-linear'>/</span>", $text);
		return $text;
	}
}



//global impresscoder impresscoder_get_post_meta
function impresscoder_get_post_meta($key, $value, $echo = false)
{
	global $wp_query;
	$post_id = $wp_query->get_queried_object_id();
	$value = get_theme_mod($key, $value);
	$post_types = ['post', 'page'];

	if (is_singular($post_types) && metadata_exists('post', $post_id, $key)) {
		$value = get_post_meta($post_id, $key, true);
	}
	if ($echo) {
		echo wp_kses_post($value);
	} else {
		return $value;
	}
}


// Category image taxtonomoy size
if (!function_exists('impresscoder_category_image')) {
    function impresscoder_category_image($term_id, $key, $size = 'full')
    {
        if (!function_exists('ctrlbp_meta') || empty($term_id) || empty($key)) return;

        $cat_image_id = ctrlbp_meta($key, ['object_type' => 'post'], $term_id);

        if (!empty($cat_image_id) && !is_wp_error($cat_image_id)) {
            $cat_image = wp_get_attachment_image_src($cat_image_id, $size);
            $cat_image_url = (!is_wp_error($cat_image) || !empty($cat_image)) ?  $cat_image[0] : '';
        } else {
            $cat_image_url = '';
        }
        return $cat_image_url;
    }
}


add_filter('ctrlbp_meta_boxes', 'impresscoder_register_taxonomy_meta_boxes');
function impresscoder_register_taxonomy_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title'      => '',
        'taxonomies' => 'category',
        'fields' => array(
            array(
                'name' =>  esc_attr__('Category Image', 'genz'),
                'id'   => 'category_image',
                'type' => 'single_image',
                'admin_columns' => array(
                    'position' => 'after name',
                    'title' => 'Image'
                )
            ),
            // Category Template
            // array(
            //     'name' =>  esc_attr__('Category Template', 'genz'),
            //     'id'   => 'cat_archive_template',
            //     'type' => 'select',
            //     'std'  =>   '',
            //     'options' => array(
            //         ''           => esc_attr__('Select Templete', 'genz'),
            //         'style1'     => esc_attr__('Template Style 1', 'genz'),
            //         'style2'     => esc_attr__('Template Style 2', 'genz'),
            //         'style3'     => esc_attr__('Template Style 3', 'genz'),
            //         'style4'     => esc_attr__('Template Style 4', 'genz'),
            //         'style5'     => esc_attr__('Template Style 5', 'genz'),
            //     )
            // ),
        ),
    );

    $meta_boxes[] = array(
        'title'      => '',
        'taxonomies' => ['post_tag', 'portfolio_cat'],
        'fields' => array(
            array(
                'name' =>  esc_attr__('Image', 'genz'),
                'id'   => 'tag_image',
                'type' => 'single_image',
                'admin_columns' => array(
                    'position' => 'after name',
                    'title' => 'Image'
                )
            ),
        ),
    );

    return $meta_boxes;
}


// impresscoder_get_the_term_list
function impresscoder_get_the_term_list($post_id, $taxonomy, $before = '', $sep = '', $after = '', $link_html = true)
{
    $terms = get_the_terms($post_id, $taxonomy);

    if (is_wp_error($terms)) {
        return $terms;
    }

    if (empty($terms)) {
        return false;
    }

    $links = array();

    foreach ($terms as $term) {
        $link = get_term_link($term, $taxonomy);
        if (is_wp_error($link)) {
            return $link;
        }
        $links[] = $link_html ? '<a href="' . esc_url($link) . '" rel="tag">' . $term->name . '</a>' : $term->slug;
    }

    /**
     * Filters the term links for a given taxonomy.
     *
     * The dynamic portion of the hook name, `$taxonomy`, refers
     * to the taxonomy slug.
     *
     * Possible hook names include:
     *
     *  - `term_links-category`
     *  - `term_links-post_tag`
     *  - `term_links-post_format`
     *
     * @since 2.5.0
     *
     * @param string[] $links An array of term links.
     */
    $term_links = apply_filters("impresscoder_term_links-{$taxonomy}", $links);  // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores

    return $before . implode($sep, $term_links) . $after;
}

if (!function_exists('impresscoder_return_data')) {
    function impresscoder_return_data($data)
    {
        return $data;
    }
}