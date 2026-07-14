<?php get_header(); ?>

<div class="cards-grid">

    <a href="<?php echo esc_url( home_url( '/getting-started/' ) ); ?>" class="card card-active">
        <div class="card-icon">📘</div>
        <h3>Getting Started</h3>
        <p>Installation, setup, and a tour of the Fluent Forms interface.</p>
        <span class="card-link">Get Started →</span>
    </a>

    <a href="#" class="card">
        <div class="card-icon">📝</div>
        <h3>Creating Forms</h3>
        <p>Build with the drag-and-drop editor, AI, conversational forms, or ready-made form types.</p>
        <span class="card-link">Build a Form →</span>
    </a>

    <a href="#" class="card">
        <div class="card-icon">🧩</div>
        <h3>Form Fields</h3>
        <p>Text, dropdowns, file upload, containers, post fields, and 50+ other field types.</p>
        <span class="card-link">Browse Fields →</span>
    </a>

    <a href="#" class="card">
        <div class="card-icon">💳</div>
        <h3>Payments</h3>
        <p>Create payment forms and accept money with Stripe, PayPal, Mollie, and more.</p>
        <span class="card-link">Take Payments →</span>
    </a>

    <a href="#" class="card">
        <div class="card-icon">🔌</div>
        <h3>Integrations</h3>
        <p>Connect Mailchimp, HubSpot, Slack, Zapier, Google Sheets, and 60+ other tools.</p>
        <span class="card-link">View Integrations →</span>
    </a>

    <a href="#" class="card">
        <div class="card-icon">📥</div>
        <h3>Managing Submissions</h3>
        <p>View, search, edit, and export entries, plus submission and payment reports.</p>
        <span class="card-link">Manage Entries →</span>
    </a>

</div>

<?php get_footer(); ?>