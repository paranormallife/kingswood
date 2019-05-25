jQuery(document).ready(function ($) {
	$('.menu-toggle').click(function(){
	  $('.nav-menu').toggleClass('open'); /* Open Menu */
	  $('.menu-toggle').toggleClass('active'); /* Toggle Icon */
	  $('.header-nav').toggleClass('active'); /* Toggle Icon */
	});
});
