<?php
require_once '../../../includes/templates.php';

$content = <<<'HTML'
<h2>Architecture Overview</h2>
<p>The Transactional Emails feature provides a Mandrill-backed editor for transactional email templates. Template content is stored in Mandrill rather than the local database, so updates take effect immediately for all environments using the same Mandrill account.</p>

<h3>Key Components</h3>
<ul>
    <li><code>wp-content/plugins/pi-transactional/pi-transactional.php</code> &mdash; Plugin bootstrap and admin menu registration</li>
    <li><code>wp-content/plugins/pi-transactional/admin/pages/template-editor.php</code> &mdash; Admin page wrapper, asset enqueuing</li>
    <li><code>wp-content/plugins/pi-transactional/admin/templates/template-editor.php</code> &mdash; Editor markup and POST handlers (load, update, send test)</li>
    <li><code>wp-content/plugins/pi-transactional/admin/templates/template-editor.js</code> &mdash; Front-end behaviour: template switching, unsaved-changes warning, AJAX save and test send</li>
    <li><code>PolicingInsight\Transactional</code> class &mdash; Wrapper around the Mandrill API used by the editor and by other plugins (such as Subscriptions) to send transactional emails</li>
</ul>

<h2>Editor Flow</h2>
<ol>
    <li>On page load, <code>Transactional::listTemplates()</code> populates the dropdown.</li>
    <li>Selecting a template triggers <code>Transactional::getTemplateInfo()</code>, which returns the From Email, From Name, Subject, HTML and Text content.</li>
    <li>Saving posts back through <code>Transactional::updateTemplate()</code>; multiple layers of WordPress slash escaping are stripped from the HTML content before it is sent to Mandrill.</li>
    <li>The <strong>Send Test Email</strong> action collects merge variables from the form and calls <code>Transactional::sendTestEmail()</code>.</li>
</ol>

<h2>Merge Variables</h2>
<p>Templates use Mandrill\'s default <code>{{VARIABLE}}</code> syntax. The editor seeds template-specific test values (see the <code>$template_vars</code> array in <code>template-editor.php</code>) so administrators can preview real-looking emails. Add new templates to that array when introducing new merge tags.</p>

<h2>Admin Menu Registration</h2>
HTML;

$content .= render_code_block('// admin/pages/template-editor.php
add_submenu_page(
    \'pi-transactional\',
    \'Template Editor\',
    \'Template Editor\',
    \'manage_options\',
    \'pi-mandrill-template-editor\',
    function() {
        include_once __DIR__ . \'/../templates/template-editor.php\';
    }
);', 'php');

$content .= <<<'HTML'

<h2>Debugging</h2>
<ul>
    <li><code>/tmp/pi-form-debug.log</code> &mdash; Raw POST data and JSON-decoding output for the test email form</li>
    <li>WordPress debug log &mdash; Errors raised by the <code>Transactional</code> class (template list failures, Mandrill API errors)</li>
</ul>

<h2>Related Documentation</h2>
<ul>
    <li><a href="../pi-subscriptions/webhook-testing.php">Subscriptions &rarr; Webhook Testing</a> &mdash; Subscription emails are dispatched through this feature using template slugs such as <code>subscription-renewal-notice-card-valid</code></li>
</ul>
HTML;

render_doc_page([
    'title' => 'Transactional Emails Developer Notes',
    'section' => 'pi-transactional',
    'current_page' => 'developer-notes',
    'nav_title' => 'Transactional Emails',
    'content' => $content,
    'last_updated' => 'April 2026'
]);
