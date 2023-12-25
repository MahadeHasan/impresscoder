<?php
function impresscoderpost_share_links($title = '', $wrapper_class = "box-share border-gray-800")
{
?>
    <div class="<?php echo esc_attr($wrapper_class) ?>">
        <h6 class="d-inline-block color-gray-500 mr-10"><?php echo esc_attr($title) ?></h6>
        <a target="_blank" class="icon-media icon-fb" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>"></a>
        <a target="_blank" class="icon-media icon-tw" href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title(); ?>&url=<?php the_permalink(); ?>"></a>
        <a target="_blank" class="icon-media icon-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&amp;source=<?php bloginfo('name'); ?>"></a>
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
