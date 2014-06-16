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
      <h1 id="theTagline"><img src="<?php bloginfo('template_url'); ?>/images/header-logo.png" /></h1>
      <div class="menu-main-container" id="navigation">
        <ul class="menu" id="dropmenu">
          <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-93" id="menu-item-93"><a href="/">Home</a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-498" id="menu-item-498"><a href="/gallery/">Current Galleries/a></li>
          <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-502" id="menu-item-502"><a href="/wall-of-donors/">Wall of Donors</a></li>
          <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-94" id="menu-item-94"><a href="/contact/">Contact</a></li>
        </ul>
      </div>
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
