<?php get_header(); ?>

<!-- Index Template -->

<?php

	if ( is_home() or is_front_page() ) {
		echo do_shortcode('[bookingsearch]');
		get_template_part('homepage');
		// get_template_part('loop');
	}
	
	elseif ( is_page('campsites') ) {
		echo do_shortcode('[bookingsearch searchresults="https://kingswoodcampsite.org/availability"]');
		get_template_part('loop');
		get_template_part('loop_campsites');
	}
	
	elseif ( is_page('map') ) {
		get_template_part('map');
	} 
	
	elseif ( is_search() ) {
		get_template_part('loop_search');
	}

	elseif ( is_page('availability') ) {
		echo do_shortcode('[bookingsearch]');
		echo '<div class="booking_search_ajax_container">'.do_shortcode('[bookingsearchresults]').'</div>';
		get_template_part('loop');
	}
	
	elseif ( is_page('blog') ) {
		get_template_part('loop-blog');
	}
	
	else {
		get_template_part('loop');
	}

?>


<?php get_footer(); ?>