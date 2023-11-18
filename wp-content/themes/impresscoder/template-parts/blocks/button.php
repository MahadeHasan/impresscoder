<?php
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
$icon_svg = '';
if(!empty($icon)){
    $icon_size = !empty($icon_size)? $icon_size : 24;
    $icon_position = !empty($icon_position)? $icon_position : 'right';
    $icon_svg = impresscoder_get_icon_svg('ui', $icon, $icon_size);
    if($icon_position == 'left'){
        printf('<a href="'.esc_url($link).'" %2$s>%3$s%1$s</a>', $text, join(' ', array_filter($attributes)), $icon_svg);
    }else {
        printf('<a href="'.esc_url($link).'" %2$s>%1$s%3$s</a>', $text, join(' ', array_filter($attributes)), $icon_svg);
    }
}else{
    printf('<a href="'.esc_url($link).'" %2$s>%1$s</a>', $text, join(' ', array_filter($attributes)));
}
?>

