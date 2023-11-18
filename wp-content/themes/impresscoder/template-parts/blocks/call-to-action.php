<?php 
$css_classes = [
    'call-to-action',
    'section-title',
    !empty($align)? $align : ''     
];
$has_button = false;
$justify_between = false;
if(!empty($buttons)){
    $has_button = true;
}

$wrapper_class = [];
if($has_button && !empty($align) && ($align != 'text-center')){
    $justify_between = true;
    $wrapper_class[] = 'call-to-action-wrapper d-grid d-lg-flex justify-content-lg-between align-items-lg-end';
    $wrapper_class[] = !empty($css_class)? $css_class : '';

    if($align == 'text-end'){
        $wrapper_class[] = 'flex-lg-row-reverse';
    }
}else{
    $css_classes[] = !empty($css_class)? $css_class : '';
}

$attributes = [
    !empty($css_id)? 'id="'.$css_id.'"' : '',
    'class="'.esc_attr(implode(' ', $css_classes)).'"'    
];
$output = [
    [
        'core/paragraph',
        [
            'content' => !empty($name)? $name : '',
            'placeholder' => 'Section name...',
            'className' => 'section-name text-primary small fw-bold text-uppercase letter-spacing-2 mb-0'
        ]
    ],
    [
        'core/heading',
        [
            'content' => !empty($title)? $title : '',
            'placeholder' => 'Call to Action Title...',
            'className' => 'title mb-0'
        ]
    ],
    [
        'core/paragraph',
        [
            'content' => !empty($subtitle)? $subtitle : '',
            'placeholder' => 'Call to action description here...',
            'className' => 'sub-title lead fw-normal'
        ]
    ]
    
];

$buttons_html = '';
if( $has_button ): 
$buttons_html = '<div class="d-flex gap-10 mt-20 justify-content-lg-end">';
    foreach ($buttons as $button):          
        if(empty($button['link']) || empty($button['text'])) continue;
        $icon = '';
        if( !empty($button['icon']) && $button['icon'] == 'googleplay' ){
            $icon = get_theme_file_uri('assets/images/googleplay.png');
        }
        if( !empty($button['icon']) && $button['icon'] == 'appstore' ){
            $icon = get_theme_file_uri('assets/images/appstore.png');
        }

        if(empty($icon)){
            $buttons_html .= impresscoder_get_button_html($button);
        }else{
            $buttons_html .= '<a target="_blank" href="'.esc_url($button['link']).'" title="'.esc_attr($button['text']).'"><img width="160" class="img-fluid" src="'.esc_url($icon).'"></a>';
        }
        
        
    endforeach;  
$buttons_html .= '</div>';  
endif; 
?>
<?php if($justify_between): ?>
    <div class="<?php echo implode(' ', $wrapper_class) ?>">
        <div <?php echo implode(' ', array_filter($attributes)); ?>>
            <InnerBlocks template="<?php echo esc_attr( json_encode( $output ) ) ?>"/>        
        </div>
        <?php impresscoder_content($buttons_html, '<div clas="d-flex gap-15">', '</div>');  ?>
    </div>
<?php else: ?> 
    <div <?php echo implode(' ', array_filter($attributes)); ?>>
        <InnerBlocks template="<?php echo esc_attr( json_encode( $output ) ) ?>"/>
        <?php impresscoder_content($buttons_html, '<div clas="d-flex gap-15">', '</div>');  ?>
    </div>
<?php endif; ?>    
