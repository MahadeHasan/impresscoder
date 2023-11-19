<?php

namespace ControlEvents\Widgets\Traits;

use \Elementor\Controls_Manager;
use \Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use \Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Text_Stroke;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Widget_Base;

trait Style
{
    protected function register_style_controls($args = [])
    {
        $default_args = [
            'id' => '', //Widget control id
            'name' => '', //Widget control Label
            'selector' => '', // tag class
        ];

        $args = wp_parse_args($args, $default_args);
        $this->start_controls_section(
            $args['id'] . '_style_content_tab',
            [
                'label' => sprintf(esc_html__('%s settings', 'impresscoder-element'), $args['name']),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => $args['id'] . '_typography',
                'global' => [],
                'selector' => '{{WRAPPER}} ' . $args['selector'],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Stroke::get_type(),
            [
                'name' => $args['id'] . '_text_stroke',
                'selector' => '{{WRAPPER}} ' . $args['selector'],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => $args['id'] . '_text_shadow',
                'selector' => '{{WRAPPER}} ' . $args['selector'],
            ]
        );

        $this->add_control(
            $args['id'] . '_blend_mode',
            [
                'label' => esc_html__('Blend Mode', 'impresscoder-element'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Normal', 'impresscoder-element'),
                    'multiply' => esc_html__('Multiply', 'impresscoder-element'),
                    'screen' => esc_html__('Screen', 'impresscoder-element'),
                    'overlay' => esc_html__('Overlay', 'impresscoder-element'),
                    'darken' => esc_html__('Darken', 'impresscoder-element'),
                    'lighten' => esc_html__('Lighten', 'impresscoder-element'),
                    'color-dodge' => esc_html__('Color Dodge', 'impresscoder-element'),
                    'saturation' => esc_html__('Saturation', 'impresscoder-element'),
                    'color' => esc_html__('Color', 'impresscoder-element'),
                    'difference' => esc_html__('Difference', 'impresscoder-element'),
                    'exclusion' => esc_html__('Exclusion', 'impresscoder-element'),
                    'hue' => esc_html__('Hue', 'impresscoder-element'),
                    'luminosity' => esc_html__('Luminosity', 'impresscoder-element'),
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $args['selector'] => 'mix-blend-mode: {{VALUE}}',
                ],
                'separator' => 'none',
            ]
        );


        $this->end_controls_section();
    }
}
