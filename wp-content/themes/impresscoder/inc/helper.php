<?php
function impresscoder_get_color_presets($type){
    $colors = [];
    // Editor color palette.
    $black     = '#000000';
    $dark_gray = '#28303D';
    $gray      = '#39414D';
    $green     = '#D1E4DD';
    $blue      = '#D1DFE4';
    $purple    = '#D1D1E4';
    $red       = '#E4D1D1';
    $orange    = '#E4DAD1';
    $yellow    = '#EEEADD';
    $white     = '#FFFFFF';

    $colors['gradient-presets'] = array(
        array(
            'name'     => esc_html__( 'Purple to yellow', 'impresscoder' ),
            'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $yellow . ' 100%)',
            'slug'     => 'purple-to-yellow',
        ),
        array(
            'name'     => esc_html__( 'Yellow to purple', 'impresscoder' ),
            'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $purple . ' 100%)',
            'slug'     => 'yellow-to-purple',
        ),
        array(
            'name'     => esc_html__( 'Green to yellow', 'impresscoder' ),
            'gradient' => 'linear-gradient(160deg, ' . $green . ' 0%, ' . $yellow . ' 100%)',
            'slug'     => 'green-to-yellow',
        ),
        array(
            'name'     => esc_html__( 'Yellow to green', 'impresscoder' ),
            'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $green . ' 100%)',
            'slug'     => 'yellow-to-green',
        ),
        array(
            'name'     => esc_html__( 'Red to yellow', 'impresscoder' ),
            'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
            'slug'     => 'red-to-yellow',
        ),
        array(
            'name'     => esc_html__( 'Yellow to red', 'impresscoder' ),
            'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
            'slug'     => 'yellow-to-red',
        ),
        array(
            'name'     => esc_html__( 'Purple to red', 'impresscoder' ),
            'gradient' => 'linear-gradient(160deg, ' . $purple . ' 0%, ' . $red . ' 100%)',
            'slug'     => 'purple-to-red',
        ),
        array(
            'name'     => esc_html__( 'Red to purple', 'impresscoder' ),
            'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $purple . ' 100%)',
            'slug'     => 'red-to-purple',
        ),
    );


    $colors['color-palette'] = array(
        array(
            'name'  => esc_html__( 'Black', 'impresscoder' ),
            'slug'  => 'black',
            'color' => $black,
        ),
        array(
            'name'  => esc_html__( 'Dark gray', 'impresscoder' ),
            'slug'  => 'dark-gray',
            'color' => $dark_gray,
        ),
        array(
            'name'  => esc_html__( 'Gray', 'impresscoder' ),
            'slug'  => 'gray',
            'color' => $gray,
        ),
        array(
            'name'  => esc_html__( 'Green', 'impresscoder' ),
            'slug'  => 'green',
            'color' => $green,
        ),
        array(
            'name'  => esc_html__( 'Blue', 'impresscoder' ),
            'slug'  => 'blue',
            'color' => $blue,
        ),
        array(
            'name'  => esc_html__( 'Purple', 'impresscoder' ),
            'slug'  => 'purple',
            'color' => $purple,
        ),
        array(
            'name'  => esc_html__( 'Red', 'impresscoder' ),
            'slug'  => 'red',
            'color' => $red,
        ),
        array(
            'name'  => esc_html__( 'Orange', 'impresscoder' ),
            'slug'  => 'orange',
            'color' => $orange,
        ),
        array(
            'name'  => esc_html__( 'Yellow', 'impresscoder' ),
            'slug'  => 'yellow',
            'color' => $yellow,
        ),
        array(
            'name'  => esc_html__( 'White', 'impresscoder' ),
            'slug'  => 'white',
            'color' => $white,
        ),
    );

    if(empty($colors[$type])) return [];

    return $colors[$type];
}

