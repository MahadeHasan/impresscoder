<?php
extract(wp_parse_args($args, [
	'select_portfolio_colum'		=> '',
	'show_pagination'				=> ''
]));

$args = array(
	'post_type' => 'portfolio',
	'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
);
$query = new WP_Query($args);
$pagination = array(
	'total' => $query->max_num_pages,
	'type' => 'list',
);

if ($query->have_posts()) : ?>

	<?php get_template_part('template-parts/portfolio/filter'); ?>
	<div class="mt-50 mb-50">
		<div class="row">
			<?php
			while ($query->have_posts()) :	$query->the_post();
			?>
				<div class="<?php echo esc_attr($select_portfolio_colum) ?>">
					<?php get_template_part('template-parts/portfolio/content'); ?>
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