<?php

namespace ControlEvents\Widgets;

class Impresscoder_Faqs extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'impresscoderfaq';
	}

	public function get_title()
	{
		return esc_html__('Impresscoder FaQ', 'impresscoder-element');
	}

	public function get_icon()
	{
		return 'eicon-help';
	}

	public function get_categories()
	{
		return ['impresscoder-element'];
	}

	public function get_keywords()
	{
		return ['faq', 'event'];
	}

	protected function register_controls()
	{


		//Faq Tab Start  
		$this->start_controls_section(
			'impresscoderfaq_tab',
			[
				'label' => esc_html__('Faq Item Content', 'impresscoder-element'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'question',
			[
				'label' => esc_html__('Question', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'Over 20 Years of Experience',
			]
		);
		$repeater->add_control(
			'answer',
			[
				'label' => esc_html__('Answer', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Over 20 Years of Experience Over 20 Years of Experience',
			]
		);


		$this->add_control(
			'faqs',
			[
				'label' => esc_html__('FAQs', 'impresscoder-element'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ question }}}',
				'default' => [
					[
						'question' => esc_html__('Understanding company billing and accounts', 'impresscoder-element'),
						'answer' => esc_html__('Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi.
						Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla
						condimentum nulla.', 'impresscoder-element'),
					],
					[
						'question' => esc_html__('Updating your billing credit card', 'impresscoder-element'),
						'answer' => esc_html__('Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi.
						Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla
						condimentum nulla.', 'impresscoder-element'),
					],
					[
						'question' => esc_html__('Application keyboard shortcuts and tips', 'impresscoder-element'),
						'answer' => esc_html__('Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi.
						Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla
						condimentum nulla.', 'impresscoder-element'),
					],
					[
						'question' => esc_html__('Cancelling a website subscription', 'impresscoder-element'),
						'answer' => esc_html__('Nulla non sollicitudin. Morbi sit amet laoreet ipsum, vel pretium mi.
						Morbi varius, tellus in accumsan blandit, elit ligula eleifend velit, luctus mattis ante nulla
						condimentum nulla.', 'impresscoder-element'),
					]
				],

			]
		);


		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		impresscoder_framework_template('elements/impresscoder-faqs', '', $settings);
	}
}
