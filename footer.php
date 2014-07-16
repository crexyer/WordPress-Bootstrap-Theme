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
<svg version="1.1" id="rocket" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 100 100">
	<circle class='icon-circle' cx="50" cy="50" r="50"/>
	<g class='rocket-inner'>
		<path class='fire' id='fire-middle' d="M50.242,75.872c2.42,0,4.381,1.956,4.381,4.371c0,4.793-4.381,9.858-4.381,9.858s-4.381-5.144-4.381-9.858 C45.861,77.829,47.822,75.872,50.242,75.872z"/>
		<path class='fire' id='fire-right' d="M56.23,75.006c2.318-0.697,4.759,0.611,5.455,2.923c1.382,4.59-1.355,10.702-1.355,10.702 s-5.678-3.663-7.036-8.177C52.599,78.142,53.913,75.703,56.23,75.006z"/>
		<path class='fire' id='fire-left' d="M46.548,76.22c2.002,1.36,2.525,4.081,1.168,6.078c-2.693,3.965-9.163,5.692-9.163,5.692 s-0.734-6.717,1.915-10.616C41.824,75.376,44.546,74.86,46.548,76.22z"/>
		<path class='fire' id='fire-small-left' d="M46.732,80.57c1.371,0.272,2.262,1.601,1.99,2.97c-0.539,2.715-3.591,5.091-3.591,5.091 s-1.904-3.407-1.373-6.078C44.029,81.186,45.361,80.297,46.732,80.57z"/>
		<path class='fire' id='fire-small-right' d="M52.212,81.228c1.259-0.607,2.77-0.081,3.376,1.176c1.203,2.493,0.193,6.227,0.193,6.227 s-3.57-1.577-4.752-4.03C50.423,83.345,50.953,81.834,52.212,81.228z"/>
		<path class='rocket-bottom' d="M55.281,70.576h-2.028c-0.962-0.029-1.958-0.047-2.985-0.047c-1.027,0-2.023,0.018-2.985,0.047h-2.028 c-4.483-4.89-7.622-16.131-7.622-29.225c0-17.584,5.657-31.838,12.635-31.838s12.635,14.254,12.635,31.838 C62.903,54.445,59.764,65.686,55.281,70.576z"/>
		<path class='wing-base' d="M61.2,43.375c0,0,10.923,2.036,7.963,29.634l-11.126-8.656L61.2,43.375z"/>
		<path class='wing-shadow' d="M55.992,51.493c6.458-3.441,14.013,13.664,13.171,21.517l-11.126-8.656 C58.036,64.353,54.658,53.957,55.992,51.493z"/>
		<path class='wing-base' d="M41.764,64.353L30.638,73.01C27.677,45.412,38.6,43.375,38.6,43.375L41.764,64.353z"/>
		<path class='wing-shadow' d="M41.764,64.353L30.638,73.01c-0.842-7.853,6.713-24.958,13.171-21.517 C45.143,53.957,41.764,64.353,41.764,64.353z"/>
		<path class='rocket-base' d="M58.767,68.141c-2.328-0.384-5.282-0.614-8.5-0.614c-3.218,0-6.172,0.23-8.499,0.614 c-3.101-6.275-5.087-15.901-5.087-26.701c0-18.907,6.082-34.235,13.587-34.235S63.854,22.533,63.854,41.44 C63.854,52.241,61.867,61.866,58.767,68.141z"/>
		<path class='rocket-shadow' d="M48.13,67.562c12.063-24.999,4.473-52.511,2.534-60.42c7.319,0.531,13.19,15.638,13.19,34.21 c0,10.8-1.987,20.425-5.087,26.7c0,0-2.333-0.291-4.972-0.429C51.156,67.484,48.13,67.562,48.13,67.562z"/>
		<circle class='window' cx="50.267" cy="33.585" r="6.496"/>
		<circle class='window' cx="50.267" cy="46.587" r="3.211"/>
	</g>
</svg>
</div>
</body>
</html>