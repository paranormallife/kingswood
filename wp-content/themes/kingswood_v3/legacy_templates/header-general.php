<header>

  <div id="header_menu" class="header_menu_container">
  <h1><a href="<?php bloginfo('wpurl'); ?>" title="Home Page"><?php bloginfo('name'); ?></a></h1>
    <nav>
    <?php get_template_part('nav-header') ;?>
    </nav>
  </div>

  <div id="header_image_container">
    <?php
    // The Query
    $the_header_image = new WP_Query( array( 'post_type' => 'headers', 'image_category' => 'general', 'orderby' => 'rand', 'posts_per_page' => 1 ));
    // The Loop
    while ( $the_header_image->have_posts() ) : $the_header_image->the_post();
    // GET THE POST THUMBNAIL
  $bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail', false, '' ); ?>
      <div id="header_image" style="background-image: url('<?php echo $bg_image[0]; ?>');">
        <img src="<?php echo $bg_image[0]; ?>" />
      </div>
    <?php endwhile;
    // Reset Post Data
    wp_reset_postdata();
    ?>
  </div>
  
<div id="breadcrumbs" class="header_menu_container">
<div class="breadcrumbs"><?php get_template_part('breadcrumbs'); ?></div>
</div>  
  
</header>
