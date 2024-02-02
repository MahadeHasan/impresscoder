<?php

namespace ControlEvents\Widgets;

class Services extends \Elementor\Widget_Base
{
	use Helper;
	public function get_name()
	{
		return 'impresscoder-services';
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
			'icon_option',
			[
				'label' => esc_html__('Select Image or Icon', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'icon_image' => 'Feature Image',
					'icon' => 'Feature Icon',
				],
				'label_block' => true,
				'default'		=> 'icon_image',
			]
		);
		$repeater->add_control(
			'icon_image',
			[
				'label' => esc_html__('Choose Image', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition'	=> [
					'icon_option'		=> 'icon_image',
				],
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::ICONS, 
				'condition'	=> [
					'icon_option'		=> 'icon',
				],
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
			'service_sub_title',
			[
				'label' => esc_html__('Services Sub Title', 'impresscoder-element'),
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
			'services_list',
			[
				'label' => esc_html__('Services List', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '<strong>{{{ service_title }}}</strong>',
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
		impresscoder_framework_template('elements/services', '', $settings);
	}

	protected function services_defaults_item()
	{
		return array(
			[
				'icon'				=> [
					'value'			=> 'pe-7s-add-user',
				],
				'icon_image' =>  ['url' => get_theme_file_uri('/assets/images/icon/whatsap.png')], 
				'service_title'		=> 'Website Design', 'impresscoder-element',
				'service_sub_title'		=> 'Any Types of Website Design', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			],
			[
				
				'icon'				=> [
					'value'			=> 'pe-7s-add-user',
				],
				'icon_image' =>  ['url' => get_theme_file_uri('/assets/images/icon/linkedin.png')], 
				'service_title'		=> 'Wordpress Development', 'impresscoder-element',
				'service_sub_title'		=> 'WP Website Design Develoment & Customize', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			], 
			[
				
				'icon'				=> [
					'value'			=> 'pe-7s-add-user',
				],
				'icon_image' =>  ['url' => get_theme_file_uri('/assets/images/icon/skype.png')], 
				'service_title'		=> 'Website Re-Design', 'impresscoder-element',
				'service_sub_title'		=> '5+ Year Experience in website Re-Designe', 'impresscoder-element',
				'services_desc'		=> 'NetTracking" is a very powerful Web 2.0 site search engine allows you to find email allerts', 'impresscoder-element'
			], 
		);
	}
}
