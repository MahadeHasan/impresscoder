<?php
extract(wp_parse_args( $args, [ 
    'image_size' => 'post-thumbnail',   
    'excerpt_length' => 30
])); ?>
<div <?php post_class('mb-4') ?>>
     <div class="card shadow-hover post-card-1 border-radius-10 hover-up card-post">
    <?php 
        $sticky_text = '';
        if(has_post_thumbnail()): ?>
            <div class="card-img-wrap position-relative thumb-overlay ">
                <?php the_post_thumbnail($image_size, ['class' => 'img-fluid card-img-top']); ?>
                <div class="card-img-top-content listing-categories small text-uppercase position-absolute start-0 bottom-0 rounded">
                    <?php impresscoder_get_categories(''); ?>
                </div>
                <?php
                    if ( is_sticky() ) :
                        $sticky_text = get_theme_mod('sticky_text', 'Featured post');
                        ?>
                        <div class="card-img-top-content listing-categories small text-uppercase position-absolute start-0 top-0 rounded">
                            <span class="badge text-bg-secondary d-inline-flex gap-1 align-items-center"><?php echo esc_html( $sticky_text) ?></span>
                        </div>
                <?php endif; ?>
            </div>     
        <?php else: ?>
            <div class="d-flex flex-wrap px-3 pt-4 fw-semibold letter-spacing-2 text-uppercase small">
                <?php
                if ( is_sticky() ) {
                    $sticky_text = get_theme_mod('sticky_text', 'Featured post');
                    echo '<span class="badge text-bg-secondary">'.esc_html( $sticky_text).'</span>';
                } 
                impresscoder_get_categories();
                ?>
            </div> 
        <?php endif; ?>  
        <div class="card-body post-content px-3 py-4">
            <?php the_title('<h2 class="post-title fs-4 mb-10"><a href="'.get_permalink().'">', '</a></h2>') ?>
                <div class="entry-summary">
                <?php echo wp_trim_words(get_the_excerpt(), $excerpt_length);  ?>
                </div>
            <div class="entry-footer mt-3 d-flex align-items-end justify-content-between gap-10">
                <?php 
                        echo impresscoder_continue_reading_link();
                ?>
                
                <div class="d-grid">
                    <?php //impresscoder_entry_meta_footer(); ?>
                    <?php //impresscoder_posted_on(); ?>        
                </div>
            </div>
        </div>

</div>
</div>