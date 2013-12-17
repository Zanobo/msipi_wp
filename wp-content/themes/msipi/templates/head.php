<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->      <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<html class="no-js" <?php language_attributes(); ?>>
<head>
	
	<!--
		todo:
		set favicons
		put ie9 support assets in path
	-->
	
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- favicons, check out github.com/audreyr/favicon-cheat-sheet & realfavicongenerator.net -->
  <!--[if IE]><link rel="shortcut icon" href="/favicon.ico"><![endif]-->
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assets/img/favicons/msipi_favicon_itouch_precomp_152.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/img/favicons/msipi_favicon_itouch_precomp_144.png">
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assets/img/favicons/msipi_favicon_itouch_precomp_120.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/img/favicons/msipi_favicon_itouch_precomp_114.png">
  <link rel="apple-touch-icon-precomposed" sizes="76x76"   href="/assets/img/favicons/msipi_favicon_itouch_precomp_72.png">
  <link rel="apple-touch-icon-precomposed" sizes="60x60"   href="/assets/img/favicons/msipi_favicon_itouch_precomp_60.png">
  <link rel="apple-touch-icon-precomposed" sizes="57x57"   href="/assets/img/favicons/msipi_favicon_itouch_precomp_57.png">
  <link rel="icon" sizes="228x228" href="/assets/img/favicons/msipi_favicon_228.png">
  <link rel="icon" sizes="195x195" href="/assets/img/favicons/msipi_favicon_195.png">
  <link rel="icon" sizes="160x160" href="/assets/img/favicons/msipi_favicon_160.png">
  <link rel="icon" sizes="128x128" href="/assets/img/favicons/msipi_favicon_128.png">
  <link rel="icon" sizes="96x96"   href="/assets/img/favicons/msipi_favicon_96.png">
  <link rel="icon" sizes="32x32"   href="/assets/img/favicons/msipi_favicon_32.png">
  <meta name="application-name" content="MSIPI" />
  <meta name="msapplication-TileColor" content="#EE3A43">
  <meta name="msapplication-TileImage" content="/assets/img/favicons/msipi_mstile_144.png">
  <meta name="msapplication-square70x70logo" content="/assets/img/favicons/msipi_mstile_70.png" />
  <meta name="msapplication-square150x150logo" content="/assets/img/favicons/msipi_mstile_150.png" />
  <meta name="msapplication-wide310x150logo" content="/assets/img/favicons/msipi_mstile_310x150.png" />
  <meta name="msapplication-square310x310logo" content="/assets/img/favicons/msipi_mstile_310.png" />
  
  <!-- RSS -->
  <!--<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">-->
  
  <!-- CSS & JS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

  <?php wp_head(); ?>
  
  <!--[if lt IE 9]>
  	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  	<script src="/assets/js/respond.js"></script>
  	<link href="//netdna.bootstrapcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
  	<link href="/respond.proxy.gif" id="respond-redirect" rel="respond-redirect" />
		<script src="/assets/js/respond.proxy.js"></script> 
	<![endif]-->
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>-->
	<!--respond.proxy.gif must be accessible from a true, non-aliased path. Frequent ajax requests-->
	
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

</head>
