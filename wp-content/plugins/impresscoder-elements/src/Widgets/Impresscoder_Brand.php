<?php

namespace ControlEvents\Widgets;

class Impresscoder_Brand extends \Elementor\Widget_Base
{
	use Traits\Style;
	public function get_name()
	{
		return 'brand';
	}

	public function get_title()
	{
		return esc_html__('Brand Logo', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-image-rollover';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['brand', 'genz'];
	}

	protected function register_controls()
	{
		// Brand Logo Tab Start    
		// Brand Logo Tab Start   
		$this->start_controls_section(
			'brand_tab',
			[
				'label' => esc_html__('Brand Logo', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => esc_html__('Title Text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => 'Content publishing cooperation with my partners',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => esc_html__('Title Tag', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'    => [
					'h1'    => 'H1',
					'h2'    => 'H2',
					'h3'    => 'H3',
					'h4'    => 'H4',
					'h5'    => 'H5',
					'h6'    => 'H6',
					'i'    => 'Ttalic',
				],
				'default' => 'h2',
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'brand_image_name',
			[
				'label' => esc_html__('Brand Name', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'description' => esc_html__('Brand name will add as a image alt text', 'impresscoder-element'),
			]
		);
		$repeater->add_control(
			'brand_image_link',
			[
				'label' => esc_html__('Brand Image Link', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url'],
				'default' => [
					'url' => '#',
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'enable_external_link',
			[
				'label' => esc_html__('Open new window', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__('Yes', 'impresscoder-element'),
				'label_off' => esc_html__('No', 'impresscoder-element'),
				'return_value' => 'yes',
			]
		);
		$repeater->add_control(
			'brand_image',
			[
				'label' => esc_html__('Brand Image', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
			]
		);

		$this->add_control(
			'brands',
			[
				'label' => esc_html__('Brands', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => $this->brand_defaults_image(),
			]
		);

		// $this->add_control(
		// 	'enable_loop',
		// 	[
		// 		'label' => esc_html__('Enable Loop', 'impresscoder-element'),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'default' => 'yes',
		// 		'label_on' => esc_html__('Yes', 'impresscoder-element'),
		// 		'label_off' => esc_html__('No', 'impresscoder-element'),
		// 		'return_value' => 'yes',
		// 	]
		// );
		// $this->add_control(
		// 	'enable_autoplay',
		// 	[
		// 		'label' => esc_html__('Enable Autoplay', 'impresscoder-element'),
		// 		'type' => \Elementor\Controls_Manager::SWITCHER,
		// 		'default' => 'yes',
		// 		'label_on' => esc_html__('Yes', 'impresscoder-element'),
		// 		'label_off' => esc_html__('No', 'impresscoder-element'),
		// 		'return_value' => 'yes',
		// 	]
		// );
		$this->end_controls_section();


		// About Features Tab Start  
		$this->start_controls_section(
			'learn_more_tab',
			[
				'label' => esc_html__('Learn More ', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'learn_more_text',
			[
				'label' => esc_html__('Learn more text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Learn More',
			]
		);
		$this->add_control(
			'learn_more_link',
			[
				'label' => esc_html__('Link', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#',
			]
		);

		$this->end_controls_section();
		$this->register_style_controls([
			'id' => 'title',
			'name' => esc_attr__('Title', 'impresscoder-element'),
			'selector' => '.heading-3',
		]);
	}

	protected function brand_defaults_image()
	{
		return array(
			[
				'brand_image_name'	=> esc_html__('Agon', 'impresscoder-element'),
				'brand_image_link'	=> '#',
				'brand_image'		=> ['url' => get_theme_file_uri('assets/imgs/page/homepage3/agon.svg')],
			],
			[
				'brand_image_name'	=> esc_html__('Mon', 'impresscoder-element'),
				'brand_image_link'	=> '#',
				'brand_image'		=> ['url' => get_theme_file_uri('assets/imgs/page/homepage3/mon.svg')],
			],
			[
				'brand_image_name'	=> esc_html__('Fig', 'impresscoder-element'),
				'brand_image_link'	=> '#',
				'brand_image'		=> ['url' => get_theme_file_uri('assets/imgs/page/homepage3/fig.svg')],
			],
			[
				'brand_image_name'	=> esc_html__('Flow', 'impresscoder-element'),
				'brand_image_link'	=> '#',
				'brand_image'		=> ['url' => get_theme_file_uri('assets/imgs/page/homepage3/flow.svg')],
			],
			[
				'brand_image_name'	=> esc_html__('Evara', 'impresscoder-element'),
				'brand_image_link'	=> '#',
				'brand_image'		=> ['url' => get_theme_file_uri('assets/imgs/page/homepage3/evara.svg')],
			]
		);
	}
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-brand', '', $settings);
	}
}
