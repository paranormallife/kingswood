<?php /* TEMPLATE NAME: Child Gallery */ ?>

<?php get_header(); ?>

<!-- Index Template -->
<?php get_template_part( 'header-general' ); ?>

<?php get_sidebar(); ?>

<div id="page">

<?php get_template_part( 'loop' ); ?>

<section id="child_gallery">

  <?php
  // The Query
  $the_children = new WP_Query( array( 'post_type' => 'page', 'post_parent' => $post->ID, 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC' ) );
  // The Loop
  while ( $the_children->have_posts() ) : $the_children->the_post();
  // GET THE POST THUMBNAIL
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' ); ?>
  
  <article class="column">
  <?php if ( has_post_thumbnail() ) { ?>
    <div class="thumbnail" style="background-image: url('<?php echo $thumbnail[0]; ?>');">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    
    <?php // Get Content Summary Meta
    $the_summary = get_post_meta ($post->ID, 'summary', true);
    echo '<span class="summary">' . $the_summary . '</span>';
	?>
    
    <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
    </a>
    </div>
  <?php } ?>
  <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  </article>
  
  <?php endwhile;
  // Reset Post Data
  wp_reset_postdata();
  ?>


</section>

</div>

<?php get_footer(); ?>