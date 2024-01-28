<div class="wow animate__animated animate__fadeIn mt-30 mb-50">
    <div class="swiper-container portfolio-swiper-slides">
        <div class="swiper-wrapper"> 
            <?php $slides = get_post_meta(get_the_ID(), 'slider_images'); ?>
            <?php
            foreach ($slides as $attachment_id) :
                $attachment_url = wp_get_attachment_image_url($attachment_id, 'impresscoder-1200x450-cropped');
                if (empty($attachment_url)) continue;
            ?>
                <div class="swiper-slide portfolio-slide-item">
                    <div class="image-detail rounded">
                        <img class=" mb-50 rounded" src="<?php echo esc_url($attachment_url); ?>" alt="<?php the_title(); ?>">
                    </div>
                </div>
            <?php endforeach ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>