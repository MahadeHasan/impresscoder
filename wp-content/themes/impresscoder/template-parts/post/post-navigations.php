<?php
/**
 * The template for Previous/next post navigation.
 *
 * @package WordPress
 * @subpackage Impresscoder
 * @since Impresscoder 1.0
 */

$next = is_rtl() ? impresscoder_get_icon_svg( 'ui', 'arrow_left' ) : impresscoder_get_icon_svg( 'ui', 'arrow_right' );
$prev = is_rtl() ? impresscoder_get_icon_svg( 'ui', 'arrow_right' ) : impresscoder_get_icon_svg( 'ui', 'arrow_left' );

$previous_label = get_theme_mod('prev_link_text', 'Previous post'); //esc_html__( 'Next post', 'impresscoder' );
$next_label     = get_theme_mod('next_link_text', 'Next post'); //esc_html__( 'Next post', 'impresscoder' );

the_post_navigation(
    array(
        'next_text' => '<div class="text-end"><p class="meta-nav text-muted mb-0">' . $next_label .' '. $next . '</p><p class="post-title fs-4 fw-semibold text-break">%title</p></div>',
        'prev_text' => '<div class="text-start"><p class="meta-nav text-muted mb-0">' . $prev .' '. $previous_label . '</p><p class="post-title fs-4 fw-semibold text-break">%title</p></div>',
    )
);