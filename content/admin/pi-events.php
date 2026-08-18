<?php
require_once '../../includes/templates.php';

// Define features
$features = [
    ['icon' => '🗓️', 'title' => 'Events Created in Admin', 'description' => 'Create a new webinar or event registration in the Admin Panel with no code changes per event'],
    ['icon' => '📝', 'title' => 'Registration Form Shortcode', 'description' => 'One generic shortcode renders the standard registration form on any landing page'],
    ['icon' => '🗃️', 'title' => 'Consolidated Submissions Table', 'description' => 'All registrations for all events are stored in a single database table with CSV export'],
    ['icon' => '📧', 'title' => 'Confirmation Email', 'description' => 'Each registrant receives a per-event confirmation email sent through the Transactional Emails feature'],
    ['icon' => '📣', 'title' => 'Event Marketing List', 'description' => 'Registrants are added to the rolling PI/PTV Event Marketing Mailchimp list, tagged with the event, unless already present or previously unsubscribed'],
    ['icon' => '🔏', 'title' => 'Signed Unsubscribe Links', 'description' => 'Marketing database notices carry HMAC-signed unsubscribe links that land on a confirmation page']
];

// Define quick links
$links = [
    ['url' => 'pi-events/creating-events.php', 'title' => 'Creating Events', 'description' => 'Step-by-step guide to setting up a new event and its landing page'],
    ['url' => 'pi-events/managing-registrations.php', 'title' => 'Managing Registrations', 'description' => 'Viewing registrations, CSV export and marketing list statuses'],
    ['url' => 'pi-events/developer-notes.php', 'title' => 'Developer Notes', 'description' => 'Technical implementation details']
];

// Build content
$content = '
<h2>Key Features</h2>
' . render_feature_list($features) . '

<h2>Quick Links</h2>
' . render_quick_links($links) . '

<h2>Admin Menu Locations</h2>
<ul>
    <li><strong>Events</strong> &rarr; <strong>Event Registrations</strong>: create and edit events; each event\'s edit screen also shows its own registrations table</li>
    <li><strong>Events</strong> &rarr; <strong>Registration Settings</strong>: one-time configuration (marketing list ID, marketing notice template, unsubscribe page)</li>
    <li><strong>Database</strong> &rarr; <strong>Event Registrations</strong>: cross-event registrations viewer with an event filter (appears under <strong>Tools</strong> if the Database menu is disabled)</li>
</ul>

<h2>When to Use This Feature</h2>
<p>Use Event Registration whenever a sponsor webinar or other event needs a registration form. It replaces the legacy per-sponsor approach (a copied theme shortcode, a dedicated database table and a one-off reminder feature for each webinar). The legacy forms and their Database pages remain in place for historical data; new events should use this feature.</p>

<h2>How a Registration Works</h2>
<ol>
    <li>A visitor completes the form (first name, last name, job title, department, organisation, country, email and a consent checkbox whose wording is set per event).</li>
    <li>The submission is stored in the consolidated submissions table. Re-registering for the same event updates the existing entry rather than creating a duplicate.</li>
    <li>The registrant receives the event\'s confirmation email (the Mandrill template selected on the event).</li>
    <li>The registrant is added to the PI/PTV Event Marketing Mailchimp list, tagged with the event key. Anyone who previously unsubscribed from that list is never re-added.</li>
    <li>Only genuinely new additions to the marketing list also receive the standard "added to the event marketing database" notice, which contains a signed unsubscribe link.</li>
</ol>

' . render_info_box('Registration Is Never Blocked by Mailchimp', '
<p>If the Mailchimp call fails, the registration and the confirmation email still go through. The failure is recorded in the Marketing list column of the registrations table and in the PHP error log.</p>
', 'highlight');

// Render the page
render_doc_page([
    'title' => 'Event Registration Documentation',
    'section' => 'pi-events',
    'current_page' => 'overview',
    'nav_title' => 'Event Registration',
    'intro' => 'The Event Registration feature provides consolidated webinar and event registration. Events are created in the Admin Panel, a generic shortcode renders the registration form on a landing page, submissions are stored in a single table, and registrants receive a confirmation email and are added to the rolling PI/PTV Event Marketing Mailchimp list.',
    'content' => $content,
    'last_updated' => 'August 2026'
]);
