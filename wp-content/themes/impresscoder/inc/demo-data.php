<?php
add_filter( 'pt-ocdi/import_files', 'impresscoder_import_demo_data' );
function impresscoder_import_demo_data() {
  return array( 
    array(
      'import_file_name'           => 'Home',
      'import_file_url'            => IMPRESSCODER_URI.'/inc/demo-data/demo-content.xml',
      'import_widget_file_url'     => IMPRESSCODER_URI.'/inc/demo-data/widgets.wie',
      'preview_url'                => 'https://themeperch.net/impresscoder/',
      'import_preview_image_url'   => IMPRESSCODER_ASSETS . '/images/import-preview.png',
    )
  );
}

function impresscoder_demo_import_nav_menu_setup(){
    // Assign menus to their locations.
    $topbar = get_term_by( 'name', 'Topbar menu', 'nav_menu' );
    $topbar_social = get_term_by( 'name', 'Topbar social menu', 'nav_menu' );
    $primary = get_term_by( 'name', 'Primary menu', 'nav_menu' );
    $footer = get_term_by( 'name', 'Footer menu', 'nav_menu' );
    $footer_social = get_term_by( 'name', 'Footer Social', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
          //set topbar menu
          'topbar' => $topbar->term_id,
          'social' => $topbar_social->term_id,
          //set primary menu
          'primary' => $primary->term_id,
          //set footer menu
          'footer' => $footer->term_id,
          'footer_social' => $footer_social->term_id,
        )
    );

}

function impresscoder_demo_import_page_on_front_setup($selected_import){
  if( get_option('page_on_front') != '' ):
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
  endif; 


  $home_pages = array(	'Home' );
  if( !in_array($selected_import['import_file_name'], $home_pages) ) return;

	$pagename = trim($selected_import['import_file_name']);
  if ( $pagename === $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title( $pagename );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
  }
}

add_action( 'pt-ocdi/after_import', 'impresscoder_after_import_setup', 10, 1 );
function impresscoder_after_import_setup($selected_import) {
  impresscoder_demo_import_nav_menu_setup();
  impresscoder_demo_import_page_on_front_setup($selected_import);   
  flush_rewrite_rules(true);
}

function impresscoder_before_content_import( $selected_import ) {
  if(empty($selected_import['import_file_name'])) return;
  wp_delete_post(1, true); // remove hello world

}
add_action( 'ocdi/before_content_import', 'impresscoder_before_content_import' );