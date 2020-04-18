<?php

/*
* Plugin Name: MyRecipes
* Plugin URI: https://github.com/fagworio
* Description: A simple wordpress plugin that allows users to create recipes and rate those recipes
* Version: 1.0
* Author: João Fagner
* Author URI: https://www.unicorniohater.com.br/author/root/
* Text Domain: myrps
*/
 
if ( !function_exists( 'add_action' ) ) {
    echo "Hi there! I´m just a plugin, not much I can do when called directly.";
    exit;
}

// Setup
define('RECIPES_PLUGIN_URL', __FILE__);

// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'process/save-post.php' );
include( 'process/filter-content.php' );
include( 'includes/front/enqueue.php' );
include( 'process/rate_recipe.php' );
include( 'includes/admin/init.php' );
include( 'blocks/enqueue.php' );
include( dirname(RECIPES_PLUGIN_URL) . '/includes/widgets.php' );
include( 'includes/widgets/daily-recipe.php' );
include( 'includes/cron.php' );
include( 'includes/deactivate.php' );
include( 'includes/utility.php' );


// Hooks
register_activation_hook( __FILE__, 'mr_activate_plugin' );
register_deactivation_hook( __FILE__, 'mr_deactivate_plugin' );
add_action( 'init', 'my_recipe_init' );
add_action( 'save_post_myrecipe', 'mr_save_post_admin', 10, 3 );
add_action( 'the_content', 'mr_filter_recipe_content', 10, 3 );
add_action( 'wp_enqueue_scripts', 'mr_enqueue_scripts', 100 );
add_action( 'wp_ajax_mr_rate_recipe', 'mr_rate_recipe' );
add_action( 'wp_ajax_nopriv_mr_rate_recipe', 'mr_rate_recipe' );
add_action( 'admin_init', 'mr_admin_init' );
add_action( 'enqueue_block_editor_assets', 'mr_enqueue_block_editor_assets' );
add_action( 'enqueue_block_assets', 'mr_enqueue_block_assets' );
add_action( 'widgets_init', 'mr_widgets_init' );
add_action( 'mr_daily_recipe_hook', 'mr_daily_generate_recipe');

// Shortcodes

