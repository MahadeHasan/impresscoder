<?php

namespace ControlEvents\Widgets;

class Impresscoder_Testimonials extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'impresscodertestimonials';
	}

	public function get_title()
	{
		return esc_html__('Impresscoder Testimonials', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-comments';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['testimonials', 'control', 'genz'];
	}

	protected function register_controls()
	{

		// Content Tab Start 
		$this->start_controls_section(
			'content_tab',
			[
				'label' => esc_html__('Section Testimonials', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image',
			[
				'label' => esc_html__('Choose Image', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);
		$repeater->add_control(
			'name',
			[
				'label' => esc_html__('Name', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true
			]
		);
		$repeater->add_control(
			'designation',
			[
				'label' => esc_html__('Designation', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true
			]
		);
		$repeater->add_control(
			'content',
			[
				'label' => esc_html__('Content', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true
			]
		);
		$this->add_control(
			'testimonials',
			[
				'label' => esc_html__('Testimonials', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '<strong>{{{ name }}}</strong> {{{designation}}}',
				'default' => [
					[
						'name' => 'Jhon Smith',
						'designation' => 'Jthemes Co',
						'image' => ['url' => get_theme_file_uri('assets/imgs/page/about/author.png')],
						'content' => '“Thank you for running the event so smoothly – I had a great time, not only presenting, but also watching other sessions and interacting with attendees.”',
					],
					[
						'name' => 'Mary Jasmine',
						'designation' => 'Jthemes Co',
						'image' => ['url' => get_theme_file_uri('assets/imgs/page/about/author2.png')],
						'content' => '“Thank you for running the event so smoothly – I had a great time, not only presenting, but also watching other sessions and interacting with attendees.”',
					],
					[
						'name' => 'Andrew Simmons',
						'designation' => 'Jthemes Co',
						'image' => ['url' => get_theme_file_uri('assets/imgs/page/about/author3.png')],
						'content' => '“Thank you for running the event so smoothly – I had a great time, not only presenting, but also watching other sessions and interacting with attendees.”',
					],
					[
						'name' => 'Dj Bravo',
						'designation' => 'Jthemes Co',
						'image' => ['url' => get_theme_file_uri('assets/imgs/page/about/author2.png')],
						'content' => '“Thank you for running the event so smoothly – I had a great time, not only presenting, but also watching other sessions and interacting with attendees.”',
					],
					[
						'name' => 'Andrew Rasel',
						'designation' => 'Eventor Live Max',
						'image' => ['url' => get_theme_file_uri('assets/imgs/page/about/author1.png')],
						'content' => '“Thank you for running the event so smoothly – I had a great time, not only presenting, but also watching other sessions and interacting with attendees.”',
					],
				],

			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-testimonials', '', $settings);
	}
}
