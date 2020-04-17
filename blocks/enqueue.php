<?php 

function mr_enqueue_block_editor_assets(){
    wp_register_script(
        'mr_blocks_bundle',
        plugins_url( '/blocks/dist/bundle.js', RECIPES_PLUGIN_URL ),
        [ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor', 'wp-api' ],
        filemtime( plugin_dir_path( RECIPES_PLUGIN_URL ) . '/blocks/dist/bundle.js' )
    );

    wp_enqueue_script( 'mr_blocks_bundle' );
}

function mr_enqueue_block_assets(){
    wp_register_style(
        'mr_blocks',
        plugins_url( '/blocks/dist/blocks-main.css', RECIPES_PLUGIN_URL )
    );

    wp_enqueue_style( 'mr_blocks' );
}

