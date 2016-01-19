<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to pgb_comment() which is
 * located in the includes/template-tags.php file.
 *
 * @package pgb
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
	<div id="comments" class="comments-area row" itemscope itemtype="http://schema.org/UserComments">

		<div class="col-md-12">

		<?php
		$aria_req = 'required="required"';
$args = array(
	'fields' => array(
			'author' =>'<div class="ginput_container comment-form-author">' . '<input class="medium" id="author" placeholder="Name *" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
				'</div>'
				,
			'email'  => '<div class="ginput_container comment-form-email">' . '<input class="medium" id="email" placeholder="Email *" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"' . $aria_req . ' />'  .
				'</div>',
			'url'    => ''
		
	),
	'comment_field' => '<div class="ginput_container comment-form-comment">' .
		'<textarea id="textarea medium" name="comment" placeholder="Comments *" cols="45" rows="8" aria-required="true"' . $aria_req . '></textarea>' .
		'</div>',
    'comment_notes_after' => '',
    'title_reply' => '<div class="crunchify-text"> <h4>Leave a Reply</h4></div>'
);

		comment_form($args); ?>

		</div>

	</div><!-- #comments -->