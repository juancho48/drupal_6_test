<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php print $head_title; ?></title>
		<?php print $head; ?>
		<?php print $meta; ?>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge"/> 
		<?php print $scripts; ?>
		<!--[if IE]>
		  <script type="text/javascript" src="<?php print base_path() . path_to_theme() . '/js/cufon/cufon.js'; ?>"></script>
		  <script type="text/javascript" src="<?php print base_path() . path_to_theme() . '/js/cufon/din_medium.font.js'; ?>"></script>
		  <script type="text/javascript" src="<?php print base_path() . path_to_theme() . '/js/cufon/cufon-replacements.js'; ?>"></script>
		<![endif]-->		
		<?php print $styles; ?>
		<!--[if IE]>
	  		<link type="text/css" rel="stylesheet" media="all" href="<?php print base_path() . path_to_theme() . '/css/ie/ie.css'; ?>" />
		<![endif]-->		
		<!--[if lt IE 8]>
	  		<link type="text/css" rel="stylesheet" media="all" href="<?php print base_path() . path_to_theme() . '/css/ie/ie7.css'; ?>" />		
	  	<![endif]-->
	  	<?php if(FALSE && in_array($_SERVER['SERVER_NAME'], array('wistar.local', 'wistar.contextdevel.com'))):?>
		  	<script type="text/javascript">
				$(function() {
					var options = $.fn.bar.defaults;
					options.message = 'REMINDER: This is the staging server';
					options.color = 'red';
					$(window).showjBar(options);
				});
		  	</script>
	  	<?php endif; ?>
	</head>
	<body class="<?php print $body_classes; ?>">	
		<div id="global_container">
			<div id="slide_nav_container">
				<div id="slide_nav_elements">
					<div class="slide_nav_menu" id="menu_find_a_scientist">
						<?php print theme('wistar_scientists_menu'); ?>
					</div>
					<div class="slide_nav_menu" id="menu_technology_transfer"></div>					
				</div>
			</div>
			<div id="layout_container" style="background-image: url('<?php print wistar_theme_site_bg();?>');">
				<div id="layout_elements">
