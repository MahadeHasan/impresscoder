<?php
/*
* Theme Name: Impresscoder  
* Author: Themeperch
* Author URI: https://impresscoder.com/portfolio/
* Description: 
* Version: 1.0.0
* Requires at least: 5.0
* Tested up to: 6.1.1
* Requires PHP: 7.0 
*/

/**
 * The template for displaying archive  Portfolio pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage impresscoder
 * @since impresscoder 1.0
 */

get_header();

?>
<?php get_template_part('template-parts/content/before')  ?>


<?php get_template_part('template-parts/project/project-title');  ?>
<?php get_template_part('template-parts/project/filter'); ?>
<div class="mt-70">
	<div class="row">
		<?php
		if (have_posts()) :
			while (have_posts()) :	the_post();
		?>
				<div class="col-lg-4">
					<?php get_template_part('template-parts/project/content'); ?>
				</div>
				<!-- col-lg-4 -->
		<?php
			endwhile;
		endif;
		?>
	</div>
	<!-- row -->
</div>
<!-- div -->

<nav class="mb-50">
	<?php get_template_part('template-parts/common/post-navigation'); ?>
</nav>

<?php get_template_part('template-parts/content/after'); ?>
<?php get_footer(); ?>