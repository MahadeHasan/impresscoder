<?php
include __DIR__.'/demo-data.php';

/**
 * Register widget area.
 *
 * @since impresscoder 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function impresscoder_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Main widget area', 'impresscoder' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'impresscoder' ),
			'before_widget' => '<div id="%1$s" class="card card-widget %2$s"><div class="card-body widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Page widget area', 'impresscoder' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'Add widgets here to appear in your page sidebar.', 'impresscoder' ),
			'before_widget' => '<div id="%1$s" class="card card-widget %2$s"><div class="card-body widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

    if( defined('CTRL_LISTINGS_VER') ):
    register_sidebar(
		array(
			'name'          => esc_html__( 'Listing widget area', 'impresscoder' ),
			'id'            => 'sidebar-listings',
			'description'   => esc_html__( 'Add widgets here to appear in your listing sidebar.', 'impresscoder' ),
			'before_widget' => '<div id="%1$s" class="card card-widget %2$s"><div class="card-body widget">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
    endif;
}
add_action( 'widgets_init', 'impresscoder_widgets_init' );


function impresscoder_get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {
    
    global $wpdb;
    
    if( empty( $key ) )
        return;
    
    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = %s 
        AND p.post_status = %s 
        AND p.post_type = %s
    ", $key, $status, $type ) );
    
    return $r;
}

add_action('enqueue_block_editor_assets', 'impresscoder_enqueue_block_editor_assets');
function impresscoder_enqueue_block_editor_assets(){    
    wp_enqueue_style('impresscoder-editor', get_theme_file_uri('assets/css/impresscoder-editor.css'), [], '1.0.0');
    
    wp_enqueue_script('impresscoder-editor', IMPRESSCODER_ASSETS .'/js/admin/impresscoder-editor.js', ['jquery'], '5.0.0', true);
    $l10n = [
        'margin' => impresscoder_get_spacer_options('mb-', 'Margin bottom '),
        'gutterX' => impresscoder_get_spacer_options('gx-', 'Horizontal Gutter '),
        'gutterY' => impresscoder_get_spacer_options('gy-', 'Vertical Gutter '),
        'padding' => impresscoder_get_spacer_options('p-', 'Padding '),
        'colors' => impresscoder_get_editor_color_choices(),
        'columnTemplates' => impresscoder_get_editor_column_templates()
    ];
    wp_localize_script( 'impresscoder-editor', 'impresscoderEditor', $l10n );
}

add_action('admin_enqueue_scripts', 'impresscoder_admin_enqueue_scripts');
function impresscoder_admin_enqueue_scripts(){
    wp_enqueue_style('impresscoder-admin', IMPRESSCODER_ASSETS .'/css/admin/impresscoder-admin.css', [], '1.0.0');
    wp_enqueue_script('impresscoder-admin', IMPRESSCODER_ASSETS. '/js/admin/impresscoder-admin.js', ['jquery'], '5.0.0', true);   
    
}