function impresscoder_get_font_sizes(){
    return array(
        array(
            'name'      => esc_html__( 'Extra small', 'impresscoder' ),
            'shortName' => esc_html_x( 'XS', 'Font size', 'impresscoder' ),
            'size'      => 16,
            'slug'      => 'extra-small',
        ),
        array(
            'name'      => esc_html__( 'Small', 'impresscoder' ),
            'shortName' => esc_html_x( 'S', 'Font size', 'impresscoder' ),
            'size'      => 18,
            'slug'      => 'small',
        ),
        array(
            'name'      => esc_html__( 'Normal', 'impresscoder' ),
            'shortName' => esc_html_x( 'M', 'Font size', 'impresscoder' ),
            'size'      => 20,
            'slug'      => 'normal',
        ),
        array(
            'name'      => esc_html__( 'Large', 'impresscoder' ),
            'shortName' => esc_html_x( 'L', 'Font size', 'impresscoder' ),
            'size'      => 24,
            'slug'      => 'large',
        ),
        array(
            'name'      => esc_html__( 'Extra large', 'impresscoder' ),
            'shortName' => esc_html_x( 'XL', 'Font size', 'impresscoder' ),
            'size'      => 40,
            'slug'      => 'extra-large',
        ),
        array(
            'name'      => esc_html__( 'Huge', 'impresscoder' ),
            'shortName' => esc_html_x( 'XXL', 'Font size', 'impresscoder' ),
            'size'      => 96,
            'slug'      => 'huge',
        ),
        array(
            'name'      => esc_html__( 'Gigantic', 'impresscoder' ),
            'shortName' => esc_html_x( 'XXXL', 'Font size', 'impresscoder' ),
            'size'      => 144,
            'slug'      => 'gigantic',
        ),
    );
}

function impresscoder_get_default_colors_global(){
    return [ 
        [
            'id' =>  'primary',
            'value' => '#fa4a47',
            'title' => 'Primary'
        ],
        [
            'id' =>  'primary-darken',
            'value' => '#cc3f49',
            'title' => 'Primary Darken'
        ],
        [
            'id' =>  'secondary',
            'value' => '#424242',
            'title' => 'Secondary'
        ],
        [
            'id' =>  'dark',
            'value' => '#242424',
            'title' => 'Dark'
        ],
        [
            'id' =>  'light',
            'value' => '#f7f7f7',
            'title' => 'Light'
        ],
        [
            'id' =>  'body_color',
            'value' => '#353535',
            'title' => 'Body text color'
        ],
        [
            'id' =>  'headings_color',
            'value' => '#140000',
            'title' => 'Heading text color'
        ],
        [
            'id' =>  'link_color',
            'value' => '#fa4a47',
            'title' => 'Link color'
        ],
        [
            'id' =>  'link_hover_color',
            'value' => '#cc3f49',
            'title' => 'Link hover color'
        ],
    ];
}

function impresscoder_get_editor_color_choices(){
    $colors = impresscoder_get_default_colors_global();
    $choices = [];
    foreach ($colors as $color) {
        $choices[] = [
            'name' => $color['id'],
            'color' => get_theme_mod('impresscoder_'.$color['id'], $color['value'])
        ];
    }
    return $choices;
}

function impresscoder_get_field_id_by_prefix($text){
    return 'impresscoder_'. str_replace('-', '_', sanitize_key($text));
}

function impresscoder_get_color_fields($type){    

    $fields = [];
    $function_name = "impresscoder_get_default_colors_{$type}";
    if( !function_exists($function_name) ) return $fields;

    $colors = call_user_func($function_name);
    foreach ($colors as $color) {
        if(empty($color['id'])) continue;
        
        $color = wp_parse_args($color, [
            'id' => '',
            'title' => '',
            'value' => ''
        ]);


        if(empty($color['title'])){
            $color['title'] = ucfirst(str_replace('-', ' ', $color['id']));
        }
        $field_id = impresscoder_get_field_id_by_prefix($color['id']); 
        $fields[] = [
            'name' => $color['title'],
            'id'   => esc_attr($field_id),
            'type' => 'color',
            'std' => $color['value'],
            'alpha' => true
        ];

    }
    return $fields;
}

function impresscoder_formatting_list_html($args = []){
    $output = '';
    extract(wp_parse_args($args, [
		'wrap' => 'ul',
		'wrap_class' => 'nav',
		'link_wrap' => 'li',
		'link_wrap_class' => 'nav-item',
		'link_class' => 'nav-link',
        'options' => [],
        'output' => '',
	]));
    if(empty($options)) return $output;

    
	$link_class = [ $link_class ];
	$link_before = $link_after = '';
	if(!empty($link_wrap)){
		$link_before = sprintf('<%1$s class="%2$s">', $link_wrap, $link_wrap_class);
		$link_after = sprintf('</%1$s>', $link_wrap);
	}
    $links = [];
    foreach ($options as $link) {
		extract(wp_parse_args($link, [
			'text' =>'',
			'url' => '',
			'class' => '',
            'attributes' => []
        ]));
		$link_class[] = $class;
		$links[] = sprintf( '%4$s<a href="%2$s" class="%3$s" %6$s>%1$s</a>%5$s', esc_attr($text), esc_url($url), implode(' ', array_filter($link_class)), $link_before, $link_after, implode(' ', $attributes) );
	}

	$links_html = implode('', $links);
	if(!empty($wrap)){
		$links_html = sprintf('<%2$s class="%3$s">%1$s</%2$s>', $links_html, $wrap, $wrap_class );
	}
    $output .= $links_html;
	
	return $output;
}

