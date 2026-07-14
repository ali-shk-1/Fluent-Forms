<?php
/* Template Name: Docs Page */
get_header();

$slug = get_post_field( 'post_name' );
?>

<div class="docs-layout">

    <aside class="docs-sidebar">
        <div class="sidebar-group">
            <div class="sidebar-heading">Getting Started</div>
            <a href="<?php echo esc_url( home_url( '/getting-started/' ) ); ?>" class="sidebar-link <?php echo $slug === 'getting-started' ? 'active' : ''; ?>">Introduction</a>
            <a href="<?php echo esc_url( home_url( '/install-fluent-forms/' ) ); ?>" class="sidebar-link <?php echo $slug === 'install-fluent-forms' ? 'active' : ''; ?>">Install Fluent Forms</a>
            <a href="<?php echo esc_url( home_url( '/upgrade-to-pro-add-on/' ) ); ?>" class="sidebar-link <?php echo $slug === 'upgrade-to-pro-add-on' ? 'active' : ''; ?>">Upgrade to Pro</a>
            <a href="<?php echo esc_url( home_url( '/user-interface/' ) ); ?>" class="sidebar-link <?php echo $slug === 'user-interface' ? 'active' : ''; ?>">User Interface</a>
            <a href="<?php echo esc_url( home_url( '/glossary/' ) ); ?>" class="sidebar-link <?php echo $slug === 'glossary' ? 'active' : ''; ?>">Glossary</a>
        </div>

        <div class="sidebar-group">
            <div class="sidebar-heading-collapsed">Creating Forms</div>
        </div>
        <div class="sidebar-group">
            <div class="sidebar-heading-collapsed">Form Fields</div>
        </div>
        <div class="sidebar-group">
            <div class="sidebar-heading-collapsed">Configuring Forms</div>
        </div>
        <div class="sidebar-group">
            <div class="sidebar-heading-collapsed">Design &amp; Styling</div>
        </div>
        <div class="sidebar-group">
            <div class="sidebar-heading-collapsed">Notifications &amp; Confirmations</div>
        </div>
    </aside>

    <div class="docs-content">
        <?php
        if ( $slug === 'getting-started' ) {
            include get_template_directory() . '/content/getting-started.php';
        } elseif ( $slug === 'install-fluent-forms' ) {
            include get_template_directory() . '/content/install-fluent-forms.php';
        } elseif ( $slug === 'upgrade-to-pro-add-on' ) {
            include get_template_directory() . '/content/upgrade-to-pro.php';
        } elseif ( $slug === 'user-interface' ) {
            include get_template_directory() . '/content/user-interface.php';
        } elseif ( $slug === 'glossary' ) {
            include get_template_directory() . '/content/glossary.php';
        }
        ?>
    </div>

</div>

<?php get_footer(); ?>