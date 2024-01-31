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

// wp_enqueue_style('slick');
// wp_enqueue_style('slicknav-js'); 
// wp_enqueue_script('slick-js');

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
                                <div class="post-thumb post-thumb-item d-flex mr-15 border-radius-5">
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



<script>

    (function($) {
        $( document ).ready(function() { 
            // featured slider  
            $('.post-sliders-activation').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                fade: true,
                loop: false,
                asNavFor: '.featured-slider-nav',
                prevArrow: '<span class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/></svg></span>',
                nextArrow: '<span class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/></svg></span>',
                appendArrows: '.arrow-cover-2',
            });   
            $('.featured-slider-nav').slick({
                slidesToShow: $('.featured-slider-nav').data('slides-show'),
                slidesToScroll: 1,
                vertical: true, 
                loop: false,
                asNavFor: '.post-sliders-activation',
                dots: false,
                arrows: false,
                focusOnSelect: true,
                verticalSwiping: true
            }); 

        }); 
    })(jQuery);

</script>