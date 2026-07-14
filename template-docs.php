<?php
get_header();

$path = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
$map  = docsclone_get_sidebar_map();
?>

<div class="docs-layout">

    <aside class="docs-sidebar">
        <?php foreach ( $map as $section => $groups ) : ?>
            <div class="sidebar-section">
                <button class="sidebar-heading js-toggle" type="button">
                    <span><?php echo esc_html( $section ); ?></span>
                    <span class="arrow">›</span>
                </button>
                <div class="sidebar-body">
                    <?php foreach ( $groups as $key => $value ) : ?>
                        <?php if ( is_array( $value ) ) : ?>
                            <?php if ( $key !== '_flat' ) : ?>
                                <div class="sidebar-subgroup">
                                    <button class="sidebar-subheading js-toggle" type="button">
                                        <span><?php echo esc_html( $key ); ?></span>
                                        <span class="arrow">›</span>
                                    </button>
                                    <div class="sidebar-subbody">
                                        <?php foreach ( $value as $slug => $title ) : ?>
                                            <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"
                                               class="sidebar-link <?php echo $path === $slug ? 'active' : ''; ?>">
                                                <?php echo esc_html( $title ); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <?php foreach ( $value as $slug => $title ) : ?>
                                    <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"
                                       class="sidebar-link <?php echo $path === $slug ? 'active' : ''; ?>">
                                        <?php echo esc_html( $title ); ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </aside>    

    <div class="docs-content">
        <?php
        $content_file = get_template_directory() . '/content/' . $path . '.php';
        $slugs = docsclone_get_all_slugs();
        $title = isset( $slugs[$path] ) ? $slugs[$path] : ucwords( str_replace( '-', ' ', $path ) );

        if ( file_exists( $content_file ) ) {
            include $content_file;
        } else {
            echo '<h1>' . esc_html( $title ) . '</h1>';
            echo '<p>This section covers <strong>' . esc_html( strtolower( $title ) ) . '</strong> in Fluent Forms — how to configure it, where to find it in the form builder, and how it affects your form\'s behavior on the frontend.</p>';
            echo '<p>Open the Form Builder, locate the relevant settings panel, and follow the on-screen options to apply this feature to your form. Save your changes and preview the form to confirm the result.</p>';
        }
        ?>
    </div>

</div>

<?php get_footer(); ?>