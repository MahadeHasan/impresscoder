<?php
return [
    'title' => 'Impresscoder Page Attributes',
    'id' => 'impresscoder-page-attributes',
    'post_types' => ['page'],
    'context' => 'side',
    'priority' => 'high',
    'default_hidden' => false,
    'fields' => [
        [
            'type' => 'custom_html',
            'desc' => 'Attribute settings options displayed in the <a href="#impresscoder-page-data"><strong>Impresscoder Page Data</strong></a>.',
        ],        
        [
            'id' => 'disable_header',
            'type' => 'checkbox',
            'desc' => 'Disable Header?',           
            'std' => false
        ],
        [
            'id' => 'disable_topbar',
            'type' => 'checkbox',
            'desc' => 'Disable Topbar?',           
            'std' => false,
            'hidden' => [ 'disable_header', '=', true ],
        ],
        [
            'id' => 'tra_header',
            'type' => 'checkbox',
            'desc' => esc_attr__('Transparent Header', 'impresscoder'),
            'hidden' => [ 'disable_header', '=', true ]
        ],        
        [
            'id' => 'custom_menu',
            'type' => 'taxonomy',
            'desc' => esc_attr__('Custom menu', 'eventiva'),
            'taxonomy'   => 'nav_menu',
            'field_type' => 'select',
            'hidden' => ['disable_header', '=', true]
        ],
        [
            'id' => 'navbar_style',
            'type' => 'select',
            'name' => 'Navbar Style',
            'std' => 'navbar-dark',
            'inline'  => false,
            'options' => [
                'navbar-light' => 'Light Style',
                'navbar-dark' => 'Dark Style',
            ],
            'visible' => ['tra_header', '=', true]
        ],
        [
            'id' => 'disable_banner',
            'type' => 'checkbox',
            'desc' => 'Disable Banner',
            'std' => false,
        ],       
        
        [
            'id' => 'disable_breadcrumbs',
            'type' => 'checkbox',
            'desc' => 'Disable breadcrumbs',               
            'std' => false, 
        ], 
        [
            'id' => 'container',
            'type' => 'select',
            'name' => 'Page Container',         
            'desc' => 'Page container style', 
            'std' => 'container',
            'options' => [
                'container' => 'Container',
                'container-fluid' => 'Container Fluid',
                'container-full' => 'Container Full-width',
            ],        
        ],  
        [
            'id' => 'spacer_y',
            'type' => 'select',
            'name' => 'Vertical Spacer',         
            'desc' => 'Page container top:bottom spacer(in pixel) style', 
            'std' => 'py-100',
            'options' => impresscoder_vertical_spacer_options()        
        ],
        [
            'id' => 'layout',
            'type' => 'image_select',
            'name' => 'Page layout', 
            'inline' => false,        
            'std' => 'rs',
            'options' => [
                'full' => IMPRESSCODER_ASSETS .'/layout/full-width.png',
                'ls' => IMPRESSCODER_ASSETS .'/layout/left-sidebar.png',
                'rs' => IMPRESSCODER_ASSETS .'/layout/right-sidebar.png',
            ],        
        ], 
        [
            'id' => 'sidebar',
            'type' => 'select',
            'name' => 'Sidebar',         
            'std' => 'sidebar-page',
            'options' => impresscoder_get_sidebar_options(),       
            'visible' => ['layout', '!=', 'full'] 
        ],         
        [
            'id' => 'disable_footer',
            'type' => 'checkbox',
            'desc' => 'Disable Footer ?',
            'std' => false,
        ],
    ],
];