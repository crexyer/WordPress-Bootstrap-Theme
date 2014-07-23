<?php get_header(); ?>
<div class="row">
	<div class="col-lg-9">
		<div class="content-area">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<div class="content-title">
					<h1>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h1>
					<div class="meta">
						<ul>
							<li><span class="glyphicon glyphicon-user"></span> <?php echo get_the_author(); ?></li>
							<li><span class="glyphicon glyphicon-time"></span> <?php echo get_the_date(); ?></li>
							<?php
								if( current_user_can( 'publish_pages' ) ) {
									edit_post_link( __( 'Edit', 'Bootstrap' ), '<li><span class="glyphicon glyphicon-edit"></span> ', '</li>' );
								}
							?>
						</ul>
					</div>
				</div>
				<div class="article-content">
					<?php the_content( '<button class="btn btn-primary">' . __( 'Read More' ,'Bootstrap' ) . ' <span class="glyphicon glyphicon-chevron-right"></span>' . '</button>' ); ?>
				</div>
			</article>
			<?php endwhile; else: ?>
			<p><?php _e( 'Sorry, this page does not exist.', 'Bootstrap' ); ?></p>
			<?php endif; ?>
			<?php bootstrap_link_pages(); ?>
		</div>
		<!-- /content-area -->
	<?php comments_template(); ?>
	</div>
	<!-- /col-lg-9 -->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>