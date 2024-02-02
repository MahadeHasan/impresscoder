<?php 
extract(wp_parse_args( $args, [
    'column_class' => 'col-lg-6',
    'image_size' => 'post-thumbnail',
    'excerpt_length' => 30
])); ?>
<div class="<?php echo esc_attr($column_class) ?>">
    <div <?php post_class('card shadow-hover post-card-1 border-radius-10 hover-up card-post mb-4') ?>>
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
        <?php endif; ?>    
        <div class="card-body post-content px-3 py-4">
            <?php if(!has_post_thumbnail()): ?>
                <div class="d-flex flex-wrap gap-2 fw-semibold letter-spacing-2 text-uppercase small mb-10">
                    <?php
                    if ( is_sticky() ) {
                        $sticky_text = get_theme_mod('sticky_text', 'Featured post');
                        echo '<span class="badge text-bg-secondary">'.esc_html( $sticky_text).'</span>';
                    } 
                    impresscoder_get_categories();
                    ?>
                </div>
            <?php endif; ?> 
                    
            <?php //impresscoder_posted_on(true); ?>
            <?php the_title('<h2 class="post-title fs-4 mb-10"><a href="'.get_permalink().'">', '</a></h2>') ?>                
          
            <p><?php echo wp_trim_words(get_the_excerpt(), $excerpt_length);  ?></p>

            <div class="entry-footer mt-3 d-flex flex-wrap justify-content-between gap-10">
                
                <?php echo impresscoder_continue_reading_link(); ?>
                <?php //impresscoder_entry_meta_footer(); ?>
            </div>

        </div>    
    </div>
</div>