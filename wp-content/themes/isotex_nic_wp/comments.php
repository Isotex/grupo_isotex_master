<div id="comments">
<?php if ( post_password_required() ) : ?>
	<p class="nopassword">
		<?php _e( 'This post is password protected. Enter the password to view any comments.', 'corporative' ); ?>
	</p>
</div>
<?php return; endif; ?>

<?php if ( have_comments() ) : ?> 
	<div class="element-title">
		<h3><?php printf( __( '%s Comments', 'corporative' ), get_comments_number() ); ?></h3>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<div class="comment-navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '<div class="nexte"><i class="icons-arrow-left-thin"></i></div>' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( '<div class="nexte"><i class="icons-arrow-right-thin"></i></div>' ) ); ?></div>
		</div> 
		<?php endif; ?>
	</div>

	<ol class="commentlist">
		<?php wp_list_comments( array( 'callback' => 'reedwan_comment' ) );?>
	</ol>

<?php else :
	if ( ! comments_open() ) : ?>
		<p class="nocomments">
			<?php _e( 'Comments are closed.', 'corporative' ); ?>
		</p>
	<?php endif;?>
<?php endif; ?>

<?php 
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$comments_args = array(
        'title_reply'=>'<span>'.__('Leave A Comment','corporative').'</span>',
		'comment_notes_before' => '',
        'comment_notes_after' => '',
		'logged_in_as' => '',
        'comment_field' => '<div class="text-comment"><textarea id="comment" placeholder="'.__('Comment','corporative').'" name="comment" aria-required="true" rows="10"></textarea></p></div>',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' =>
			  '<div class="text-name"><input id="author" placeholder="'.__('Name','corporative').( $req ? ' *' : '' ) .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			  '" size="30"' . $aria_req . ' /></div>',
			'email' =>
			  '<div class="text-email"><input id="email" placeholder="'.__('Email','corporative').( $req ? ' *' : '' ) .'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			  '" size="30"' . $aria_req . ' /></div>',
			'url' =>
			  '<div class="text-web"><input id="url" placeholder="'.__('Website','corporative').'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			  '" size="30" /></div>'
			)
	  ),
);

comment_form($comments_args);
?>

</div>
