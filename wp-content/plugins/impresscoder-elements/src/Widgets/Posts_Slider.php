<?php

namespace ControlEvents\Widgets;

class Posts_Slider extends \Elementor\Widget_Base
{
	use Helper;
	public function get_name()
	{
		return 'posts_slider';
	}
	public function get_title()
	{
		return esc_html__('Posts Slider', 'impresscoder-elements');
	}
	public function get_icon()
	{
		return 'eicon-slider-video';
	}
	public function get_categories()
	{
		return ['elementor-impresscoder'];
	}
	public function get_keywords()
	{
		return ['news', 'recent post'];
	}
	
	protected function register_controls()
	{

		$this->start_controls_section(
			'template_tab',
			[
				'label' => esc_html__('Posts Slider', 'impresscoder-elements'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);  

		$this->add_control(
			'data_slides_show',
			[
				'label' => esc_html__('Number of thumbnail want to show', 'impresscoder-elements'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'default' => 5,
				'min' => -1,
				'step' => 1,
				'max' => 6
			]
		); 
		$this->add_control(
			'thumb_title_length',
			[
				'label' => esc_html__('Thumbnail title Length', 'impresscoder-elements'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'default' => 15,
				'min' => -1,
				'step' => 1,
				'max' => 30
			]
		); 
		$this->add_control(
			'post_excerpt',
			[
				'label' => esc_html__('Post Excerpt Length', 'impresscoder-elements'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'default' => 30,
				'min' => -1,
				'step' => 1,
				'max' => 30
			]
		); 
		$this->add_control(
			'thumb_excerpt',
			[
				'label' => esc_html__('Thumbnail Excerpt Length', 'impresscoder-elements'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'default' => 20,
				'min' => -1,
				'step' => 1,
				'max' => 30
			]
		); 

		$this->end_controls_section();
		$this->wp_query();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
	 
		$settings['query_args'] = [
			'post_type' => 'post',
			'order' =>  $settings['order'],
			'orderby' =>  $settings['orderby'],
			'post__in' => $settings['post__in'],
			'category__in' => $settings['category__in'],
			'posts_per_page' => $settings['posts_per_page'],
			'ignore_sticky_posts' => $settings['ignore_sticky_posts'],
			'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
		];
		$settings = $this->get_settings_for_display(); 	
		impresscoder_framework_template('elements/posts-slider', '', $settings);
	}
}
