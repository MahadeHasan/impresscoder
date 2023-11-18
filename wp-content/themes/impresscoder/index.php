<?php 
get_header();

	get_template_part('template-parts/header/banner', get_post_type());
    get_template_part('template-parts/content/before', get_post_type());
	do_action('impresscoder_content_before');

	if ( have_posts() ):
		
		get_template_part('template-parts/content/before', 'loop');		
		// Load posts loop.
		while ( have_posts() ) {
			the_post();
				get_template_part( 'template-parts/content/'.impresscoder_get_post_content_style(), get_post_format() );
		}		
		get_template_part('template-parts/content/after', 'loop');
		 
		// Previous/next page navigation.
		impresscoder_the_posts_navigation();
	else:

		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content-none' );

	endif;

	do_action('impresscoder_content_after');
	get_template_part('template-parts/content/after', get_post_type());

get_footer();