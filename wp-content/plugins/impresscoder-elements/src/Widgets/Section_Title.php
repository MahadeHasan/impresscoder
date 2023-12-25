<?php

namespace ControlEvents\Widgets;

class Section_Title extends \Elementor\Widget_Base
{

	use Traits\Style;
	public function get_name()
	{
		return 'section_title';
	}

	public function get_title()
	{
		return esc_html__('Section Title', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-site-title';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['section title', 'genz'];
	}

	protected function register_controls()
	{

		// Content Tab Start
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Section Title', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Section Title', 'impresscoder-element'),
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
		$this->add_control(
			'description',
			[
				'label' => esc_html__('Description', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('Lorem ipsum, dolor sit amet consectetur adipisicing elit.', 'impresscoder-element'),
			]
		);
		$this->add_control(
			'display_button',
			[
				'label' => esc_html__('Display Button', 'control-events'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('Show', 'control-events'),
				'label_off' => esc_html__('Hide', 'control-events'),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before'
			]
		);

		$this->register_button_controls(array(
			'button_type' => 'link',
			'button_icon' => 'ticket',
			'library_icon' => ['value' => 'fab fa-facebook-f', 'library' => 'fa-brands'],
			'condition' => ['display_button'    => 'yes'],
			'button_text' => esc_html__('Buy ticket', 'control-events'),
			'button_link' => [
				'url' => '#',
				'is_external' => false,
			],
		));
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_alignment',
			[
				'label' => esc_html__('Style', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'text_align',
			[
				'label' => esc_html__('Alignment', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'impresscoder-element'),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'impresscoder-element'),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'impresscoder-element'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->register_style_controls([
			'id' => 'title',
			'name' => esc_attr__('Title', 'impresscoder-element'),
			'selector' => '.heading-2',
		]);
		$this->register_style_controls([
			'id' => 'description',
			'name' => esc_attr__('Description', 'impresscoder-element'),
			'selector' => '.description',
		]);
		$this->register_button_style_controls([
			'id' => 'btn',
			'name' => esc_attr__('Button', 'control-events'),
			'selector' => '.btn',
		]);
	}



	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/section-title', '', $settings);
	}
}
