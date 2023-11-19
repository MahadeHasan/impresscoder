<?php
extract(wp_parse_args($args, [
    'contact_items'          => [],
]));
?>

<?php if (!empty($contact_items)) : ?>
    <ul class="contact-information d-flex flex-wrap gap-4 text-lg-center justify-content-lg-center ps-0 mt-30">
        <?php foreach ($contact_items as $item) :
            $item = wp_parse_args($item, [
                'icon'                  =>  '',
                'contact1'             =>  '',
                'contact2'             =>  '',
            ]);
            extract($item);
        ?>
            <li>
                <div class="d-flex">
                    <?php if ($item['icon']['library'] == 'svg') : ?>
                        <span class="info-icon">
                            <img src="<?php echo esc_attr($item['icon']['value']['url']) ?>">
                        </span>
                    <?php else : ?>
                        <div class="info-icon <?php echo esc_attr($item['icon']['value']) ?>"></div>
                    <?php endif; ?>

                    <div>
                        <?php if (!empty($contact1)) : ?>
                            <p class="text-sm mb-0"><?php echo esc_attr($contact1) ?></p>
                        <?php endif; ?>
                        <?php if (!empty($contact2)) : ?>
                            <p class="text-sm mb-0"><?php echo esc_attr($contact2) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- d-flex -->
            </li>
            <!-- li -->
        <?php endforeach; ?>
        <!-- Contact Info Icon  -->
    </ul>
<?php endif; ?>