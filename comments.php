<?php
/*
 * The template for displaying comments.
 * Author & Copyright: Cirion
 * URL: https://www.ciriontechnologies.com/
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
<div id="comments" class="cron-comments-area cron-form comments-area">
<?php if ( have_comments() ) : ?>
	<div class="comments-section">
		<h3 class="comments-title">
			<?php
				printf(
					/* translators: %1$s: Comments Count */
					esc_html( _nx( 'Comment (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'cirion' ) ),
					esc_html( number_format_i18n( get_comments_number() ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			?>
		</h3>

		<ol class="comments">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'avatar_size'  => 90,
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="vt-comment-nav-below" class="navigation vt-comment-navigation" role="navigation">
			<h3 class="vt-screen-reader-text comments-title"><?php esc_html_e( 'Comment navigation', 'cirion' ); ?></h3>
			<div class="vt-nav-links">

				<div class="vt-nav-previous pull-left"><?php previous_comments_link( '&laquo; ' . esc_html__( 'Older Comments', 'cirion' ) ); ?></div>
				<div class="vt-nav-next pull-right"><?php next_comments_link( esc_html__( 'Newer Comments', 'cirion' ) . ' &raquo;'); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="vt-no-comments"><?php esc_html_e( 'Comments are closed.', 'cirion' ); ?></p>
	<?php endif;
		?>
	</div><!-- .comments-section -->
	<?php endif; // Check for have_comments().
	/* ==============================================
	  Comment Forms
	=============================================== */
	if ( comments_open() ) { ?>
	<div id="respondd" class="cron-comment-form comment-respond">
		<?php
		$fields = array(
			'author' => '<div class="row"> <div class="col-md-6 col-sm-6"><input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . esc_attr__( 'Your Name*', 'cirion' ) . '"/></div>',
			'email' => '<div class="col-md-6 col-sm-6"><input type="text" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . esc_attr__( 'Your Email*', 'cirion' ) . '"/></div></div>',
		);
		$defaults = array(
      'comment_notes_before' => '',
      'comment_notes_after'  => '',
      'fields' => apply_filters( 'cirion_comment_form_default_fields', $fields),
      'id_form'              => 'commentform',
      'class_form'           => 'comments-form',
      'id_submit'            => 'submit',
      'title_reply'          => esc_html__( 'Post your Comments', 'cirion' ),/* translators: %s: Reply to */
      'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'cirion' ),
      'cancel_reply_link'    => '<i class="fa fa-times-circle"></i>'. '',
      'label_submit'         => esc_html__( 'Post Comment', 'cirion' ),
      'comment_field' 			 => '<div class="cron-form-textarea no-padding-right"><textarea id="comment" name="comment" rows="3" cols="30" placeholder="' . esc_attr__( 'Your comment', 'cirion' ) . '" ></textarea></div>'
    );

		comment_form($defaults);
		?>
	</div>
	<?php } ?>
</div><!-- #comments -->
<?php
