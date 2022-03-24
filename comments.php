<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package agency
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area comments ">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$agency_comment_count = get_comments_number();
			if ( '1' === $agency_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'Comment', 'agency' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comments', '%1$s Comments;', $agency_comment_count, 'comments title', 'agency' ) ),
					number_format_i18n( $agency_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'agency' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().


	$fields = array(
		'message' => sprintf(
			'<p class="comment-form-author">%s %s</p>',
			sprintf(
				'<label for="author">%s%s</label>',
				__( '' ),
				( $req ? $required_indicator : '' )
			),
			sprintf(
				'<textarea></textarea>',
				esc_attr( $commenter['comment_author'] ),
				( $req ? $required_attribute : '' )
			)
		),
		'author' => sprintf(
			'<p class="comment-form-author">%s %s</p>',
			sprintf(
				'<label for="author">%s%s</label>',
				__( '' ),
				( $req ? $required_indicator : '' )
			),
			sprintf(
				'<input id="author" placeholder="Name" name="author" type="text" value="%s" size="30" maxlength="245"%s />',
				esc_attr( $commenter['comment_author'] ),
				( $req ? $required_attribute : '' )
			)
		),
		'email'  => sprintf(
			'<p class="comment-form-email">%s %s</p>',
			sprintf(
				'<label for="email">%s%s</label>',
				__( '' ),
				( $req ? $required_indicator : '' )
			),
			sprintf(
				'<input id="email"  placeholder="Email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes"%s />',
				( $html5 ? 'type="email"' : 'type="text"' ),
				esc_attr( $commenter['comment_author_email'] ),
				( $req ? $required_attribute : '' )
			)
		),
		'subject'    => sprintf(
			'<p class="comment-form-url">%s %s</p>',
			sprintf(
				'<label for="url">%s</label>',
				__( '' )
			),
			sprintf(
				'<input id="subject" placeholder="Subject" name="subject" %s value="%s" size="30" maxlength="200" />',
				( $html5 ? 'type="url"' : 'type="text"' ),
				esc_attr( $commenter['comment_author_url'] )
			)
		),
	);

	$fields = apply_filters( 'comment_form_default_fields', $fields );

	$defaults = array(
		'fields'               => $fields,
		'label_submit'         => __( 'Send' ),
		'title_reply'          => __( 'Leave a Comment' ),
		'comment_field'        => '<textarea placeholder="Message"></textarea>',
		);



	comment_form($defaults);
	?>

</div><!-- #comments -->
