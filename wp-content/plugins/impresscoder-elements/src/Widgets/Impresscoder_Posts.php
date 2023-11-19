<?php

namespace ControlEvents\Widgets;

class Impresscoder_Posts extends \Elementor\Widget_Base
{
	use Traits\Style;
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

		$this->start_controls_section(
			'template_tab',
			[
				'label' => esc_html__('Template', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_attr__('Recent posts', 'impresscoder-element'),
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
			'subtitle',
			[
				'label' => esc_html__('Content', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_attr__('Don\'t miss the latest trends', 'impresscoder-element'),
			]
		);

		$this->add_control(
			'template',
			[
				'label' => esc_html__('Posts template', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__('Default', 'impresscoder-element'),
					'style2' => esc_html__('Large(1) & small(3) box aside', 'impresscoder-element'),
					'style3' => esc_html__('Large(2) & Others (3) box', 'impresscoder-element'),
				],
			]
		);
		$this->add_control(
			'column',
			[
				'label' => esc_html__('Posts column', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'default' => '1',
				'min' => 1,
				'step' => 1,
				'max' => 3,
				'condition' => [
					'template' => 'style1',
				],
			]
		);
		$this->add_control(
			'enable_sidebar',
			[
				'label' => esc_html__('Enable Sidebar', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => false,
				'condition' => [
					'template' => 'style1',
				],
			]
		);

		$this->add_control(
			'content_style',
			[
				'label' => esc_html__('Content style', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'template-parts/post/list-view',
				'options' => [
					'template-parts/post/list-view' => esc_html__('List view', 'impresscoder-element'),
					'template-parts/post/list-view-style2' => esc_html__('List view tyle 2', 'impresscoder-element'),
					'template-parts/post/grid-view'  => esc_html__('Grid view', 'impresscoder-element'),
					'template-parts/post/grid-view-border'  => esc_html__('Grid view with Border', 'impresscoder-element'),
					'template-parts/post/grid-view-style-2'  => esc_html__('Grid view style 2', 'impresscoder-element'),
				],
			]
		);

		$this->add_control(
			'show_more_post',
			[
				'label' => esc_html__('Enable More Post Button', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_block' => false,
				'default' => 'no',
				'return_value' 	=> 'yes',
				'prefix_class' => 'impresscoder-posts-load-more-',
			]
		);

		$this->add_control(
			'more_post_btn_text',
			[
				'label' => esc_html__('Button Text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_attr__('Show More Posts', 'impresscoder-element'),
				'condition' => [
					'show_more_post' => 'yes'
				],
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label' => esc_html__('Enable Pogination Button', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_block' => false,
				'default' => 'no',
				'return_value' 	=> 'yes',
				'prefix_class' => 'impresscoder-posts-pagination-',

			]
		);
		$this->add_control(
			'more_post_btn_alignment',
			[
				'label' => esc_html__('Alignment', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'text-start' => [
						'title' => esc_html__('Left', 'impresscoder-element'),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => esc_html__('Center', 'impresscoder-element'),
						'icon' => 'eicon-text-align-center',
					],
					'text-end' => [
						'title' => esc_html__('Right', 'impresscoder-element'),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'text-center',
				'condition' => [
					'show_more_post' => 'yes'
				],
			]
		);

		$this->end_controls_section();

		//Tab Start  
		$this->start_controls_section(
			'query_tab',
			[
				'label' => esc_html__('WP Query', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'posts',
			[
				'label' => esc_html__('Post type', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'post',
				'options' => [
					'post' => esc_html__('Post', 'impresscoder-element')
				],
			]
		);


		$this->add_control(
			'posts_per_page',
			[
				'label' => esc_html__('Posts per page', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'default' => get_option('posts_per_page', 10),
				'min' => -1,
				'step' => 1,
				'max' => 30
			]
		);

		$this->add_control(
			'ignore_sticky_posts',
			[
				'label' => esc_html__('Ignore sticky posts', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_block' => false,
				'default' => true,
			]
		);

		$this->add_control(
			'sticky_posts',
			[
				'label' => esc_html__('Sticky posts', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_block' => false,
				'default' => false,
				'condition' => [
					'ignore_sticky_posts!' => 'yes',
				],
			]
		);

		$this->add_control(
			'sticky_post__in',
			[
				'label' => esc_html__('Retrieve sticky post only', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array_column((array)get_posts(['post__in' => get_option('sticky_posts'), 'posts_per_page' => -1]), 'post_title', 'ID'),
				'multiple' => true,
				'condition' => [
					'sticky_posts' => 'yes',
					'ignore_sticky_posts!' => 'yes',
				],
			]
		);

		$this->add_control(
			'post__in',
			[
				'label' => esc_html__('Specify posts to retrieve', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array_column((array)get_posts(['posts_per_page' => -1]), 'post_title', 'ID'),
				'multiple' => true,
				'condition' => [
					'sticky_posts!' => 'yes',
				],
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

		$this->end_controls_section();

		$this->register_style_controls([
			'id' => 'title',
			'name' => esc_attr__('Title', 'impresscoder-element'),
			'selector' => '.heading-2',
		]);
		$this->register_style_controls([
			'id' => 'content',
			'name' => esc_attr__('Content', 'impresscoder-element'),
			'selector' => '.content',
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute('_wrapper', 'data-settings', base64_encode(json_encode($settings)));
		impresscoder_framework_template('elements/posts', '', $settings);
	}
}
