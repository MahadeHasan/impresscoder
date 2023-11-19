<?php

namespace ControlEvents;

class Elementor
{
    /**
     * Add hooks when module is loaded.
     */
    public function __construct()
    {
        add_action('elementor/widgets/register', [$this, 'register_widget']);
        add_action('elementor/elements/categories_registered', [$this, 'add_widget_categories']);
    }

    public function register_widget($widgets_manager)
    {
        $widgets_manager->register(new Widgets\Impresscoder_Section_Title());
        $widgets_manager->register(new Widgets\About_Us());
        $widgets_manager->register(new Widgets\Impresscoder_Testimonials());
        $widgets_manager->register(new Widgets\Impresscoder_Brand());
        $widgets_manager->register(new Widgets\Impresscoder_Pricing_Tables());
        $widgets_manager->register(new Widgets\Impresscoder_Faqs());
        $widgets_manager->register(new Widgets\Impresscoder_Services());
        $widgets_manager->register(new Widgets\Impresscoder_Portfolio());
        $widgets_manager->register(new Widgets\Impresscoder_Category());
        $widgets_manager->register(new Widgets\Impresscoder_Post_Tags());
        $widgets_manager->register(new Widgets\Impresscoder_Banner_Tags());
        $widgets_manager->register(new Widgets\Impresscoder_Banner_Category());
        $widgets_manager->register(new Widgets\Impresscoder_Posts());
        $widgets_manager->register(new Widgets\Impresscoder_Author_Banner());
        $widgets_manager->register(new Widgets\Impresscoder_Contact_Info());
    }

    public function add_widget_categories($elements_manager)
    {

        $elements_manager->add_category(
            'impresscoder-element',
            [
                'title' => esc_html__('Impresscoder Widgets', 'impresscoder-element'),
                'icon' => 'fa fa-plug',
            ]
        );
    }
}
