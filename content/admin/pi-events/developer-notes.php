<?php
require_once '../../../includes/templates.php';

$content = '
<h2>Location and Structure</h2>
<p>Code lives in <code>wp-content/plugins/pi-events/</code>, namespace <code>PolicingInsight\\Events</code>. It replaces the legacy per-sponsor pattern (theme shortcodes such as <code>pi-SAS-form.php</code>, a dedicated table per form, and one-off reminder features); the legacy pieces are untouched and coexist.</p>
' . render_code_block('pi-events/
├── pi-events.php                  # Bootstrap, constants, activation hook, template/country helpers
├── post-types/event.php           # pi_event_reg CPT (non-public, UI only) + Shortcode list column
├── fields/event-fields.php        # ACF field group per event (template dropdown, consent label, ...)
├── fields/options-fields.php      # ACF fields for the Registration Settings options page
├── options/settings.php           # Registers the Registration Settings options sub-page
├── classes/Event.php              # Loads/caches an event config from its published CPT post
├── classes/EventForm.php          # Form model: render, validate, handle_post, emails, redirect
├── classes/Submissions.php        # Consolidated submissions table (dbDelta, upsert, queries)
├── classes/MarketingList.php      # Mailchimp add-if-new via the pi-email SDK/API key
├── classes/Unsubscribe.php        # HMAC-signed unsubscribe URLs + confirm page
├── shortcodes/event-form.php      # The three shortcodes, POST hook, query var, 404 suppression
├── admin/registrations-metabox.php # Per-event DataTable + CSV export
├── admin/submissions-viewer.php   # Cross-event viewer + admin_post CSV handler
└── data/countries.json            # Fallback country list', 'text') . '

<h2>Database</h2>
<p>Single table <code>{prefix}pi_event_submissions</code>, created with <code>dbDelta</code> on activation:</p>
' . render_code_block('id           bigint unsigned AUTO_INCREMENT PRIMARY KEY
event_key    varchar(64)   -- the event post slug
time         datetime
email        varchar(191)
data         text          -- serialised field values
success_key  varchar(32)   -- for the post-registration success redirect
mc_status    varchar(32)   -- Mailchimp outcome (added / exists / ...)
UNIQUE KEY event_email (event_key, email)
KEY success_key (success_key)', 'sql') . '
<p><code>Submissions::upsert()</code> is keyed on <code>(event_key, email)</code>: re-registration updates the row. It also calls <code>install()</code> (dbDelta) on every submission; there is no schema version option. <code>pi-media-monitor</code> documents this class as the house pattern for custom-table storage.</p>

<h2>Request Flow</h2>
<ol>
    <li><code>EventForm::handle_post()</code> runs on <code>init</code>: nonce check, two honeypot fields, validation and sanitisation.</li>
    <li>Submission is upserted; a fresh <code>success_key</code> is generated each time.</li>
    <li>The Mandrill confirmation is sent via pi-transactional, then <code>MarketingList::add_if_new()</code> runs, then the marketing notice is sent only on an <code>added</code> outcome.</li>
    <li>Redirect (POST/Redirect/GET) to the landing page with the success key as the <code>pi-event-key</code> query var; the success shortcodes key off it. Sending on POST rather than on the success page is what fixes the legacy duplicate/blank-recipient send.</li>
</ol>

<h2>Dependencies</h2>
<ul>
    <li><strong>ACF Pro</strong>: event fields and the Registration Settings options page (all registered as local field groups in code).</li>
    <li><strong>pi-email</strong>: source of the Mailchimp SDK and API key. The server prefix is parsed from the key, falling back to <code>us3</code> if the key has no dash.</li>
    <li><strong>pi-transactional</strong>: Mandrill sending and the template list. <code>get_mandrill_templates()</code> caches the list for 5 minutes; the cache is invalidated by the <code>pi_transactional_templates_changed</code> action fired by the Template Editor.</li>
</ul>

<h2>Marketing List and Unsubscribe</h2>
<ul>
    <li><code>MarketingList</code> deliberately does a GET before POST so an unsubscribed member is detected and never resurrected. Return values: <code>added</code>, <code>exists</code>, <code>skipped_unsubscribed</code>, <code>skipped</code>, <code>error:&hellip;</code>, stored in <code>mc_status</code>.</li>
    <li>Unsubscribe URLs are HMAC-signed with the secret in the <code>pi_events_unsub_secret</code> option (generated on activation) and never expire. <code>Unsubscribe::handle_request()</code> hooks <code>template_redirect</code> at priority 1 and self-renders a styled POST-confirm page.</li>
    <li>Unsubscribing does not write back to <code>mc_status</code> in the submissions table.</li>
</ul>

<h2>Known Limitations</h2>
<ul>
    <li>No reminder scheduling: pre-event reminder emails are still handled by the legacy <code>pi-sas-reminder*</code> features and were not folded in.</li>
    <li>No captcha or rate limiting beyond the two honeypot fields.</li>
    <li>No Gutenberg block or REST exposure (<code>show_in_rest</code> is false); shortcodes only.</li>
    <li>Admin DataTables assets load from a CDN (v1.10.10).</li>
    <li>No <code>uninstall.php</code> or deactivation cleanup.</li>
</ul>

<h2>Phase 2</h2>
<p>Planned but not required: an opt-in checkbox for the marketing list on the registration/newsletter/account pages, added via <strong>Marketing Emails</strong> &rarr; <strong>Opt-in Settings</strong> pointing at the PI/PTV Event Marketing list. No code changes are needed in this feature for that.</p>';

render_doc_page([
    'title' => 'Developer Notes',
    'section' => 'pi-events',
    'current_page' => 'developer-notes',
    'nav_title' => 'Event Registration',
    'intro' => 'Technical implementation details of the Event Registration feature: file layout, database schema, request flow, dependencies and known limitations.',
    'content' => $content,
    'last_updated' => 'August 2026'
]);
