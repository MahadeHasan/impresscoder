<?php

namespace ControlEvents\Widgets;

class Impresscoder_Posts extends \Elementor\Widget_Base
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
				'label' => esc_html__('Posts', 'stories-elements'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'stories-elements'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Latest Posts', 'stories-elements'),
			]
		);

		$this->add_control(
			'template',
			[
				'label' => esc_html__('Content style', 'stories-elements'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => '',
				'options' => [
					'' => esc_html__('List View', 'stories-elements'),
					'grid' => esc_html__('Grid View', 'stories-elements'),
					'masonry' => esc_html__('Masonry View', 'stories-elements'),
				],
			]
		);

		$this->add_control(
			'layout',
			[
				'label' => esc_html__('Layout', 'stories-elements'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'rs',
				'options' => [
					'full' => esc_html__('No sidebar', 'stories-elements'),
					'ls' => esc_html__('Left Sidebar', 'stories-elements'),
					'rs' => esc_html__('Right Sidebar', 'stories-elements'),
				],
			]
		);

		$this->add_control(
			'column',
			[
				'label' => esc_html__('Posts column', 'stories-elements'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '1',
				'min' => 1,
				'step' => 1,
				'max' => 4
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
