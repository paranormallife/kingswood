<!-- BOOKING-FORM.PHP ————————————————————————————————————— -->

<section class="post-page" id="booking-form">

	<h2>Reserve <?php the_title(); ?></h2>

	<?php

		$resource = get_post_meta( $post->ID, 'resource_id', true );
	
		echo do_shortcode('[booking type=' . $resource . ' form_type="equipped-campsite" nummonths=3 options="
		{select-day condition="weekday" for="0" value="7,14,21"}
		{select-day condition="weekday" for="1" value="7,14,21"}
		{select-day condition="weekday" for="2" value="7,14,21"}
		{select-day condition="weekday" for="3" value="7,14,21"}
		{select-day condition="weekday" for="4" value="7,14,21"}
		{select-day condition="weekday" for="5" value="7,14,21"}
		{select-day condition="weekday" for="6" value="999"}
		" startmonth="2017-06"]');

	?>

</section>