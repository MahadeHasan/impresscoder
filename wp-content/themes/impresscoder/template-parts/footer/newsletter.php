<?php
$args = wp_parse_args($args, array(
    'display_newsletter' => get_theme_mod('display_newsletter', 'on'),
    'title' => get_theme_mod('newsletter_title', 'New Things Will Always Update Regularly'),
    'placeholder' => get_theme_mod('newsletter_placeholder', 'Enter your email here'),
    'button_title' => get_theme_mod('newsletter_button_title', 'Subscribe'),
    'url' => 'https://themeperch.us9.list-manage.com/subscribe/post?u=d33802e92fdc29def2e7af643&id=0085e5e2b5' 
));

if(function_exists('control_job_manager_option')){
    $args['url'] = control_job_manager_option('subscription_form_url', 'https://themeperch.us9.list-manage.com/subscribe/post?u=d33802e92fdc29def2e7af643&id=0085e5e2b5');
}

extract($args);

if($display_newsletter == 'off' || !function_exists('control_email_subscriber_form')) return;

?>

<section class="section-box mt-50 mb-20">
    <div class="container">
        <div class="box-newsletter">
            <div class="row align-items-center">

              

                <div class="col-lg-12 col-xl-6 col-12">
                    <h2 class="text-md-newsletter text-center"><?php echo esc_html($title) ?></h2>
                    <div class="box-form-newsletter mt-40">
                        <?php echo control_email_subscriber_form(); ?>                        
                    </div>
                    <div id="mc-response" class="mt-15"></div>
                </div>

               

            </div><!--row-->
        </div>
    </div>
</section>