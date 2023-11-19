<?php

namespace ControlEvents\Widgets;

class Impresscoder_Contact_Info extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'impresscodercontact_info';
	}

	public function get_title()
	{
		return esc_html__('contact info', 'impresscoder-element');
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
		return ['contact', 'genz'];
	}

	protected function register_controls()
	{

		// Contact Info Tab Start
		$this->start_controls_section(
			'contact_information',
			[
				'label' => esc_html__('Contact Info List', 'impresscoder-element'),
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
			'contact1',
			[
				'label' => esc_html__('Contact 1', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true
			]
		);
		$repeater->add_control(
			'contact2',
			[
				'label' => esc_html__('Contact 2', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true
			]
		);
		$this->add_control(
			'contact_items',
			[
				'label' => esc_html__('Contact List', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default'	=> 	$this->contact_defaults_item(),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
		// end_controls_section 

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-contact-info', '', $settings);
	}

	protected function contact_defaults_item()
	{
		return array(
			[
				'icon'				=> [
					'value'			=> 'support',
				],
				'contact1'			=> esc_html__('(48) 654-430-309', 'impresscoder-element'),
				'contact2'			=> esc_html__('(01) 654-430-309', 'impresscoder-element'),

			],
			[
				'icon'				=> [
					'value'			=> 'location ',
				],
				'contact1'			=> esc_html__('contact@genz.com', 'impresscoder-element'),
				'contact2'			=> esc_html__('sales@genz.com', 'impresscoder-element'),

			],
			[
				'icon'				=> [
					'value'			=> 'plane',
				],
				'contact1'			=> esc_html__('11567 E Broadview Dr	Colorado(CO), 80117', 'impresscoder-element'),
				'contact2'			=> esc_html__('(48) 654-430-309', 'impresscoder-element'),

			],
		);
	}
}
