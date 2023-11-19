<?php

namespace ControlEvents\Widgets;

class About_Us extends \Elementor\Widget_Base
{
	use Helper;
	use Traits\Style;
	public function get_name()
	{
		return 'about_us';
	}

	public function get_title()
	{
		return esc_html__('About Us', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-image-before-after';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['about', 'event'];
	}

	protected function register_controls()
	{

		// About Features Tab Start  
		$this->start_controls_section(
			'about_tab',
			[
				'label' => esc_html__('About Content', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'about_sub_title',
			[
				'label' => esc_html__('Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Hello Everyone!', 'impresscoder-element'),
			]
		);
		$this->add_control(
			'about_title',
			[
				'label' => esc_html__('Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('I’m', 'impresscoder-element'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'about_typewrite',
			[
				'label' => esc_html__('Typewrite Text', 'impresscoder-element'),
				'description' => esc_html__('If you want to write multiple text then use , ', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Brian Clark', 'impresscoder-element'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => esc_html__('Title & Typewrite Tag', 'impresscoder-element'),
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
				'default' => 'h1',
			]
		);
		$this->add_control(
			'about_description',
			[
				'label' => esc_html__('About Description', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('I use animation as a third dimension by which to simplify experiences and kuiding thro each and every interaction. I’m not adding motion just to spruce things up, but doing it in ways that.', 'impresscoder-element'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'show_subscription_form',
			[
				'label' => esc_html__('Show Subscription form', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'return_value' => 'yes'
			]
		);
		$this->add_control(
			'email_placeholder',
			[
				'label' => esc_html__('Email placeholder', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Type your email address', 'impresscoder-element'),
				'condition' => [
					'show_subscription_form' => 'yes',
				],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' => esc_html__('Subscription Button text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Subscribe', 'impresscoder-element'),
				'condition' => [
					'show_subscription_form' => 'yes',
				],
			]
		);
		$this->add_control(
			'show_custom_button',
			[
				'label' => esc_html__('Show Custom Button', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);
		$this->add_control(
			'social_link_switch',
			[
				'label' => esc_html__('Show Social Icon', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'custom_button_tab',
			[
				'label' => esc_html__('Custom Button', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'show_custom_button' => 'yes'
				]
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'custom_button_link',
			[
				'label' => esc_html__('Custom Button Link', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'custom_button_text',
			[
				'label' => esc_html__('Custom Button Text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'custom_button_',
			[
				'label' => esc_html__('Custom Button', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'custom_button_text' 	=> esc_html__('Button', 'impresscoder-element'),
						'custom_button_link' 	=> esc_url('#')
					],
				],

				'title_field' => '{{{ custom_button_text }}}',
			]
		);

		$this->end_controls_section();
		// Social Link Tab Start
		$this->start_controls_section(
			'social_link_icon',
			[
				'label' => esc_html__('Social Media', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'label_block' => true,
				'condition' => [
					'social_link_switch' => 'yes',
				],
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'social_title',
			[
				'label' => esc_html__('Social Media Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'social_link',
			[
				'label' => esc_html__('Social Media Link', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'social_links',
			[
				'label' => esc_html__('Brands', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_title' 	=> esc_html__('Facebook', 'impresscoder-element'),
						'social_link' 	=> esc_url('https://www.facebook.com/#')
					],
					[
						'social_title' 	=> esc_html__('Instagram', 'impresscoder-element'),
						'social_link' 	=> esc_url('https://www.instagram.com/#')
					],
					[
						'social_title' 	=> esc_html__('Snapchat', 'impresscoder-element'),
						'social_link' 	=> esc_url('https://www.snapchat.com/#')
					],
					[
						'social_title' 	=> esc_html__('Twitter', 'impresscoder-element'),
						'social_link' 	=> esc_url('https://www.twitter.com/#')
					]
				],
				'title_field' => '{{{ social_title }}}',
			]
		);
		$this->end_controls_section();


		// Content Tab Start
		$this->start_controls_section(
			'about_images',
			[
				'label' => esc_html__('About Image', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'floting_image1',
			[
				'label' => esc_html__('Choose Image 1', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_theme_file_uri('assets/imgs/page/homepage3/banner-1.jpg'),
				],
				'condition' => [
					'floting_image_switch' => 'yes',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'floting_image2',
			[
				'label' => esc_html__('Choose Image 2', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_theme_file_uri('assets/imgs/page/homepage3/banner-2.jpg'),
				],
				'condition' => [
					'floting_image_switch' => 'yes',
				],
				'label_block' => true,
				'label_block' => true,
			]
		);
		$this->add_control(
			'floting_image_switch',
			[
				'label' => esc_html__('Choose Floating Image', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__('Yes', 'impresscoder-element'),
				'label_off' => esc_html__('No', 'impresscoder-element'),
				'return_value' => 'yes',
			]
		);
		$this->add_control(
			'about_image',
			[
				'label' => esc_html__('Choose About Image', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => get_theme_file_uri('assets/imgs/page/homepage1/banner.png'),
				],
				'condition' => [
					'floting_image_switch!' => 'yes',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();

		$this->register_style_controls([
			'id' => 'title',
			'name' => esc_attr__('Title', 'impresscoder-element'),
			'selector' => '.hello',
		]);
		$this->register_style_controls([
			'id' => 'typewrite-text',
			'name' => esc_attr__('Typewrite ', 'impresscoder-element'),
			'selector' => '.typewrites',
		]);
		$this->register_style_controls([
			'id' => 'desc',
			'name' => esc_attr__('Description', 'impresscoder-element'),
			'selector' => '.desc',
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		get_template_part('template-parts/elements/about', '', $settings);
	}
}
