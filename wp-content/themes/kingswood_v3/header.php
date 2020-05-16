<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<meta property="og:title" content="<?php bloginfo('name'); ?>: <?php the_title(); ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
<meta property="og:image" content="<?php echo get_the_post_thumbnail_url( 35, 'large'); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>"/>

<?php // Get the slug
	global $post;
	$slug = get_post( $post )->post_name;
?>

<?php if (is_home() or is_page('home') ) { ?>
<title><?php /* Site Name */ bloginfo('name'); echo ': '; bloginfo('description'); ?></title>
<? } else { ?>
<title><?php /* Site Name */ bloginfo('name'); ?> | <?php /* Page Title */ wp_title( '|', true, 'right' );?> </title>
<?php } ?>

<script src="https://use.fontawesome.com/ddcf8e6585.js"></script>

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



<?php /* This should always be included just before the </head> tag. */ wp_head(); ?>
</head>

<body id="<?php echo $slug; ?>">


<header role="header">

	<section id="search">
		<?php get_template_part('header_search'); ?>
	</section>

	<section id="header">
		<?php get_template_part('header_image'); ?>
	</section>

	<nav role="nav">
		<?php get_template_part('header_nav'); ?>
	</nav>
	
	
		<?php if (is_home() or is_page('home') ) {
	
			// No breadcrumbs
	
		} else {
			echo '<div id="breadcrumbs">';
			bcn_display(); 
			echo '</div>';
		}  ?>
	

</header>


<!-- END OF HEADER.PHP -->