function impresscoder_get_spacer_options($class_prefix = '', $label_prefix = ''){
    $spacers = [ 0,1,2,3,4,5, 10,15,20,30,40,50,60,70,80,100,120 ];
    $options = [];
    foreach ($spacers as $value) {
        $class =  "{$class_prefix}{$value}";
        $label =  "{$label_prefix}{$value}";
        $options[] = [
            'label' => $label,
            'value' => $class,
        ];
    }
    
    return $options;
}

function impresscoder_get_editor_column_templates(){
    $templates = [
        [
            'name' => '1-3',
            'title' => '2 Columns (1:3)',
            'icon' => '',
            'templateLock' => 'all',
            'template' => [
                [
                    'wp-bootstrap-blocks/column',
                    [
                        'sizeMd' =>  3
                    ]
                ],
                [
                    'wp-bootstrap-blocks/column',
                    [
                        'sizeMd' => 9
                    ]
                ]
            ]
        ]
    ];
    return $templates;
}

function impresscoder_vertical_spacer_options(){
    return [
        'py-120' => 'Spacer large - 120:120',
        'py-60' => 'Spacer small - 60:60',                
        'py-100' => 'Spacer - 100:100',                
        'pt-100 pb-80' => 'Spacer - 100:80',
        'pt-100 pb-70' => 'Spacer - 100:70',
        'pt-100 pb-60' => 'Spacer - 100:60',
        'pt-100 pb-50' => 'Spacer - 100:50',
        'pt-100 pb-40' => 'Spacer - 100:40',
        'pt-100 pb-30' => 'Spacer - 100:30',
        'pt-100 pb-20' => 'Spacer - 100:20',
        'pt-100 pb-10' => 'Spacer - 100:10',
        'pt-100 pb-0' => 'Spacer - 100:0',
        'py-0' => 'No spacing',                                
    ];
}

function impresscoder_section_settings_field($args = [], $group = true, $prefix='section_'){
    $std = wp_parse_args($args, [
        'bg' => '',
        'align' => '',
        'spacer_y' => 'py-100',
        'container' => 'container',
        'css_class' => '',
        'css_id' => '',
    ]);
    $group_fields = [
        [
            'id' => 'container',
            'type' => 'select',
            'name' => 'Container',         
            'desc' => 'Section container width', 
            'std' => 'container',
            'options' => [
                'container' => 'Container',
                'container-fluid' => 'Container Fluid',
                '' => 'Full-width',
            ],        
        ],
        [
            'type' => 'select',
            'id' => 'bg',
            'name' => 'Background',
            'std' => '',
            'options' => [                
                '' => 'Default',
                'bg-primary' => 'Primary',
                'bg-secondary' => 'Secondary',
                'bg-danger' => 'Danger',
                'bg-warning' => 'Warning',
                'bg-info' => 'Info',
                'bg-light' => 'Light',
                'bg-dark' => 'Dark',
                'bg-white' => 'White',
                'bg-body' => 'Body',
            ],
        ],
        [
            'id' => 'pt',
            'type' => 'number',
            'name' => 'Padding top',         
            'append' => 'pixel', 
            'std' => 100,
            'min' => 0,       
            'max' => 120,       
            'step' => 10      
        ], 
        [
            'id' => 'pb',
            'type' => 'number',
            'name' => 'Padding bottom',         
            'append' => 'pixel', 
            'std' => 100,
            'min' => 0,       
            'max' => 120,       
            'step' => 10      
        ],       
                            
    ];    

    if(!$group){
        // setup default value
        foreach ($group_fields as $key => $value) {
            if(!empty($std[$value['id']])) {
                $value['std'] = $std[$value['id']];
            }
            // Add prefix
            $value['id'] = $prefix.$value['id'];
            $group_fields[$key] = $value;
        }
        return $group_fields;
    } 

    
    $field = [
        'id' => 'section',
        'type' => 'group',
        'clone' => false,
        'default_state' => 'collapsed',
        'collapsible' => true,
        'save_state' => false,
        'group_title' => 'Section: Background: {bg}, Align: {align}',	
        'std' => $std,		
        'fields' => $group_fields,
    ];

    
    return $field;
}

