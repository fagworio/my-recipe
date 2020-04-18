<?php

function mr_activate_plugin(){
	if( version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ){
		wp_die( __('You must update Wordpress to use this plugin.', 'myrps' ) );
	}

	global $wpdb;
	$createSQL      =   "
		CREATE TABLE `". $wpdb->prefix ."myrecipes_ratings` (
			`ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`recipe_id` BIGINT(20) UNSIGNED NOT NULL,
			`rating` FLOAT(3,2) UNSIGNED NOT NULL,
			`user_ip` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
			PRIMARY KEY (`ID`) USING BTREE
		)
		COLLATE='utf8mb4_general_ci'
		ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";"
		;

		require( ABSPATH . "/wp-admin/includes/upgrade.php");
		dbDelta( $createSQL );

		wp_schedule_event( time(), 'daily', 'mr_daily_recipe_hook');
} 