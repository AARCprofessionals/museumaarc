<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php the_title(); ?></title>
	
<!--
<link rel='stylesheet' id='nivo-slider-css'  href='http://satoristudio.net/ikebana/wp-content/plugins/shortcodes/css/nivoslider.css?ver=3.9.4' type='text/css' media='all' />
<link rel='stylesheet' id='jcarousel-css'  href='http://satoristudio.net/ikebana/wp-content/plugins/shortcodes/css/jcarousel.css?ver=3.9.4' type='text/css' media='all' />
<link rel='stylesheet' id='shortcodes-ultimate-css'  href='http://satoristudio.net/ikebana/wp-content/plugins/shortcodes/css/su-style.css?ver=3.9.4' type='text/css' media='all' />
-->
	
	<link rel='stylesheet' id='responsive-css'  href='<?php bloginfo('template_url'); ?>/responsive.css' type='text/css' media='all' />
	<link rel='stylesheet' id='theme-css'  href='<?php bloginfo('template_url'); ?>/style-donors.css' type='text/css' media='all' />
	<link rel='stylesheet' id='orbit-css'  href='<?php bloginfo('template_url'); ?>/scripts/orbit/orbit-1.2.3.css' type='text/css' media='all' />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!--
<link rel='stylesheet' id='fontawesome-css'  href='<?php bloginfo('template_url'); ?>/includes/font-awesome/css/font-awesome.min.css' type='text/css' media='all' />
-->
	<link rel='stylesheet' id='easy-fancybox.css-css'  href='<?php bloginfo('template_url'); ?>/includes/easy-fancybox/easy-fancybox.css' type='text/css' media='screen' />
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.js'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery-migrate.min.js'></script>
<!--
<script type='text/javascript' src='http://satoristudio.net/ikebana/wp-content/plugins/shortcodes/js/jwplayer.js?ver=3.9.4'></script>
<script type='text/javascript' src='http://satoristudio.net/ikebana/wp-content/plugins/shortcodes/js/nivoslider.js?ver=3.9.4'></script>
<script type='text/javascript' src='http://satoristudio.net/ikebana/wp-content/plugins/shortcodes/js/jcarousel.js?ver=3.9.4'></script>
<script type='text/javascript' src='http://satoristudio.net/ikebana/wp-content/plugins/shortcodes/js/init.js?ver=3.9.4'></script>
<script type='text/javascript' src='http://satoristudio.net/ikebana/wp-includes/js/comment-reply.min.js?ver=3.8.1'></script>
-->
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/scripts/orbit/jquery.orbit-1.2.3.js?ver=1.2.3'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/includes/easy-fancybox/fancybox/jquery.fancybox-1.3.4.pack.js?ver=1.3.4'></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<!-- Advanced SEO Options -->
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>

	<!-- Easy FancyBox 1.3.4.9 using FancyBox 1.3.4 -->
	<script type="text/javascript">
	/* <![CDATA[ */
	jQuery(document).ready(function($){
	var fb_timeout = null;
	var fb_opts = { };
	/* IMG */
	var fb_IMG_select = 'a[href$=".jpg"]:not(.nofancybox),a[href$=".JPG"]:not(.nofancybox),a[href$=".gif"]:not(.nofancybox),a[href$=".GIF"]:not(.nofancybox),a[href$=".png"]:not(.nofancybox),a[href$=".PNG"]:not(.nofancybox)';
	$(fb_IMG_select).addClass('fancybox').attr('rel', 'gallery');
	$('a.fancybox, area.fancybox').fancybox( $.extend({}, fb_opts, { }) );
	/* Auto-click */ 
	$('#fancybox-auto').trigger('click');
	});
	/* ]]> */
	</script>
	<style type="text/css">.fancybox-hidden{display:none}</style>
	
	<?php wp_head(); ?>
</head>

<body class="home page page-template page-template-page_portfolio-php page-portfolio iso-masonry">

	
	
	<div id="wrapper">
		
		<div id="header">
			<h1 id="theTagline"><img src="<?php bloginfo('template_url'); ?>/images/header-logo.png" /></h1>
			<div class="menu-main-container" id="navigation">
				<ul class="menu" id="dropmenu">
					<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-93" id="menu-item-93"><a href="/">Home</a></li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-498" id="menu-item-498"><a href="/gallery/oxygen/">Virtual Museum</a></li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-502" id="menu-item-502"><a href="/wall-of-donors/">Wall of Donors</a></li>
					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-94" id="menu-item-94"><a href="/contact/">Contact</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	