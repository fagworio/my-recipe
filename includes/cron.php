<?php 

function mr_daily_generate_recipe(){
	set_transient( 'mr_daily_recipe', 
	mr_get_random_recipe(), 
	DAY_IN_SECONDS );
}