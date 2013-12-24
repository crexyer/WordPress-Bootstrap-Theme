<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-43111893-2', 'crexyer.com');
		ga('send', 'pageview');
	</script>
</head>
<body>
	<a id="gotop" href="#" title="<?php _e('Back to top', 'Bootstrap'); ?>"></a>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url(); ?>"><span class="glyphicon glyphicon-home"></span> <?php bloginfo('name'); ?></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<?php if(function_exists('wp_nav_menu')) wp_nav_menu(array(
							'container' => false,
							'theme_location' => 'primary',
							'items_wrap' => '%3$s',
							'walker' => new Walker_Nav_Bootstrap (),
					)); ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="jumbotron">
		<div class="container">
			<h1><?php bloginfo('name' ); ?></h1>
			<p>
				<?php bloginfo('description', 'display'); ?>
			</p>
		</div>
	</div>
	<div class="container">
  	<div class="alert alert-danger fade in hide" id="alert-HTML5">
			<button class="close" data-dismiss="alert">×</button>
  		<?php _e('Your browser does not support HTML5, please update or change your browser to get a better browsing experience.', 'Bootstrap'); ?>
		</div>