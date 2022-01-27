<?php if ( post_password_required() ) {
	return;
} ?>

<div id="comments">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>

		<?php the_comments_navigation(); ?>

		<div class="">
			<?php
			wp_list_comments(
				array(
					'callback'   => 'my_comment',
					'type'       => 'comment',
					'style'      => 'div',
					'short_ping' => true,
				)
			);
			?>
		</div>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p><?php esc_html_e( 'Comments are closed.', 'g-info' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>

	<div class="">
		<?php
		comment_form(array(
			'title_reply' => '',
			'class_submit' => 'bg-indigo-600 text-center text-white font-light rounded cursor-pointer px-6 py-2'
		));
		?>	
	</div>

</div><!-- #comments -->


<!-- Функция вывода комментария -->

<?php function my_comment( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? 'mb-6' : 'parent mb-6', null, null, false );
	?>

	<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} ?>
	<div class="comment-item border-b border-gray-200 dark:border-gray-500 pb-6 mb-6">
		<div class="comment-author text-gray-800 dark:text-gray-200 vcard mb-2">
			<?php
			printf(
				__( '<span class="font-semibold">%s</span>' ),
				get_comment_author_link()
			);
			?>
		</div>

		<div class="comment-content text-gray-800 dark:text-gray-200 mb-1">
			<?php comment_text(); ?>	
		</div>
		

		<?php if ( $comment->comment_approved == '0' ) { ?>
			<em class="comment-awaiting-moderation">
				<?php _e( 'Your comment is awaiting moderation.' ); ?>
			</em><br/>
		<?php } ?>

		<div class="comment-meta flex text-gray-800 dark:text-gray-200 opacity-75">
			<div class="mr-4">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php 
						$d = "F jS, Y";
						$comment_ID = $comment->comment_ID;
						$comment_date = get_comment_date( $d, $comment_ID );
						echo $comment_date;
					?>
				</a>
			</div>

			<div class="mr-4">
				<?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>	
			</div>

			<div class="font-semibold text-indigo-600 dark:text-indigo-300 reply">
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
	</div>

	<?php if ( 'div' != $args['style'] ) { ?>
		</div>
	<?php }
} ?>