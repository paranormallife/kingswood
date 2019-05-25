<?php

if ( is_home() ) {

	$the_query = new WP_Query( array( 'post_type' => 'headers', 'order' => 'ASC', 'orderby' => 'rand', 'posts_per_page' => 1, 'tax_query' => array( array( 'taxonomy' => 'image_category', 'field' => 'slug', 'terms' => 'home', ), ), ) );
	
	while ( $the_query->have_posts() ) : $the_query->the_post();
	$header_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
	
		echo '<div id="header-image" style="background-image: url(' . $header_image[0] . ');">&nbsp;</div>';

	endwhile;
	wp_reset_postdata();

} elseif ( is_page('campsites') ) {
	// Get the featured image for the current post
	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
	// Pull a random image from the appropriate Image Category
	$the_query = new WP_Query( array( 'post_type' => 'headers', 'order' => 'ASC', 'orderby' => 'rand', 'posts_per_page' => 1, 'tax_query' => array( array( 'taxonomy' => 'image_category', 'field' => 'slug', 'terms' => 'campsites', ), ), ) );
		// The query
		while ( $the_query->have_posts() ) : $the_query->the_post();
		$category_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
		
			echo '<div id="header-image" style="background-image: url(';
				// Display the featured image if there is one.
				if ( $featured_image !='' ) { echo $featured_image[0]; }
				// Otherwise, display a category image.
				else { echo $category_image[0]; }
				
			echo ');">&nbsp;</div>';
		
		endwhile;
		wp_reset_postdata();


} elseif ( is_page('map') ) {
	// Pull a random image from the appropriate Image Category
	$the_query = new WP_Query( array( 'post_type' => 'headers', 'order' => 'ASC', 'orderby' => 'rand', 'posts_per_page' => 1, 'tax_query' => array( array( 'taxonomy' => 'image_category', 'field' => 'slug', 'terms' => 'campsites', ), ), ) );
		// The query
		while ( $the_query->have_posts() ) : $the_query->the_post();
		$category_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
		
			echo '<div id="header-image" style="background-image: url(';
			echo $category_image[0];
			echo ');">&nbsp;</div>';
		
		endwhile;
		wp_reset_postdata();


} else {
	// Get the featured image for the current post
	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
	// Pull a random image from the appropriate Image Category
	$the_query = new WP_Query( array( 'post_type' => 'headers', 'order' => 'ASC', 'orderby' => 'rand', 'posts_per_page' => 1, 'tax_query' => array( array( 'taxonomy' => 'image_category', 'field' => 'slug', 'terms' => 'general', ), ), ) );
		// The query
		while ( $the_query->have_posts() ) : $the_query->the_post();
		$category_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
		
			echo '<div id="header-image" style="background-image: url(';
				// Display the featured image if there is one.
				if ( $featured_image !='' ) { echo $featured_image[0]; }
				// Otherwise, display a category image.
				else { echo $category_image[0]; }
				
			echo ');">&nbsp;</div>';
		
		endwhile;
		wp_reset_postdata();
}
?>