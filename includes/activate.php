<?php

function mr_activate_plugin(){
	// 5.8 < 5.0
	if( version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ){
		wp_die( __( "You must update WordPress to use this plugin.", 'myrps' ) );
	}

	global $wpdb;
	$createSQL      =   "
	CREATE TABLE `" . $wpdb->prefix . "myrecipes_ratings` (
		`ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		`recipe_id` BIGINT(20) UNSIGNED NOT NULL,
		`rating` FLOAT(3,2) UNSIGNED NOT NULL,
		`user_ip` VARCHAR(50) NOT NULL,
		PRIMARY KEY (`ID`)
	) ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";";


	require( ABSPATH . "/wp-admin/includes/upgrade.php" );
	dbDelta( $createSQL );
	
	wp_schedule_event( time(), 'daily', 'mr_daily_recipe_hook' );

	
	$my_recipe_options  =   get_option( 'my_opts' );

	if( !$my_recipe_options ){
		var_dump(	$my_recipe_options  );
		$opts                                   =   [
			'rating_login_required'             =>  1,
			'recipe_submission_login_required'  =>  1
		];

		add_option( 'my_opts', $opts );
	}


}