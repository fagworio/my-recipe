<?php

function mr_enqueue_scripts() {
    wp_register_style( 'mr_rateit', plugins_url( '/assets/rateit/rateit.css', RECIPES_PLUGIN_URL ) );
    wp_enqueue_style( 'mr_rateit' );

    wp_register_script(
        'mr_rateit', 
        plugins_url( '/assets/rateit/jquery.rateit.min.js', RECIPES_PLUGIN_URL ),
        ['jquery'],
        '1.0.0',
        true
    );

    wp_register_script(
        'mr_main', 
        plugins_url( '/assets/js/main.js', RECIPES_PLUGIN_URL ), ['jquery'], '1.0.0', true );
    
    wp_localize_script( 'mr_main', 'recipe_obj', [
        'ajax_url'      =>  admin_url( 'admin-ajax.php' )
    ] );
    

    wp_enqueue_script( 'mr_rateit' );
    wp_enqueue_script( 'mr_main' );
}