<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('url'); ?>/favicon.ico">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

<meta property="og:title" content="<?php bloginfo('name'); ?>: <?php the_title(); ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
<meta property="og:image" content="<?php bloginfo('template_url'); ?>/...?"/>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>"/>


<?php // DETECT MOBILE DEVICES
include 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if ( is_home() ) {
    // This is a homepage
} else {
	
	if ($detect->isMobile()) { // If viewed on a mobile device, jump to the important content:
	echo '<script type="text/javascript" language="javascript"> function moveWindow (){window.location.hash="|main";} </script>';
	}

}
?>


<?php if ( is_home() ) { ?>
<title><?php /* Site Name */ bloginfo('name'); echo ': '; bloginfo('description'); ?></title>
<? } else { ?>
<title><?php /* Site Name */ bloginfo('name'); ?> | <?php /* Page Title */ wp_title( '|', true, 'right' );?> </title>
<?php } ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style_ie.css" type="text/css" /><![endif]-->

<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
   <noscript>
     <strong>Warning !</strong>
     Because your browser does not support HTML5, some elements are simulated using JScript.
     Unfortunately your browser has disabled scripting. Please enable it in order to display this page.
  </noscript>
<![endif]-->


<link href="<?php bloginfo('wpurl') ?>/wp-content/scripts/lightbox/css/lightbox.css" rel="stylesheet" />

<?php /* This should always be included just before the </head> tag. */ wp_head(); ?>
</head>

<body>

<header id="mobile">
	<h1><a href="<?php bloginfo('wpurl');?>"><?php bloginfo('name'); ?></a></h1>
    <div class="breadcrumbs_mobile"><?php get_template_part('breadcrumbs'); ?></div>
</header>

<!-- END OF HEADER.PHP -->


