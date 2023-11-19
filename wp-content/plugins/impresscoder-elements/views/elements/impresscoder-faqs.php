<?php
extract(wp_parse_args($args, [
	'faqs' => [],
]));

$uniqueID = uniqid();
?>
<?php if (!empty($faqs)) : ?>
	<div class="box-faqs mb-70">
		<div class="accordion" id="accordionFaq">
			<?php foreach ($faqs as $key => $faq) :
				$faq = wp_parse_args($faq, [
					'question'			=> 		'',
					'answer'			=> 		'',
				]);
				if (empty($faq['question']) || empty($faq['answer'])) continue;
				$faq_id = 'faq-' . $uniqueID . '-heading-' . esc_attr($key);
				$faq_content_id = 'faq-' . $uniqueID . '-content-' . esc_attr($key);

			?>
				<div class="accordion-item border-gray-800 wow animate__animated animate__fadeIn">
					<h2 class="accordion-header" id="<?php echo esc_attr($faq_id); ?>">
						<button class="accordion-button <?php echo $key > 0 ? ' collapsed' : '';  ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($faq_content_id); ?>" aria-expanded="true" aria-controls="<?php echo esc_attr($faq_content_id); ?>">
							<span class="text-xl color-white"><?php echo esc_attr($faq['question']) ?> </span>
						</button>
					</h2>
					<div id="<?php echo esc_attr($faq_content_id); ?>" class="accordion-collapse collapse <?php echo $key <= 0 ? 'show' : '';  ?>" aria-labelledby="<?php echo esc_attr($faq_id); ?>" data-bs-parent="#accordionFaq">
						<div class="accordion-body text-md">
							<?php echo esc_attr($faq['answer']) ?>
						</div>
					</div>
				</div>
				<!-- accordion-item -->
			<?php endforeach; ?>
		</div>
		<!-- accordion -->
	</div>
	<!-- box-faqs -->
<?php endif; ?>