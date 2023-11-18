<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Impresscoder
 * @since Impresscoder 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$impresscoder_comment_count = get_comments_number();
?>

<div id="comments" class="comments-area d-grid gap-30 <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php if ( '1' === $impresscoder_comment_count ) : ?>
				<?php printf(esc_html__( '1 comment on "%s"', 'impresscoder' ), get_the_title()); ?>
			<?php else : ?>
				<?php
				printf(
					/* translators: %s: Comment count number. */
					esc_html( _nx( '%s comment on "%s"', '%s comments on "%s"', $impresscoder_comment_count, 'Comments title', 'impresscoder' ) ),
					esc_html( number_format_i18n( $impresscoder_comment_count ) ),
					get_the_title()
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ol class="comment-list list-unstyled overflow-hidden">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 80,
					'style'       => 'ol',
					'short_ping'  => true,
					'depth' => 3,
					'walker' => new Impresscoder\Comment_Walker()
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'before_page_number' => esc_html__( 'Page', 'impresscoder' ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? impresscoder_get_icon_svg( 'ui', 'arrow_right' ) : impresscoder_get_icon_svg( 'ui', 'arrow_left' ),
					esc_html__( 'Older comments', 'impresscoder' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					esc_html__( 'Newer comments', 'impresscoder' ),
					is_rtl() ? impresscoder_get_icon_svg( 'ui', 'arrow_left' ) : impresscoder_get_icon_svg( 'ui', 'arrow_right' )
				),
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'impresscoder' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'        => esc_html__( 'Leave a comment', 'impresscoder' ),
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h3>',
			'class_container' => 'comment-respond card',
			'submit_field'         => '<p class="form-submit mb-0">%1$s %2$s</p>',
		)
	);
	?>

</div><!-- #comments -->
