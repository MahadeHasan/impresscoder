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
        'name'                  => esc_attr__('Portfolios', 'genz'),
        'singular_name'         => esc_attr__('Portfolio', 'genz'),
        'menu_name'             => esc_attr__('Portfolios', 'genz'),
        'name_admin_bar'        => esc_attr__('Portfolio', 'genz'),
        'add_new'               => esc_attr__('Add New', 'genz'),
        'add_new_item'          => esc_attr__('Add New Portfolio', 'genz'),
        'new_item'              => esc_attr__('New Portfolio', 'genz'),
        'edit_item'             => esc_attr__('Edit Portfolio', 'genz'),
        'view_item'             => esc_attr__('View Portfolio', 'genz'),
        'all_items'             => esc_attr__('All Portfolios', 'genz'),
        'search_items'          => esc_attr__('Search Portfolios', 'genz'),
        'parent_item_colon'     => esc_attr__('Parent Portfolios:', 'genz'),
        'not_found'             => esc_attr__('No portfolios found.', 'genz'),
        'not_found_in_trash'    => esc_attr__('No portfolios found in Trash.', 'genz'),
        'featured_image'        => esc_attr__('Portfolio Featured Image', 'genz'),
        'set_featured_image'    => esc_attr__('Set Featured Image', 'genz'),
        'remove_featured_image' => esc_attr__('Remove Featured Image', 'genz'),
        'use_featured_image'    => esc_attr__('Use as Featured Image', 'genz'),
        'archives'              => esc_attr__('Portfolio archives', 'genz'),
        'insert_into_item'      => esc_attr__('Insert into portfolio', 'genz'),
        'uploaded_to_this_item' => esc_attr__('Uploaded to this portfolio', 'genz'),
        'filter_items_list'     => esc_attr__('Filter portfolios list', 'genz'),
        'items_list_navigation' => esc_attr__('Portfolios list navigation', 'genz'),
        'items_list'            => esc_attr__('Portfolios list', 'genz'),
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
        'name'              => esc_attr__('Categories', 'genz'),
        'singular_name'     => esc_attr__('Category', 'genz'),
        'search_items'      => esc_attr__('Search Categories', 'genz'),
        'all_items'         => esc_attr__('All Categories', 'genz'),
        'parent_item'       => esc_attr__('Parent Category', 'genz'),
        'parent_item_colon' => esc_attr__('Parent Category:', 'genz'),
        'edit_item'         => esc_attr__('Edit Category', 'genz'),
        'update_item'       => esc_attr__('Update Category', 'genz'),
        'add_new_item'      => esc_attr__('Add New Category', 'genz'),
        'new_item_name'     => esc_attr__('New Category Name', 'genz'),
        'menu_name'         => esc_attr__('Category', 'genz'),
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
        'name'              => esc_attr__('Skills', 'genz'),
        'singular_name'     => esc_attr__('Skill', 'genz'),
        'search_items'      => esc_attr__('Search Skills', 'genz'),
        'all_items'         => esc_attr__('All Skills', 'genz'),
        'parent_item'       => esc_attr__('Parent Skill', 'genz'),
        'parent_item_colon' => esc_attr__('Parent Skill:', 'genz'),
        'edit_item'         => esc_attr__('Edit Skill', 'genz'),
        'update_item'       => esc_attr__('Update Skill', 'genz'),
        'add_new_item'      => esc_attr__('Add New Skill', 'genz'),
        'new_item_name'     => esc_attr__('New Skill Name', 'genz'),
        'menu_name'         => esc_attr__('Skill', 'genz'),
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
