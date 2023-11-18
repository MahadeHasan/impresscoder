<?php if( !impresscoder_is_active_footer_widgets() ) return; ?>
<div class="container">
    <div class=" footer-widgets py-50 border-top">					
        <div class="row g-50">
            <?php 
            $classArr = impresscoder_footer_widgets_classes();

            for( $i=1; $i<=5; $i++ ):
                $class = $classArr[$i-1];
                $sidebar = 'footer-widget-'.$i;
                if ( is_active_sidebar( $sidebar ) ) :
                ?>
                <div class="<?php echo esc_attr($class) ?>">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </div>
                <?php 
                endif;
            endfor;
            ?>
        </div><!-- .row -->
    </div><!-- .footer-widgets -->
</div><!-- .container -->