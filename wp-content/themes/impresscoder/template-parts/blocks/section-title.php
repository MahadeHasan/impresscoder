<?php 
$css_classes = [
    'section-title',
    !empty($align)? $align : ''     
];
$has_button = false;
$justify_between = false;
if(!empty($enable_button) && !empty($buttons)){
    $has_button = true;
}

$wrapper_class = [];
if($has_button && !empty($align) && ($align != 'text-center')){
    $justify_between = true;
    $wrapper_class[] = 'section-title-wrapper d-grid d-lg-flex gap-20 justify-content-lg-between align-items-lg-end';
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
            'placeholder' => 'Section Title...',
            'className' => 'title mb-0'
        ]
    ],
    [
        'core/paragraph',
        [
            'content' => !empty($subtitle)? $subtitle : '',
            'placeholder' => 'Enter section description here...',
            'className' => 'sub-title lead fw-normal'
        ]
    ]
    
];
$buttons_html = '';

?>
<?php if( $has_button ): ?>
    <?php foreach ($buttons as $button):  ?>
        <?php 
            if(empty($button['link']) || empty($button['text'])) continue;
            $buttons_html .= impresscoder_get_button_html($button);
        ?>
    <?php endforeach; ?>    
<?php endif; 
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
