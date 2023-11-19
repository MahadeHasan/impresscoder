<?php

extract(wp_parse_args($args, array(
	'title_text' 		=> '',
	'title_tag' 		=> '',
	'learn_more_text'   => '',
	'learn_more_link'   => '',
	'brands'            => [],

)));
?>

<div class="row align-items-end justify-content-between mt-30">
	<div class="col-lg-6 wow animate__animated animate__fadeIn">
		<?php elementor_impresscoder_content($title_text, "<{$title_tag} class=\"heading-3 color-linear\">", "</{$title_tag}>"); ?>
	</div>
	<div class="col-lg-3 text-lg-end mt-15 hover-up wow animate__animated animate__fadeIn" data-wow-delay="0.2s">
		<a class="link-brand-1" href="<?php echo esc_attr($learn_more_link);  ?>"><?php echo esc_attr($learn_more_text);  ?></a>
	</div>
</div>
<!-- row -->
<div class="list-logos mt-50 mb-30">
	<div class="container">
		<div class="row">
			<div class="swiper-container swiper-group-1 overflow-hidden">
				<div class="swiper-wrapper wow animate__animated animate__fadeIn">
					<?php foreach ($brands as $image) :
						extract(wp_parse_args($image, [
							'brand_image_name' => '',
							'enable_external_link' => '',
							'brand_image_link' => [],
							'brand_image' => [],
						]));
						if (empty($brand_image['url'])) continue;
					?>
						<div class="swiper-slide">
							<a href="<?php echo esc_url($brand_image_link['url']) ?>" target="<?php echo esc_attr($enable_external_link == 'yes' ? '_blank' : '_self') ?>">
								<img src="<?php echo esc_url($brand_image['url']) ?>" alt="<?php esc_attr($brand_image_name) ?>">
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- list-logos -->