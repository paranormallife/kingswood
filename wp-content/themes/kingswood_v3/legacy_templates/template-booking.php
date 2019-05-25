<?php /* Template Name: Booking Calendar */ ?>

<?php get_header(); ?>

<!-- template-booking.php -->
<?php get_template_part( 'header-general' ); ?>

<?php get_sidebar(); ?>

<div id="page">

	<section id="booking-instructions">
		<h3>To reserve a campsite:</h3>
		<ol>
			<li> Select the first night of your stay on the calendar. </li>
			<li> Select the last night of your stay. (Duration of stay will highlight and the amount will display in the lower left of your screen.)</li>
			<li> To clear your selection, select an unreserved day on the calendar. </li>
			<li> Fill out your reservation information.</li>
			<li> Select "Reserve". You then be prompted to make your payment. </li>
		</ol>
		<p>Questions? Please call Holly Moore: 845-702-5766</p>
	</section>

	<?php get_template_part( 'loop' ); ?>


</div>

<?php get_footer(); ?>