function impresscoder_get_button_fields($group = false, $args = [], $prefix = ''){
    $args = wp_parse_args($args, [
        'text' => 'Button title',
        'link' => '#',
        'style' => '',
        'outline' => false,
        'size' => '',
        'icon' => '',
        'icon_position' => 'right',
        'icon_size' => 24
    ]);
    $fields =  [      
        [
            'type' => 'text',
            'id'   => 'text',
            'name' => 'Text',
        ],  
        [
            'type' => 'text',
            'id'   => 'link',
            'name' => 'Link',
        ],
        [
            'type' => 'select',
            'id'   => 'style',
            'name' => 'Style',
            'options' => [                
                'btn-link' => 'Link',
                'btn-primary' => 'Primary',
                'btn-secondary' => 'Secondary',
                'btn-danger' => 'Danger',
                'btn-warning' => 'Warning',
                'btn-info' => 'Info',
                'btn-light' => 'Light',
                'btn-dark' => 'Dark',
            ],
        ],
        [
            'type' => 'checkbox',
            'id'   => 'outline',
            'desc' => 'Enable outline',
        ],        
        [
            'type' => 'select',
            'id'   => 'size',
            'name' => 'Size',
            'options' => [                
                '' => 'Normal',
                'btn-sm' => 'Small',
                'btn-lg' => 'Large',
                'btn-xl' => 'Extra large',
            ],
        ],
        [
            'type' => 'select',
            'id'   => 'icon',
            'name' => 'Icon',
            'options' => [ 
                '' => 'None',               
                'next' => 'Next',
                'prev' => 'Prev',
                'next2' => 'Next 2',
                'prev2' => 'Prev 2',
                'arrow_left' => 'Arrow left',
                'arrow_right' => 'Arrow Right',
                'plus' => 'Plus',
                'minus' => 'Minus',  
                'googleplay' => 'Google play store',              
                'appstore' => 'App store',              
            ],
        ],
        [
            'type' => 'number',
            'id'   => 'icon_size',
            'name' => 'Icon size',
            'visible' => ['icon', '!=', '']
        ], 
        [
            'type' => 'select',
            'id'   => 'icon_position',
            'name' => 'Icon position',
            'options' => [ 
                'right' => 'Right',
                'left' => 'Left',  
            ],
            'visible' => ['icon', '!=', '']
        ],
    ];

    foreach ($fields as $key => $field) {
        if(empty($field['id'])) continue;
        $field_id = $prefix.$field['id'];

        if(!$group && isset($args[$field_id])){
            $field['std'] = $args[$field_id];
        }

        $field['id'] = $field_id;
        $fields[$key] = $field;
    }

    return $fields;
}

function impresscoder_get_button_html($args){
    extract($args);    
    if(empty($link) || empty($text)) return;
    if(!empty($outline) && !empty($style)){
        $style = str_replace('btn-', 'btn-outline-', $style); 
    }
    $css_classes = [
        'btn',
        !empty($size)? $size : '',
        $style,
        'd-inline-flex',
        'align-items-center',
        'gap-2',    
        !empty($css_class)? $css_class : ''
    ];


    $css_classes = array_unique(array_filter($css_classes));

    $attributes = [
        !empty($css_id)? 'id="'.$css_id.'"' : '',
        'class="'.esc_attr(implode(' ', $css_classes)).'"'    
    ];
    
    if(empty($icon)){
        return sprintf('<a href="'.esc_url($link).'" %2$s>%1$s</a>', $text, join(' ', array_filter($attributes)));
    }
    
    $icon_svg = '';
    $icon_size = !empty($icon_size)? $icon_size : 24;
    $icon_position = !empty($icon_position)? $icon_position : 'right';
    $icon_svg = impresscoder_get_icon_svg('ui', $icon, $icon_size);
    if($icon_position == 'left'){
        return sprintf('<a href="'.esc_url($link).'" %2$s>%3$s%1$s</a>', $text, join(' ', array_filter($attributes)), $icon_svg);
    }else {
        return sprintf('<a href="'.esc_url($link).'" %2$s>%1$s%3$s</a>', $text, join(' ', array_filter($attributes)), $icon_svg);
    }
    
}

