<div id="comments">
	<div class="page-header">
		<h1><?php _e( 'Comments', 'Bootstrap' ); ?></h1>
	</div>
	<h3><?php _e( 'Comments List', 'Bootstrap' ); ?></h3>
	<?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password): ?>
	<p><?php _e( 'Enter password to view comments.', 'Bootstrap' ); ?></p>
	<?php elseif (!comments_open()): ?>
	<p><?php _e( 'Comments are closed.', 'Bootstrap' ); ?></p>
	<?php elseif (!have_comments()): ?>
	<p><?php _e( 'No comments.', 'Bootstrap' ); ?></p>
	<?php else: ?>
	<ol class="comments-list">
	<?php
		wp_list_comments ( array (
				'style' => 'div',
				'format' => 'html5' 
		) );
		?>
	</ol>
	<?php endif; ?>
	<?php bootstrap_paginate_comments_links(); ?>
	<?php
	comment_form ( array (
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => array (
					'author' => '<div class="form-group"><div class="col-sm-5"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr ( $commenter ['comment_author'] ) . '" size="30" placeholder="' . __ ( 'Name', 'Bootstrap' ) . '"></div></div>',
					
					'email' => '<div class="form-group"><div class="col-sm-5"><input class="form-control" id="email" name="email" type="text" value="' . esc_attr ( $commenter ['comment_author_email'] ) . '" size="30" placeholder="' . __ ( 'Email', 'Bootstrap' ) . '"></div></div>',
					
					'url' => '<div class="form-group"><div class="col-sm-5"><input class="form-control" id="url" name="url" type="text" value="' . esc_attr ( $commenter ['comment_author_url'] ) . '" size="30" placeholder="' . __ ( 'Website (optional)', 'Bootstrap' ) . '"></div></div>' 
			),
			'comment_field' => '<div class="form-group"><div class="col-sm-12"><textarea class="form-control" id="comment" name="comment" cols="45" rows="4" aria-required="true" placeholder="' . __ ( 'Write your comment here.', 'Bootstrap' ) . '"></textarea></div></div>' 
	) );
	?>
</div>