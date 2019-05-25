<!-- FOOTER.PHP ++++++++++++++++++++++ -->


<?php $footernav = array(
	'theme_location'  => 'footer_nav',
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
	'depth'           => 1,
	'walker'          => ''
); ?>

<section id="footer-nav">
	<ul><?php wp_nav_menu( $footernav ); ?></ul>
</section>


<section id="copyright">
  <div class="kingswood-logo"><img src="/wp-content/uploads/farmhouse-footer.png" /></div>
  <div class="copyright">
	  <p>&copy; <?php echo date('Y'); ?> Kingswood Campsite</p>
	  <p>Kingswood Campsite is owned and operated by the New York <a href="http://www.nyac.com/" target="_blank">Annual Conference of the United Methodist Church</a>.</p>
	  <p>We are one of two camps of the <a href="http://www.nyaccamps.org/" target="_blank">NYAC</a>!</p>
  </div>
  <div class="umc-logo"><a href="https://www.umc.org" target="_blank" title="United Methodist Church"><img src="/media/umc-logo.svg" alt="United Methodist Church" /></a></div>
</section>


<!-- This prevents the booking search from working. -->
<!--<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/scripts/nav.js"></script>

<?php /* Include this so the admin bar is visible. */ wp_footer(); ?>

</body>
</html> 