<!-- HOMEPAGE.PHP ———————————————————————————————————————— -->

<?php

// The Queries
$home_1 = new WP_Query( array( 'post_type' => 'any', 'tax_query' => array( array( 'taxonomy' => 'feature', 'field' => 'slug', 'terms'    => 'home-1' ), )));
$home_2 = new WP_Query( array( 'post_type' => 'any', 'tax_query' => array( array( 'taxonomy' => 'feature', 'field' => 'slug', 'terms'    => 'home-2' ), )));
$home_3 = new WP_Query( array( 'post_type' => 'any', 'tax_query' => array( array( 'taxonomy' => 'feature', 'field' => 'slug', 'terms'    => 'home-3' ), )));
$home_4 = new WP_Query( array( 'post_type' => 'any', 'tax_query' => array( array( 'taxonomy' => 'feature', 'field' => 'slug', 'terms'    => 'home-4' ), )));
$home_5 = new WP_Query( array( 'post_type' => 'any', 'tax_query' => array( array( 'taxonomy' => 'feature', 'field' => 'slug', 'terms'    => 'home-5' ), )));


while ( $home_1->have_posts() ) : $home_1->the_post();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
$term_list = wp_get_post_terms($post->ID, 'feature', array("fields" => "slugs"));
$alt_title = get_post_meta($post->ID, 'feature_title', true); ?>

<div class="feature primary-feature" id="<?php print_r($term_list[0]); ?>">
	<a class="container" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');">
		<div class="caption">
			<h2><?php if ( $alt_title =='' ) { the_title(); } else { echo $alt_title; } ?></h2>
			<span>Learn More &raquo;</span>
		</div>
	</a>
</div>

<?php endwhile; wp_reset_postdata(); ?>


<?php 
while ( $home_2->have_posts() ) : $home_2->the_post();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
$term_list = wp_get_post_terms($post->ID, 'feature', array("fields" => "slugs"));
$alt_title = get_post_meta($post->ID, 'feature_title', true); ?>

<div class="feature primary-feature" id="<?php print_r($term_list[0]); ?>">
	<a class="container" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');">
		<div class="caption">
			<h2><?php if ( $alt_title =='' ) { the_title(); } else { echo $alt_title; } ?></h2>
			<span>Learn More &raquo;</span>
		</div>
	</a>
</div>

<?php endwhile; wp_reset_postdata(); ?>


<?php 
while ( $home_3->have_posts() ) : $home_3->the_post();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
$term_list = wp_get_post_terms($post->ID, 'feature', array("fields" => "slugs"));
$alt_title = get_post_meta($post->ID, 'feature_title', true); ?>

<div class="feature secondary-feature" id="<?php print_r($term_list[0]); ?>">
	<a class="container" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');">
		<div class="caption">
			<h3><?php if ( $alt_title =='' ) { the_title(); } else { echo $alt_title; } ?> &raquo;</h3>

		</div>
	</a>
</div>

<?php endwhile; wp_reset_postdata(); ?>

<?php 
while ( $home_4->have_posts() ) : $home_4->the_post();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
$term_list = wp_get_post_terms($post->ID, 'feature', array("fields" => "slugs"));
$alt_title = get_post_meta($post->ID, 'feature_title', true); ?>

<div class="feature secondary-feature" id="<?php print_r($term_list[0]); ?>">
	<a class="container" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');">
		<div class="caption">
			<h3><?php if ( $alt_title =='' ) { the_title(); } else { echo $alt_title; } ?> &raquo;</h3>

		</div>
	</a>
</div>

<?php endwhile; wp_reset_postdata(); ?>

<?php 
while ( $home_5->have_posts() ) : $home_5->the_post();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' );
$term_list = wp_get_post_terms($post->ID, 'feature', array("fields" => "slugs"));
$alt_title = get_post_meta($post->ID, 'feature_title', true); ?>

<div class="feature secondary-feature" id="<?php print_r($term_list[0]); ?>">
	<a class="container" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $featured_image[0]; ?>');">
		<div class="caption">
			<h3><?php if ( $alt_title =='' ) { the_title(); } else { echo $alt_title; } ?> &raquo;</h3>

		</div>
	</a>
</div>

<?php endwhile; wp_reset_postdata(); ?>


<div id="mobile-directions">
	<p class="address">
		1500 Hathaway Pond Road</br>
		Hancock, NY 13783
	</p>
	<a href="https://goo.gl/maps/EXC5LZQscGx" class="button">
		<i class="fa fa-map-marker" aria-hidden="true"></i>
		<span>Get Directions</span>
	</a>
</div>
