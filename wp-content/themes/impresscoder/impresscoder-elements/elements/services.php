<?php
extract(wp_parse_args($args, [ 
    'services_list'          => [], 
]));

?>


<?php if (!empty($services_list)) : ?>  
        <div class="row">
            <?php foreach ($services_list as $key => $item) :
                if (empty($item['service_title']) || empty($item['services_desc'])) continue; 
                extract(wp_parse_args($item, [
                    'icon'                      =>  '',
                    'icon_image'                      =>  '',
                    'service_title'             =>  '',
                    'service_sub_title'         =>  '',
                    'services_desc'             =>  '',
                    'icon_option'           =>  '',
                ]));

            ?>
                <div class="col-md-4">
                    <div class="featured-service-item"> 
                        <div class="media">  
                            <?php if ($icon_option == 'icon_image') : ?>
                                <div class="icon-img">
                                    <img src="<?php echo esc_attr($icon_image['url']) ?>" alt="<?php echo esc_attr($service_title) ?>">
                                </div> 
                            <?php elseif ($icon_option  == 'icon') : ?>
                                <!-- Icon -->
                                <div class="featured-service-icon primary-color"> 
                                    <?php if ($icon['library'] == 'svg') : ?>
                                        <img src="<?php echo esc_attr($icon['value']['url']) ?>">
                                    <?php else : ?>
                                        <div class="library-icon">
                                            <span class="<?php echo esc_attr($icon['value']) ?>"></span>
                                        </div>
                                    <?php endif; ?> 
                                </div> <!-- End Icon -->
                            <?php endif; ?> 
                        
                            <div class="media-body"> 
                                <?php elementor_impresscoder_content($service_title, ' <h4 class="mb-0">', '</h4>'); ?>
                                <?php elementor_impresscoder_content($service_sub_title, '<span class="primary-color">', '</span>'); ?>  
                            </div>
                        </div>
                        <!-- media -->
                        <?php elementor_impresscoder_content($services_desc, ' <p class="text-base color-gray-700">', '</p>'); ?> 
                    </div>
                </div>
                <!-- col-md-4 -->
            <?php endforeach; ?>
        </div>
        <!-- row --> 
    <!-- box-features  -->
<?php endif; ?>

 