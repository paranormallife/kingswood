<!-- MAP-MARKERS.PHP ~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


	<?php

	$the_query = new WP_Query( array( 'post_type' => 'page', 'post_parent' => 35, 'order' => 'ASC', 'orderby' => 'name', 'posts_per_page' => -1 ) );
	while ( $the_query->have_posts() ) : $the_query->the_post();
	$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, '' );
	$description = get_post_meta($post->ID, 'feature_title', true); ?>

		<a href="<?php the_permalink(); ?>" class="map-marker" id="<?php echo get_post( $post )->post_name; ?>">
			<span>
				<?php if ( $featured_image !='' ) { ?>
					<div class="image">
						<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" />
					</div>
				<?php } ?>
				<div class="description">
					<?php echo $description; ?>
				</div>
			</span>
		</a>

	<?php endwhile;
	wp_reset_postdata();

	?>
