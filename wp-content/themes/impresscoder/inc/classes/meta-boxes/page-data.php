<?php
return [
        'title' => esc_attr__('Impresscoder Page Data', 'impresscoder'),
        'id' => 'impresscoder-page-data',
        'post_types' => ['page'],
        'context' => 'normal',
        'priority' => 'high',
        'default_hidden' => false,
        'fields' => [            
            [
                'id' => 'subtitle',
                'type' => 'textarea',
                'name' => esc_attr__('Subtitle', 'impresscoder'),
                'hidden' => [ 'disable_banner', '=', true ]
            ],
            [
                'id' => 'banner_image',
                'type' => 'image_advanced',
                'name' => esc_attr__('Banner image', 'impresscoder'),
                'max_file_uploads' => 1,
                'max_status'       => false,
                'image_size'       => 'thumbnail',
                'hidden' => [ 'disable_banner', '=', true ]
            ],
        
        ],
    ];