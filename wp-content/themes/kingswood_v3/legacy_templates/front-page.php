<?php get_header(); ?>

<!-- FRONT-PAGE.PHP -->
<?php get_template_part( 'header-frontpage' ); ?>

<?php get_sidebar(); ?>

<div id="page">


<?php

// The Query
$the_query = new WP_Query( array( 'post_type' => 'any', 'posts_per_page' => 3, 'feature' => 'frontpage' ) );
// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post();
// GET THE POST THUMBNAIL
$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' ); ?>
  
  <article class="column feature">
  <div class="thumbnail" style="background-image: url('<?php echo $thumbnail[0]; ?>');">
  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
  <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
  </a>
  </div>
  <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  <p>
	<?php // Get Content Summary Meta
    $the_summary = get_post_meta ($post->ID, 'summary', true);
    // Check for Summary Content
    if ($the_summary != '') { echo $the_summary; }
    // If there isn't any, use the excerpt instead.
    else { the_excerpt(); } ?> 
    <a href="<?php the_permalink(); ?>" title="Learn More">&nbsp;&nbsp;&raquo;</a>
  </p>
  </article>

<?php endwhile;

// Reset Post Data
wp_reset_postdata();

?>


</div>

<!-- /FRONT-PAGE.PHP -->

<?php get_footer(); ?>