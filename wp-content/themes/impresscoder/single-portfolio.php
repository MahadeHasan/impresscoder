<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage genz
 * @since genz 1.0
 */

get_header();


get_template_part('template-parts/content/before'); ?>

<div class="col-xl-10 col-lg-12 mx-auto">

	<div class="border-gray-800 pb-20">
		<?php get_template_part('template-parts/header/breadcrumbs'); ?>
	</div>

	<?php
	/* Start the Loop */
	while (have_posts()) :
		the_post();
		get_template_part('template-parts/project/content-single');

	endwhile; ?>
</div>

<?php
get_template_part('template-parts/content/after');

get_footer();
