<?php
require_once '../../includes/templates.php';

// Define features
$features = [
    ['icon' => '📋', 'title' => 'Template Selector', 'description' => 'Choose from the full list of transactional templates such as webinar invitations, password reminders and subscription notices'],
    ['icon' => '✉️', 'title' => 'Sender Details', 'description' => 'Edit the From Email, From Name and Subject line for each template'],
    ['icon' => '🎨', 'title' => 'Visual HTML Editor', 'description' => 'Update the HTML content using a familiar visual editor, with a Code view for advanced changes'],
    ['icon' => '📝', 'title' => 'Plain Text Version', 'description' => 'Provide a plain text fallback for email clients that do not display HTML'],
    ['icon' => '🔖', 'title' => 'Merge Tags', 'description' => 'Insert personalised values such as {{FIRST_NAME}} and {{LAST_NAME}} that are filled in when the email is sent']
];

// Define quick links
$links = [
    ['url' => 'pi-transactional/editing-templates.php', 'title' => 'Editing Templates', 'description' => 'Step-by-step guide to selecting and updating a template'],
    ['url' => 'pi-transactional/developer-notes.php', 'title' => 'Developer Notes', 'description' => 'Technical implementation details']
];

// Build content
$content = '
<h2>Key Features</h2>
' . render_feature_list($features) . '

<h2>Quick Links</h2>
' . render_quick_links($links) . '

<h2>Admin Menu Location</h2>
<p>You can find the Template Editor in the Admin Panel sidebar:</p>
<ul>
    <li><strong>Transactional Emails</strong> &rarr; <strong>Template Editor</strong></li>
</ul>

<h2>When to Use This Feature</h2>
<p>Use the Template Editor whenever you need to:</p>
<ul>
    <li>Update the wording of an automated email (for example, a webinar invitation or password reminder)</li>
    <li>Change the sender name, sender address or subject line of a transactional email</li>
    <li>Adjust the layout, colours or links inside an existing template</li>
    <li>Refresh the plain text version of an email</li>
</ul>';

// Render the page
render_doc_page([
    'title' => 'Transactional Emails Documentation',
    'section' => 'pi-transactional',
    'current_page' => 'overview',
    'nav_title' => 'Transactional Emails',
    'intro' => 'The Transactional Emails feature manages the automated emails sent by Policing Insight, including webinar invitations, password reminders and subscription notices. Use the Template Editor to update the content, sender details and subject of any transactional template.',
    'content' => $content,
    'last_updated' => 'April 2026'
]);
