<?php
extract(wp_parse_args($args, [
    'services_listtt'          => [],
]));

?>


<?php if (!empty($services_listtt)) : ?>
    <div class="box-features bg-gray-850 border-gray-800">
        <div class="row">
            <?php foreach ($services_listtt as $key => $item) :
                if (empty($item['service_title']) || empty($item['services_desc'])) continue;
                $item = wp_parse_args($item, [
                    'icon'                      =>  '',
                    'service_title'             =>  '',
                    'services_desc'             =>  '',
                ]);

            ?>
                <div class="col-lg-4 col-md-6 mb-50 wow animate__animated animate__fadeIn" data-wow-delay="0s">
                    <?php if ($item['icon']['library'] == 'svg') : ?>
                        <span class="item-icon bg-gray-950">
                            <img src="<?php echo esc_attr($item['icon']['value']['url']) ?>">
                        </span>
                    <?php else : ?>
                        <span class="item-icon bg-gray-950 <?php echo esc_attr($item['icon']['value']) ?>"></span>
                    <?php endif; ?>
                    <h5 class="color-white mb-15"><?php echo esc_attr($item['service_title']) ?></h5>
                    <p class="text-base color-gray-700"><?php echo esc_attr($item['services_desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- row -->
    </div>
    <!-- box-features  -->
<?php endif; ?>