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
<!-- Gotop Button -->
<div id="gotop" title="<?php _e ( 'Back to top', 'Bootstrap' ); ?>">
<!-- Embed SVG image -->
<svg id="rocket" version="1.1" x="0px" y="0px" viewBox="0 0 75 75">
	<circle class="icon-circle" cx="37.5" cy="37.5" r="37.5"/>
	<g class="rocket-inner">
		<path class="fire" id="fire-middle" d="M37.681,56.904c1.815,0,3.286,1.467,3.286,3.278c0,3.595-3.286,7.394-3.286,7.394 s-3.286-3.858-3.286-7.394C34.396,58.372,35.866,56.904,37.681,56.904z"/>
		<path class="fire" id="fire-right" d="M42.173,56.254c1.738-0.523,3.569,0.458,4.091,2.192 c1.036,3.443-1.016,8.027-1.016,8.027s-4.258-2.747-5.277-6.133C39.449,58.606,40.435,56.777,42.173,56.254z"/>
		<path class="fire" id="fire-left" d="M34.911,57.165c1.501,1.02,1.894,3.061,0.876,4.559 c-2.02,2.974-6.872,4.269-6.872,4.269s-0.551-5.038,1.436-7.962C31.368,56.532,33.41,56.145,34.911,57.165z"/>
		<path class="fire" id="fire-small-left" d="M35.049,60.427c1.028,0.204,1.696,1.201,1.493,2.228 c-0.404,2.036-2.693,3.818-2.693,3.818s-1.428-2.555-1.03-4.559C33.022,60.889,34.021,60.223,35.049,60.427z"/>
		<path class="fire" id="fire-small-right" d="M39.159,60.921c0.944-0.455,2.077-0.061,2.532,0.882 c0.902,1.87,0.145,4.67,0.145,4.67s-2.677-1.183-3.564-3.022C37.817,62.509,38.215,61.375,39.159,60.921z"/>
		<path class="rocket-bottom" d="M41.461,52.932H39.94c-0.722-0.022-1.468-0.035-2.239-0.035c-0.77,0-1.517,0.014-2.239,0.035h-1.521 c-3.362-3.667-5.716-12.098-5.716-21.919c0-13.188,4.243-23.878,9.476-23.878s9.476,10.691,9.476,23.878 C47.177,40.834,44.823,49.264,41.461,52.932z"/>
		<path class="wing-base" d="M45.9,32.531c0,0,8.192,1.527,5.972,22.226l-8.344-6.492L45.9,32.531z"/>
		<path class="wing-shadow" d="M41.994,38.62c4.844-2.581,10.51,10.248,9.878,16.138l-8.344-6.492 C43.527,48.265,40.993,40.468,41.994,38.62z"/>
		<path class="wing-base" d="M31.323,48.265l-8.344,6.493c-2.221-20.699,5.971-22.226,5.971-22.226L31.323,48.265z"/>
		<path class="wing-shadow" d="M31.323,48.265l-8.344,6.493c-0.632-5.89,5.035-18.718,9.878-16.138 C33.857,40.468,31.323,48.265,31.323,48.265z"/>
		<path class="rocket-base" d="M44.075,51.106c-1.746-0.288-3.962-0.46-6.375-0.46s-4.629,0.173-6.374,0.46 C29,46.399,27.511,39.18,27.511,31.08c0-14.18,4.562-25.676,10.19-25.676S47.89,16.9,47.89,31.08 C47.89,39.181,46.4,46.4,44.075,51.106z"/>
		<path class="rocket-shadow" d="M36.097,50.671c9.047-18.749,3.355-39.383,1.901-45.315c5.489,0.398,9.892,11.729,9.892,25.657 c0,8.1-1.49,15.319-3.815,20.025c0,0-1.75-0.218-3.729-0.322C38.367,50.613,36.097,50.671,36.097,50.671z"/>
		<circle class="window" cx="37.7" cy="25.189" r="4.872"/>
		<circle class="window" cx="37.7" cy="34.94" r="2.408"/>
	</g>
</svg>
</div>
</body>
</html>