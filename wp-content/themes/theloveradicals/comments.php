<div class="comments col-md-10 col-md-offset-1">
		<?php if (post_password_required()) : ?>
		<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'html5blank' ); ?></p>
</div>
	<?php return; endif; ?>

	<?php if (have_comments()) : ?>
		<ul class="comments row">
			<?php wp_list_comments('type=comment&callback=html5blankcomments'); // Custom callback in functions.php ?>
		</ul>

	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p><?php _e( 'Comments are closed here.', 'html5blank' ); ?></p>
	<?php endif; ?>

	<?php
	$comment_args = array (
		'class_submit' => 'btn btn-primary pull-right',
	);?>
	<div class="ow">
		<?php comment_form($comment_args); ?>

	</div>

</div>
