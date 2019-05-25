<?php

// The Query
$the_query = new WP_Query( array( 'post_type' => 'page', 'order' => 'ASC' ) );

// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<div class="article">
<h2><?php the_title(); ?></h2>
<p><?php the_content(); ?></p>
</div>

<?php endwhile;

// Reset Post Data
wp_reset_postdata();

?>