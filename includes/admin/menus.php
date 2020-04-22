<?php

function mr_admin_menu() {
    add_menu_page(
        __( 'MyRecipe Options', 'myrps' ), 
        __( 'MyRecipe Options', 'myrps' ),
        'edit_theme_options', //WP capabilities
        'my_recipe_options', //URL
        'mr_plugin_opts_page'
    );
}