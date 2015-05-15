<?php 

if ( ! function_exists( 'reedwan_comment' ) ) :

function reedwan_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment-wrap">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 80 ); ?>
		</div>
		<div class="comment-body">
			<div class="comment-meta commentmetadata">
				<?php printf( sprintf( '<h5 class="fn">%s</h5>', get_comment_author_link() ) ); ?>
				<div class="comment-info comment-head">
					
					<span>( <span class="comment-date-time"><?php printf( __( '%1$s', 'corporative' ), get_comment_date() ); ?></span> )</span>
					
				</div>
				<span class="edit-comment comment-head"><?php edit_comment_link( __( ' Edit', 'corporative' ), ' ' );?></span>
				<span class="reply-comment comment-head"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
				
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<span class="comment-awaiting-moderation"><em><?php _e( 'Your comment is awaiting moderation.', 'corporative' ); ?></em></span>
			<?php endif; ?>
			<?php comment_text(); ?>
		</div>
		
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'corporative' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'corporative' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;
?>