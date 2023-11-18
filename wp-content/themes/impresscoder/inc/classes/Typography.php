<?php
namespace Impresscoder;

final class Typography{

	private $prefix = 'impresscoder-';
	
    public function __construct() {
        add_action( 'customize_register', array( $this, 'register' ) );
        add_action('wp_enqueue_scripts', [$this, 'dynamic_css']);
		add_action('enqueue_block_editor_assets', [$this, 'dynamic_css']);
		add_filter('tiny_mce_before_init',[$this, 'dynamic_css_filter']);
		
	}

    /**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function register( $wp_customize ) {

		/**
		 * Add typography settings to customizer
		 */
		$wp_customize->add_section(
			'typography',
			array(
				'title'    => esc_html__( 'Typography', 'impresscoder' ),
				'priority' => 50,
			)
		);        

		// Add "body_font_family" setting.
		$wp_customize->add_setting(
			'body_font_family',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'sourcesanspro',
				'sanitize_callback' => static function( $value ) {
					return esc_attr($value);
				}
			)
		);

		// Add control for the "body_font_family" setting.
		$wp_customize->add_control(
			'body_font_family',
			array(
				'type'    => 'select',
				'section'  => 'typography',
				'label'   => esc_html__( 'Global font family', 'impresscoder' ),
				'choices' 	=> $this->recognized_google_font_families('font_family'),
			)
		);

		// Add "heading_font_family" setting.
		$wp_customize->add_setting(
			'heading_font_family',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'sourcesanspro',
				'sanitize_callback' => static function( $value ) {
					return esc_attr($value);
				}
			)
		);

		// Add control for the "heading_font_family" setting.
		$wp_customize->add_control(
			'heading_font_family',
			array(
				'type'    => 'select',
				'section'  => 'typography',
				'label'   => esc_html__( 'Heading font family', 'impresscoder' ),
				'choices' 	=> $this->recognized_google_font_families('font_family'),
			)
		);

		
	}


	/**
	 * Recognized Google font families
	 *
	 * @uses apply_filters()
	 *
	 * @param string $field_id ID that's passed to the filter.
	 *
	 * @return array
	 */
	function recognized_google_font_families( $field_id ) {

		$families = Google_Fonts::font_family_options();

		return apply_filters( 'impresscoder_recognized_google_font_families', $families, $field_id );
	}

    public function dynamic_css(){	

		wp_enqueue_style('impresscoder-google-fonts', Google_Fonts::get_google_fonts_url(), [], IMPRESSCODER_VERSION);

		global $impresscoder_fonts;
        $styles = [];
		$styles[] = !empty($impresscoder_fonts['body_font_family']['family'])? '--'.$this->prefix.'body-font-family:'. $impresscoder_fonts['body_font_family']['family']. ';' : '';
		$styles[] = !empty($impresscoder_fonts['heading_font_family']['family'])? '--'.$this->prefix.'headings-font-family:'. $impresscoder_fonts['heading_font_family']['family']. ';' : '';

        wp_add_inline_style('impresscoder-style', ':root{'.implode('', $styles).'}');
		wp_add_inline_style('impresscoder-editor', ':root .editor-styles-wrapper{'.implode('', $styles).'}');
    }


	public function dynamic_css_filter($mceInit){
		global $impresscoder_fonts;
		
		$styles = '';
		$styles .= !empty($impresscoder_fonts['body_font_family']['family'])? '--impresscoder-body-font-family:'. $impresscoder_fonts['body_font_family']['family']. ';' : '';
		$styles .= !empty($impresscoder_fonts['heading_font_family']['family'])? '--impresscoder-headings-font-family:'. $impresscoder_fonts['heading_font_family']['family']. ';' : '';

	
		if ( isset( $mceInit['content_style'] ) ) {
			$mceInit['content_style'] .= 'body.mce-content-body {'.$styles .'} ';
		} else {
			$mceInit['content_style'] = 'body.mce-content-body {'.$styles.'} ';
		}
		return $mceInit;
	}
    
}