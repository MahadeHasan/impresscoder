<?php
extract(wp_parse_args($args, [
	'select_portfolio_colum'		=> 3, 

	// WP Query
	'posts_per_page' => get_option('posts_per_page', 10),
    'post__in' => [],
    'order' => [],
    'category__in' => [],
]));

$args = array(
	'post_type' => 'portfolio',
	
    'posts_per_page' => $posts_per_page,
    'order' => $order,
    'orderby' => $orderby,
    'post__in' => $post__in,
    'category__in' => $category__in,
	'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
);
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
	<div class="project-list">
		<?php get_template_part('template-parts/project/filter'); ?>
		<div class="mt-50 mb-50">
			<div class="row grid">
				<?php
				while ($query->have_posts()) :	$query->the_post();
				?>
					<div class="grid-item col-lg-<?php echo esc_attr($select_portfolio_colum) ?>">
						<?php get_template_part('template-parts/project/content'); ?>
					</div>
					<!-- col-lg-4 -->
				<?php endwhile; ?>
			</div>
		</div>
	</div>
	<?php  
endif;
wp_reset_postdata();
?>