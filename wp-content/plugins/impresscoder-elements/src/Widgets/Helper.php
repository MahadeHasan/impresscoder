<?php

namespace ControlEvents\Widgets;

trait Helper
{

	protected function wp_query($instance = null, $args = [])
	{
		if (empty($instance)) {
			$instance = $this;
		}

		$args = wp_parse_args($args, [
			'prefix' => '',
			'label' => esc_html__('WP Query', 'impresscoder-element'),
			'posts_per_page' => 5,
			'post_type' => 'post',
			'data' => '',
			'extra_class' => '',
		]);

		$instance->start_controls_section(
			$args['prefix'] . 'wp_query_tab',
			[
				'label' => $args['label'],
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$instance->add_control(
			$args['prefix'] . 'post_type',
			[
				'label' => esc_html__('Post type', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'post' => 'Post'
				],
				'default' => $args['post_type']
			]
		);
		$instance->add_control(
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
		$instance->add_control(
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
		$instance->add_control(
			$args['prefix'] . 'post__in',
			[
				'label' => esc_html__('Specify posts to retrieve', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array_column((array)get_posts(['posts_per_page' => -1]), 'post_title', 'ID'),
				'multiple' => true,
			]
		);
		$instance->add_control(
			$args['prefix'] . 'category__in',
			[
				'label' => esc_html__('Specify category to retrieve', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'options' => array_column((array)get_terms(['taxonomy' => 'category', 'hide_empty' => true]), 'name', 'term_id'),
				'multiple' => true,
			]
		);
		$instance->add_control(
			$args['prefix'] . 'posts_per_page',
			[
				'label' => esc_html__('Posts per page', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => '-1',
				'step' => '1',
				'max' => '50',
				'default' => $args['posts_per_page']
			]
		);
		$instance->add_control(
			$args['prefix'] . 'ignore_sticky_posts',
			[
				'label' => esc_html__('Ignore sticky posts', 'jt-elementor'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => true,
			]
		);

		$instance->end_controls_section();
	}


	protected function button_controls($instance = null, $args = [])
	{
		if (empty($instance)) {
			$instance = $this;
		}
		$args = wp_parse_args($args, [
			'prefix' => 'button_',
			'text' => esc_html__('Buy Ticket Now', 'control-events'),
			'url' => '#',
			'style' => '',
			'button_icon' => '',
			'library_icon' => '',
			'button_icon' => '',
			'button_icon_position' => 'end',
			'data' => '',
			'extra_class' => '',
		]);

		$instance->add_control(
			$args['prefix'] . 'text',
			[
				'label' => esc_html__('Button text', 'control-events'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => $args['text'],
				'label_block' => true
			]
		);
		$instance->add_control(
			$args['prefix'] . 'url',
			[
				'label' => esc_html__('Button URL', 'control-events'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => $args['url'],
				'placeholder' => 'https://',
				'label_block' => true
			]
		);
		$instance->add_control(
			$args['prefix'] . 'style',
			[
				'label' => esc_html__('Button Style', 'control-events'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'btn-link',
				'options' => $this->button_style_class_options(),
			]
		);
		$instance->add_control(
			'button_icon',
			[
				'label' => esc_html__('Icon', 'control-events'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'    => [
					''    => 'None',
					'ticket'    => 'Ticket',
					'shop-icon-sm'    => 'Shoping Cart',
					'contact-plus-icon'    => 'User',
					'highlights-icon-1'    => 'Star',
					'highlights-icon-2'    => 'Microphone',
					'highlights-icon-3'    => 'Calendar',
					'highlights-icon-4'    => 'Statistics',
					'highlights-icon-5'    => 'Engage',
					'arrow-up-right'    => 'Arrow up right',
					'arrow-down-right'    => 'Arrow down right',
					'custom'    => 'Custom',
				],
				'default'      =>  'ticket',
			]
		);

		$instance->add_control(
			'library_icon',
			[
				'label' => esc_html__('Choose Icon', 'control-events'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'label_block' => true,
				'ai'      => false,
				'condition'    =>  ['button_icon'    => 'custom'],
				//'default'      =>   'library_icon'
			]
		);
		$instance->add_control(
			'button_icon_position',
			[
				'label' => esc_html__('position', 'control-events'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'    => [
					'start'    => 'Start',
					'end'    => 'End',
				],
				'default'      =>  $args['button_icon_position'],
			]
		);

		$instance->add_control(
			$args['prefix'] . 'extra_class',
			[
				'label' => esc_html__('CSS Classes', 'control-events'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => $args['extra_class'],
				'label_block' => true
			]
		);
		$instance->add_control(
			$args['prefix'] . 'data',
			[
				'label' => esc_html__('Data Attributes', 'control-events'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true
			]
		);
	}

	protected function render_button($args = [])
	{
		impresscoder_framework_template('elements/button', '', $args);
	}

	protected function button_style_class_options()
	{

		$options = [
			'btn-link' => esc_html__('Link', 'impresscoder-element'),
			'btn-primary' => esc_html__('Primary', 'impresscoder-element'),
			'btn-outline-primary' => esc_html__('Primary Outline', 'impresscoder-element'),
			'btn-secondary' => esc_html__('Secondary', 'impresscoder-element'),
			'btn-outline-secondary' => esc_html__('Secondary outline', 'impresscoder-element'),
			'btn-info' => esc_html__('Info', 'impresscoder-element'),
			'btn-success' => esc_html__('Success', 'impresscoder-element'),
			'btn-warning' => esc_html__('Warning', 'impresscoder-element'),
			'btn-danger' => esc_html__('Danger', 'impresscoder-element'),
			'custom-btn2' => esc_html__('Theme style', 'impresscoder-element'),
			'custom-btn item-btn' => esc_html__('Theme style 2', 'impresscoder-element'),
		];
		return apply_filters('impresscoder_elements_button_style_class_options', $options);
	}
}
