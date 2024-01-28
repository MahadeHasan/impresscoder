<?php
function impresscoder_post_share_links($title = '', $wrapper_class = "box-share")
{
?>
    <div class="<?php echo esc_attr($wrapper_class) ?>">
        <h6 class="d-block mr-10"><?php echo esc_attr($title) ?></h6>
        <a target="_blank" class="me-2 icon-media icon-fb" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>">
            <?php echo impresscoder_get_icon_svg( 'social', 'facebook' ) ?>
        </a>
        <a target="_blank" class="me-2 icon-media icon-tw" href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&url=<?php the_permalink(); ?>">
            <?php echo impresscoder_get_icon_svg( 'social', 'twitter' ) ?>
        </a>
        <a target="_blank" class="me-2 icon-media icon-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&amp;source=<?php bloginfo('name'); ?>">
            <?php echo impresscoder_get_icon_svg( 'social', 'linkedin' ) ?>
        </a>
        <a target="_blank" class="me-2 icon-media icon-whatsapp" href="https://api.whatsapp.com/send?text=YOUR_TEXT%20-%20YOUR_URL" rel="noopener noreferrer">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
            </svg>
        </a> 
        <a target="_blank" class="me-2 icon-media icon-youtube" href="https://www.youtube.com/watch?v=VIDEO_ID" rel="noopener noreferrer">
            <?php echo impresscoder_get_icon_svg( 'social', 'youtube' ) ?> 
        </a> 

    </div>
<?php

}
/**
 * portfolio custom post type  
 *
 * @see get_post_type_labels() for label keys.
 */
function impresscoderregister_portfolio()
{
    $labels = array(
        'name'                  => esc_attr__('Portfolios', 'impresscoder'),
        'singular_name'         => esc_attr__('Portfolio', 'impresscoder'),
        'menu_name'             => esc_attr__('Portfolios', 'impresscoder'),
        'name_admin_bar'        => esc_attr__('Portfolio', 'impresscoder'),
        'add_new'               => esc_attr__('Add New', 'impresscoder'),
        'add_new_item'          => esc_attr__('Add New Portfolio', 'impresscoder'),
        'new_item'              => esc_attr__('New Portfolio', 'impresscoder'),
        'edit_item'             => esc_attr__('Edit Portfolio', 'impresscoder'),
        'view_item'             => esc_attr__('View Portfolio', 'impresscoder'),
        'all_items'             => esc_attr__('All Portfolios', 'impresscoder'),
        'search_items'          => esc_attr__('Search Portfolios', 'impresscoder'),
        'parent_item_colon'     => esc_attr__('Parent Portfolios:', 'impresscoder'),
        'not_found'             => esc_attr__('No portfolios found.', 'impresscoder'),
        'not_found_in_trash'    => esc_attr__('No portfolios found in Trash.', 'impresscoder'),
        'featured_image'        => esc_attr__('Portfolio Featured Image', 'impresscoder'),
        'set_featured_image'    => esc_attr__('Set Featured Image', 'impresscoder'),
        'remove_featured_image' => esc_attr__('Remove Featured Image', 'impresscoder'),
        'use_featured_image'    => esc_attr__('Use as Featured Image', 'impresscoder'),
        'archives'              => esc_attr__('Portfolio archives', 'impresscoder'),
        'insert_into_item'      => esc_attr__('Insert into portfolio', 'impresscoder'),
        'uploaded_to_this_item' => esc_attr__('Uploaded to this portfolio', 'impresscoder'),
        'filter_items_list'     => esc_attr__('Filter portfolios list', 'impresscoder'),
        'items_list_navigation' => esc_attr__('Portfolios list navigation', 'impresscoder'),
        'items_list'            => esc_attr__('Portfolios list', 'impresscoder'),
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'portfolio'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'gallery'),
    );

    register_post_type('portfolio', $args);
}

add_action('init', 'impresscoderregister_portfolio');


/**
 * Portfolio Taxonomies.
 *
 * @see register_post_type() for registering custom post types.
 */
function impresscoderregister_portfolio_taxonomies()
{
    $labels = array(
        'name'              => esc_attr__('Categories', 'impresscoder'),
        'singular_name'     => esc_attr__('Category', 'impresscoder'),
        'search_items'      => esc_attr__('Search Categories', 'impresscoder'),
        'all_items'         => esc_attr__('All Categories', 'impresscoder'),
        'parent_item'       => esc_attr__('Parent Category', 'impresscoder'),
        'parent_item_colon' => esc_attr__('Parent Category:', 'impresscoder'),
        'edit_item'         => esc_attr__('Edit Category', 'impresscoder'),
        'update_item'       => esc_attr__('Update Category', 'impresscoder'),
        'add_new_item'      => esc_attr__('Add New Category', 'impresscoder'),
        'new_item_name'     => esc_attr__('New Category Name', 'impresscoder'),
        'menu_name'         => esc_attr__('Category', 'impresscoder'),
    );
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => '/portfolio/category/'),
    );
    register_taxonomy('portfolio_cat', array('portfolio'), $args);

    //Skills Taxonomy
    $labels = array(
        'name'              => esc_attr__('Skills', 'impresscoder'),
        'singular_name'     => esc_attr__('Skill', 'impresscoder'),
        'search_items'      => esc_attr__('Search Skills', 'impresscoder'),
        'all_items'         => esc_attr__('All Skills', 'impresscoder'),
        'parent_item'       => esc_attr__('Parent Skill', 'impresscoder'),
        'parent_item_colon' => esc_attr__('Parent Skill:', 'impresscoder'),
        'edit_item'         => esc_attr__('Edit Skill', 'impresscoder'),
        'update_item'       => esc_attr__('Update Skill', 'impresscoder'),
        'add_new_item'      => esc_attr__('Add New Skill', 'impresscoder'),
        'new_item_name'     => esc_attr__('New Skill Name', 'impresscoder'),
        'menu_name'         => esc_attr__('Skill', 'impresscoder'),
    );
    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => '/portfolio/skill/'),
    );
    register_taxonomy('portfolio_skill', array('portfolio'), $args);
}
add_action('init', 'impresscoderregister_portfolio_taxonomies', 10);
