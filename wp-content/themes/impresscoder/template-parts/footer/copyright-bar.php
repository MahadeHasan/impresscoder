<?php
/*
footer copyright bar
contains copyright text and footer menu
*/

extract(wp_parse_args($args, array(
    'copyright_text' => sprintf('&copy; %s %s, WordPress Theme by %s', date('Y'), esc_attr(get_bloginfo( 'name', 'display' )), '<a href="//themeperch.net/">Themeperch</a>')
)));

?>
<div <?php impresscoder_copyright_class() ?>>
    <div class="container">
        <div class="copyright-inner py-20">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text mb-0"><?php echo wp_kses_post(str_replace('{date}', date('Y'), $copyright_text)) ?></p>
                </div>            
                <div class="col-lg-6">                
                    <?php 
                    // Right navbar
                    wp_nav_menu([
                        'container' => false,
                        'menu_class' => 'nav footer-nav justify-content-lg-end',
                        'theme_location' => 'footer',
                        'depth' => 1,
                        'fallback_cb'    => 'Impresscoder\Nav_Walker::fallback',
                        'fallback_title'    => esc_attr__('Footer menu', 'impresscoder'),
                        'walker' => new Impresscoder\Nav_Walker()
                    ]); 
                    ?>                  
                </div>
            </div>
        </div>
    </div>
</div>