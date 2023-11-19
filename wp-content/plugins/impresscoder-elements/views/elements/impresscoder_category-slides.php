<?php
extract(wp_parse_args($args, [
	'category_slides_style' => '',
	'title' => '',
	'sub_title' => '',
	'img_size' => '',
	'number_of_category' =>  6,
	'category__in' =>  [],
]));
?>

<?php if ($category_slides_style == 'style1') { ?>
	<div class="box-topics border-gray-800 bg-gray-850 mb-70">
		<div class="row">
			<div class="col-lg-2 text-start">
				<h5 class="mb-15 title color-white wow animate__animated animate__fadeInUp" data-wow-delay="0s"><?php echo esc_attr($title); ?></h5>
				<p class="color-gray-500 sub_title mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".3s"><?php echo esc_attr($sub_title); ?></p>
				<div class="box-buttons-slider position-relative wow animate__animated animate__zoomIn">
					<div class="swiper-button-prev swiper-button-prev-style-1"></div>
					<div class="swiper-button-next swiper-button-next-style-1"></div>
				</div>
			</div>
			<?php
			get_template_part('template-parts/post/category-slides', $category_slides_style, $args); ?>

		</div>
	</div>
<?php } else { ?>
<?php
	get_template_part('template-parts/post/category-slides', $category_slides_style, $args);
}
