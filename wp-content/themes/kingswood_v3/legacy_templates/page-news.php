<?php get_header(); ?>

<!-- Index Template -->
<?php get_template_part( 'header-general' ); ?>

<?php get_sidebar(); ?>

<div id="page" class="archive">


<?php
// The Query
$the_query = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC', 'posts_per_page' => -1 ) );
// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<article class="column feature">
<h2><a href="<?php the_permalink(); ?>" title="Read More"><?php the_title(); ?></a></h2>
<p>
  <?php // Get Content Summary Meta
  $the_summary = get_post_meta ($post->ID, 'summary', true);
  // Check for Summary Content
  if ($the_summary != '') { echo $the_summary; }
  // If there isn't any, use the excerpt instead.
  else { the_excerpt(); } ?> 
</p>
</article>

<?php endwhile;
// Reset Post Data
wp_reset_postdata();
?>

</div>

<?php get_footer(); ?>