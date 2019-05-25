<div id="menu_open">

<div id="mobilesearch"><?php get_search_form(); ?></div>

<div id="menu_close_button">
  <a href="#">X</a>
</div>

<div id="menu_open_button">
  <a href="#menu_open">Menu &#9776;</a>
</div>

<nav id="mainmenu">
<?php
$nav = array( 'menu' => 'nav1' ); 
wp_nav_menu ( $nav );
?>
</nav>

</div>