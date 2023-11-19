<?php
extract(wp_parse_args($args, [
    'testimonials'          => []

]));

$alt_text = get_bloginfo('name');
?>

<div class="box-testimonials mb-150animate__fadeIn mb-100">
    <div class="box-swiper">
        <div class="swiper-container swiper-group-3">
            <div class="swiper-wrapper pt-5">
                <?php foreach ($testimonials as $key => $value) :
                ?>
                    <div class="swiper-slide">
                        <div class="card-testimonials bg-gray-850 border-gray-800 hover-up">
                            <div class="box-author mb-20"><img src="<?php echo esc_url($value['image']['url']); ?>" alt="<?php echo esc_attr_e($alt_text); ?>">
                                <div class="author-info">
                                    <h6 class="color-gray-700"><?php echo esc_attr($value['name'])  ?></h6>
                                    <span class="color-gray-700 text-sm"><?php echo esc_attr($value['designation'])  ?></span>
                                </div>
                            </div>
                            <div class="card-info">
                                <p class="color-gray-500"><?php echo esc_attr($value['content'])  ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- swiper-slide -->
                <?php endforeach; ?>
            </div>
            <!-- swiper-wrapper -->
        </div>
        <!-- swiper-container -->
        <div class="swiper-buttons">
            <div class="swiper-button-prev swiper-button-prev-style-3"></div>
            <div class="swiper-button-next swiper-button-next-style-3"></div>
        </div>
        <!-- swiper-buttons -->
    </div>
    <!-- box-swiper -->
</div>
<!-- box-testimonials -->