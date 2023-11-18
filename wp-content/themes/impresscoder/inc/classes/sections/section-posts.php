<?php 
return [
    'title'           => 'Posts section',
    'id'              => 'section-posts',
    'icon'            => 'admin-post',
    'description'     => 'Display posts template',    
    'supports' => [
        'align' => false,
        'customClassName' => false,
    ],
    // Block fields.
    'fields'          => [        
        [
            'type' => 'block',
            'id'   => 'section_title', 
            'name' => 'Section title',           
            'std' => [
                'name' => 'Our blog',
                'title' => 'Latest Tips & Advices',
                'css_class' => 'mb-30'
            ],
        ], 
        [
            'type' => 'block',
            'id'   => 'posts',  
            'name' => 'Posts',          
            'std' => [
                'image_size' => 'impresscoder-450x350-cropped',
                'column' => 3,
                'css_class' => 'text-start',
                'query_args' => [
                    'posts_per_page' => 3,
                    'order_by' => 'date',
                    'order_by' => 'date',
                ]
            ],
        ], 
        [
            'type' => 'block',
            'id'   => 'button',  
            'name' => 'Button {text}',          
            'std' => [
                'text' => 'Go to Blog',
                'icon' => 'arrow_right',
                'style' => 'btn-primary',
                'link' => get_post_type_archive_link('post')
            ],
        ],      
        impresscoder_section_settings_field([
            'align' => 'text-center',
            'spacer_y' => 'py-100',
            'bg' => 'bg-white'
        ])
    ],
];