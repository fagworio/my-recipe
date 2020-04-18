<?php 

function mr_deactivate_plugin(){
    wp_clear_scheduled_hook( 'mr_daily_recipe_hook' );
}