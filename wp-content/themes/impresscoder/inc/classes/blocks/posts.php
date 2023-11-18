<?php 
return [
    'title'           => 'Posts',
    'id'              => 'posts',
    'icon'            => 'admin-post',
    'description'     => 'Display posts template',
    'fields'          => [        
        [
            'type' => 'select',
            'id'   => 'image_size',
            'name' => 'Thumbnail size',
            'std' => 'impresscoder-450x350-cropped',
            'options' => impresscoder_get_image_sizes_options(),
        ], 
        [
            'type' => 'number',
            'id'   => 'excerpt_length',
            'name' => 'Excerpt Length',
            'std' => '24',
        ], 
        [
            'type' => 'select',
            'id'   => 'column',
            'name' => 'Column',
            'std' => '3',
            'options' => [
                '1' => 'Single column',
                '2' => '2 column',
                '3' => '3 column',
                '4' => '4 column',
            ],
        ],      
        impresscoder_wp_query_field()
    ],
];