<?php

namespace ControlEvents\Widgets;

class Impresscoder_Pricing_Tables extends \Elementor\Widget_Base
{
	use Helper;
	use Traits\Style;

	public function get_name()
	{
		return 'impresscoderpricing_tables';
	}

	public function get_title()
	{
		return esc_html__('Impresscoder Pricing tables', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-price-table';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['pricing', 'control', 'event'];
	}

	protected function register_controls()
	{

		// Content Tab Start

		$this->start_controls_section(
			'content_tab',
			[
				'label' => esc_html__('Pricing Table', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'package_name',
			[
				'label' => esc_html__('Package Name', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Free', 'impresscoder-element'),
				'label_block' => true
			]
		);
		$repeater->add_control(
			'package_name_tag',
			[
				'label' => esc_html__('Title & Typewrite Tag', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'    => [
					'h1'	=> esc_html__('H1', 'impresscoder-element'),
					'h2'	=> esc_html__('H2', 'impresscoder-element'),
					'h3'	=> esc_html__('H3', 'impresscoder-element'),
					'h4'	=> esc_html__('H4', 'impresscoder-element'),
					'h5'	=> esc_html__('H5', 'impresscoder-element'),
					'h6'	=> esc_html__('H6', 'impresscoder-element'),
				],
				'default' => 'h3',
			]
		);
		$repeater->add_control(
			'plan_badge_enable',
			[
				'label' => esc_html__('Plan Badge ', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$repeater->add_control(
			'badge_color',
			[
				'label' => esc_html__('Select Color Badge ', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'bg-light badge',
				'options' => [
					'' => esc_html__('Default', 'impresscoder-element'),
					'lbl-success'  => esc_html__('Color Primary', 'impresscoder-element'),
					'lbl-danger' => esc_html__('Color Danger', 'impresscoder-element'),
					'bg-info' => esc_html__('Color Info', 'impresscoder-element'),
					'bg-success' => esc_html__('Color Success', 'impresscoder-element'),
				],
			]
		);
		$repeater->add_control(
			'plan_badge_name',
			[
				'label' => esc_html__('Plan Badge Name', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'sub_title',
			[
				'label' => esc_html__('Package Sub Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' =>  esc_html__("Best for personal use", 'impresscoder-element'),
			]
		);
		$repeater->add_control(
			'description',
			[
				'label' => esc_html__('Sub-title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('Get started without creadit card or payment method', 'impresscoder-element'),
			]
		);
		$repeater->add_control(
			'try_btn',
			[
				'label' => esc_html__('Try For Free Button Text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Try For Free', 'impresscoder-element'),
				'label_block' => true
			]
		);
		$repeater->add_control(
			'try_btn_link',
			[
				'label' => esc_html__('Button Link', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => ['url'],
				'default' => [
					'url' => '#',
				],
				'label_block' => true
			]
		);
		$repeater->add_control(
			'enable_btn_target',
			[
				'label' => esc_html__('Button Link new tab', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__('Yes', 'impresscoder-element'),
				'label_off' => esc_html__('No', 'impresscoder-element'),
				'return_value' => 'yes',
			]
		);
		$repeater->add_control(
			'learn_more_btn',
			[
				'label' => esc_html__('Learn More Text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Try For Free', 'impresscoder-element'),
				'label_block' => true
			]
		);
		$repeater->add_control(
			'learn_more_link',
			[
				'label' => esc_html__('Learn More Link', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('#', 'impresscoder-element'),
				'label_block' => true
			]
		);

		$repeater->add_control(
			'enable_link_target',
			[
				'label' => esc_html__('Learn more new tab', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__('Yes', 'impresscoder-element'),
				'label_off' => esc_html__('No', 'impresscoder-element'),
				'return_value' => 'yes',
			]
		);
		$repeater->add_control(
			'feature_label',
			[
				'label' => esc_html__('Features label', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('What you get:', 'impresscoder-element'),
				'label_block' => true
			]
		);
		$features = new \Elementor\Repeater();
		$features->add_control(
			'feature_item',
			[
				'label' => esc_html__('Features', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true
			]
		);
		$repeater->add_control(
			'features',
			[
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $features->get_controls(),
				'title_field' => '{{{ feature_item }}}',
				'label_block' => true
			]
		);
		$this->add_control(
			'pricing_tables',
			[
				'label' => esc_html__('Pricing Tables', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '<strong>{{{ package_name }}}</strong>',
				'default' => [
					[
						'package_name'		    => esc_html__('Free', 'impresscoder-element'),
						'plan_badge_enable'		=> 'yes',
						'plan_badge_name'		=>  esc_html__('Standard', 'impresscoder-element'),
						'sub_title' 			=>  esc_html__('Best for personal use', 'impresscoder-element'),
						'description'			=>  esc_html__('Get started without creadit card or payment method', 'impresscoder-element'),
						'try_btn' 				=> esc_html__('Try For Free', 'impresscoder-element'),
						'try_btn_link' 			=> esc_html__('#', 'impresscoder-element'),
						'learn_more_btn' 		=> esc_html__('learn more', 'impresscoder-element'),
						'learn_more_link' 		=> esc_html__('#', 'impresscoder-element'),
						'feature_label' 		=> esc_html__('What you will get :', 'impresscoder-element'),
						'features' => [
							[
								'feature_item' => esc_html__('Unlimited Storage', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Unlimited Members', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Two-Factor Authentication', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Collaborative Docs', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Sprint Management', 'impresscoder-element'),
							]
						]
					],
					[

						'package_name'		    => esc_html__('Business', 'impresscoder-element'),
						'plan_badge_enable'		=> 'yes',
						'plan_badge_name'		=>  esc_html__('Standard', 'impresscoder-element'),
						'sub_title' 			=>  esc_html__('Best for personal use', 'impresscoder-element'),
						'description'			=>  esc_html__('Get started without creadit card or payment method', 'impresscoder-element'),
						'try_btn' 				=> esc_html__('Try For Free', 'impresscoder-element'),
						'try_btn_link' 			=> esc_html__('#', 'impresscoder-element'),
						'learn_more_btn' 		=> esc_html__('learn more', 'impresscoder-element'),
						'learn_more_link' 		=> esc_html__('#', 'impresscoder-element'),
						'feature_label' 		=> esc_html__('What you will get :', 'impresscoder-element'),
						'features' => [
							[
								'feature_item' => esc_html__('Unlimited Storage', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Unlimited Members', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Two-Factor Authentication', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Collaborative Docs', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Sprint Management', 'impresscoder-element'),
							]
						]
					],
					[

						'package_name'		    => esc_html__('Enterprise ', 'impresscoder-element'),
						'plan_badge_enable'		=> 'yes',
						'plan_badge_name'		=>  esc_html__('Standard', 'impresscoder-element'),
						'sub_title' 			=>  esc_html__('Best for personal use', 'impresscoder-element'),
						'description'			=>  esc_html__('Get started without creadit card or payment method', 'impresscoder-element'),
						'try_btn' 				=> esc_html__('Try For Free', 'impresscoder-element'),
						'try_btn_link' 			=> esc_html__('#', 'impresscoder-element'),
						'learn_more_btn' 		=> esc_html__('learn more', 'impresscoder-element'),
						'learn_more_link' 		=> esc_html__('#', 'impresscoder-element'),
						'feature_label' 		=> esc_html__('What you will get :', 'impresscoder-element'),
						'features' => [
							[
								'feature_item' => esc_html__('Unlimited Storage', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Unlimited Members', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Two-Factor Authentication', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Collaborative Docs', 'impresscoder-element'),
							],
							[
								'feature_item' => esc_html__('Sprint Management', 'impresscoder-element'),
							]
						]
					]

				]

			]
		);


		$this->end_controls_section();

		$this->register_style_controls([
			'id' => 'badge',
			'name' => esc_attr__('Price badge', 'impresscoder-element'),
			'selector' => '.badge',
		]);
		$this->register_style_controls([
			'id' => 'package_name',
			'name' => esc_attr__('Package name ', 'impresscoder-element'),
			'selector' => '.package_name',
		]);
		$this->register_style_controls([
			'id' => 'sub_title',
			'name' => esc_attr__('Sub title', 'impresscoder-element'),
			'selector' => '.sub_title',
		]);
		$this->register_style_controls([
			'id' => 'desc',
			'name' => esc_attr__('Description', 'impresscoder-element'),
			'selector' => '.desc',
		]);
		$this->register_style_controls([
			'id' => 'feature_label',
			'name' => esc_attr__('Feature Label', 'impresscoder-element'),
			'selector' => '.feature_label',
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-pricing-tables', '', $settings);
	}
}
