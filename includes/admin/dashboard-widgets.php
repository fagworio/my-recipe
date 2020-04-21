<?php

function mr_dashboard_widget() {
	wp_add_dashboard_widget( 
		'mr_latest_recipe_widget',
		__('Latest Recipe Ratings', 'myrps'), 
		'mr_latest_recipe_widget_display'
	);
}

function mr_latest_recipe_widget_display() {
	global $wpdb;
	
	$latest_ratings    =   $wpdb->get_results(
		"SELECT * FROM `" . $wpdb->prefix . "myrecipes_ratings`" . "ORDER BY ID DESC LIMIT 5"
	);
	echo '<ul>';
	
	if ( empty($latest_ratings) ) {
		?>
		<li><?php _e('No ratings yet.', 'myrps'); ?></li>
	 <?php
	 
	 } else {
		foreach ($latest_ratings as $rating) {
			$title 		= 	get_the_title( $rating->recipe_id );
			$permalink 	= 	get_the_permalink( $rating->recipe_id );
		?>
			<li>
				<a href="<?php echo $permalink; ?>">
					<?php echo $title; _e('received a rating of ', 'myrps');  echo $rating->rating; ?>
				</a>
			</li>
		<?php
		}
	}

	echo '</ul>';
}