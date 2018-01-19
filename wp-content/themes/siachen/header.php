<!doctype html>  

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
	<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/assets/images/apple-touch-icon-precomposed.png">
        <link rel="icon" href="<?php echo ot_get_option('fave_icon'); ?>" type="image/x-icon" />
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/favico.ico" type="image/x-icon" />
    
        <!-- CSS -->
        <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="<?php bloginfo('template_directory'); ?>/assets/css/jquery-ui.css" rel="stylesheet">
        <link href="<?php bloginfo('template_directory'); ?>/assets/css/selectik.css" rel="stylesheet">
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.vertical-tabs.css" rel="stylesheet">
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/BreadCrumb.css" rel="stylesheet">
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/breadcrumb-custom.css" rel="stylesheet">
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/font-awesome.css" rel="stylesheet">
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap-social.css" rel="stylesheet">
		
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/main.css" rel="stylesheet">
		<link href="<?php bloginfo('template_directory'); ?>/assets/css/select2.css" rel="stylesheet">
          
        <!-- JS -->
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/respond.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/moment.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery-1.10.2.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery-ui.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
		
       <script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min1.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.mousewheel.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.selectik.js"></script>
    	<script src="<?php bloginfo('template_directory'); ?>/assets/js/custom-file-select.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/selectivizr.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.placeholder.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/fontsmoothie.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.matchHeight-min.js"></script>
		
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap-rating.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.bootstrap.wizard.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.easing.1.3.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.jBreadCrumb.1.1.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.sticky-kit.min.js"></script>
		
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/select2.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/validate.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/assets/js/custom.js"></script>
        
        <!--[if lt IE 9]>
			<script src="assets/js/excanvas.js"></script>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
			<link href="assets/css/ie8-and-down.css" rel="stylesheet" />
        <![endif]-->
</head>
	
<body <?php body_class(); ?>>

		<header>
			<div class="container">
				<a href="<?php bloginfo('home'); ?>/" class="branding"><img src="<?php echo ot_get_option('logo'); ?>" /></a>
				<div class="rightside">
					<ul class="menu">
						<?php if(is_user_logged_in()) { ?>
								<li><a href="<?php echo wp_logout_url(get_permalink(ot_get_option('login'))); ?>">Logout</a></li>
								<li class="addlist"><a href="<?php echo get_permalink(ot_get_option('dashboard')); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> My Account</a></li>
						<?php } else { ?>
						<li><a href="<?php echo get_permalink(ot_get_option('login')); ?>">Signin</a></li>
						<li class="border-left"><a href="<?php echo get_permalink(ot_get_option('register')); ?>">Create an account</a></li>
						<?php } ?>
						
					</ul>
					<nav class="navbar navbar-default">
						<?php if(is_user_logged_in()) : ?><a href="#" class="btn btn-primary pull-right addlist"><i class="glyphicon glyphicon-plus"></i> Dashboard</a><?php endif; ?>
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#togglenavigation" aria-expanded="false">
								<table>
									<tr>
										
										<td>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</td>
										<td style="padding-left:10px;">
											Menu
										</td>
									</tr>
								</table>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="togglenavigation">
							<?php
						    simple_bootstrap_display_main_menu();
						?>
						</div>
					</nav>
				</div>
			</div>
		</header>
	
		
