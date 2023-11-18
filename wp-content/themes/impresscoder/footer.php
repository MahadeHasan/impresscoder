<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Impresscoder
 * @since Impresscoder 1.0
 */

?>
	<?php get_template_part( 'template-parts/footer/newsletter' ); ?>	
	</main>
	
	<footer <?php impresscoder_footer_class(); ?>>
		<?php get_template_part( 'template-parts/footer/footer-top' ); ?>
		<?php get_template_part( 'template-parts/footer/site-footer' ); ?>
		<?php get_template_part( 'template-parts/footer/copyright-bar' ); ?>
		<div class="parallax"></div>
	</footer>


<?php wp_footer(); ?>

</body>
</html>
