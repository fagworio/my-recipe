<?php

function my_recipe_init() {
    $labels = array(
        'name'                  => _x( 'MyRecipes', 'Post type general name', 'myrps' ),
        'singular_name'         => _x( 'MyRecipe', 'Post type singular name', 'myrps' ),
        'menu_name'             => _x( 'MyRecipes', 'Admin Menu text', 'myrps' ),
        'name_admin_bar'        => _x( 'MyRecipe', 'Add New on Toolbar', 'myrps' ),
        'add_new'               => __( 'Add New', 'myrps' ),
        'add_new_item'          => __( 'Add New MyRecipe', 'myrps' ),
        'new_item'              => __( 'New MyRecipe', 'myrps' ),
        'edit_item'             => __( 'Edit MyRecipe', 'myrps' ),
        'view_item'             => __( 'View MyRecipe', 'myrps' ),
        'all_items'             => __( 'All MyRecipes', 'myrps' ),
        'search_items'          => __( 'Search Recipes', 'myrps' ),
        'parent_item_colon'     => __( 'Parent Recipes:', 'myrps' ),
        'not_found'             => __( 'No Recipes found.', 'myrps' ),
        'not_found_in_trash'    => __( 'No Recipes found in Trash.', 'myrps' ),
        'featured_image'        => _x( 'Recipe Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'myrps' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'myrps' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'myrps' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'myrps' ),
        'archives'              => _x( 'Recipe archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'myrps' ),
        'insert_into_item'      => _x( 'Insert into Recipe', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'myrps' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'myrps' ),
        'filter_items_list'     => _x( 'Filter Recipes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'myrps' ),
        'items_list_navigation' => _x( 'MyRecipes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'myrps' ),
        'items_list'            => _x( 'MyRecipes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'myrps' ),
    );
 
    $args = array(
        'labels'                =>  $labels,
        'description'           =>  __('MyRecipes post type.', 'myrps'),
        'show_in_rest'          =>  true,
        'public'                =>  true,
        'publicly_queryable'    =>  true,
        'show_ui'               =>  true,
        'show_in_menu'          =>  true,
        'query_var'             =>  true,
        'rewrite'               =>  array( 'slug' => 'myrecipe' ),
        'capability_type'       =>  'post',
        'has_archive'           =>  true,
        'hierarchical'          =>  false,
        'menu_position'         =>  20,
        'taxonomies'            =>  [ 'category', 'post_tag' ],
        'supports'              =>  [ 'title', 'editor', 'author', 'thumbnail' ]
    );
 
    register_post_type( 'myrecipe', $args );
}