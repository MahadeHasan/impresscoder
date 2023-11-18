<?php 
return [
    'title'           => 'FAQs',
    'id'              => 'faqs',
    'icon'            => 'heading',
    'description'     => 'Display question & answer',       
    'fields'          => [               
        
        [
            'id'                => 'faqs',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'   => true,
            'default_state'   => 'collapsed',
            'group_title'   => '{#}. {question}',
            'max_clone'         => 10,
            'add_button'        => __( 'Add FAQ', 'impresscoder' ),
            'fields'            => [
                
                [
                    'name' => __( 'Question', 'impresscoder' ),
                    'id'   => 'question',
                    'type' => 'text',
                ],            
                        
                [
                    'name' => __( 'Answer', 'impresscoder' ),
                    'id'   => 'answer',
                    'type'    => 'wysiwyg',
                    'raw'     => false,
                    'options' => [
                        'textarea_rows' => 4,
                        'teeny'         => true,
                        'media_buttons' => false,
                        'dfw' => false,
                    ],
                ],
                
                
            ],
        ],
            
        
    ],
];
