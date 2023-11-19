<?php
/*
Plugin Name: Impresscoder Elements
Plugin URI: https://impresscoder.com/
Description: The  Impresscoder Elements Website Builder has it all: drag and drop page builder, mobile responsive editing, and more.
Author: impresscoder
Version: 1.0.0
*/

// Exit if accessed directly.
defined('ABSPATH') || die;

if (!function_exists('impresscodermodule_load')) {
	add_action('init', 'impresscodermodule_load', 1);

	function impresscodermodule_load()
	{

		require __DIR__ . '/vendor/autoload.php';

		define('ELEMENTOR_IMPRESSCODER_', trailingslashit(plugin_dir_url(__FILE__)));
		define('ELEMENTOR_GENZ_VER', '1.0.4');
		define('ELEMENTOR_GENZ_ASSETS', trailingslashit(ELEMENTOR_IMPRESSCODER_ . 'assets'));
		define('ELEMENTOR_GENZ_DIR', trailingslashit(plugin_dir_path(__FILE__)));
		define('ELEMENTOR_GENZ_TEMPLATEPATH', trailingslashit(plugin_dir_path(__FILE__) . 'views'));


		new ControlEvents\Loader;
	}
}
