<?php

namespace ControlEvents\Widgets;

class Impresscoder_Author_Banner extends \Elementor\Widget_Base
{
	use Traits\Style;
	public function get_name()
	{
		return 'impresscoderauthor_banner';
	}

	public function get_title()
	{
		return esc_html__('Impresscoder Author Banner', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-user-circle-o';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['author', 'control', 'genz'];
	}

	protected function register_controls()
	{

		// Content Tab Start 
		$this->start_controls_section(
			'content_tab',
			[
				'label' => esc_html__('Author Banner Content', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'author_image',
			[
				'label' => esc_html__('Author Image', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'default' => [
					'url' => get_theme_file_uri('assets/imgs/page/homepage4/banner.png'),
				],
				'ai'	=> false,
			]
		);
		$this->add_control(
			'author_image_alt',
			[
				'label' => esc_html__('Author Image Alt text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('Author image alt text', 'impresscoder-element'),
				'ai'	=> false,
			]
		);
		$this->add_control(
			'welcome_text',
			[
				'label' => esc_html__('Welcome Text', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Hello Everyone!', 'impresscoder-element'),
				'ai'	=> false,
			]
		);
		$this->add_control(
			'welcome_text_tag',
			[
				'label' => esc_html__('Tag', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'    => [
					'h1'    => 'H1',
					'h2'    => 'H2',
					'h3'    => 'H3',
					'h4'    => 'H4',
					'h5'    => 'H5',
					'h6'    => 'H6',
					'span'    => 'Span',
					'i'    => 'Ttalic',
				],
				'default' => 'span',
				'ai'	=> false,
			]
		);
		$this->add_control(
			'author_quote',
			[
				'label' => esc_html__('Authore Quote', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'default' => esc_html__('I\'m Steven, a lover of technology, business and experiencing new things', 'impresscoder-element'),
				'ai'	=> false,
			]
		);
		$this->add_control(
			'author_quote_tag',
			[
				'label' => esc_html__('Tag', 'impresscoder-element'),
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
				'default' => 'h3',
				'ai'	=> false,
			]
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'social_title',
			[
				'label' => esc_html__('Social Media Title', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'social_link',
			[
				'label' => esc_html__('Social Media Link', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$this->add_control(
			'social_links',
			[
				'label' => esc_html__('Brands', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_title' 	=> esc_html__('Facebook', 'impresscoder-element'),
						'social_link' 	=> esc_url('https://www.facebook.com/#')
					],
					[
						'social_title' 	=> esc_html__('Instagram', 'impresscoder-element'),
						'social_link' 	=> esc_url('https://www.instagram.com/#')
					],
					[
						'social_title' 	=> esc_html__('Snapchat', 'impresscoder-element'),
						'social_link' 	=> esc_url('https://www.snapchat.com/#')
					],
					[
						'social_title' 	=> esc_html__('Twitter', 'impresscoder-element'),
						'social_link' 	=> esc_url('https://www.twitter.com/#')
					]
				],
				'title_field' => '{{{ social_title }}}',
			]
		);

		$this->end_controls_section();

		$this->register_style_controls([
			'id' => 'welcome_text',
			'name' => esc_attr__('Welcome Text', 'impresscoder-element'),
			'selector' => '.welcome_text',
		]);
		$this->register_style_controls([
			'id' => 'author_quote',
			'name' => esc_attr__('Authore Quote', 'impresscoder-element'),
			'selector' => '.heading-3',
		]);
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-author-banner', '', $settings);
	}
}
