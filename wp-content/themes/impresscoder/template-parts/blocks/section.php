<?php 
$has_parallax_vars = impresscoder_get_parallax_attributes($atts);

$css_classes = [
    'div-section',       
    !empty($section_bg)? $section_bg : '',
    !empty($section_pt)? 'pt-'.$section_pt : '',
    !empty($section_pb)? 'pb-'.$section_pb : '',
    !empty($has_parallax_vars)? 'has-parallax' : '',
    !empty($align)? $align : '',
    !empty($css_class)? $css_class : '',
];



$attributes = [
    !empty($css_id)? 'id="'.$css_id.'"' : '',
    'class="'.esc_attr(implode(' ', array_filter($css_classes))).'"',
    !empty($has_parallax_vars)? 'style="'.implode(';', $has_parallax_vars).'"' : '',   
];
$output = [    
    [
        'core/freeform',
        [
            'placeholder' => 'Enter section content or block here...',
            'className' => 'list-arrow'
        ]
    ]    
    
];
?>
<section <?php echo implode(' ', array_filter($attributes)); ?>>
    <?php echo !empty($section_container)? '<div class="'.esc_attr($section_container).'">' : ''; ?>
        <InnerBlocks template="<?php echo esc_attr( json_encode( $output ) ) ?>"/>
    <?php echo !empty($section_container)? '</div>' : ''; ?>
    <?php echo !empty($has_parallax_vars)? '<div class="parallax"></div>' : ''; ?>
</section>