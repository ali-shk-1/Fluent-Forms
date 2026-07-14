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
        'homeUrl'  => home_url( '/' ),
        'gsUrl'    => home_url( '/getting-started/' ),
        'allSlugs' => array_keys( docsclone_get_all_slugs() ),
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

// Load sidebar map once
function docsclone_get_sidebar_map() {
    return include get_template_directory() . '/sidebar-data.php';
}

// Flatten map into slug => title for quick lookup
function docsclone_get_all_slugs() {
    $map = docsclone_get_sidebar_map();
    $flat = array();
    foreach ( $map as $section => $groups ) {
        foreach ( $groups as $key => $value ) {
            if ( is_array( $value ) ) {
                foreach ( $value as $slug => $title ) {
                    $flat[$slug] = $title;
                }
            } else {
                $flat[$key] = $value;
            }
        }
    }
    return $flat;
}

// Intercept front-end requests matching our slugs
function docsclone_template_redirect() {
    $slugs = docsclone_get_all_slugs();
    $path = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

    if ( isset( $slugs[$path] ) ) {
        include get_template_directory() . '/template-docs.php';
        exit;
    }
}
add_action( 'template_redirect', 'docsclone_template_redirect' );