<?php 
/************************************************************************************/
/* Display Comments and Comments form	*/		
/************************************************************************************/		
 ?>

 <div id="comments">
 	<?php $commCount = get_comments_number(); ?>
 	<?php if (($commCount !=0 && !comments_open()) || comments_open()): ?>
 		<h3 class="content-subhead"><?php echo $commCount; ?> <?php echo $commCount == 1 ? __('Comment', 'purecss') : __('Comments', 'purecss') ?></h3>
 	<?php endif ?>
 <div class="comment-list">
    <?php wp_list_comments( array( 'style' => 'div','echo'=>1, 'callback'=>'purecss_comments','avatar_size'=>48, 'depth'=>10 ) ); ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text content-subhead"><?php _e( 'Comment navigation', 'purecss' ); ?></h1>
		<div class="nav-previous alignleft"><?php previous_comments_link( __( '&larr; Older Comments', 'purecss' ) ); ?></div>
		<div class="nav-next alignright"><?php next_comments_link( __( 'Newer Comments &rarr;', 'purecss' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; ?>
</div>
<div class="clearfix"></div><!-- clearfix -->

<?php 
/**
 * Comments List Display
 *
 * @version 1.0
 * @since   Pure CSS 1.0
 * @author Ritesh Sanap <riteshsanap@gmail.com>
 *
 * @param   string   $comment
 * @param   array   $args
 * @param   integer   $depth
 * @return  string	List of all Comments
 */
function purecss_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php if(get_comment_author() == get_the_author()) { ?>
	<span class="shield">*</span>
	<?php } ?>
	<?php printf( '<cite class="fn">%s</cite> <span class="says">'._x('says:','after author of a citation','purecss').'</span>', get_comment_author_link() ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','purecss' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comment-body">
		<?php comment_text(); ?>
	</div>

		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s at %2$s', 'purecss'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'purecss' ), '  ', '' );
		?>
	</div>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}
 ?>
<?php 
/**
 * Comment Form Overwrite
 *
 * @version 1.0
 * @since Pure CSS 1.0
 * @return string HTML comment form
 */
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$required_text = ' "<span class="required">*</span>" marked fields are required';
$aria_req = ( $req ? " aria-required='true' required" : '' );
 	$comments_default = array(
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'title_reply'       => __( 'Leave a Reply', 'purecss' ),
  'title_reply_to'    => __( 'Leave a Reply to %s', 'purecss' ),
  'cancel_reply_link' => __( 'Cancel Reply', 'purecss' ),
  'label_submit'      => __( 'Post Comment', 'purecss' ),
  'class_submit'      => 'pure-button pure-button-primary',

  'comment_field' =>  '<div class="comment-form-comment pure-control-group"><textarea id="comment" name="comment" class="pure-input-1-2" rows="8" aria-required="true" placeholder="'.__('Comment', 'purecss').'">' .
    '</textarea>'.
    '<label for="comment">' . __( 'Comment', 'purecss' ) .'</label>'.
    '</div>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.', 'purecss' ) . '</p>',
    'comment_notes_after' =>'',
  // 'comment_notes_after' => '<p class="form-allowed-tags">' .
  //   sprintf(
  //     __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
  //     ' <code>' . allowed_tags() . '</code>'
  //   ) . '</p>',

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div class="comment-form-author pure-control-group">' .
	  '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" class="pure-input-1-2" placeholder="'.__('Name (Required)', 'purecss').'"' . $aria_req . '/>'.
      '<label for="author">' . __( 'Name', 'purecss' ) . '</label>'.
      '</div>',

    'email' =>
      '<div class="comment-form-email pure-control-group">'.
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" class="pure-input-1-2" placeholder="'.__('Email (Required)', 'purecss').'"' . $aria_req . '/>'.
      '<label for="email">' . __( 'Email', 'purecss' ). '</label>'.
      '</div>',

    'url' =>
      '<div class="comment-form-url pure-control-group">'.
      '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" class="pure-input-1-2" placeholder="'.__('Website', 'purecss').'"/>'.
      '<label for="url">' . __( 'Website', 'purecss' ) . '</label>' .'</div>'
    )
  ),
); ?>
		<?php if ( ! comments_open() ) : ?>
			<h6 class="no-comments content-subhead"><?php _e( 'Comments are closed.', 'purecss' ); ?></h6>
		<?php endif; ?>

<?php comment_form($comments_default); ?>
<?php 
/** 
 * The below code is just kept incase, because the desired result was reached,
 * By the power of SASS.
 */
// ob_start(); 
// 	 comment_form($comments_default);

//  	$search = array(
//  		'type="submit"',
//  		'class="comment-form"',
//  		);
//  	$replace = array(
//  		'type="submit" class="pure-button pure-button-primary"',
//  		'class="comment-form pure-form pure-form-aligned go-right pure-u-1 pure-u-md-1-2"',
//  		);
 	 
//  	 echo str_replace($search,$replace,ob_get_clean());

?>
 </div>
