<?php get_header(); ?>

<!-- Index Template -->

<?php

	if ( is_home() or is_front_page() ) {
		get_template_part('homepage');
		// get_template_part('loop');
	}
	
	elseif ( is_page('campsites') ) {
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