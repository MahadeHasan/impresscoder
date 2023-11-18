<?php 
$css_classes = [
    'div-section',   
    !empty($spacer_y)? $spacer_y : '',
    !empty($bg)? $bg : '',
    !empty($align)? $align : '',
    !empty($css_class)? $css_class : '',
];
?>
<section class="<?php echo esc_attr(implode(' ', $css_classes)) ?>">
    <?php echo !empty($container)? '<div class="'.esc_attr($container).'">' : ''; ?>
        <?php 
        if(!empty($content)){
            echo do_shortcode($content); 
        }        
        ?>
    <?php echo !empty($container)? '</div>' : ''; ?>
</section>