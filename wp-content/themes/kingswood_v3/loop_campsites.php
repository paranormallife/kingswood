<!-- LOOP_CAMPSITES.PHP ~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<section id="campsites-grid">

	<?php

	$the_query = new WP_Query( array( 'post_type' => 'page', 'post_parent' => 35, 'order' => 'ASC', 'orderby' => 'name', 'posts_per_page' => -1 ) );
	while ( $the_query->have_posts() ) : $the_query->the_post();
	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, '' ); ?>

	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<h2><?php the_title(); ?> &raquo;</h2>
		<div class="campsite-image" style="background-image: url(<?php echo $featured_image[0]; ?>);">
			<span class="description">
				 <?php echo get_post_meta( $post->ID, 'summary', true ) ?>
			</span>
		</div>
	</a>

	<?php endwhile;
	wp_reset_postdata();

	?>

</section>