<?php 
return [
    'title'           => 'Call to Action',
    'id'              => 'call-to-action',
    'icon'            => 'heading',
    'description'     => 'Display name, heading & subtitle',    
    'supports' => [        
        'align' => false,
        'customClassName' => true,
    ],
    'fields'          => [
        [
            'type' => 'select',
            'id' => 'style',
            'name' => 'Style',
            'std' => 'style-1',
            'options' => [
                'style-1' => 'Single column',
                'style-2' => 'Double column',
            ],
        ],        
        [
            'type' => 'group',
            'id' => 'buttons',
            'name' => 'buttons',
            'clone' => true,
            'default_state' => 'collapsed',
            'collapsible' => false,
            'save_state' => false,
            'std' => [
                [
                    'text' => 'Get it on {Google Play}',
                    'url' => '#',
                    'style' => 'btn-dark',
                    'icon' => 'googleplay',
                    'icon_position' => 'left'
                ],
                [
                    'text' => 'Download on the {App store}',
                    'url' => '#',
                    'style' => 'btn-dark',
                    'icon' => 'appstore',
                    'icon_position' => 'left'
                ],                
            ],
            'fields' => impresscoder_get_button_fields(true),
        ]
    ],
];