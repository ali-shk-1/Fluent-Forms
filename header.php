<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-navbar">
    <div class="navbar-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
            <span class="logo-icon">☰</span> fluent<strong>Forms</strong>
        </a>

        <div class="navbar-search">
            <span>🔍 Search</span>
            <span class="kbd">Ctrl K</span>
        </div>

        <nav class="navbar-links">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-active">Home</a>
            <a href="<?php echo esc_url( home_url( '/getting-started/' ) ); ?>" class="nav-getting-started">Get Started</a>
            <a href="#">Website ↗</a>
            <a href="#">Changelog</a>
            <span class="toggle">🌙</span>
        </nav>
    </div>
</header>

<main class="site-main">