<!-- LOOP_SEARCH.PHP ——————————————————————————————————— -->

<section class="post-page search-results">
	
	<p class="search-heading">
		Displaying search results for "<?php the_search_query(); ?>." <a href="#search">Search again?</a>
	</p>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php the_excerpt(); ?>
		</article>

	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
	
</section>