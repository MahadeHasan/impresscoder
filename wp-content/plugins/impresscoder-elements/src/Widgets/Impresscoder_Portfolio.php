<?php

namespace ControlEvents\Widgets;

class Impresscoder_Portfolio extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'portfolio';
	}

	public function get_title()
	{
		return esc_html__('Portfolio', 'impresscoder-element');
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
		return ['portfolio', 'event'];
	}

	protected function register_controls()
	{

		// Portfolio Features Tab Start  
		$this->start_controls_section(
			'portfolio_tab',
			[
				'label' => esc_html__('Portfolio Colums Option', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'select_portfolio_colum',
			[
				'label' => esc_html__('Select Portfolio Column ', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-lg-4',
				'options' => [
					'col-lg-4' => esc_html__('Default Column', 'impresscoder-element'),
					'col-lg-6'  => esc_html__('Two Column', 'impresscoder-element'),
				],
				'label_block'	=> true,
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label' => esc_html__('Enable Pogination Button', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_block' => false,
				'default' => 'no',
				'return_value' 	=> 'yes'
			]
		);
		$this->end_controls_section();

		//section_title_alignment
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
				'label' => esc_html__('Pagination Alignment', 'impresscoder-element'),
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
					'{{WRAPPER}} .nav-alignment' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-portfolio', '', $settings);
	}
}
