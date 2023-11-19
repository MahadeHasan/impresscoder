<?php

namespace ControlEvents\Widgets;

class Impresscoder_Post_Tags extends \Elementor\Widget_Base
{
	use Traits\Style;
	public function get_name()
	{
		return 'impresscoderpost_tags';
	}

	public function get_title()
	{
		return esc_html__('Impresscoder Tags', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-tags';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['tags'];
	}

	protected function register_controls()
	{

		// About Features Tab Start  
		$this->start_controls_section(
			'post_tags_tab',
			[
				'label' => esc_html__('Popular Tags', 'impresscoder-element'),
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
					'{{WRAPPER}} .text-alignment' => 'justify-content: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'number_of_tag',
			[
				'label' => esc_html__('Number of Tags', 'impresscoder-element'),
				'description'	=> esc_html__('Enter your number, how many tags you wanna show', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 10,

			]
		);
		$this->end_controls_section();
		$this->register_style_controls([
			'id' => 'post-tag',
			'name' => esc_attr__('Tags', 'impresscoder-element'),
			'selector' => '.card-style-2',
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-post-tags', '', $settings);
	}
}
