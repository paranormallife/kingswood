<?php /* TEMPLATE NAME: Child Content */ ?>

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
  
  <article>
  <h2><?php the_title(); ?></h2>
  <p><?php the_content(); ?></p>
  </article>
  
  <?php endwhile;
  // Reset Post Data
  wp_reset_postdata();
  ?>


</section>

</div>

<?php get_footer(); ?>