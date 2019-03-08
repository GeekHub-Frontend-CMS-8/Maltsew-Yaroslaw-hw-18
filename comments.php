<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lesson-18
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

<div id="comments" class="comments">

	<?php
	// You can start editing here -- including this comment!
	//if ( have_comments() ) :
		?>
		<h3 class="comments__length">
			<?php
			$lesson_18_comment_count = get_comments_number();
			if ( '1' === $lesson_18_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '1 Comment', 'lesson-18' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comments', '%1$s Comments', $lesson_18_comment_count, 'comments title', 'lesson-18' ) ),
					number_format_i18n( $lesson_18_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->
		
		<?php comment_form(array(
			'comment_field' => '<br><label for="comment"></label><input type="text" name="comment" class="comments__input" placeholder="Your comment">',
			'logged_in_as' => '',
			'class_form' => 'comments__form',
			'title_reply' => '',
			'label_submit' => 'submit comment',
			'class_submit' => 'comments__input-button',
		)); ?>		
<?php 
// ---------------------------COMMENT STYLE------------------------------
?>
		<?php
			function mytheme_comment( $comment, $args, $depth ) {
				if ( 'div' === $args['style'] ) {
					$tag       = 'div';
					$add_below = 'comment';
				} else {
					$tag       = 'li';
					$add_below = 'div-comment';
				}

				$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
				?>

				<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
				<?php if ( 'div' != $args['style'] ) { ?>
					<div id="div-comment-<?php comment_ID() ?>" class="comment-body comments-list__item"><?php
				} ?>

				<div class="comments__avatar">
					<?php
					if ( $args['avatar_size'] != 0 ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					}
					/*
					//Admin says:
					printf(
						__( '<cite class="fn">%s</cite> <span class="says">says:</span>' ),
						get_comment_author_link()
					)*/
					?>
				</div>

				<?php if ( $comment->comment_approved == '0' ) { ?>
					<em class="comment-awaiting-moderation">
						<?php _e( 'Your comment is awaiting moderation.' ); ?>
					</em><br/>
				<?php } ?>
				
				<div class="comments__text">
					<div class="comments__user-button">
						<p class="comments__username">
							<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()); ?>
						</p>					
						<span>
							/
						</span>					
						<p class="comments__time">
							<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
								<?php
								/*printf(
									__( '%1$s at %2$s' ),
									get_comment_date(),
									get_comment_time()
								);*/
								$time_diff = human_time_diff( get_comment_time('U'), current_time('timestamp') );
								echo " $time_diff ago";
								?>
							</a>						
						</p>
							
						<?php edit_comment_link( __( ''/*(Edit)*/ ), '  ', '' ); ?>
						<span>
							/
						</span>					
						<div class="comments__replay">
							<?php
							comment_reply_link(
								array_merge(
									$args,
									array(
										'add_below' => $add_below,
										'depth'     => $depth,
										'max_depth' => $args['max_depth']
									)
								)
							); ?>
						</div>				
					</div>
					<p class="comments__desc">
						<?php comment_text(); ?>
					</p>										
				</div>
					

				<?php if ( 'div' != $args['style'] ) { ?>
					</div>
				<?php }
			}
			//-----------------------------------------------------------------------------------
			 ?>
		<ul class="comments-list">
			<?php
			wp_list_comments( array(
				'style'			=> 'ul',
				'short_ping' => true,
				'avatar_size' => 50,
				'reply_text' => 'replay',
				'callback' => 'mytheme_comment',
			) );
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php echo 'Comments are closed';//esc_html_e( 'Comments are closed.', 'lesson-18' ); ?></p>
			<?php
		endif;
	//endif; // Check for have_comments().

	?>

</div><!-- #comments -->
		
	</div>
</section>
