<?php 
$css_classes = [
    'partners',
    'clients-carousel-wrapper',
    'mx-auto',
    !empty($align)? $align : '',
    !empty($css_class)? $css_class : ''
];
$attributes = [
    !empty($css_id)? 'id="'.$css_id.'"' : '',
    'class="'.esc_attr(implode(' ', array_filter($css_classes))).'"',
];
wp_enqueue_style('swiper-bundle');
wp_enqueue_script('swiper-bundle');
$uniqueID = uniqid('partnersCarousel-');
 if(!empty($clients)): ?>
<div id="<?php echo esc_attr($uniqueID) ?>" <?php echo implode(' ', array_filter($attributes)); ?>>    
    <div class="swiper clientsCarousel">
        <div class="swiper-wrapper pb-10">
        <?php foreach ($clients as $client) : 
            extract(wp_parse_args($client, [
                'image' => [],
                'title' => '',
                'url' => '',
            ]));
            
            $attachment_id = reset($image);
            $attachment = wp_get_attachment_image_src($attachment_id, 'medium');
            if(!$attachment) continue;
            $format = '<img src="%s" alt="%s">';
            if(!empty($url)){
                $format = '<a href="'.esc_url($url).'" target="_blank">'.$format.'</a>';
            }                
            ?>
            <div class="swiper-slide">
                <div class="client-logo border p-20 d-flex justify-content-center align-items-center">
                <?php printf($format, esc_url($attachment[0]), esc_attr($title)); ?>
                </div>
            </div>
        <?php endforeach; ?> 
        </div>
    </div>    
</div>
<?php endif; ?>