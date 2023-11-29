<?php

namespace ControlEvents\Widgets;

class Impresscoder_Category extends \Elementor\Widget_Base
{
	use Traits\Style;
	public function get_name()
	{
		return 'impresscoder-category-slides';
	}

	public function get_title()
	{
		return esc_html__('Category Slider', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-post-slider';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['category','slider'];
	}

	protected function register_controls()
	{

		// About Features Tab Start  
		$this->start_controls_section(
			'category-slides_tab',
			[
				'label' => esc_html__('Category Content', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'xxl_device',
			[
				'label' => esc_html__('Slide XXL Device', 'impresscoder-element'), 
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 5,
				'label-block' => true,
			]
		);
		$this->add_control(
			'lg_device',
			[
				'label' => esc_html__('Slide LG Device', 'impresscoder-element'), 
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 4,
				'label-block' => true,
			]
		);
		$this->add_control(
			'md_device',
			[
				'label' => esc_html__('Slide MD Device', 'impresscoder-element'), 
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
				'label-block' => true,
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
			'loop_enable',
			[
				'label' => esc_html__('Enable Loop', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => esc_html__('Yes', 'impresscoder-element'),
				'label_off' => esc_html__('No', 'impresscoder-element'),
				'return_value' => 'yes',
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
			'id' => 'title',
			'name' => esc_attr__('Title', 'impresscoder-element'),
			'selector' => '.title',
		]);
		$this->register_style_controls([
			'id' => 'sub_title',
			'name' => esc_attr__('Sub Title ', 'impresscoder-element'),
			'selector' => '.sub_title',
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-category-slide', '', $settings);
	}
}
