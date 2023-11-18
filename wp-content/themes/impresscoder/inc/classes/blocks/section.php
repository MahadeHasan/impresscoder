<?php 
return [
    'title'           => 'Section',
    'id'              => 'section',
    'icon'            => 'admin-post',
    'description'     => 'Display section container',    
    'parallax'        => true,
    // Block fields.
    'fields'          => impresscoder_section_settings_field([            
        'spacer_y' => 'py-100',
        'bg' => 'bg-white'
    ], false),
];