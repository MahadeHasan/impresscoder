<?php 
$has_parallax_vars = impresscoder_get_parallax_attributes($atts);
$css_classes = [
    'testimonials-group',
    'h-100',
    !empty($align)? $align : '',
    !empty($has_parallax_vars)? 'has-parallax' : '',
    !empty($css_class)? $css_class : ''
];
$attributes = [
    !empty($css_id)? 'id="'.$css_id.'"' : '',
    'class="'.esc_attr(implode(' ', array_filter($css_classes))).'"',
    !empty($has_parallax_vars)? 'style="'.implode(';', $has_parallax_vars).'"' : '',   
];
$title = [
    [
        'core/paragraph',
        [
            'content' => !empty($name)? $name : 'testimonials',
            'placeholder' => 'Section name...',
            'className' => 'section-name small fw-bold text-uppercase letter-spacing-2 mb-0'
        ]
    ],
    [
        'core/heading',
        [
            'content' => !empty($title)? $title : 'What parents say?',
            'placeholder' => 'Title...',
            'className' => 'title mb-0'
        ]
    ],
];
$uniqueID = uniqid('tesimonialCarousel-');
?>
<div <?php echo implode(' ', array_filter($attributes)); ?>>
    <div class="d-flex flex-wrap gap-15 mb-20">
        <span class="icon-square text-bg-dark d-inline-flex align-items-center justify-content-center flex-shrink-0">
            <?php echo impresscoder_get_icon_svg('ui', 'quote', 48); ?>
        </span>
        <div class="testimonias-title">
            <InnerBlocks template="<?php echo esc_attr( json_encode( $title ) ) ?>"/>
        </div>
    </div>
    <?php if(!empty($testimonials)): ?>
    <div id="<?php echo esc_attr($uniqueID) ?>" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">  
            <?php foreach ($testimonials as $key => $testimonial) : 
                extract(wp_parse_args($testimonial, [
                    'content' => '',
                    'by' => ''
                ]));
                ?>
                <div class="carousel-item<?php echo !$key? ' active' : ''; ?>">
                    <figure class="testimonial mb-0">
                        <blockquote class="blockquote">
                            <?php impresscoder_content($content, '<p>', '</p>') ?>                           
                        </blockquote>      
                        <figcaption class="blockquote-footer mb-0">
                            <?php impresscoder_content($by, '<cite title="Source Title">', '</cite>') ?>
                        </figcaption>              
                    </figure>
                </div>
            <?php endforeach; ?> 
            
        </div>      

    </div>
    <?php endif; ?>
    <?php echo !empty($has_parallax_vars)? '<div class="parallax"></div>' : ''; ?>
</div>