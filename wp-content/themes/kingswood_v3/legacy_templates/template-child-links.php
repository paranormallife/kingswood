<?php /* TEMPLATE NAME: Child Links */ ?>

<?php get_header(); ?>

<!-- Index Template -->
<?php get_template_part( 'header-general' ); ?>

<?php get_sidebar(); ?>

<div id="page">

<?php get_template_part( 'loop' ); ?>

<section id="child_links">

  <?php
  // The Query
  $the_children = new WP_Query( array( 'post_type' => 'page', 'post_parent' => $post->ID, 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' ) );
  // The Loop
  while ( $the_children->have_posts() ) : $the_children->the_post(); ?>
  
  <article class="column">
  <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  <p>
	<?php // Get Content Summary Meta
    $the_summary = get_post_meta ($post->ID, 'summary', true);
    // Check for Summary Content
    if ($the_summary != '') { echo '<p>' . $the_summary . '</p>'; }
    // If there isn't any, use the excerpt instead.
    else { the_excerpt(); } ?> 
    <a href="<?php the_permalink(); ?>" title="Learn More">Read More &nbsp;&nbsp;&raquo;</a>
  </p>
  </article>
  
  <?php endwhile;
  // Reset Post Data
  wp_reset_postdata();
  ?>


</section>

</div>

<?php get_footer(); ?>