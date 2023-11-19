<?php
extract(wp_parse_args($args, [
    'pricing_tables' => [],
]));

?>

<?php if (!empty($pricing_tables)) : ?>
    <div class="row mb-30">
        <?php
        $count = 1;
        foreach ($pricing_tables as $pricing_table) :
            $pricing_table = wp_parse_args($pricing_table, [
                'package_name' => '',
                'package_name_tag' => '',
                'plan_badge_enable' => '',
                'plan_badge_name' => '',
                'badge_color' => '',
                'sub_title' => '',
                'description' => '',
                'try_btn' => '',
                'try_btn_link' => '',
                'enable_btn_target' => '',
                'learn_more_btn' => '',
                'learn_more_link' => '',
                'enable_link_target' => '',
                'feature_label' => '',
                'features' => [],
            ]);

        ?>
            <div class="col-lg-4 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                <div class="card-pricing border-gray-800 bg-gray-850 mb-30">
                    <?php if ($pricing_table['plan_badge_enable'] == 'yes') : ?>
                        <label class="<?php echo esc_attr($pricing_table['badge_color']) ?> badge text-base color-gray-900">
                            <?php echo esc_attr($pricing_table['plan_badge_name'])  ?>
                        </label>
                    <?php endif; ?>
                    <div class="card-pricing-top border-gray-800">
                        <?php printf('<%s class="color-white package_name heading-3">', esc_attr($pricing_table['package_name_tag'])); ?>
                        <?php echo esc_attr($pricing_table['package_name'])  ?>
                        <?php printf('</%s>', esc_attr($pricing_table['package_name_tag'])); ?>

                        <p class="text-lg sub_title color-gray-500 mb-15"><?php echo esc_attr($pricing_table['sub_title'])  ?></p>
                        <p class="text-sm desc color-gray-500 mb-30"><?php echo esc_attr($pricing_table['description'])  ?></p>
                        <a href="<?php echo esc_attr($pricing_table['try_btn_link']['url'])  ?>" target="<?php echo esc_attr($pricing_table['enable_btn_target'] == 'yes' ? '_blank' : '_self') ?>" class="btn btn-border-linear">
                            <?php echo esc_attr($pricing_table['try_btn'])  ?>
                        </a>
                        <a href="<?php echo esc_attr($pricing_table['learn_more_link'])  ?>" target="<?php echo esc_attr($pricing_table['enable_link_target'] == 'yes' ? '_blank' : '_self') ?>" class="btn btn-link-more">
                            <?php echo esc_attr($pricing_table['learn_more_btn'])  ?>
                        </a>
                    </div>
                    <!-- card-pricing-top -->
                    <?php if (empty($pricing_table['features'])) continue; ?>
                    <div class="card-pricing-bottom">
                        <h6 class="color-white mb-25 feature_label"> <?php echo esc_attr($pricing_table['feature_label'])  ?></h6>
                        <ul class="list-checked">
                            <?php foreach ($pricing_table['features'] as $feature) : ?>
                                <li><?php echo esc_attr($feature['feature_item']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- card-pricing-bottom -->
                </div>
                <!-- card-pricing -->
            </div>
            <!-- col-lg-4 -->
        <?php endforeach; ?>
    </div>
    <!-- row -->
<?php endif; ?>