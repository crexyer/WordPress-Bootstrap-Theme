<?php get_header(); ?>
<div class="row">
	<div class="col-lg-9">
		<div class="content-area">
			<article>
				<div class="page-header">
					<h1><?php _e( 'Sorry, this page does not exist.', 'Bootstrap' ); ?></h1>
				</div>
				<form role="form" role="search" method="get" action="<?php echo site_url(); ?>">
					<div class="form-group">
						<label><?php _e( 'Maybe try a search?', 'Bootstrap' ); ?></label>
						<input type="search" class="form-control"
							placeholder="<?php _e( 'Search', 'Bootstrap' ); ?>" value="" name="s" title="<?php _e( 'Search', 'Bootstrap' ); ?>">
					</div>
					<input type="submit" class="btn btn-primary" value="<?php _e( 'Search', 'Bootstrap' ); ?>">
				</form>
			</article>
		</div>
		<!-- /content-area -->
	<?php bootstrap_paginate_links(); ?>
	<?php comments_template(); ?>
	</div>
	<!-- /col-lg-9 -->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>