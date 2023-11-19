<?php
extract(wp_parse_args($args, [
	'title' => esc_attr__('Recent posts', 'impresscoder-element'),
	'subtitle' => esc_attr__('Don\'t miss the latest trends', 'impresscoder-element'),
	'template' => 'style1',
	'column' => 1,
	'enable_sidebar' => false,
	'sticky_posts' => 'no',
	'show_more_post' => false,
	'show_pagination' => false,
	'more_post_btn_alignment' => 'text-center',
	'more_post_btn_text' => 'Show More Posts',

	// WP query
	'post_type' => 'post',
	'posts_per_page' => get_option('posts_per_page', 10),
	'content_style' => 'template-parts/post/list-view',
	'post__in' => [],
	'sticky_post__in' => [],
	'ignore_sticky_posts' => true,
	'category__in' => [],
	'paged' => 1
]));

$alt_text = get_bloginfo('name');

$query_args = array(
	'post_type' => $post_type,
	'posts_per_page' => $posts_per_page,
	'post__in' => $post__in,
	'category__in' => $category__in,
	'ignore_sticky_posts' => $ignore_sticky_posts,
	'paged' => $paged,

);

if ($sticky_posts == 'yes') {
	$query_args['post__in'] = $sticky_post__in;
}

$impresscoderpost_query = new WP_Query($query_args);
$pagination = array(
	'total' => $impresscoderpost_query->max_num_pages,
	'type' => 'list',
	'alignment' => $more_post_btn_alignment,
	'current' => $paged,
);
if ($impresscoderpost_query->have_posts()) : ?>
	<?php

	if ($template == 'style1') :
		$count = 1;
		//sidebar start
		if ($enable_sidebar && is_active_sidebar('sidebar1')) :
			echo '<div class="row">';
			echo '<div class="col-lg-8">';
		endif; //enable_sidebar condition end

		echo ($column > 1) ? '<div class="row">' : '';
		//sectiion Title
		get_template_part('template-parts/post/post-title', '', $args);
		while ($impresscoderpost_query->have_posts()) : $impresscoderpost_query->the_post();
			if ($template == 'style1') :
				echo ($column > 1) ? '<div class="col-lg-' . (12 / $column) . '">' : '';
				get_template_part($content_style);
				echo ($column > 1) ? '</div>' : '';
			endif;
			$count++;
		endwhile;

		//pagination 
		if ($show_pagination == 'yes') : ?>
			<nav class="mb-50 nav-alignment">
				<?php echo paginate_links($pagination); ?>
			</nav>
		<?php endif; //pagination end
		if ($show_more_post == 'yes') :
			get_template_part('template-parts/common/more-posts', '', ['alignment' => $more_post_btn_alignment, 'more_post_btn_text' => $more_post_btn_text]);
		endif;
		echo ($column > 1) ? '</div>' : '';
		//enable_sidebar condition start
		if ($enable_sidebar && is_active_sidebar('sidebar1')) :
			echo '</div>';
			echo '<div class="col-lg-4">';  ?>
			<div class="sidebar">
				<?php dynamic_sidebar('sidebar1'); ?>
			</div>
		<?php
			echo '</div>';
			echo '</div>';
		endif; //enable_sidebar condition end

	endif; //template condition


	//Large(1) & small(3) box aside
	if ($template == 'style2') :
		$count = 1;
		$found_posts = $impresscoderpost_query->found_posts;
		?>
		<div class="row list-post-style3">
			<?php
			while ($impresscoderpost_query->have_posts()) : $impresscoderpost_query->the_post();
				if ($count % 5 == 1) {
					echo '<div class="col-lg-7">';
					get_template_part($content_style);
					echo '</div>';
				} elseif ($count % 5 == 2) {
					echo '<div class="col-lg-5">';
					get_template_part("template-parts/post/list-view-style3");
				} else {
					get_template_part("template-parts/post/list-view-style3");
				}

				if ($count == $found_posts || $count % 5 == 0) echo '</div>';

				$count++;
			endwhile;
			//pagination 
			if ($show_more_post == 'yes') {
				get_template_part('template-parts/common/more-posts', '', ['alignment' => $more_post_btn_alignment, 'more_post_btn_text' => $more_post_btn_text]);
			} //pagination end
			?>
		</div>
	<?php
	endif; //template condition


	//Large(2) & Others (3) box
	if ($template == 'style3') :
		$count = 1;
	?>
		<div class="row">
			<?php
			//sectiion Title
			get_template_part('template-parts/post/post-title', '', $args);
			while ($impresscoderpost_query->have_posts()) : $impresscoderpost_query->the_post();
				if ($count <= 2) {
					echo '<div class="col-lg-6">';
					get_template_part($content_style);
					echo '</div>';
				} else {
					echo '<div class="col-lg-4">';
					get_template_part($content_style);
					echo '</div>';
				}
				$count++;
			endwhile;
			//pagination 
			if ($show_more_post == 'yes') {
				get_template_part('template-parts/common/more-posts', '', ['alignment' => $more_post_btn_alignment, 'more_post_btn_text' => $more_post_btn_text]);
			} //pagination end
			?>
		</div>
	<?php
	endif; //template condition 
	?>

<?php
endif; //Query
wp_reset_postdata();
