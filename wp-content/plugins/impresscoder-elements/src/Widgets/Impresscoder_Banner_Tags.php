<?php

namespace ControlEvents\Widgets;

class Impresscoder_Banner_Tags extends \Elementor\Widget_Base
{

	use Traits\Style;
	public function get_name()
	{
		return 'impresscoderbanner_tags';
	}

	public function get_title()
	{
		return esc_html__('Banner With Tags', 'impresscoder-element');
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
			'banner_tags_tab',
			[
				'label' => esc_html__('Banner With Tags', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('Name', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_attr__('Welcome to our blog', 'impresscoder-element'),
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label' => esc_html__('Name Tag', 'impresscoder-element'),
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
			'title',
			[
				'label' => esc_html__('Title', 'impresscoder-element'),
				'description'	=> esc_html__('Use { your text } to mark highlight text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_attr__('Being Unique is better	than being Effect', 'impresscoder-element'),

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
			'id' => 'name',
			'name' => esc_attr__('Name', 'impresscoder-element'),
			'selector' => '.heading-6',
		]);
		$this->register_style_controls([
			'id' => 'title',
			'name' => esc_attr__('Title', 'impresscoder-element'),
			'selector' => '.heading-1',
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-banner-tags', '', $settings);
	}
}
