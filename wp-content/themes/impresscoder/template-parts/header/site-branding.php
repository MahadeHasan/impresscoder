<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand align-items-center">
    <?php if(impresscoder_get_logo_uri('custom_logo')): ?>    
        <picture class="logo logo-dark">
            <?php echo impresscoder_get_custom_logo(); ?>
        </picture>
    <?php else: ?>
        <?php echo impresscoder_get_custom_logo(); ?>
    <?php endif; ?>

    <?php if(impresscoder_get_logo_uri('custom_logo_white')): ?>    
        <picture class="logo logo-white">
            <?php echo impresscoder_get_custom_logo('custom_logo_white'); ?>
        </picture>   
    <?php endif; ?> 
</a>