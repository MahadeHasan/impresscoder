<?php

namespace ControlEvents\Widgets;

class Impresscoder_Banner_Category extends \Elementor\Widget_Base
{
	use Helper;
	use Traits\Style;
	public function get_name()
	{
		return 'impresscoderbanner_category';
	}

	public function get_title()
	{
		return esc_html__('Banner With Categories', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-post-list';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['categories'];
	}

	protected function register_controls()
	{

		// About Features Tab Start  
		$this->start_controls_section(
			'banner_category_tab',
			[
				'label' => esc_html__('Banner With Categories', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__('Sub Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_attr__('Welcome to our blog', 'impresscoder-element'),
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label' => esc_html__('Tag', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'    => [
					'h1'	=> esc_html__('H1', 'impresscoder-element'),
					'h2'	=> esc_html__('H2', 'impresscoder-element'),
					'h3'	=> esc_html__('H3', 'impresscoder-element'),
					'h4'	=> esc_html__('H4', 'impresscoder-element'),
					'h5'	=> esc_html__('H5', 'impresscoder-element'),
					'h6'	=> esc_html__('H6', 'impresscoder-element'),
				],
				'default' => 'h6',
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
				'label' => esc_html__('Tag', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'    => [
					'h1'	=> esc_html__('H1', 'impresscoder-element'),
					'h2'	=> esc_html__('H2', 'impresscoder-element'),
					'h3'	=> esc_html__('H3', 'impresscoder-element'),
					'h4'	=> esc_html__('H4', 'impresscoder-element'),
					'h5'	=> esc_html__('H5', 'impresscoder-element'),
					'h6'	=> esc_html__('H6', 'impresscoder-element'),
				],
				'default' => 'h1',
			]
		);
		$this->add_control(
			'number_of_category',
			[
				'label' => esc_html__('Number of Categories', 'impresscoder-element'),
				'description'	=> esc_html__('Enter your number, how many categories you wanna show', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 5,

			]
		);
		$this->add_control(
			'category__in',
			[
				'label' => esc_html__('Specify category to retrieve', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array_column((array)get_terms(['taxonomy' => 'category', 'hide_empty' => true]), 'name', 'term_id'),
				'multiple' => true,
			]
		);
		$this->add_control(
			'select_category_style',
			[
				'label' => esc_html__('Select Category Style ', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'box',
				'options' => [
					'box' => esc_html__('Default Style', 'impresscoder-element'),
					'horizontal'  => esc_html__('Style  Two', 'impresscoder-element'),
				],
				'label_block'	=> true,
			]
		);
		$this->add_control(
			'img_size',
			[
				'label' => esc_html__('Category image size', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'full',
				'options' => impresscoder_elementor_get_image_sizes_options(),
			]
		);
		$this->end_controls_section();

		$this->register_style_controls([
			'id' => 'subtitle',
			'name' => esc_attr__('Name', 'impresscoder-element'),
			'selector' => '.name',
		]);
		$this->register_style_controls([
			'id' => 'title',
			'name' => esc_attr__('Title ', 'impresscoder-element'),
			'selector' => '.title',
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-banner-category', '', $settings);
	}
}
