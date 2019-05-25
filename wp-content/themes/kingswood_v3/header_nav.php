<?php $walker = new Menu_With_Description; ?>
<?php $headernav = array(
	'theme_location'  => 'header_nav',
	'menu'            => '', 
	'container'       => 'false', 
	'container_class' => '', 
	'container_id'    => '',
	'menu_class'      => '', 
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'false',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => /* Don't wrap in a UL */ '%3$s',
	'depth'           => 2,
	'walker'          => $walker
); ?>

<div id="menu-container">
	<ul class="header-nav">
		<li class="home-link"><a href="/"><?php echo bloginfo('name'); ?></a></li>
		<div class="nav-menu">
			<?php wp_nav_menu( $headernav ); ?>
		</div>
	</ul>
	<a class="menu-toggle">
		<i id="menu-open" class="fa fa-bars" aria-hidden="true"></i>
		<i id="menu-close" class="fa fa-times" aria-hidden="true"></i>
	</a>
</div>