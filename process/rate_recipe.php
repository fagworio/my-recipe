<?php 

function mr_rate_recipe() {
    global $wpdb;
    $output         =   [ 'status'   =>  1 ];
    $post_ID        =   absint( $_POST['rid'] );
    $rating         =   round( $_POST['rating'], 1 );
    $user_IP        =   $_SERVER['REMOTE_ADDR'];

    $rating_count   =   $wpdb->get_var(
        "SELECT COUNT(*) FROM `" . $wpdb->prefix .  "myrecipes_ratings`
        WHERE recipe_id='" . $post_ID . "' AND user_ip='" . $user_IP ."'"
    );

    if( $rating_count > 0 ) {
        wp_send_json( $output ); 
    }
    
      // Insert Rating into database
      $wpdb->insert(
        $wpdb->prefix . 'myrecipes_ratings',
        [
            'recipe_id' =>  $post_ID,
            'rating'    =>  $rating,
            'user_ip'   =>  $user_IP
        ],
        [ '%d', '%f', '%s' ]
    );

    // Update Recipe Metadata
    $recipe_data    =   get_post_meta( $post_ID, 'myrecipe_data', true );
    $recipe_data['rating_count']++;
    $recipe_data['rating']   =  round($wpdb->get_var(
        "SELECT AVG(`rating`) FROM `" . $wpdb->prefix .  "myrecipes_ratings`
        WHERE recipe_id='" . $post_ID . "'"
    ), 1);

    update_post_meta( $post_ID, 'myrecipe_data', $recipe_data);
    
    do_action('my_recipe_rated', [
        'post_id' =>  $post_ID,
        'rating'    =>  $rating,
        'user_IP'   =>  $user_IP
    ]);

    $output         =   [ 'status'   =>  2 ];
    
    wp_send_json( $output );
}