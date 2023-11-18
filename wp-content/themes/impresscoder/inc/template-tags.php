<?php


/**
 * Custom template tags for this theme
 *
 * @package 	WordPress
 * @subpackage 	Impresscoder
 */

if ( ! function_exists( 'impresscoder_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @return void
	 */
	function impresscoder_posted_on($human_time_diff = false) {
		
		if($human_time_diff){
			$time_string = sprintf( esc_html__( '%s ago', 'impresscoder' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
		}else{
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() )
			);
		}
		

		
		echo '<span class="posted-on text-muted">';
		printf(
			/* translators: %s: Publish date. */
			esc_html__( 'Published %s', 'impresscoder' ),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput
		);
		echo '</span>';
	}
}

if ( ! function_exists( 'impresscoder_posted_by' ) ) {
	/**
	 * Prints HTML with meta information about theme author.
	 *
	 * @return void
	 */
	function impresscoder_posted_by($class='') {
		$displayed = (is_single() && get_the_author_meta( 'description' ))? false : true;
		if ( $displayed && post_type_supports( get_post_type(), 'author' ) ) {
			echo '<span class="byline '.esc_attr($class).'">';
			printf(
				/* translators: %s: Author name. */
				esc_html__( 'By %s', 'impresscoder' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a>'
			);
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'impresscoder_entry_meta_header' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * Footer entry meta is displayed differently in archives and single posts.
	 *
	 * @return void
	 */
	function impresscoder_entry_meta_header() {

		// Early exit if not a post.
		if ( 'post' !== get_post_type() ) {
			return;
		}
		
		echo '<div class="entry-meta-header default-max-width d-flex flex-wrap gap-1 mb-10">';
		
		if ( is_sticky() ) {
			$sticky_text = get_theme_mod('sticky_text', 'Featured post');
			echo '<span class="badge bg-dark bg-opacity-10 text-dark">' . esc_html( $sticky_text) . '</span>';
		}
		

		if ( has_category() || has_tag() ) {

			
			$categories_list = '<span class="post-categories">'.get_the_category_list( '' ).'</span>';
			if ( $categories_list ) {
				printf($categories_list);
			}
			
			
		}

		echo '</div>';
		
	}
}


if ( ! function_exists( 'impresscoder_entry_meta_footer' ) ) {
/**
 * Prints HTML with meta information for the categories, tags and comments.
 * Footer entry meta is displayed differently in archives and single posts.
 *
 * @return void
 */
	function impresscoder_entry_meta_footer() {

		// Early exit if not a post.
		if ( 'post' !== get_post_type() ) {
			return;
		}


		// Hide meta information on pages.
		if ( ! is_single() ) {

			echo '<div class="post-footer-meta text-muted d-flex gap-15">';

			
			// Posted on.
			impresscoder_posted_by();

			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'impresscoder' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span><br>'
			);

			echo '</div>';
			
		} else {

			echo '<div class="posted-by d-flex flex-wrap gap-10">';
			// Posted on.
			impresscoder_posted_on();
			// Posted by.
			impresscoder_posted_by();
			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'impresscoder' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			echo '</div>';

			if ( has_category() || has_tag() ) {

				echo '<div class="post-taxonomies d-grid gap-20">';

				$categories_list = get_the_category_list( wp_get_list_item_separator() );
				if ( $categories_list ) {
					printf(
						/* translators: %s: List of categories. */
						'<span class="cat-links">' . esc_html__( 'Categorized as %s', 'impresscoder' ) . ' </span>',
						$categories_list // phpcs:ignore WordPress.Security.EscapeOutput
					);
				}

				$tags_list = get_the_tag_list();
				if ( $tags_list ) {
					printf(
						/* translators: %s: List of tags. */
						'<span class="tags-links tagcloud py-20 border-top border-bottom">%s</span>',
						$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
					);
				}
				echo '</div>';
			}
		}
	}
}

if(!function_exists('impresscoder_get_categories')):
/**
 * Get account endpoint URL.
 *
 * @param 	string 	$separator 	(optional)
 * @return 	string	$taxonomy	category
 * @param 	boolean	$echo		true
 * 
 * @return	string	
 * 
 */
function impresscoder_get_categories($separator = ', ', $taxonomy = 'category', $echo = true){

	// Get the term IDs assigned to post.
	$post_terms = wp_get_object_terms( get_the_ID(), $taxonomy, array( 'fields' => 'ids' ) );

	if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {

		$term_ids = implode( ', ' , $post_terms );

		$terms = wp_list_categories( array(
			'title_li' => '',
			'style'    => 'none',
			'echo'     => false,
			'taxonomy' => $taxonomy,
			'include'  => $term_ids
		) );
		
		$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
		if(empty($separator)){
			$terms = '<div class="post-categories d-flex flex-wrap gap-1">'.$terms.'</div>';
		}else{
			$terms = '<div class="post-categories">'.$terms.'</div>';
		}
		

		// Display post categories.
		if($echo){
			echo wp_kses_post($terms);
		}else{
			return $terms;
		}
		
	}
}
endif;

if ( ! function_exists( 'impresscoder_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @return void
	 */
	function impresscoder_post_thumbnail() {
		if ( ! impresscoder_can_show_post_thumbnail() ) {
			return;
		}
		?>

		<?php if ( is_singular() ) : ?>

			<figure class="post-thumbnail mb-30">
				<?php
				// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
				the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid', 'loading' => false ) );
				?>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<figure class="post-thumbnail mb-20">
				<a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid' ) ); ?>
				</a>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure>

		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'impresscoder_the_posts_navigation' ) ) {
	/**
	 * Print the next and previous posts navigation.
	 *
	 * @return void
	 */
	function impresscoder_the_posts_navigation() {
		the_posts_pagination(
			array(
				'before_page_number' => '',
				'mid_size'           => 2,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					impresscoder_get_icon_svg( 'ui', 'prev', 10 ),
					wp_kses(
						get_theme_mod('pagination_prev_text', 'Older posts'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					)
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					wp_kses(
						get_theme_mod('pagination_next_text', 'Newer posts'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					impresscoder_get_icon_svg( 'ui', 'next', 10 ),
				),
			)
		);
	}
}

add_filter('navigation_markup_template', function($template){
	$template = '
	<nav class="navigation %1$s" aria-label="%4$s">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links numeric-pagination d-lg-flex gap-10 justify-content-lg-between">%3$s</div>
	</nav>';
	return $template;
});

function impresscoder_my_account_links(){
	if(!function_exists('control_listings_user_dashboard_url')) return;
	
	
	if(!is_user_logged_in()){
		$link_options = [
			[
				'text' => esc_attr__('Sign up', 'impresscoder'),
				'url' => '#citikidRegisterModal',
				'class' => '',
				'attributes' => ['data-bs-toggle="modal"'] 
			],
			[
				'text' => esc_attr__('Login', 'impresscoder'),
				'url' => '#citikidLoginModal',
				'class' => 'text-primary',
				'attributes' => ['data-bs-toggle="modal"']
			],
		];
	}else{
		$link_options = [
			[
				'text' => esc_attr__('My Account', 'impresscoder'),
				'url' => control_listings_user_dashboard_url(),
				'class' => ''
			],
			[
				'text' => esc_attr__('Log Out', 'impresscoder'),
				'url' => wp_logout_url(get_permalink()),
				'class' => ''
			]
		];
	}
	$args = [
		'options' => $link_options,
	];
	return impresscoder_formatting_list_html($args);
	
}

add_action('wp_footer', 'impresscoder_load_modal_template');
function impresscoder_load_modal_template(){
	if(!is_user_logged_in()):
		get_template_part('template-parts/modal', 'login');
		get_template_part('template-parts/modal', 'register');
		get_template_part('template-parts/modal', 'lost-password');
	endif;
}