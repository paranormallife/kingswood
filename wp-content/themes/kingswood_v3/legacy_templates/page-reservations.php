<?php get_header(); ?>

<!-- Index Template -->
<?php get_template_part( 'header-general' ); ?>

<?php get_sidebar(); ?>

<div id="page">

<?php get_template_part( 'loop' ); ?>

</div>

<?php get_footer(); ?>