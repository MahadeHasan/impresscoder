<?php 
get_header();

	get_template_part('template-parts/header/banner', get_post_type());
    get_template_part('template-parts/content/before', get_post_type());
	do_action('impresscoder_content_before');

	if ( have_posts() ):
		
		// Load posts loop.
		while ( have_posts() ) {
			the_post();
			
			get_template_part( 'template-parts/content/content', 'page' );
			
		}
		

	else:

		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content-none' );

	endif;

	do_action('impresscoder_content_after');
	get_template_part('template-parts/content/after', get_post_type());

get_footer();