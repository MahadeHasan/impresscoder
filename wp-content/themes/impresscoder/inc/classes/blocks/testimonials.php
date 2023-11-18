<?php 
return [
    'title'           => 'Testimonials',
    'id'              => 'testimonials',
    'icon'            => 'quote',
    'description'     => 'Display testimonial carousel', 
    'parallax'        => true,
    'fields'          => [
        [
            'type' => 'group',
            'id' => 'testimonials',
            'name' => 'Testimonials',
            'clone' => true,
            'default_state' => 'collapsed',
            'collapsible' => true,
            'save_state' => false,
            'group_title' => 'Testimonial {#} {by}',
            'std' => [
                [
                    'content' => '"Thank you so much for having such a well put together directory for kids and parents. It is packed full of great party ideas, childcare facilities and everything that goes along with having kids. Most of my friends are starting to have children now and I like to make sure they know about the directory. Keep up the good work."',
                    'by' => 'Tom Collety, Brooklyn'
                ],
                [
                    'content' => '"Thank you so much for having such a well put together directory for kids and parents. It is packed full of great party ideas, childcare facilities and everything that goes along with having kids. Most of my friends are starting to have children now and I like to make sure they know about the directory. Keep up the good work."',
                    'by' => 'Tom Collety, Brooklyn'
                ]
            ],
            'fields' => [ 
                [
                    'type' => 'textarea',
                    'id' => 'content',
                    'name' => 'Content',
                ],
                [
                    'type' => 'text',
                    'id' => 'by',
                    'name' => 'By',
                ]
            ],
            
        ],
    ],
];