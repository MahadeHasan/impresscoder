<?php 
global $impresscoder;
extract(wp_parse_args($args, [
    'disable_banner' => $impresscoder->meta['disable_banner'],
    'custom_background' => 'off',
    'bg_image' => '',
    'banner_style' => '',
    'disable_breadcrumbs' => $impresscoder->meta['disable_breadcrumbs'],
    'breadcrumbs_bg' => ''
]));
?>
<?php if(!$disable_banner): ?>
<section <?php impresscoder_banner_class(); ?>>
    <div class="container pt-120">
        <?php 
        the_archive_title('<h1 class="banner-title">', '</h1>');
        the_archive_description('<div class="banner-subtitle lead fw-normal">', '</div>');
        ?>
    </div>
    <div class="parallax"></div>
</section>
<?php else: ?>
    <div class="banner-section border-bottom"></div>
<?php endif; ?>
<?php if( !is_front_page() && function_exists('bcn_display_list') && !$disable_breadcrumbs ): ?>
    <?php get_template_part('template-parts/header/breadcrumbs', '', $args); ?>
<?php endif; ?>
