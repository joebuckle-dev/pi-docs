<?php
require_once '../../../includes/templates.php';

$content = render_info_box('Quick Test', '
<p>Just go to <strong>Subscriptions (NEW) → Webhook Testing</strong> and click the test buttons. That\'s it.</p>
', 'highlight') . '

<h2>Testing Webhooks</h2>

<p>We\'ve got a simple admin interface for testing the webhook emails. Use it to make sure renewal reminders and payment notifications are working.</p>

<h3>What You Can Test</h3>
<ul>
    <li><strong>Renewal reminders</strong> - What users get 3 days before their subscription renews</li>
    <li><strong>Expired card warnings</strong> - Urgent emails when their card is about to expire</li>
    <li><strong>Payment failures</strong> - What happens when a payment doesn\'t go through</li>
    <li><strong>Payment confirmations</strong> - Success emails after payment (if we have them enabled)</li>
</ul>

<h3>How to Test</h3>
<ol>
    <li>Go to <strong>Subscriptions (NEW) → Webhook Testing</strong> in WordPress admin</li>
    <li>Pick what you want to test (card status for renewal tests)</li>
    <li>Click the test button</li>
    <li>Check your email</li>
</ol>

<p>The test emails will arrive at whatever email address your WordPress user has. You can change it in the test interface if needed.</p>

<hr style="margin: 40px 0; border-top: 2px solid #ddd;">

<h2>Developer Testing</h2>

<h3>⭐ New: Real Webhook Testing (Recommended)</h3>

<p>We\'ve added a complete workflow that tests <strong>real webhook delivery</strong> using Stripe CLI. This gives you confidence your webhooks will work in production.</p>

' . render_info_box('Webhook Secret Handling', '
<p>The testing workflow automatically handles webhook secrets:</p>
<ul>
    <li>Captures the temporary secret from Stripe CLI</li>
    <li>Uses it only during the test session (development mode only)</li>
    <li>Your configured webhook secret remains unchanged</li>
    <li>Production always uses the real webhook secret from settings</li>
</ul>
', 'info') . '

' . render_code_block('# Complete automated test (creates user, customer, tests webhooks, cleans up)
# IMPORTANT: Use your real email address to receive test emails!
php testing/stripe-cli-workflow.php --full --email=your@email.com

# Or step by step:
./testing/stripe-cli-setup.sh --full-setup  # Setup Stripe CLI + forwarding
php testing/local-webhook-test.php --all-events --email=your@email.com', 'bash') . '

<p><strong>What this tests:</strong></p>
<ul>
    <li>✅ <strong>Real Stripe → Your Server</strong> webhook delivery</li>
    <li>✅ <strong>User lookup and role changes</strong> with actual WordPress users</li>
    <li>✅ <strong>Email delivery</strong> through your transactional system</li>
    <li>✅ <strong>Database updates</strong> and subscription metadata</li>
    <li>✅ <strong>Error handling</strong> and webhook signature verification</li>
</ul>

' . render_info_box('Why This Matters', '
<p>The old CLI commands below use <strong>mock webhooks</strong> - they test your code but not the actual Stripe → Your Server connection.</p>

<p>The new workflow uses <strong>real Stripe CLI events</strong> that get delivered to your local server exactly like production, so you know the complete integration works.</p>
', 'highlight') . '

<h3>Traditional CLI Commands (Mock Testing)</h3>

<p>Run these from the plugin directory (<code>wp-content/plugins/pi-subscriptions/</code>):</p>

' . render_code_block('# Test renewal reminder (valid card)
php testing/test-webhook-cli.php invoice.upcoming --email=test@example.com

# Test expired card warning  
php testing/test-webhook-cli.php invoice.upcoming --email=test@example.com --card=expired

# Test payment failed
php testing/test-webhook-cli.php invoice.payment_failed --email=test@example.com

# Test on staging (replace URL)
php testing/test-webhook-cli.php invoice.upcoming --live --url=https://staging.yoursite.com/?wps-listener=stripe', 'bash') . '

<h3>Manual Stripe CLI Setup</h3>

' . render_code_block('# Setup Stripe CLI (automated)
./testing/stripe-cli-setup.sh --full-setup

# Or manually:
stripe listen --forward-to localhost/?wps-listener=stripe  # Terminal 1
stripe trigger invoice.upcoming                             # Terminal 2', 'bash') . '

<h3>Testing Path Recommendation</h3>

<ol>
    <li><strong>Start with Admin UI</strong> - Quick email testing in WordPress admin</li>
    <li><strong>Run Real Webhook Test</strong> - <code>php testing/stripe-cli-workflow.php --full</code></li>
    <li><strong>Test on Staging</strong> - Same tests but against staging server</li>
    <li><strong>Go Live</strong> - Configure production webhooks with confidence</li>
</ol>

<h3>Quick Reference</h3>

<table>
    <tr>
        <th>Method</th>
        <th>Command/Location</th>
        <th>Tests</th>
    </tr>
    <tr>
        <td><strong>Admin UI</strong></td>
        <td>Subscriptions (NEW) → Webhook Testing</td>
        <td>Email content & delivery</td>
    </tr>
    <tr>
        <td><strong>Real Webhook Flow</strong></td>
        <td><code>php testing/stripe-cli-workflow.php --full --email=your@email.com</code></td>
        <td>Complete integration</td>
    </tr>
    <tr>
        <td><strong>Mock Testing</strong></td>
        <td><code>testing/test-webhook-cli.php</code></td>
        <td>Handler logic only</td>
    </tr>
    <tr>
        <td><strong>Webhook URL</strong></td>
        <td><code>https://yoursite.com/?wps-listener=stripe</code></td>
        <td>-</td>
    </tr>
    <tr>
        <td><strong>Debug Logs</strong></td>
        <td><code>/tmp/upcoming-debug.log</code></td>
        <td>-</td>
    </tr>
</table>

<h3>Troubleshooting</h3>

' . render_info_box('Common Problems', '
<ul>
    <li><strong>No email?</strong> Check Mandrill template exists and is published</li>
    <li><strong>Webhook fails?</strong> Check webhook secret in Stripe settings</li>
    <li><strong>User not found?</strong> User needs <code>stripe-customer</code> meta field</li>
    <li><strong>Need more logs?</strong> Add <code>define(\'WP_DEBUG\', true);</code> to wp-config.php</li>
</ul>
', 'warning') . '

<h3>Required Setup</h3>

<p><strong>Mandrill Templates:</strong></p>
<ul>
    <li><code>subscription-renewal-notice-card-valid</code></li>
    <li><code>subscription-renewal-notice-card-expired</code></li>
    <li><code>subscription-payment-failed</code></li>
    <li><code>subscription-payment-succeeded</code> (optional)</li>
</ul>

<p><strong>Stripe Dashboard:</strong></p>
<ol>
    <li>Add webhook endpoint: <code>https://yoursite.com/?wps-listener=stripe</code></li>
    <li>Select these events:
        <ul>
            <li>invoice.upcoming</li>
            <li>invoice.payment_failed</li>
            <li>invoice.payment_succeeded</li>
            <li>customer.subscription.updated</li>
            <li>customer.subscription.deleted</li>
        </ul>
    </li>
    <li>Copy webhook secret to WordPress Stripe settings</li>
</ol>

<p>That\'s it. The admin interface is the easiest way to test. Use the CLI commands if you need to automate testing or test specific scenarios.</p>
';

render_doc_page([
    'title' => 'Webhook Testing',
    'section' => 'pi-subscriptions',
    'current_page' => 'webhook-testing',
    'nav_title' => 'Subscriptions',
    'intro' => 'Quick guide for testing webhook emails.',
    'content' => $content,
    'last_updated' => 'March 2026'
]);