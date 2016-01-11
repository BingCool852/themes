<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package cosimo
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

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf(
					esc_html( _nx( '1条想法 &ldquo;%2$s&rdquo;', '%1$s 条想法 &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'cosimo' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => '70',
					'reply_text'        =>  '<span>' .esc_html__( '回复'  , 'cosimo' ) . '<i class="fa fa-reply spaceLeft"></i></span>',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( '评论菜单', 'cosimo' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( '<i class="fa fa-lg fa-angle-double-left spaceRight"></i>'. esc_html__( '评论历史', 'cosimo' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( '最近评论', 'cosimo' ) .'<i class="fa fa-lg fa-angle-double-right spaceLeft"></i>' ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( '评论已被关闭.', 'cosimo' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(
		'author' => '<p class="comment-form-author"><label for="author"><span class="screen-reader-text">' . __( 'Name *'  , 'cosimo' ) . '</span></label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . __( '姓名 *'  , 'cosimo' ) . '"/></p>',
		'email'  => '<p class="comment-form-email"><label for="email"><span class="screen-reader-text">' . __( 'Email *'  , 'cosimo' ) . '</span></label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . __( '邮箱 *'  , 'cosimo' ) . '"/></p>',
		'url'    => '<p class="comment-form-url"><label for="url"><span class="screen-reader-text">' . __( 'Website'  , 'cosimo' ) . '</span></label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . __( '站点'  , 'cosimo' ) . '"/></p>',
	);
	$required_text = esc_html__(' 必填字段 ', 'cosimo').' <span class="required">*</span>';
	?>
	<?php comment_form( array(
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( '您必须<a href="%s">登录</a>后才可发表评论.' , 'cosimo' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as smallPart">' . sprintf( __( '登录人: <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">退出帐号?</a>'  , 'cosimo' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes smallPart">' . __( '您的电子邮件地址不会被公开。'  , 'cosimo' ) . ( $req ? $required_text : '' ) . '</p>',
		'title_reply' => __( '发表评论'  , 'cosimo' ),
		'title_reply_to' => __( '发表评论 to %s'  , 'cosimo' ),
		'cancel_reply_link' => __( '取消回复'  , 'cosimo' ) . '<i class="fa fa-times spaceLeft"></i>',
		'label_submit' => __( '发表评论'  , 'cosimo' ),
		'comment_field' => '<p class="comment-form-comment"><label for="comment"><span class="screen-reader-text">' . __( 'Comment *'  , 'cosimo' ) . '</span></label><textarea id="comment" name="comment" rows="8" aria-required="true" placeholder="' . __( '评论内容 *'  , 'cosimo' ) . '"></textarea></p>',
	));
	?>

</div><!-- #comments -->
