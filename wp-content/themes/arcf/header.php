<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php the_title(); ?></title>

  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/prettyPhoto.css" type="text/css" media="screen" />
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery.js'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery-migrate.min.js'></script>
	
	<style type="text/css" id="custom-background-css">
		body.custom-background { background-color: #eeeeee; background-image: url('<?php bloginfo('template_url'); ?>/images/scribble_light.png'); background-repeat: repeat; background-position: top left; background-attachment: scroll; }
	</style>
	
	<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<![endif]-->
	
	<?php wp_head(); ?>
</head>

<body class="home blog custom-background">
	
	<div id="loadingContainer"></div>
	
	<div id="wrapper">
		
		<div class="slider_container">
          	<ul id="slider1" class="rslides rslides1">
          		<li style="background: url('<?php bloginfo('template_url'); ?>/images/masthead1.jpg') no-repeat scroll center center / cover  transparent; display: block; float: none; z-index: 1;" id="rslides1_s0" class=""></li>
          	</ul>

        		<!-- Main Banner Info -->
        		<div class="container-full">
            		<header class="section row nomargin">
             			 <div class="banner-info col four tablet-six mobile-full">
                
                			<!-- Logo
           				<div class="logo section">
           					<a href="/">
             						<img src="<?php bloginfo('template_url'); ?>/images/header-logo.png" />
           					</a>
           				</div>
                			<!-- End Logo -->

                			<div class="main_title">
                  				<!--<span class="tag">AARC's</span>-->
                  				<h2>AARC's</h2>
                  				<h3>Virtual Museum</h3>
                			</div>

                			<div class="event_duration">
                				<p>The people, the heritage, <br />and the progress of the<br /> respiratory care profession.</p>
                			</div> 


                			<!--
                			<h5 class="admission"><span class="arrow-right"></span>free admission</h5>
						-->

              
              			</div>  
            		</header>
        		</div>
        		<!-- End Main Banner Info -->
		</div>
		
		<div id="header">
			<h1 id="theTagline"><a href="/"><img src="<?php bloginfo('template_url'); ?>/images/header-logo.png" /></a></h1>
        <?php include('menu.php'); ?>
			<!--
			<select id="selectMenu">
				<option selected="selected" value="">Menu</option>
				<option value="http://themes.themolitor.com/arcf/">Home</option>
				<option value="http://themes.themolitor.com/arcf/about/">About</option>
				<option value="http://themes.themolitor.com/arcf/category/blog/">Blog</option>
				<option value="#">Drops</option><option value="#">Sample Drop Down Item Example</option>
				<option value="#">Another Drop Down Item Example</option>
				<option value="#">More Drop Downs</option>
				<option value="#">Keep 'em Coming</option>
				<option value="#">Sample Drops</option>
				<option value="#">Yet Another Drop Menu Item Example</option>
			</select>	
			-->
			<div class="clear"></div>
		</div> <!-- /#header -->