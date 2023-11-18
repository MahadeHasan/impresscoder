<?php 
return [
    'title'           => 'Partners',
    'id'              => 'partners',
    'icon'            => 'quote',
    'description'     => 'Display partner carousel', 
    'fields'          => [
        [
            'type' => 'group',
            'id' => 'clients',
            'name' => 'Clients',
            'clone' => true,
            'default_state' => 'collapsed',
            'collapsible' => true,
            'save_state' => false,
            'group_title' => '{#} {title}',
            'std' => [
            ],
            'fields' => [ 
                [
                    'type' => 'image_advanced',
                    'id' => 'image',
                    'name' => 'Client logo',
                    'max_file_uploads' => 1,
                    'max_status'       => false,
                    'image_size'       => 'full',
                ],
                [
                    'type' => 'text',
                    'id' => 'title',
                    'name' => 'Title',
                ],
                [
                    'type' => 'text',
                    'id' => 'url',
                    'name' => 'URL',
                ]
            ],
            
        ],
    ],
];