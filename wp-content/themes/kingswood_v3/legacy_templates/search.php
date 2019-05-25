<?php get_header(); ?>

<!-- SEARCH.PHP -->
<?php get_template_part( 'header-general' ); ?>

<?php get_sidebar(); ?>

<div id="page" class="search">


<section id="search"><?php get_search_form(); ?></section>

<section id="search_results">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<?php // Get Content Summary Meta
$the_summary = get_post_meta ($post->ID, 'summary', true);
// Check for Summary Content
if ($the_summary != '') { echo $the_summary; }
// If there isn't any, use the excerpt instead.
else { the_excerpt(); } ?> 

<a href="<?php the_permalink(); ?>" title="Read: <?php the_title(); ?>">Read more &rarr;</a>
</article>

<?php endwhile; else: ?>
<h2>Try again.</h2>
<p><?php _e('We couldn\'t find the content you specified.  Please try another search.'); ?></p>
<?php endif; ?>

</section>


</div>

<?php get_footer(); ?>