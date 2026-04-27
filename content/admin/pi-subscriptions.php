<?php
require_once '../../includes/templates.php';

// Define features
$features = [
    ['icon' => '🔄', 'title' => 'Webhook Processing', 'description' => 'Handles Stripe webhooks for subscription events including renewals, payment failures, and cancellations'],
    ['icon' => '📧', 'title' => 'Email Notifications', 'description' => 'Automated email notifications for renewal reminders, payment failures, and card expiry warnings'],
    ['icon' => '🧪', 'title' => 'Testing Interface', 'description' => 'Built-in testing tools for verifying webhook processing and email delivery without affecting live data'],
    ['icon' => '🔒', 'title' => 'Security', 'description' => 'Webhook signature verification and environment-based configuration for secure payment processing']
];

// Define quick links
$links = [
    ['url' => 'pi-subscriptions/webhook-testing.php', 'title' => 'Webhook Testing', 'description' => 'Test webhook processing and email notifications'],
    ['url' => 'pi-subscriptions/developer-notes.php', 'title' => 'Developer Notes', 'description' => 'Technical implementation and API details']
];

// Build content
$content = '
<h2>Key Features</h2>
' . render_feature_list($features) . '

<h2>Quick Links</h2>
' . render_quick_links($links) . '

<h2>Admin Menu Location</h2>
<p>Access Subscriptions features in the Admin Panel:</p>
<ul>
    <li><strong>Subscriptions (NEW)</strong> - Main subscription management</li>
    <li><strong>Subscriptions (NEW) → Webhook Testing</strong> - Test webhook processing</li>
    <li><strong>Subscriptions (NEW) → Settings</strong> - Configure Stripe keys and webhook secrets</li>
</ul>

<h2>Configuration</h2>
<p>Before using Subscriptions:</p>
<ol>
    <li>Configure Stripe API keys in the settings</li>
    <li>Set up webhook endpoint in Stripe Dashboard</li>
    <li>Add webhook signing secret to settings</li>
    <li>Configure email templates in Mandrill</li>
    <li>Test using the webhook testing interface</li>
</ol>';

// Render the page
render_doc_page([
    'title' => 'Subscriptions Documentation',
    'section' => 'pi-subscriptions',
    'current_page' => 'overview',
    'nav_title' => 'Subscriptions',
    'intro' => 'The Subscriptions feature manages Stripe subscriptions for Policing Insight, including payment processing, webhook handling, and email notifications.',
    'content' => $content,
    'last_updated' => 'March 2026'
]);