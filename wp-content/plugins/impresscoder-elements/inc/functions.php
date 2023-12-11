<?php
require_once __DIR__ . '/post-types.php';
function impresscoder_elements_option($option_id, $default = NULL)
{
	$output = $default;
	$options = get_option('impresscoder_elements');
	if (isset($options[$option_id])) {
		$output = $options[$option_id];
	}
	return $output;
}


/**
 * Retrieve the name of the highest priority template file that exists.
 *
 * Searches in the STYLESHEETPATH before TEMPLATEPATH and ELEMENTOR_GENZ_TEMPLATEPATH
 * so that themes which inherit from a parent theme can just overload one file.
 *
 * @since 2.7.0
 * @since 5.5.0 The `$args` parameter was added.
 *
 * @param string|array $template_names Template file(s) to search for, in order.
 * @param bool         $load           If true the template file will be loaded if it is found.
 * @param bool         $require_once   Whether to require_once or require. Has no effect if `$load` is false.
 *                                     Default true.
 * @param array        $args           Optional. Additional arguments passed to the template.
 *                                     Default empty array.
 * @return string The template filename if one is located.
 */
function impresscoder_framework_template_element($template_names, $load = false, $require_once = true, $args = array())
{
	$located = '';
	$templates_dir = apply_filters('impresscoder_elements/template_directory', '/impresscoder-elements/');
	foreach ((array) $template_names as $template_name) {
		if (!$template_name) {
			continue;
		}
		if (file_exists(STYLESHEETPATH . $templates_dir . $template_name)) {
			$located = STYLESHEETPATH . $templates_dir . $template_name;
			break;
		} elseif (file_exists(TEMPLATEPATH . $templates_dir . $template_name)) {
			$located = TEMPLATEPATH . $templates_dir . $template_name;
			break;
		} elseif (file_exists(ELEMENTOR_GENZ_TEMPLATEPATH . $template_name)) {
			$located = ELEMENTOR_GENZ_TEMPLATEPATH . $template_name;
			break;
		}
	}


	if ($load && '' !== $located) {
		load_template($located, $require_once, $args);
	}

	return $located;
}


/**
 * Loads a template part into a template.
 *
 * Provides a simple mechanism for child themes to overload reusable sections of code
 * in the theme.
 *
 * Includes the named template part for a theme or if a name is specified then a
 * specialised part will be included. If the theme contains no {slug}.php file
 * then no template will be included.
 *
 * The template is included using require, not require_once, so you may include the
 * same template part multiple times.
 *
 * For the $name parameter, if the file is called "{slug}-special.php" then specify
 * "special".
 *
 * @since 3.0.0
 * @since 5.5.0 A return value was added.
 * @since 5.5.0 The `$args` parameter was added.
 *
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the specialised template.
 * @param array  $args Optional. Additional arguments passed to the template.
 *                     Default empty array.
 * @return void|false Void on success, false if the template does not exist.
 */
function impresscoder_framework_template($slug, $name = null, $args = array())
{
	/**
	 * Fires before the specified template part file is loaded.
	 *
	 * The dynamic portion of the hook name, `$slug`, refers to the slug name
	 * for the generic template part.
	 *
	 * @param string      $slug The slug name for the generic template.
	 * @param string|null $name The name of the specialized template.
	 * @param array       $args Additional arguments passed to the template.
	 */
	do_action("get_template_part_{$slug}", $slug, $name, $args);

	$templates = array();
	$name      = (string) $name;
	if ('' !== $name) {
		$templates[] = "{$slug}-{$name}.php";
	}

	$templates[] = "{$slug}.php";

	/**
	 * Fires before an attempt is made to locate and load a template part.
	 *
	 * @param string   $slug      The slug name for the generic template.
	 * @param string   $name      The name of the specialized template.
	 * @param string[] $templates Array of template files to search for, in order.
	 * @param array    $args      Additional arguments passed to the template.
	 */
	do_action('get_template_part', $slug, $name, $templates, $args);

	if (!impresscoder_framework_template_element($templates, true, false, $args)) {
		return false;
	}
}
 

function elementor_impresscoder_content($content, $before = '', $after = '', $echo = true)
{

	if ($content == '') {
		return;
	}
	$content = wp_kses_post(nl2br($content));

	$content = $before . $content . $after;

	if ($echo) {
		echo $content;
	} else {
		return $content;
	}
}

function impresscoder_elements_css_class($class, $before = '', $after = '', $echo = true)
{
	if (is_array($class)) {
		$class = array_unique(array_filter($class));
		$class = implode('', $class);
	}

	if (strlen($class) == 0) {
		return;
	}

	$class = esc_attr($class);

	$class = $before . $class . $after;

	if ($echo) {
		echo $class;
	} else {
		return $class;
	}
}

function impresscoder_elements_button_html($button, $prefix = '', $echo = true)
{
	$button = wp_parse_args($button, [
		$prefix . 'text' => 'Watch Video',
		$prefix . 'url' => '',
		$prefix . 'style' => '',
		$prefix . 'data' => '',
		$prefix . 'extra_class' => '',
		$prefix . 'video' => ''
	]);

	if (empty($button[$prefix . 'text']) || empty($button[$prefix . 'url'])) return;

	$classes = array_filter([trim($button[$prefix . 'style']), trim($button[$prefix . 'extra_class'])]);
	if (!empty($button[$prefix . 'video']))  $classes[] = 'video-link';
	$content = sprintf(
		'<a class="btn %3$s" href="%2$s"%4$s>%1$s</a>',
		esc_attr($button[$prefix . 'text']),
		esc_url($button[$prefix . 'url']),
		implode(' ', $classes),
		!empty($button[$prefix . 'data']) ? ' ' . $button[$prefix . 'data'] : ''
	);

	if ($echo) {
		echo $content;
	} else {
		return $content;
	}
}

function impresscoder_elementor_get_sidebar_options()
{
	global $wp_registered_sidebars;
	$options = [];
	if (!empty($wp_registered_sidebars)) :
		foreach ($wp_registered_sidebars as $key => $value) {
			$options[$key] = $value['title'];
		}
	endif;
	return $options;
}


if (!function_exists('impresscoder_elementor_parse_text')) {
	function impresscoder_elementor_parse_text($text, $tag = 'span')
	{
		preg_match_all("/\{([^\}]*)\}/", $text, $matches);
		if (!empty($matches)) {
			foreach ($matches[1] as $value) {
				$find    = "{{$value}}";
				if ($tag != 'span') {
					$replace = "<{$tag}>{$value}</{$tag}>";
				} else {
					$replace = "<{$tag} class='color-linear'>{$value}</{$tag}>";
				}

				$text    = str_replace($find, $replace, $text);
			} //$matches[1] as $value
		} //!empty( $matches )

		$text = str_replace(" / ", "<span class='color-linear'>/</span>", $text);

		return $text;
	}
}


/**
 * Get information about available image sizes
 */
function impresscoder_elementor_get_image_sizes_options()
{
	global $_wp_additional_image_sizes;

	$sizes = array(
		'full' => 'Full'
	);

	foreach (get_intermediate_image_sizes() as $_size) {

		$sizes[$_size] =  ucfirst(str_replace('-', ' ', $_size));
	} //get_intermediate_image_sizes() as $_size

	return $sizes;
}


