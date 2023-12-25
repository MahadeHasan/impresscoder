<div id="post-<?php the_ID(); ?>" <?php post_class('project-item'); ?> data-category="<?php echo impresscoder_get_the_term_list(get_the_ID(), 'portfolio_cat', '', ' ', '', false); ?>">
    <div class="item-content">
        <div class="project-content">
            <h4><?php the_title(); ?></h4> 
            <p class="color-white"><?php the_excerpt(); ?></p>
            <a href="#" class="btn btn-round btn-alt">Live Demo</a>
        </div>
        
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('genz-354x350-cropped'); ?>
        <?php endif ?>

        <div class="popuo-button">
            <a href="#"><i class="pe-7s-expand1"></i></a>
        </div>  
    </div>
</div>