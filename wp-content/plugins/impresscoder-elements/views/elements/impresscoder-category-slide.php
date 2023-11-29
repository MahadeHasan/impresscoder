<?php
extract(wp_parse_args($args, [
    'number_of_category' =>  6,
    'category__in' =>  [],
    'loop_enable' =>  'no',
	'xxl_device' => '',
	'lg_device' => '',
	'md_device' => '', 
]));

// wp_enqueue_style('swiper-bundle-css');
?>  
 
<div class="box-swiper">
	<div class="swiper-container swiper-category-sliders" data-loop="<?php echo esc_attr($loop_enable) ?>" data-slide-xxl="<?php echo esc_attr($xxl_device) ?>" data-slide-lg="<?php echo esc_attr($lg_device) ?>" data-slide-md="<?php echo esc_attr($md_device) ?>">
		<div class="swiper-wrapper align-items-center">
			<?php
			$categories = [];
			if (!empty($category__in)) {
				foreach ($category__in as $category) {
					$categories[] = get_term_by('term_id', $category, 'category');
				}
			} else {
				$categories = get_categories(array(
					'orderby' => 'name',
					'order'   => 'ASC',
					'number'  => $number_of_category,
				));
			}
			$img_size = !empty($args['img_size']) ? $args['img_size'] : 'full';
			foreach ($categories as $category) : 
				$count = $category->category_count;
				print_r($count);
				$text = sprintf(_n('%s Article', '%s Articles', $count, 'impresscoder'), $count);
				$cat_image = impresscoder_category_image($category->term_id, 'category_image', $img_size);

				if (empty($cat_image)) {
					$cat_image = get_template_directory_uri() . '/assets/images/categories/1.png';
				}
			?>
				<div class="swiper-slide">
					<div class="card-style-1">
						<a href="<?php echo esc_attr(get_category_link($category->term_id)); ?>">
							<div class="card-image">
								<img class="h-100 object-fit-cover" src="<?php echo esc_url($cat_image) ?>" alt="<?php echo esc_attr($category->name) ?>">
								<div class="card-info">
									<div class="info-bottom">
										<h6 class="text-white mb-5"><?php echo esc_attr($category->name) ?></h6>
										<p class="text-xs"><?php echo esc_attr($text); ?></p>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!-- box-swiper -->

	<div class="swiper-button-prev swiper-button-prev-style-2"></div>
	<div class="swiper-button-next swiper-button-next-style-2"></div>
</div>
 
    <!-- row --> 
<!-- box-topics -->