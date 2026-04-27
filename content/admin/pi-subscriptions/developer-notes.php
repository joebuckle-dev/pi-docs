<?php
require_once '../../../includes/templates.php';

$content = <<<'HTML'
<h2>Architecture Overview</h2>
<p>The Subscriptions feature follows WordPress coding standards and integrates with Stripe for payment processing.</p>

<h3>Key Components</h3>
<ul>
    <li><code>/webhooks/webhook_handler.php</code> - Main webhook processing logic</li>
    <li><code>/webhooks/init.php</code> - Webhook initialization and routing</li>
    <li><code>/class/Stripe.php</code> - Stripe API integration</li>
    <li><code>/admin/webhook-testing.php</code> - Testing interface</li>
</ul>

<h2>Webhook Processing Flow</h2>
<ol>
    <li>Stripe sends webhook to <code>/?wps-listener=stripe</code></li>
    <li>Signature verification (production/staging only)</li>
    <li>Event routed based on type</li>
    <li>Handler fetches additional data via Stripe API</li>
    <li>Email sent via pi-transactional plugin</li>
</ol>

<h2>Environment Configuration</h2>
HTML;

$content .= render_code_block('// Development
define(\'PI_SUBSCRIPTIONS_ENV\', \'development\');
define(\'PI_SUBSCRIPTIONS_SKIP_WEBHOOK_VERIFICATION\', true);

// Staging
define(\'PI_SUBSCRIPTIONS_ENV\', \'staging\');
define(\'STAGING_STRIPE_WEBHOOK_SECRET\', \'whsec_...\');

// Production
// Uses live Stripe keys and enforces signature verification', 'php');

$content .= <<<'HTML'

<h2>Testing</h2>
<h3>CLI Testing Script</h3>
HTML;

$content .= render_code_block('php testing/test-webhook-cli.php invoice.upcoming --email=test@example.com --card=expired', 'bash');

$content .= <<<'HTML'

<h3>Stripe CLI</h3>
HTML;

$content .= render_code_block('stripe listen --forward-to localhost/?wps-listener=stripe
stripe trigger invoice.upcoming', 'bash');

$content .= <<<'HTML'

<h2>Debugging</h2>
<ul>
    <li><code>/tmp/webhook-called.txt</code> - General webhook processing</li>
    <li><code>/tmp/upcoming-debug.log</code> - Renewal webhook details</li>
    <li>WordPress debug log - All errors and processing steps</li>
</ul>
HTML;

render_doc_page([
    'title' => 'Subscriptions Developer Notes',
    'section' => 'pi-subscriptions',
    'current_page' => 'developer-notes',
    'nav_title' => 'Subscriptions',
    'content' => $content,
    'last_updated' => 'March 2026'
]);