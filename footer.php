<hr>
<footer>
	<ul>
		<li><?php printf( __ ( 'Theme designed by %s', 'Bootstrap' ), '<a href="http://www.crexyer.com/" target="_blank">Crexyer</a>' ); ?></li>
		<li><?php printf( __ ( 'Powered by %s', 'Bootstrap' ), '<a href="' . __( 'http://wordpress.org/', 'Bootstrap' ) . '" target="_blank">WordPress</a> & <a href="http://getbootstrap.com/" target="_blank">Bootstrap</a>' ); ?></li>
		<?php echo stripslashes ( get_option ( 'footer_code', '' ) ); ?>
	</ul>
</footer>
</div>
<!-- /container -->
<!-- Placed at the end of the document so the pages load faster -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/fancybox/fancybox.css' ; ?>" type="text/css" />
<script src="<?php echo home_url('/wp-includes/js/jquery/jquery.js'); ?>" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() . '/js/bootstrap.js'; ?>" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() . '/fancybox/fancybox.js'; ?>" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri() . '/js/theme.js'; ?>" type="text/javascript"></script>
</body>
</html>