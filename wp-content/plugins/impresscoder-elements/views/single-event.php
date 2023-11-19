<?php
get_header();
/* Start the Loop */
while (have_posts()) :
    the_post();
    impresscoder_framework_template('content/content', 'single');
endwhile;
get_footer();
