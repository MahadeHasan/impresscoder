<?php
extract(wp_parse_args($args, [ 


    'thumb_title_length' => '',
    'post_excerpt' => '',
    'thumb_excerpt' => '',
    'data_slides_show' => '',
    // WP query
    'query_args' => [
        'post_type' => 'post',
        'cache_results'  => false,
        'order' => '',
        'orderby' => '',
        'post__in' => [],
        'category__in' => [],
        'posts_per_page' => get_option('posts_per_page', 10),
        'ignore_sticky_posts' => true,
        'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
    ]
]));
$post_query = new WP_Query($query_args);

wp_enqueue_style('slick');
wp_enqueue_style('slicknav');
 
wp_enqueue_script('slick-js');

?>

<?php if($post_query->have_posts()): ?> 
        <div class="posts-slider featured-sliders">
            <div class="featured-slider-items post-sliders-activation post_sliders_activation"> 
                <?php while($post_query->have_posts()): $post_query->the_post(); ?>
                    <div class="slider-single">
                        <div class="post-thumb position-relative">
                            <div class="thumb-overlay position-relative" style="background-image: url(<?php the_post_thumbnail_url('impresscoder-1920x600-cropped') ?>)">
                                <div class="post-content-overlay">
                                    <div class="container">
                                        <div class="post-content">
                                            <?php impresscoder_get_categories(); ?>
                                            <?php the_title('<h1 class="post-title mb-20 font-weight-900 text-white"><a href="' . get_permalink() . '" class="text-white">', '</a></h1>') ?>
                                            <p class="lead text-white"><?php echo wp_trim_words(get_the_excerpt(), $post_excerpt); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider-single -->
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="container position-relative">
                <div class="arrow-cover-2 color-white d-flex gap-10"></div>
                <div class="featured-slider-nav-cover">
                    <div class="featured-slider-nav" data-slides-show="<?php echo esc_attr($data_slides_show) ?>">
                        <?php while($post_query->have_posts()): $post_query->the_post(); ?>
                            <div class="slider-post-thumb mr-15 mt-3 position-relative">
                                <div class="d-flex align-items-center hover-up-2 transition-normal">
                                    <div class="post-thumb post-thumb-item  d-flex mr-15 border-radius-5">
                                        <img class="border-radius-5" src="<?php the_post_thumbnail_url() ?>" alt="">
                                    </div>
                                    <div class="post-content media-body text-white">
                                        <?php
                                            $title = get_the_title();
                                            $short_title = wp_trim_words( $title, $thumb_title_length, '...' );
                                            echo '<h5 class="post-title mb-0 text-limit-2-row mb-2">'.$short_title.'</h3>';
                                        ?>
                                        <p class="thumb-exerpt"><?php echo wp_trim_words(get_the_excerpt(), $thumb_excerpt); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>

        </div>  
<?php endif ?>