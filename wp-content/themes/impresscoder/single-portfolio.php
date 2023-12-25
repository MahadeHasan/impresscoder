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



<div class="pt-30 border-bottom border-gray-800 pb-20">
	<?php get_template_part('template-parts/common/breadcrumb'); ?>
</div>

<?php
/* Start the Loop */
while (have_posts()) :
	the_post();
	get_template_part('template-parts/portfolio/content-single');

endwhile;

get_template_part('template-parts/content/after');

get_footer();
