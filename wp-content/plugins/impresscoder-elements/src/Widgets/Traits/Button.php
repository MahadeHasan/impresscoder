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

trait Button
{
    protected function register_button_style_controls($args = [])
    {
        $default_args = [
            'id' => '',
            'name' => '',
            'selector' => '',
        ];

        $args = wp_parse_args($args, $default_args);

        $this->start_controls_section(
            $args['id'] . '_style_content_tab',
            [
                'label' => sprintf(esc_html__('%s settings', 'control-events'), $args['name']),
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

        $this->add_responsive_control(
            $args['id'] . '_border_radius',
            [
                'label' => esc_html__('Border Radius', 'control-events'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} ' . $args['selector'] => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            $args['id'] . '_text_padding',
            [
                'label' => esc_html__('Padding', 'control-events'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} ' . $args['selector'] => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => $args['id'] . '_background',
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} ' . $args['selector'],
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                    'color' => [
                        'global' => [],
                    ],
                ],

            ]
        );
        $this->add_control(
            $args['id'] . '_hover_color',
            [
                'label' => esc_html__('Hover Color', 'elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  ' . $args['selector'] . ':hover, {{WRAPPER}} ' . $args['selector'] . ':focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}}  ' . $args['selector'] . ':hover svg, {{WRAPPER}} ' . $args['selector'] . ':focus svg' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            $args['id'] . '_button_css_id',
            [
                'label' => esc_html__('Button ID', 'control-events'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'ai' => [
                    'active' => false,
                ],
                'default' => '',
                'title' => esc_html__('Add your custom id WITHOUT the Pound key. e.g: my-id', 'control-events'),
                'description' => sprintf(
                    esc_html__('Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows %1$sA-z 0-9%2$s & underscore chars without spaces.', 'control-events'),
                    '<code>',
                    '</code>'
                ),
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => $args['id'] . '_button_box_shadow',
                'selector' => '{{WRAPPER}} ' . $args['selector'],
            ]
        );




        $this->end_controls_section();
    }

    // Button Control
    protected function register_button_controls($args = [])
    {
        $args = wp_parse_args($args, array(
            'button_text' => '',
            'button_link' => [],
            'button_type' => '',
            'button_style' => '',
            'button_icon' => '',
            'button_icon_position' => 'end',
            'library_icon' => [],
            'condition' => [],
            'button_css_id' => '',
            'button_extra_class' => ''
        ));
        extract($args);

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button text', 'control-events'),
                'type' => Controls_Manager::TEXT,
                'default' => $button_text,
                'label_block' => true,
                'ai' => false,
                'condition'    => $condition

            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Link', 'control-events'),
                'type' => Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => $button_link,
                'label_block' => true,
                'condition'    => $condition
            ]
        );

        $this->add_control(
            'button_type',
            [
                'label' => esc_html__('Button type', 'control-events'),
                'type' => Controls_Manager::SELECT,
                'options'    => [
                    ''    => 'Button',
                    'link'    => 'Link',
                ],
                'default' => $button_type,
                'condition'    => $condition
            ]
        );

        $this->add_control(
            'button_style',
            [
                'label' => esc_html__('Button style', 'control-events'),
                'type' => Controls_Manager::SELECT,
                'options'    => $this->button_style_options(),
                'default' => $button_style,
                'condition'    => array_merge($condition, ['button_type!'    => 'link']),
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'control-events'),
                'type' => Controls_Manager::SELECT,
                'options'    => [
                    ''    => 'None',
                    'ticket'    => 'Ticket',
                    'shop-icon-xl'    => 'Shoping sart',
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
                'default' => $button_icon,
                'condition'    => $condition
            ]
        );

        $this->add_control(
            'library_icon',
            [
                'label' => esc_html__('Choose Icon', 'control-events'),
                'type' => Controls_Manager::ICONS,
                'label_block' => true,
                'ai'      => false,
                'condition'    =>  array_merge($condition, ['button_icon'    => 'custom']),
                'default'      =>  [$library_icon]
            ]
        );
        $this->add_control(
            'button_icon_position',
            [
                'label' => esc_html__('Button Icon position', 'control-events'),
                'type' => Controls_Manager::SELECT,
                'options'    => [
                    'start'    => 'Start',
                    'end'    => 'End',
                ],
                'default' => $button_icon_position,
                'condition'    => $condition
            ]
        );

        $this->add_control(
            'button_css_id',
            [
                'label' => esc_html__('Button ID', 'control-events'),
                'type' => Controls_Manager::TEXT,
                'default' => $button_css_id,
                'condition'    => $condition,
                'ai'    => false,
            ]
        );

        $this->add_control(
            'button_extra_class',
            [
                'label' => esc_html__('Button extra class', 'control-events'),
                'type' => Controls_Manager::TEXT,
                'default' => $button_extra_class,
                'condition'    => $condition,
                'ai'    => false,
            ]
        );
    }

    //button Style
    protected function button_style_options()
    {
        return apply_filters('control_events/button_style_options', array(
            '' => 'Default',
            'btn-primary' => 'Primary',
            'btn-outline-primary' => 'Outline Primary',
            'btn-secondary' => 'Secondary',
            'btn-outline-secondary' => 'secondary Outline',
            'btn-gradient' => 'Gradient',
            'btn-outline-gradient' => 'outline Gradient',
        ));
    }

    //Button Output
    protected function render_button_output(Widget_Base $instance = null)
    {

        if (empty($instance)) {
            $instance = $this;
        }

        $settings = $instance->get_settings_for_display();

        if (empty($settings['button_text'])) return;


        if (empty($settings['button_type'])) {
            $instance->add_render_attribute('button', 'class', 'btn gap-10');
        } else {
            $instance->add_render_attribute('button', 'class', 'download-link gap-40');
        }

        if (!empty($settings['button_link']['url'])) {
            $instance->add_link_attributes('button', $settings['button_link']);
        } else {
            $instance->add_render_attribute('button', 'role', 'button');
        }

        if (!empty($settings['button_style'])) {
            $instance->add_render_attribute('button', 'class', $settings['button_style']);
        }

        $icon = '';
        if (!empty($settings['button_icon'])) {
            $instance->add_render_attribute('button', 'class', 'd-inline-flex align-items-center');

            if ($settings['button_icon_position'] == 'start') {
                $instance->add_render_attribute('button', 'class', 'flex-row-reverse');
            }

            if ($settings['button_icon']  != 'custom') {
                $icon = control_events_get_icon_svg('button', $settings['button_icon']);
                if ($settings['button_type'] == 'link') {
                    $icon = '<span class="ticket-arrow arrow-up-right">' . control_events_get_icon_svg('button', $settings['button_icon']) . '</span>';
                }
            } else {
                $icon = sprintf(
                    '<span class="%s"></span>',
                    esc_attr($settings['library_icon']['value']),
                );
            }
        }

        if (!empty($settings['button_css_id'])) {
            $instance->add_render_attribute('button', 'id', $settings['button_css_id']);
        }


        if (!empty($settings['hover_animation'])) {
            $instance->add_render_attribute('button', 'class', 'elementor-animation-' . $settings['hover_animation']);
        }



?>
        <a <?php $instance->print_render_attribute_string('button'); ?>>
            <?php echo wp_kses_post($settings['button_text']) . $icon; ?>
        </a>
<?php
    }
}
