<?php if ( is_active_sidebar( 1 ) ) : ?>
<div class="col-lg-3">
	<hr class="hidden-lg">
	<div class="widget">
		<form method="get" class="input-group search-box" action="<?php echo site_url(); ?>">
			<input type="search" class="form-control" value="<?php echo get_search_query(); ?>" name="s">
			<span class="input-group-btn">
				<input type="submit" class="btn btn-primary" value="<?php _e('Search', 'Bootstrap'); ?>">
			</span>
		</form>
		<?php dynamic_sidebar( 1 ); ?>
	</div>
</div>
<?php endif; ?>