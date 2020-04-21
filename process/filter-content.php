<?php

function mr_filter_recipe_content( $content ){
    if( !is_singular('myrecipe') ) {
        return $content;
    }

    global  $post, $wpdb;
    
    $recipe_data        =   get_post_meta( $post->ID, 'myrecipe_data', true );
    $my_recipe_html     =   file_get_contents( 'my-recipe-template.php', true );
    $my_recipe_html     =   str_replace( 'RATE_I18N', __('Rating', 'myrps'), $my_recipe_html );
    $my_recipe_html     =   str_replace( 'RECIPE_ID', $post->ID, $my_recipe_html );
    $my_recipe_html     =   str_replace( 'RECIPE_RATING', $recipe_data['rating'], $my_recipe_html );

    $user_IP        =   $_SERVER["REMOTE_ADDR"];

    $rating_count   =   $wpdb->get_var( $wpdb->prepare(
        "SELECT COUNT(*) FROM `" . $wpdb->prefix . "myrecipes_ratings`
        WHERE recipe_id=%d AND user_ip=%s", 
        $post->ID, $user_IP ));

    if( $rating_count > 0 ) {
        $my_recipe_html     =   str_replace( 
            'READONLY_PLACEHOLDER', 'data-rateit-READONLY="true"', $my_recipe_html 
            
        );
    } else {
        $recipe_html    =   str_replace( 'READONLY_PLACEHOLDER', '', $my_recipe_html );
      
    }
       
    return $my_recipe_html .  $content;

}


