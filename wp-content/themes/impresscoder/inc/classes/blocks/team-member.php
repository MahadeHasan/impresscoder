<?php 
return [
    'title'           => 'Team member',
    'id'              => 'team-member',
    'icon'            => 'user',
    'description'     => 'Display team member', 
    'parallax'        => true,
    'fields'          => [
        [
            'type' => 'single_image',
            'id'   => 'image',
            'name' => 'Image',
        ],
        [
            'type' => 'group',
            'id' => 'social_links',
            'name' => 'Social links',
            'clone' => true,
            'default_state' => 'collapsed',
            'collapsible' => true,
            'save_state' => false,
            'group_title' => '{#} {title}',
            'std' => [
                [
                    'title' => 'Facebook',
                    'link' => 'https://facebook.com/#'
                ],
                [
                    'title' => 'Twitter',
                    'link' => 'https://twitter.com/#'
                ],
                [
                    'title' => 'linkedin',
                    'link' => 'https://linkedin.com/#'
                ],
            ],
            'fields' => [ 
                [
                    'type' => 'text',
                    'id' => 'title',
                    'name' => 'Title',
                ],
                [
                    'type' => 'text',
                    'id' => 'link',
                    'name' => 'Link',
                ]
            ],
            
        ],
    ],
];