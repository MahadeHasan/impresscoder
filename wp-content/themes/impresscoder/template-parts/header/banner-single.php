<?php  
extract(wp_parse_args($args, [
    'disable_banner' => impresscoder_get_post_meta('disable_banner',false),
    'custom_background' => 'off',
    'bg_image' => '',
    'banner_style' => '',
    'disable_breadcrumbs' => impresscoder_get_post_meta('disable_breadcrumbs',false),
    'breadcrumbs_bg' => ''
]));


if (!is_page()) { 
    $disable_breadcrumbs = get_theme_mod('disable_breadcrumb', false);
}
?>
<?php if(!$disable_banner): ?>
<section <?php impresscoder_banner_class(); ?>>
    <div class="container pt-120">
        <?php  
        the_title('<h2 class="banner-title">', '</h2>' );
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
