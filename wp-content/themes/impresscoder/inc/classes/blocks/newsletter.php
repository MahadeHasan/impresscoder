<?php 
return [
    'title'           => 'Newsletter',
    'id'              => 'newsletter',
    'icon'            => 'email',
    'description'     => 'Display newsletter form', 
    'fields' => [ 
        [
            'type' => 'select',
            'id' => 'style',
            'name' => 'Style',
            'options' => [
                '' => 'Single column',
                'cols-2' => 'Double column',
            ],
        ],
        [
            'type' => 'text',
            'id' => 'placeholder',
            'name' => 'Placeholder',
            'std' => 'Enter your email address..'
        ],
        [
            'type' => 'text',
            'id' => 'button_text',
            'name' => 'Button text',
            'std' => 'Sign up'
        ],
        [
            'type' => 'wysiwyg',
            'id' => 'footer_note',
            'name' => 'Footer note',
            'std' => '<p>*No credit card required</p><p>*See <a href="#">FAQ</a> for more details</p><p>*<a href="#">Privacy Policy</a></p>',
            'options' => [
                'textarea_rows' => 4,
                'teeny'         => true,
                'media_buttons' => false
            ],
        ]
    ],
];