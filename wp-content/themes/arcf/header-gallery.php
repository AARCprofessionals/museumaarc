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
    body.custom-background { background-color: #eeeeee; background-image: url('/wp-content/themes/arcf/images/scribble_light.png'); background-repeat: repeat; background-position: top left; background-attachment: scroll; }
  </style>

  <!--[if lt IE 8]>
  <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
  <![endif]-->

  <?php wp_head(); ?>
</head>

<body class="home blog custom-background">
  <div id="loadingContainer"></div>
  <div id="wrapper">
    <div id="header">
      <h1 id="theTagline"><a href="/"><img src="<?php bloginfo('template_url'); ?>/images/header-logo.png" /></a> <?php if ( is_singular($post) ) echo $post->post_title; ?></h1>
        <?php include('menu.php'); ?>
      <div class="clear"></div>
    </div> <!-- /#header -->
