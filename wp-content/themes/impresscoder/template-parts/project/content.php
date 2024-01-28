<?php
extract(wp_parse_args($args, [ 
	'portfolio_preview_text'		=> '',   
]));
$project_demo_link = get_post_meta(get_the_ID(), 'project_demo_link', true);
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('project project-item item-content'); ?>>
    <div class="project-content">
        <h4><?php the_title(); ?></h4>
        <?php //the_excerpt(); ?>
        <a target="_blank" href="<?php echo esc_url($project_demo_link) ?>" class="btn btn-outline-primary rounded-pill btn-alt"><?php echo esc_attr($portfolio_preview_text ) ?></a>
    </div> 

    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('impresscoder-390x300-cropped'); ?>
    <?php endif ?>

    <div class="popup-button">
        <a href="<?php the_permalink() ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/>
                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/>
            </svg>
        </a>
    </div>
 
</div>
  