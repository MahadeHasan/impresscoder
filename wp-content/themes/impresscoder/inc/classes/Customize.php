<?php
namespace Impresscoder;
/**
 * Customizer settings for this theme.
 *
 * @package 	WordPress
 * @subpackage 	Impresscoder
 */


/**
 * Customizer Settings.
 */
class Customize {

	/**
	 * Constructor. Instantiate the object.
	 */
	public function __construct() {
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_enqueue') );
		add_action( 'customize_register', array( $this, 'register' ) );				
		
	}

	public function customize_enqueue(){
		wp_enqueue_style( 'impresscoder-customize', IMPRESSCODER_ASSETS . '/css/admin/impresscoder-customize.css' );
		wp_enqueue_script( 'impresscoder-customize', IMPRESSCODER_ASSETS . '/js/admin/impresscoder-customize.js', array( 'jquery', 'customize-controls' ), false, true );
	}

	/**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function register( $wp_customize ) {

		

		
		
		

		// Add "display_title_and_tagline" setting for displaying the site-title & tagline.
		$wp_customize->add_setting(
			'display_title_and_tagline',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
			)
		);

		// Add control for the "display_title_and_tagline" setting.
		$wp_customize->add_control(
			'display_title_and_tagline',
			array(
				'type'    => 'checkbox',
				'section' => 'title_tagline',
				'label'   => esc_html__( 'Display Site Title & Tagline', 'impresscoder' ),
			)
		);


		/**
		 * Add excerpt or full text selector to customizer
		 */
		$wp_customize->add_section(
			'blog_settings',
			array(
				'title'    => esc_html__( 'Blog Settings', 'impresscoder' ),
				'priority' => 120,
			)
		);
		
		// content_style
		$wp_customize->add_setting(
			'content_style',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'grid',
				'sanitize_callback' => static function( $value ) {
					return 'grid' === $value || 'classic' === $value ? $value : 'grid';
				},
			)
		);

		$wp_customize->add_control(
			'content_style',
			array(
				'type'    	=> 'radio',
				'section' 	=> 'blog_settings',
				'label'   	=> esc_html__( 'On Archive Pages, Posts style:', 'impresscoder' ),
				'choices' 	=> array(
					'grid' 		=> esc_html__( 'Grid', 'impresscoder' ),
					'classic'   => esc_html__( 'Classic', 'impresscoder' ),
				),
			)
		);

		// display_excerpt_or_full_post
		$wp_customize->add_setting(
			'display_excerpt_or_full_post',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'excerpt',
				'sanitize_callback' => static function( $value ) {
					return 'excerpt' === $value || 'full' === $value ? $value : 'excerpt';
				},
			)
		);

		$wp_customize->add_control(
			'display_excerpt_or_full_post',
			array(
				'type'    		=> 'radio',
				'section' 		=> 'blog_settings',
				'label'   		=> esc_html__( 'On Archive Pages, Posts show:', 'impresscoder' ),
				'choices' 		=> array(
					'excerpt' => esc_html__( 'Summary', 'impresscoder' ),
					'full'    => esc_html__( 'Full text', 'impresscoder' ),
				),
				'active_callback' => static function() {
					return 'classic' === get_theme_mod('content_style')? true : false;
				}
			)
		);

		// excerpt_length
		$wp_customize->add_setting(
			'excerpt_length',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 30,				
				'sanitize_callback' => static function( $value ) {
					return intval($value);
				},
			)
		);

		$wp_customize->add_control(
			'excerpt_length',
			array(
				'type'    			=> 'range',
				'section' 			=> 'blog_settings',
				'label'   			=> esc_html__( 'On Post summary, Excerpt length:', 'impresscoder' ),
				'description'		=> esc_attr__('Only worked when post excerpt is displayed.', 'impresscoder'),
				'input_attrs' => array(
					'min' => -1,
					'max' => 100,
					'step' => 1,
				  ),				
			)
		);

		// read_more_text
		$wp_customize->add_setting(
			'read_more_text',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('Read more', 'impresscoder'),				
				'sanitize_callback' => static function( $value ) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'read_more_text',
			array(
				'type'    			=> 'text',
				'section' 			=> 'blog_settings',
				'label'   			=> esc_html__( 'On Post summary, Read more text:', 'impresscoder' ),
				'description'		=> esc_attr__('Only worked when post excerpt is displayed.', 'impresscoder')				
			)
		);

		
		

		// Background color.
		
		// Register the custom control.
		$wp_customize->register_control_type( 'Impresscoder\Customize_Color_Control' );

		// Get the palette from theme-supports.
		$palette = get_theme_support( 'editor-color-palette' );

		// Build the colors array from theme-support.
		$colors = array();
		if ( isset( $palette[0] ) && is_array( $palette[0] ) ) {
			foreach ( $palette[0] as $palette_color ) {
				$colors[] = $palette_color['color'];
			}
		}		
	}

	/**
	 * Sanitize boolean for checkbox.
	 *
	 * @param 	bool 	$checked Whether or not a box is checked.
	 * @return 	bool
	 */
	public static function sanitize_checkbox( $checked = null ) {
		return (bool) isset( $checked ) && true === $checked;
	}

	/**
	 * Sanitize boolean for checkbox.
	 *
	 * @param 	bool 	$checked Whether or not a box is checked.
	 * @return 	bool
	 */
	public static function sanitize_attachment( $value = null ) {
		$attachment = wp_get_attachment_image($value);
		return (!empty($attachment) || !is_wp_error($attachment))? $value : null;
	}

	

	public function settings_pages( $settings_pages ) {
		$theme_slug = get_option( 'stylesheet' );
		$settings_pages[] = [
			'id'               => 'impresscoder',
			'option_name'      => "theme_mods_{$theme_slug}",
			'menu_title'       => 'Theme Options',
			'parent'           => 'themes.php',
			'customizer_only'  => true, // THIS
		];
		return $settings_pages;
	}

	public function meta_boxes($meta_boxes){
		$meta_boxes[] = [
			'id'             => 'general',
			'title'          => 'General',
			'settings_pages' => 'impresscoder',
			//'panel'          => 'excerpt_settings', // THIS
			'fields'         => [
				[
					'name' => 'Logo',
					'id'   => 'logo1',
					'type' => 'file_input',
				],
				[
					'name'    => 'Layout',
					'id'      => 'layout1',
					'type'    => 'image_select',
					'options' => [
						'sidebar-left'  => 'http://i.imgur.com/Y2sxQ2R.png',
						'sidebar-right' => 'http://i.imgur.com/h7ONxhz.png',
						'no-sidebar'    => 'http://i.imgur.com/m7oQKvk.png',
					],
				],
			],
		];
		return $meta_boxes;

	}
}