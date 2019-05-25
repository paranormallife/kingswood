<!-- MAP.PHP ————————————————————————————————————————– -->


<?php if ( have_posts() ) : while ( have_posts() ) : the_post();	
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' ); ?>

<section class="post-page">
		<article>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>        
		</article>
</section>
<section class="full-width">
	<div id="map" style="background-image: url(<?php echo $featured_image[0]; ?>);">
	
		<?php get_template_part('map-markers'); ?>
	
	</div>
</section>
	
	<?php endwhile; endif; ?>


<?php /*

<a href="#" class="map-marker" id="deertrails">
			<span>
				<div class="image">
					<img src="/wp-content/uploads/2014/04/874_dt-tent.jpg" alt="Deertrails" />
				</div>
				<div class="description">
					For the camper who needs to be close to hot running water, a flushing toilet, and a shower, this is the site for you.
				</div>
			</span>
		</a>
		
*/ ?>