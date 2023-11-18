<?php
/**
 * Displays the footer widget area.
 *
 * @since impresscoder 1.0
 */
if( impresscoder_get_layout() == 'full' ) return;
extract(wp_parse_args($args, [
    'sidebar' => impresscoder_get_sidebar(),
    'layout' => impresscoder_get_layout(),
]));

if ( is_active_sidebar( $sidebar ) ) : ?>

    <div class="col-lg-4 sidebar-column">
      <div  id="sidebar" class="widget-area position-sticky d-grid gap-30">
		    <?php dynamic_sidebar( $sidebar ); ?>
      </div>
    </div><!-- .widget-area -->

<?php endif; ?>