<?php

namespace ControlEvents\Widgets;

class Portfolio extends \Elementor\Widget_Base
{
	
	use Helper;
	use Traits\Style;

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
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3, 
				'label_block'	=> true,
			]
		);
		$this->add_control(
			'posts_per_page',
			[
				'label' => esc_html__('Portfolio per page', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'default' => get_option('posts_per_page', 6),
				'min' => -1,
				'step' => 1,
				'max' => 10
			]
		);
		$this->add_control(
			'order',
			[
				'label' => esc_html__('Post order', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'ASC' => 'ASC',
					'DESC' => 'DESC'
				],
				'default' => 'DESC',
			]
		);
		$this->add_control(
			'orderby',
			[
				'label' => esc_html__('Post order by', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => 'None',
					'ID' => 'Post ID',
					'title' => 'Title',
					'date' => 'Publish Date',
					'modified' => 'Updated date',
					'rand' => 'Random',
					'author' => 'Order by author',
				],
				'default' => 'date',
			]
		);
		$this->add_control(
			'post__in',
			[
				'label' => esc_html__('Specify posts to retrieve', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array_column((array)get_posts(['post_type' => 'portfolio', 'posts_per_page' => -1]), 'post_title', 'ID'),
				'multiple' => true,
			]
		);

		$this->add_control(
			'category__in',
			[
				'label' => esc_html__('Specify category to retrieve', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array_column((array)get_terms(['taxonomy' => 'portfolio_cat', 'hide_empty' => true]), 'name', 'term_id'),
				'multiple' => true,
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
		impresscoder_framework_template('elements/portfolio', '', $settings);
	}
}
