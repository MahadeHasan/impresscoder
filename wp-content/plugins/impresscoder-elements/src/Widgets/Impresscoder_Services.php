<?php

namespace ControlEvents\Widgets;

class Impresscoder_Services extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'impresscoderservices';
	}

	public function get_title()
	{
		return esc_html__('Services', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-price-list';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['services', 'genz'];
	}

	protected function register_controls()
	{

		// Funfact Tab Start
		$this->start_controls_section(
			'service_information',
			[
				'label' => esc_html__('Services List', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'service_title',
			[
				'label' => esc_html__('Services Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'services_desc',
			[
				'label' => esc_html__('Services Content', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'services_listtt',
			[
				'label' => esc_html__('Services List', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default'	=> 	$this->services_defaults_item(),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
		// end_controls_section 

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-services', '', $settings);
	}

	protected function services_defaults_item()
	{
		return array(
			[
				'icon'				=> [
					'value'			=> 'icon-motion',
				],
				'service_title'		=> 'Motion & Web Graphy', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			],
			[
				'icon'				=> [
					'value'			=> 'icon-ui',
				],
				'service_title'		=> 'UI/Ux Consultancy', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			],
			[
				'icon'				=> [
					'value'			=> 'icon-branding',
				],
				'service_title'		=> 'Branding & Design', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			],
			[
				'icon'				=> [
					'value'			=> 'icon-product',
				],
				'service_title'		=> 'Product Photography', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			],
			[
				'icon'				=> [
					'value'			=> 'icon-key',
				],
				'service_title'		=> 'Key Seo Optimization', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			],
			[
				'icon'				=> [
					'value'			=> 'icon-social',
				],
				'service_title'		=> 'Social Management', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			],
		);
	}
}
