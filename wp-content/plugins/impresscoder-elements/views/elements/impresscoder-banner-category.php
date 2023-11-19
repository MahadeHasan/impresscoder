<?php
extract(wp_parse_args($args, [
	'subtitle' 				=> '',
	'subtitle_tag' 				=> '',
	'title' 				=> '',
	'title_tag' 				=> '',
	'number_of_category' 	=> 5,
	'category__in' 			=> [],
	'select_category_style' => '',
	'img_size' => '',
]));
?>

<div class="banner banner-home2">
	<div class="text-center mb-50">
		<?php elementor_impresscoder_content($subtitle, "<{$subtitle_tag} class=\"color-gray-600 heading-6 name\">", "</{$subtitle_tag}>"); ?>
		<?php elementor_impresscoder_content($title, "<{$title_tag} class=\"color-white heading-1 title\">", "</{$title_tag}>"); ?>

	</div>
	<?php if ($select_category_style == 'box') { ?>
		<div class="row justify-content-center">
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
					'include'	=> $category__in,
				));
			}
			$img_size = !empty($args['img_size']) ? $args['img_size'] : 'full';
			foreach ($categories as $category) :
				$count = $category->category_count;
				$text = sprintf(_n('%s Article', '%s Articles', $count, 'genz'), $count);
				$cat_image = impresscodercategory_image($category->term_id, 'category_image', $img_size);

				if (empty($cat_image)) {
					$cat_image = get_template_directory_uri() . '/assets/imgs/page/homepage1/sport.png';
				}
			?>
				<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
					<div class="card-style-1 mb-15">
						<a href="<?php echo esc_attr(get_category_link($category->term_id)); ?>">
							<div class="card-image">
								<img src="<?php echo esc_url($cat_image) ?>" alt="<?php echo esc_attr($category->name) ?>">
								<div class="card-info">
									<div class="info-bottom">
										<h6 class="color-white mb-5"><?php echo esc_attr($category->name) ?></h6>
										<p class="text-xs color-gray-500"><?php echo esc_attr($text); ?></p>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php } else { ?>
		<div class="row justify-content-center">
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
					'include'	=> $category__in,
				));
			}
			foreach ($categories as $category) :
				$cat_image = impresscodercategory_image($category->term_id, 'category_image');
				if (empty($cat_image)) {
					$cat_image = get_template_directory_uri() . '/assets/imgs/page/homepage1/travel.png';
				}
			?>

				<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
					<div class="card-style-2 justify-content-center hover-up hover-neon wow animate__animated animate__fadeIn" data-wow-delay="0s">
						<div class="card-image">
							<a href="<?php echo esc_attr(get_category_link($category->term_id)); ?>">
								<img src="<?php echo esc_url($cat_image) ?>" alt="Impresscoder">
							</a>
						</div>
						<div class="card-info">
							<a class="color-gray-500 text-sm stretched-link" href="<?php echo esc_attr(get_category_link($category->term_id)); ?>"><?php echo esc_attr($category->name) ?></a>
						</div>
					</div>
				</div>
				<!-- col-xl-2 -->
				<!-- row justify-content-center -->
			<?php endforeach; ?>
		</div>
	<?php } ?>
</div>