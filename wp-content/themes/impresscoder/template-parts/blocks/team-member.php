<?php 
$css_classes = [
    'team-member',
    'card',
    'card-member',
    'shadow-hover',
    'mb-30',
    !empty($align)? $align : '',
    !empty($css_class)? $css_class : ''     
];


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
            'placeholder' => 'Team member name...',
            'className' => 'title'
        ]
    ],
    [
        'core/paragraph',
        [
            'content' => !empty($subtitle)? $subtitle : '',
            'placeholder' => 'Enter team member description here...',
            'className' => 'sub-title fw-normal'
        ]
    ]
    
];

?>
<div <?php echo implode(' ', array_filter($attributes)); ?>>
    <?php if(!empty($image)): $image_url = wp_get_attachment_image_url($image, 'impresscoder-450x350-cropped'); ?>
        <div class="card-img-wrap border-bottom position-relative">
            <img class="img-fluid card-img-top" src="<?php echo esc_url($image_url) ?>" alt="<?php echo !empty($designation)?? esc_attr($designation) ?>" />
        </div>
    <?php endif; ?>
    <div class="card-body">
    <InnerBlocks template="<?php echo esc_attr( json_encode( $output ) ) ?>"/>    
    </div>
    <?php if( !empty($social_links) ): ?>
    <div class="card-footer d-flex gap-15">
        <?php
        foreach ($social_links as $key => $social) : ?>
             <a class="px-2" href="<?php echo esc_url($social['link']) ?>" target="_blank" title="<?php echo esc_attr($social['title']) ?>"><?php echo impresscoder_get_social_link_svg( $social['link'], 24 ) ?></a>
             <?php
        endforeach;
        ?>
    </div>
    <?php endif; ?>
</div>

