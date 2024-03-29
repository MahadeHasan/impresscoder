<?php

namespace ControlEvents\Widgets;

class Posts extends \Elementor\Widget_Base
{
	use Traits\Style;
	use Helper;
	public function get_name()
	{
		return 'impresscoderposts';
	}
	public function get_title()
	{
		return esc_html__('Impresscoder Posts', 'impresscoder-element');
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
		return ['news', 'recent post'];
	}


	protected function register_controls()
	{

		// Content Tab Start
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Posts', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Latest Posts', 'impresscoder-element'),
			]
		);
		$this->add_control(
			'excerpt_length',
			[
				'label' => esc_html__('Excerpt Length', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'default' => 50,
			]
		);

		$this->add_control(
			'template',
			[
				'label' => esc_html__('Content style', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => '',
				'options' => [
					'' => esc_html__('List View', 'impresscoder-element'),
					'grid' => esc_html__('Grid View', 'impresscoder-element'),
					'masonry' => esc_html__('Masonry View', 'impresscoder-element'),
				],
			]
		);

		$this->add_control(
			'layout',
			[
				'label' => esc_html__('Layout', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'rs',
				'options' => [
					'full' => esc_html__('No sidebar', 'impresscoder-element'),
					'ls' => esc_html__('Left Sidebar', 'impresscoder-element'),
					'rs' => esc_html__('Right Sidebar', 'impresscoder-element'),
				],
			]
		);

		$this->add_control(
			'column',
			[
				'label' => esc_html__('Posts column', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '1',
				'min' => 1,
				'step' => 1,
				'max' => 4
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
					'{{WRAPPER}} .nav-alignment' => 'text-align: {{VALUE}};',
				],
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
			'post__in' => $settings['post__in'],
			'category__in' => $settings['category__in'],
			'posts_per_page' => $settings['posts_per_page'],
			'ignore_sticky_posts' => $settings['ignore_sticky_posts'],
			'orderby' => 'post__in',
			'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
		];

		impresscoder_framework_template('elements/posts', '', $settings);
	}
}
