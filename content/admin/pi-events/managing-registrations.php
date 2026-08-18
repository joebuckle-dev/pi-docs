<?php
require_once '../../../includes/templates.php';

$content = '
<h2>Per-Event Registrations Table</h2>
<p>Each event\'s edit screen (<strong>Events</strong> &rarr; <strong>Event Registrations</strong> &rarr; open the event) shows a <strong>Registrations</strong> table for that event: sortable, searchable, with a CSV export button. For new events this supersedes the per-form pages under the Database menu that the legacy forms used.</p>

<h2>Cross-Event Viewer</h2>
<p>A combined view of all events lives at <strong>Database</strong> &rarr; <strong>Event Registrations</strong> (or <strong>Tools</strong> &rarr; <strong>Event Registrations</strong> if the Database menu is disabled). It has an event filter and the same CSV export.</p>

<h2>Marketing List Column</h2>
<p>The <em>Marketing list</em> column shows each registrant\'s Mailchimp outcome:</p>
<table>
    <tr><th>Status</th><th>Meaning</th></tr>
    <tr><td><code>added</code></td><td>Newly added to the marketing list, tagged with the event key. Only these registrants receive the marketing database notice email.</td></tr>
    <tr><td><code>exists</code></td><td>Already on the list, left untouched.</td></tr>
    <tr><td><code>skipped_unsubscribed</code></td><td>Previously unsubscribed from the list; not re-added.</td></tr>
    <tr><td><code>skipped</code></td><td>The event has "Skip marketing list" enabled, or no list ID is configured.</td></tr>
    <tr><td><code>error:&hellip;</code></td><td>The Mailchimp call failed. The registration and confirmation email still went through; details are in the PHP error log.</td></tr>
</table>
' . render_info_box('Unsubscribes Are Not Written Back', '
<p>The status reflects the outcome at registration time. If someone unsubscribes later via the signed link or in Mailchimp, the column still reads <code>added</code>. Mailchimp is the authoritative record of current list membership.</p>
', 'warning') . '

<h2>Behaviour Notes</h2>
<ul>
    <li>Adding to Mailchimp can never block a registration or the confirmation email.</li>
    <li>Re-registering for the same event updates the existing entry (same behaviour as the legacy forms); the table holds one row per person per event.</li>
    <li>The confirmation email is sent exactly once per submission. The legacy bug where reloading the success page fired another (blank-recipient) Mandrill send is fixed in this feature.</li>
    <li>People who unsubscribed from the marketing list are never re-added by a later registration, and never receive the marketing database notice again.</li>
</ul>

<h2>How Unsubscribe Links Work</h2>
<ul>
    <li>Each marketing database notice contains a signed unsubscribe link (the <code>*|EVENT_LIST_UNSUB_URL|*</code> merge variable).</li>
    <li>Links are HMAC-signed and never expire.</li>
    <li>The link lands on a page with a confirm button, so email link-scanners cannot silently unsubscribe people by following the URL.</li>
    <li>After confirming, the person is unsubscribed from the PI/PTV Event Marketing list and shown either the standard confirmation page or the page selected in <strong>Events</strong> &rarr; <strong>Registration Settings</strong>.</li>
</ul>';

render_doc_page([
    'title' => 'Managing Registrations',
    'section' => 'pi-events',
    'current_page' => 'managing-registrations',
    'nav_title' => 'Event Registration',
    'intro' => 'Where to view registrations, how to export them, what the marketing list statuses mean, and how the unsubscribe flow works.',
    'content' => $content,
    'last_updated' => 'August 2026'
]);
