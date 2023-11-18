<?php 
$has_parallax_vars = impresscoder_get_parallax_attributes($atts);
$css_classes = [
    'watch-video',
    'h-100',
    'd-flex',
    'align-items-center',    
    !empty($align)? str_replace('text', 'justify-content',$align) : 'justify-content-center',
    !empty($align)? $align : '',
    !empty($css_class)? $css_class : '',
    !empty($has_parallax_vars)? 'has-parallax' : ''     
];


$attributes = [
    !empty($css_id)? 'id="'.$css_id.'"' : '',
    'class="'.esc_attr(implode(' ', $css_classes)).'"',
    !empty($has_parallax_vars)? 'style="'.implode(';', $has_parallax_vars).'"' : ''    
];
$output = [    
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
?>
<div <?php echo implode(' ', array_filter($attributes)); ?>>
    <div class="d-grid">
        <?php if( !empty($video_url) ): ?>
        <a href="<?php esc_url($video_url) ?>" class="video-link mb-20">
            <span class="video-icon"><?php echo impresscoder_get_icon_svg('ui', 'video', 48); ?></span>
        </a>
        <?php endif; ?>
        <InnerBlocks template="<?php echo esc_attr( json_encode( $output ) ) ?>"/>    
    </div>
    <?php echo !empty($has_parallax_vars)? '<div class="parallax"></div>' : ''; ?>
</div> 
