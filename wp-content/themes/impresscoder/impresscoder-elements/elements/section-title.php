<?php
extract(wp_parse_args($args, [
    'title'              => '',
    'description'       => '',

]));

?>

<div class="mb-50 section-title">

    <?php elementor_impresscoder_content($title, "<{$title_tag} class=\"heading-2 color-linear d-inline-block mb-10 wow animate__animated animate__fadeInUp\">", "</{$title_tag}>"); ?>
    <?php if (!empty($description)) : ?>
        <p class="text-lg mb-0 description color-gray-500 wow animate__animated animate__fadeInUp"><?php echo esc_html($description); ?></p>
    <?php endif; ?>
</div>