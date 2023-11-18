<?php
/**
 * The template for displaying Author info
 *
 * @package WordPress
 * @subpackage Impresscoder
 * @since Impresscoder 1.0
 */

if ( (bool) get_the_author_meta( 'description' ) ) :
	?>
<div class="author-bio card">
	<div class="card-body">
		<div class="d-grid d-lg-flex gap-15 gap-lg-20">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 100, NULL, NULL, ['class' => 'border rounded-circle flex-shrink-lg-0'] ); ?>
			<div>
				<h4 class="author-title fs-4">
					<span class="author-heading">
						<?php
						printf(
							/* translators: %s: Post author. */
							__( 'Published by %s', 'impresscoder' ),
							esc_html( get_the_author() )
						);
						?>
					</span>
				</h4>
				<p class="author-description mb-0">
					<?php the_author_meta( 'description' ); ?>
					<a class="author-link letter-spacing-1 small fw-bold text-uppercase mt-10 d-inline-block" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php _e( 'View more posts', 'impresscoder' ); ?>
					</a>
				</p><!-- .author-description -->
			</div>	
		</div>
	</div>
</div><!-- .author-bio -->
	<?php
endif;
