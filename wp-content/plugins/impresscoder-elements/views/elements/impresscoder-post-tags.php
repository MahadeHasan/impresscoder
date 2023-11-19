<?php
extract(wp_parse_args($args, [
	'tags_alignment' => '',
	'number_of_tag' => '',
]));
?>
<div class="row  mb-50 text-alignment">
	<?php
	$post_tags = get_tags(array(
		'number' => $number_of_tag,
	));
	if (!empty($post_tags)) :
		foreach ($post_tags as $post_tag) :  ?>
			<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
				<div class="card-style-2 justify-content-center hover-up hover-neon wow animate__animated animate__fadeIn" data-wow-delay="0s">
					<?php
					$tag_image = impresscodercategory_image($post_tag->term_id, 'tag_image');
					if (!empty($tag_image) && !is_wp_error($tag_image)) :
					?>
						<div class="card-image">
							<a href="<?php echo get_tag_link($post_tag); ?>">
								<img src="<?php echo esc_url($tag_image) ?>" alt="Impresscoder">
							</a>
						</div>
					<?php endif ?>
					<div class="card-info">
						<a class="color-gray-500 stretched-link" href="<?php echo get_tag_link($post_tag); ?>"><?php echo esc_attr($post_tag->name); ?></a>
					</div>
				</div>
			</div>
			<!-- col-xl-2 -->
	<?php endforeach;
	endif;   ?>
</div>
<!-- row -->