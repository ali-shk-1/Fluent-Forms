<?php
get_header();

$path = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
$map  = docsclone_get_sidebar_map();
?>

<div class="docs-layout">

    <aside class="docs-sidebar">
        <?php foreach ( $map as $section => $groups ) : ?>
            <div class="sidebar-section">
                <button class="sidebar-heading js-toggle" type="button"><?php echo esc_html( $section ); ?></button>
                <div class="sidebar-body">
                    <?php foreach ( $groups as $key => $value ) : ?>
                        <?php if ( is_array( $value ) ) : ?>
                            <?php if ( $key !== '_flat' ) : ?>
                                <div class="sidebar-subheading"><?php echo esc_html( $key ); ?></div>
                            <?php endif; ?>
                            <?php foreach ( $value as $slug => $title ) : ?>
                                <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"
                                   class="sidebar-link <?php echo $path === $slug ? 'active' : ''; ?>">
                                    <?php echo esc_html( $title ); ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </aside>    

    <div class="docs-content">
        <?php
        $content_file = get_template_directory() . '/content/' . $path . '.php';
        if ( file_exists( $content_file ) ) {
            include $content_file;
        } else {
            echo '<h1>' . esc_html( $map_title ?? ucwords( str_replace( '-', ' ', $path ) ) ) . '</h1>';
            echo '<p>Content for this page is coming soon.</p>';
        }
        ?>
    </div>

</div>

<?php get_footer(); ?>