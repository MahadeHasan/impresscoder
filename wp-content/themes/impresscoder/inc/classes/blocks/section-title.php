<?php 
return [
    'title'           => 'Section title',
    'id'              => 'section-title',
    'icon'            => 'heading',
    'description'     => 'Display name, heading & subtitle',    
    'supports' => [        
        'align' => false,
        'customClassName' => true,
    ],
    'fields'          => [
        [
            'type' => 'checkbox',
            'id'   => 'enable_button',
            'desc' => 'Enable button',
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
                    'text' => 'Button text',
                    'url' => '#',
                    'style' => 'btn-primary',
                    'outline' => true,
                ],                
            ],
            'fields' => impresscoder_get_button_fields(),
            'visible' => ['enable_button', '=', true],
        ]
    ],
];