function impresscoder_get_element_common_fields(){
    return [  
        [
            'type' => 'select',
            'id'   => 'align',
            'name' => 'Align',
            'options' => [
                '' => 'Inherit',
                'text-start' => 'Start',
                'text-center' => 'Center',
                'text-end' => 'End',
            ]
        ],          
        [
            'id' => 'css_class',
            'type' => 'text',
            'name' => 'CSS class'
        ],
        [
            'id' => 'css_id',
            'type' => 'text',
            'name' => 'CSS ID'
        ],
    ];
}

function impresscoder_get_parallax_fields(){
    $fields = [
        [
            'id' => 'enable_parallax',
            'type' => 'checkbox',
            'desc' => 'Enable background image',
        ],
        [
            'id' => 'parallax_image',
            'type' => 'image_advanced',
            'name' => 'Background image',
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible' => [ 'enable_parallax', '=', true ]
        ],
        [
            'id' => 'parallax_opacity',
            'type' => 'number',
            'name' => 'Background image opacity',
            'std' => .5,
            'min' => 0,       
            'max' => 1,       
            'step' => .1,
            'visible' => [ 'enable_parallax', '=', true ]   
        ],
    ];

    return $fields;
}

function impresscoder_get_parallax_attributes($args){
    extract(wp_parse_args($args, [
        'enable_parallax' => false,
        'parallax_image' => '',
        'parallax_opacity' => 1
    ]));
    
    if(empty($enable_parallax) && empty($parallax_image)) return false;

    $css_vars = [];
    $attachment_id = reset($parallax_image);
    $attachment = wp_get_attachment_image_src($attachment_id, 'full');
    if($attachment){
        $bg_image_src = $attachment[0];            
        $css_vars = [
            '--impresscoder-parallax-bg: url('.esc_url($bg_image_src).')',
            !empty($parallax_opacity)? '--impresscoder-parallax-opacity: '.$parallax_opacity : '',
        ];
    }
     
    return $css_vars;
}

function impresscoder_wp_query_field($args = array(), $group = true){	
	$default = array(
        'post_type' => 'post',
		'posts_per_page' => get_option( 'posts_per_page' ),
		'post__in' => array(),
		'post__not_in' => array(),
		'ignore_sticky_posts' => 1,
		'post_status' => 'publish',
		'order' => 'DESC',
		'orderby' => 'date',
	);
	$std = wp_parse_args( $args, $default);
	extract($std);	

    $group_fields = array(
        array (
            'id' => 'post_type',
            'type' => 'hidden',	
            'std'  => $post_type,
            'attributes' => ['value' => $post_type]
        ),															
        array (
            'id' => 'posts_per_page',
            'type' => 'number',
            'name' => esc_attr__( 'Posts per page', 'impresscoder' ),
            'desc' => esc_attr__( ' (int) number of post to show per page. -1 to show all posts', 'impresscoder' ),
            'min'  => -1,
            'step' => 1,
        ),
        array (
            'id' => 'post__in',
            'type' => 'post',
            'name' => esc_attr__( 'Include specific posts', 'impresscoder' ),
            'placeholder' => esc_attr__( 'Select posts..', 'impresscoder' ),
            'desc' => esc_attr__( 'mulliple selection is allowed', 'impresscoder' ),
            'field_type' => 'select_advanced',
            'ajax' => true,
            'multiple' => true,
            'query_args' => array(
                'post_type' => esc_attr($post_type),
                'posts_per_page' => -1
            )

        ),
        array (
            'id' => 'post__not_in',
            'type' => 'post',
            'name' => esc_attr__( 'Exclude specific posts', 'impresscoder' ),
            'placeholder' => esc_attr__( 'Select posts..', 'impresscoder' ),
            'desc' => esc_attr__( 'mulliple selection is allowed', 'impresscoder' ),
            'field_type' => 'select_advanced',
            'ajax' => true,
            'multiple' => true,
            'query_args' => array(
                'post_type' => esc_attr($post_type),
                'posts_per_page' => -1
            ),

        ),
        array (
            'id' => 'ignore_sticky_posts',
            'type' => 'switch',
            'name' => esc_attr__( 'Ignore sticky posts', 'impresscoder' ),
        ),	
        array(
            'id'       => 'post_status',
            'name'     => esc_attr__( 'Post status', 'impresscoder' ),
            'type'     => 'select',
            'options'  => array(
                'publish'      => 'Publish',
                'pending'    => 'Pending',
                'draft'    => 'Draft',
                'future'    => 'Future',
                'private'    => 'Private',
                'inherit'    => 'Inherit',
                'trash'    => 'Trash',
                'any'    => 'Any',					       
            ),
            'inline'   => true,
            'multiple' => false,
        ),				
        array(
            'id'       => 'order',
            'name'     => esc_attr__( 'Order', 'impresscoder' ),
            'type'     => 'select',
            'options'  => array(
                'ASC'      => 'ASC',
                'DESC'    => 'DESC',
                
            ),
            'inline'   => true,
            'multiple' => false,
        ),
        array(
            'id'       => 'orderby',
            'name'     => esc_attr__( 'Order by', 'impresscoder' ),
            'type'     => 'select',
            'options'  => array(
                'none'      => 'none',
                'ID'    => 'ID',
                'author'    => 'Author',
                'title'    => 'Title',
                'name'    => 'Same',
                'date'    => 'Date',
                'modified'    => 'Modified date',
                'rand'    => 'Random',
                'comment_count'    => 'Comments',					       
            ),
            'inline'   => true,
            'multiple' => false,
        ),					
    );

    if(!$group){
        // setup default value
        foreach ($group_fields as $key => $value) {
            if(empty($std[$value['id']])) continue;
            $value['std'] = $std[$value['id']];
            $group_fields[$key] = $value;
        }
        return $group_fields;
    }
	
	$field = array(
        'id' => 'query_args',
        'type' => 'group',
        'clone' => false,
        'default_state' => 'collapsed',
        'collapsible' => true,
        'save_state' => false,
        'group_title' => 'Query: per_page: {posts_per_page} post_type: {post_type}',	
        'std' => $std,		
        'fields' => $group_fields,
    );

    return $field;
}

