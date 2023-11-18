<?php 
if(!impresscoder_is_enable_topbar()) return; 
$display_title_and_tagline = get_theme_mod('display_title_and_tagline', true);
?>
<nav <?php impresscoder_topbar_class() ?>>
    <div class="container">
        <div class="row gy-10">
            <?php if($display_title_and_tagline && !empty(get_bloginfo('description'))): ?>
            <p class="col-lg-5 mb-0">                
                <span class="d-none d-xl-block text-truncate site-description"><?php echo get_bloginfo('description') ?></span>                
            </p>
            <?php endif; ?>
            <?php
            // Social links
            wp_nav_menu(
                array(                        
                    'container'      => 'div',
                    'container_class'      => 'col',
                    'menu_class' => 'nav social-nav'.(($display_title_and_tagline && !empty(get_bloginfo('description')))? ' justify-content-center' : ''),
                    'theme_location' => 'social',
                    'depth'          => 1,                    
                    'fallback_cb'    => 'Impresscoder\Nav_Walker::fallback',
                    'fallback_title'    => esc_attr__('Topbar social menu', 'impresscoder'),
                    'walker' => new Impresscoder\Nav_Walker()
                )
            );
            ?>

            <?php 
            // Right navbar
            wp_nav_menu([
                'container'      => 'div',
                'container_class'      => 'col-lg-5 ms-lg-auto',
                'menu_class' => 'nav topbar-nav justify-content-center justify-content-lg-end',
                'theme_location' => 'topbar',
                'depth' => 1,
                'fallback_cb'    => 'Impresscoder\Nav_walker::fallback',
                'fallback_title'    => esc_attr__('Topbar menu', 'impresscoder'),
                'walker' => new Impresscoder\Nav_walker()
            ]); 
            ?>   
        </div>
            
            
            
                     
    </div>
</nav>