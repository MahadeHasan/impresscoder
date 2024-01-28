<?php
extract(wp_parse_args($args, [
	'select_portfolio_colum'		=> 4,
	'show_pagination'				=> '',

	// WP query 
	'portfolio_per_page' => get_option('posts_per_page', 9),
	'portfolio_order' => 'DESC',
	'portfolio_orderby' => 'date',
	'portfolio_post__in' => [],
	'portfolio_category__in' => [],
]));

$portfolio_args = array(
	'post_type' => 'portfolio',
	'order' => $portfolio_order,
	'orderby' => $portfolio_orderby,
	'posts_per_page' => $portfolio_per_page,
	'post__in' => $portfolio_post__in,
	'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,

);

if (!empty($portfolio_category__in)) {
	$portfolio_args['tax_query'] = array(
		array(
			'taxonomy' => 'portfolio_cat', // Replace with your actual taxonomy name
			'field'    => 'id',
			'terms'    => $portfolio_category__in, // Replace with the slugs of the categories you want to filter by
			'operator' => 'IN',
		),
	);
}


$query = new WP_Query($portfolio_args);
$pagination = array(
	'total' => $query->max_num_pages,
	'type' => 'list',
);

if ($query->have_posts()) : ?>

	<?php get_template_part('template-parts/project/filter'); ?>
	<div class="mb-50">
		<div class="row">
			<?php
			while ($query->have_posts()) :	$query->the_post();
			?>
				<div class="col-lg-<?php echo esc_attr($select_portfolio_colum) ?>">
					<?php get_template_part('template-parts/project/content'); ?>
				</div>
				<!-- col-lg-4 -->
			<?php endwhile; ?>
		</div>
	</div>
	<?php if ($show_pagination == 'yes') { ?>
		<nav class="mb-50 nav-alignment">
			<?php echo paginate_links($pagination); ?>
		</nav>
<?php }
endif;
wp_reset_postdata();
?>