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
</div>