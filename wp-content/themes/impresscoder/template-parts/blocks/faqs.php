<?php
if(empty($faqs)) return;
$count = 1;
?>
<div class="accordion" id="accordionListingFaqs">
    <?php foreach ($faqs as $faq) : 
        $collapse_class = ($count == 1)? '' : ' collapsed';
        $show_class = ($count == 1)? ' show' : '';
        $aria_expanded = ($count == 1) ? 'true' : 'false';
        ?>
    <div class="accordion-item">
        <h3 class="accordion-header" id="accordionListingFaq<?php echo esc_attr($count); ?>">
            <a class="accordion-button fs-5<?php echo esc_attr($collapse_class) ?>" data-bs-toggle="collapse" href="#listingFaqAnswer<?php echo esc_attr($count) ?>" aria-expanded="<?php echo esc_attr($aria_expanded) ?>" aria-controls="listingFaqAnswer<?php echo esc_attr($count) ?>">
                <?php echo esc_attr($faq['question']) ?>
            </a>
        </h3>
        <div id="listingFaqAnswer<?php echo esc_attr($count) ?>" class="accordion-collapse collapse<?php echo esc_attr($show_class) ?>" aria-labelledby="accordionListingFaq<?php echo esc_attr($count); ?>" data-bs-parent="#accordionListingFaqs">
        <div class="accordion-body">
            <?php echo wp_kses_post($faq['answer']) ?>
        </div>
        </div>
    </div>
  <?php $count++; endforeach; ?>
  
</div>