<?php
//Portfolio Meta Field
add_filter('ctrlbp_meta_boxes', 'impresscoder_register_portfolio_meta_fields');
function impresscoder_register_portfolio_meta_fields($meta_boxes)
{
    $meta_boxes[] = [
        'title' => esc_attr__('Project demo link', 'impresscoder'),
        'post_types' => 'portfolio',
        'fields' => [  
            [
                'id' => 'project_demo_link',
                'name' => esc_attr__('Project Demo', 'impresscoder'),
                'type' => 'text',
                'std' => '#',
            ], 
        ],
    ];
    $meta_boxes[] = [
        'title' => esc_attr__('Project information', 'impresscoder'),
        'post_types' => 'portfolio',
        'fields' => [
            [
                'id' => 'slider_images',
                'name' => esc_attr__('Project slider images', 'impresscoder'),
                'type' => 'image_advanced',
                'force_delete' => false,
                'max_file_uploads' => 4,
                'max_status' => true,
                'image_size' => 'thumbnail',
            ], 
            [
                'id' => 'project_info_title',
                'name' => esc_attr__('Project Information title', 'impresscoder'),
                'type' => 'text',
                'std' => esc_attr__('Project Title', 'impresscoder'),
            ],
            [
                'name' => esc_attr__('Project Information', 'impresscoder'),
                'id' => 'project_info',
                'type' => 'key_value',
                'desc' => esc_attr__('Please enter project info title', 'impresscoder'),
                'placeholder' => [
                    'key' => esc_attr__('Poject details label', 'impresscoder'),
                    'value' => esc_attr__('Poject details value', 'impresscoder'),
                ],
                'std' => [
                    ['Client', esc_attr__('Fiverr', 'impresscoder')]
                ]

            ],
            [
                'name' => esc_attr__('Hire me title', 'impresscoder'),
                'id' => 'hire_me_title',
                'type' => 'text',
                'std' => esc_attr__('Hire me', 'impresscoder'),
            ],
            [
                'name' => esc_attr__('Hire me content', 'impresscoder'),
                'type' => 'wysiwyg',
                'id' => 'hire_me_content',
                'raw' => false,
                'options' => [
                    'textarea_rows' => 4,
                    'teeny' => true,
                    'media_buttons' => false
                ],
            ],
            
            [
                'name' => esc_attr__('Skills Label', 'impresscoder'),
                'id' => 'skills_title',
                'type' => 'text',
                'std' => esc_attr__('Technology Uses', 'impresscoder'),
            ],
        ],
    ];
    return $meta_boxes;
}

//Featured Post Meta Field
// add_filter('ctrlbp_meta_boxes', 'impresscoder_register_page_meta_fields');
// function impresscoder_register_page_meta_fields($meta_boxes)
// {
//     $meta_boxes[] = [
//         'title' => esc_attr__('Page Settings', 'impresscoder'),
//         'post_types' => 'page',
//         'fields' => [
//             [
//                 'id' => 'display_title',
//                 'desc' => esc_attr__('Display tilte', 'impresscoder'),
//                 'type' => 'checkbox',
//                 'std' => '0'
//             ]
//         ],
//     ];
//     return $meta_boxes;
// }
 