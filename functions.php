<?php

// Enqueue theme stylesheet + JS
function docsclone_enqueue_assets() {
    wp_enqueue_style( 'docsclone-style', get_stylesheet_uri(), array(), '1.0' );

    wp_enqueue_script(
        'docsclone-main',
        get_template_directory_uri() . '/main.js',
        array(),
        '1.0',
        true
    );

    wp_localize_script( 'docsclone-main', 'docsCloneData', array(
        'homeUrl' => home_url( '/' ),
        'gsUrl'   => home_url( '/getting-started/' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'docsclone_enqueue_assets' );

// Basic theme support
function docsclone_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'menus' );
}
add_action( 'after_setup_theme', 'docsclone_setup' );

// Register a menu location
function docsclone_register_menus() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'docsclone' ),
    ) );
}
add_action( 'init', 'docsclone_register_menus' );