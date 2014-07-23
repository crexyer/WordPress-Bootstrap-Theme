<?php get_header(); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="content-area">
			<article>
				<div class="content-title">
					<h1><?php _e ( 'Sorry, this page does not exist.', 'Bootstrap' ); ?></h1>
				</div>
				<p><?php _e ( 'Maybe try a search?', 'Bootstrap' ); ?></p>
				<form method="get" class="input-group" action="<?php echo site_url(); ?>">
					<input type="search" class="form-control" placeholder="<?php _e ( 'Search', 'Bootstrap' ); ?>" value="" name="s" title="<?php _e ( 'Search', 'Bootstrap' ); ?>">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
					</span>
				</form>
			</article>
		</div>
		<!-- /content-area -->
	<?php bootstrap_paginate_links(); ?>
	<?php comments_template(); ?>
	</div>
	<!-- /col-lg-12 -->
</div>
<?php get_footer(); ?>