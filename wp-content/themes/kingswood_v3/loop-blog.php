<section class="post-page">

	<div id="blog-list">

		<?php $the_query = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC', 'posts_per_page' => -1 ) );
		while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<article>
				<h2>
					<span class="date"><?php the_date(); ?>: </span>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h2>
				<p><?php the_content(); ?></p>
			</article>

		<?php endwhile; wp_reset_postdata(); ?>
	
	</div>
	
	<div id="blog-archive">
		
		<h2>Archive:</h2>
		
		<ul>
		
			<?php $the_query = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC', 'posts_per_page' => -1 ) );
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</li>

			<?php endwhile; wp_reset_postdata(); ?>
		
		</ul>
		
	</div>

</section>