/**
 * Get size information for all currently-registered image sizes.
 *
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return array $sizes Data for all currently-registered image sizes.
 */
function impresscoder_get_image_sizes() {
	global $_wp_additional_image_sizes;
	
	$sizes = array();
	
	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array(
			 'thumbnail',
			'medium',
			'medium_large',
			'large' 
		) ) ) {
			$sizes[ $_size ][ 'width' ]  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ][ 'height' ] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ][ 'crop' ]   = (bool) get_option( "{$_size}_crop" );
		} //in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) )
		elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
				 'width' => $_wp_additional_image_sizes[ $_size ][ 'width' ],
				'height' => $_wp_additional_image_sizes[ $_size ][ 'height' ],
				'crop' => $_wp_additional_image_sizes[ $_size ][ 'crop' ] 
			);
		} //isset( $_wp_additional_image_sizes[ $_size ] )
	} //get_intermediate_image_sizes() as $_size
	
	return $sizes;
}

function impresscoder_get_image_sizes_options() {
  $sizes = impresscoder_get_image_sizes();

  $arr = array();
  foreach ($sizes as $key => $value) {
     $arr[$key] = ucfirst(trim(str_replace(['-', '_', 'ctrl'], ' ', $key)));
  }
  
  return $arr;
}
/**
 * Filter callback to add image sizes to Media Uploader
 */
function impresscoder_display_image_size_names_muploader( $sizes ) {
	
	$new_sizes = array();
	
	$added_sizes = get_intermediate_image_sizes();
	
	// $added_sizes is an indexed array, therefore need to convert it
	// to associative array, using $value for $key and $value
	foreach( $added_sizes as $key => $value) {
		$new_sizes[$value] = $value;
	}
	
	// This preserves the labels in $sizes, and merges the two arrays
	$new_sizes = array_merge( $new_sizes, $sizes );
	
	return $new_sizes;
}
add_filter('image_size_names_choose', 'impresscoder_display_image_size_names_muploader', 11, 1);

function impresscoder_get_sidebar_options(){
    // Get the registered sidebars.
    global $wp_registered_sidebars;

    $sidebars = array();
    foreach ( $wp_registered_sidebars as $id => $sidebar ) {
        $sidebars[ $id ] = $sidebar['name'];
    }

    return $sidebars;
}

function impresscoder_get_the_ID(){
    if( 'ctrl_listings' === get_post_type() ){
        $page_id = control_listings_setting( 'listing_archive_page' );
        $post_exists = (new \WP_Query(['post_type' => 'any', 'p'=>$page_id]))->found_posts > 0;
        if($post_exists){
            return $page_id;
        }
    }
    return get_the_ID();	
}

function impresscoder_get_themeURI($trail=""){    
    $ThemeURI =  apply_filters('impresscoder_get_themeURI', trailingslashit(wp_get_theme('impresscoder')->get('ThemeURI')));
    return $ThemeURI.$trail;
}