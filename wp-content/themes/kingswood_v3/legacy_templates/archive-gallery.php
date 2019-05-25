<?php get_header(); ?>

<!-- ARCHIVE-GALLERY.PHP -->
<?php get_template_part( 'header-general' ); ?>

<?php get_sidebar(); ?>

<div id="page">

<section id="gallery_archive">

  <?php
  // The Query
  $the_children = new WP_Query( array( 'post_type' => 'gallery','posts_per_page' => -1, 'orderby' => 'name', 'order' => 'DESC' ) );
  // The Loop
  while ( $the_children->have_posts() ) : $the_children->the_post();
  // GET THE POST THUMBNAIL
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' ); ?>
  
  
  
  <article class="column">
  <div class="thumbnail" style="background-image: url('<?php echo $thumbnail[0]; ?>');">
  <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
  <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
  </a>
  </div>
  <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  </article>
  
  <?php endwhile;
  // Reset Post Data
  wp_reset_postdata();
  ?>


</section>

</div>

<!-- /ARCHIVE-GALLERY.PHP -->

<?php get_footer(); ?>