<ul>
	
    <li id="mission">
      <a href="<?php bloginfo('wpurl'); ?>/mission">Mission</a>
      <div class="navhover mission">
		<?php
        // The Query
        $the_mission = new WP_Query( array( 'post_type' => 'page', 'name' => 'mission' ) );
        // The Loop
        while ( $the_mission->have_posts() ) : $the_mission->the_post(); ?>
        <article>
        <?php the_content(); ?>
        </article>
        <?php endwhile;
        // Reset Post Data
        wp_reset_postdata();
        ?>
      </div>
    </li>
	
    <li id="news">
      <a href="<?php bloginfo('wpurl'); ?>/news">News</a>
      <div class="navhover news">
          <?php
          // The Query
          $the_news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) );
          // The Loop
          while ( $the_news->have_posts() ) : $the_news->the_post(); ?>
          <article>
          <h2><?php the_title(); ?></h2>
          <?php $the_summary = get_post_meta ($post->ID, 'summary', true); echo $the_summary; ?>
          </article>
          <?php endwhile;
          // Reset Post Data
          wp_reset_postdata();
          ?>
        </div>
    </li>
	
    <li id="reserve"><a href="<?php bloginfo('wpurl'); ?>/reserve-now">Reservations</a></li>
</ul>

<div id="search"><?php get_search_form(); ?></div>