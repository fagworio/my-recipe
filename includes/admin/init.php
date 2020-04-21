<?php

function mr_admin_init() {
    include( 'columns.php' );
    add_filter( 'manage_myrecipe_posts_columns', 'mr_add_new_recipe_columns' );
    add_action( 'manage_myrecipe_posts_custom_column', 'mr_manage_recipe_columns', 10, 2 );
}