<?php
extract(wp_parse_args($args, [
    'author_image'          => [],
    'author_image_alt'          => '',
    'welcome_text'          => '',
    'welcome_text_tag'          => '',
    'author_quote'          => '',
    'author_quote_tag'          => '',
    'social_links'          => '',

]));

?>
<div class="banner banner-home4 bg-gray-850">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-xl-1"></div>
            <div class="col-xl-10 col-lg-12">
                <div class="pt-20">
                    <div class="box-banner-4">
                        <div class="banner-image">
                            <img src="<?php echo esc_attr($author_image['url']); ?>" alt="<?php echo esc_attr($author_image_alt); ?>">
                        </div>
                        <div class="banner-info">
                            <?php elementor_impresscoder_content($welcome_text, "<{$welcome_text_tag} class=\"text-sm-bold welcome_text d-block color-gray-600\">", "</{$welcome_text_tag}>"); ?>
                            <?php elementor_impresscoder_content($author_quote, "<{$author_quote_tag} class=\"color-linear heading-3 d-block mt-10 mb-15\">", "</{$author_quote_tag}>"); ?>
                            <?php if (!empty($social_links)) :  ?>
                                <div class="box-socials">
                                    <?php foreach ($social_links as $social_link) :  ?>
                                        <a class="bg-gray-800 hover-up" href="<?php echo esc_url($social_link['social_link']) ?>">
                                            <?php echo impresscoderget_social_link_svg($social_link['social_link'], 18); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                                <!-- box-socials -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>