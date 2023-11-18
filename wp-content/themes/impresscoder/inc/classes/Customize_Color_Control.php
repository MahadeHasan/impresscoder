<?php
namespace Impresscoder;
/**
 * Customize API: WP_Customize_Color_Control class
 *
 * @package 	WordPress
 * @subpackage 	Impresscoder
 */

/**
 * Customize Color Control class.
 *
 * @see WP_Customize_Control
 */
class Customize_Color_Control extends \WP_Customize_Color_Control {
	/**
	 * The control type.
	 *
	 * @var string
	 */
	public $type = 'impresscoder-color';

	/**
	 * Colorpicker palette
	 *
	 * @var array
	 */
	public $palette;

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @return void
	 */
	public function enqueue() {
		parent::enqueue();

		// Enqueue the script.
		wp_enqueue_script(
			'impresscoder-control-color',
			get_theme_file_uri( 'assets/js/palette-colorpicker.js' ),
			array( 'customize-controls', 'jquery', 'customize-base', 'wp-color-picker' ),
			wp_get_theme()->get( 'Version' ),
			false
		);
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @uses 	WP_Customize_Control::to_json()
	 *
	 * @return 	void
	 */
	public function to_json() {
		parent::to_json();
		$this->json['palette'] = $this->palette;
	}
}
