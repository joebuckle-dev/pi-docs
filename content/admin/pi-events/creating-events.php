<?php
require_once '../../../includes/templates.php';

$content = '
<h2>One-Time Setup</h2>
<p>These settings only need to be configured once, not per event. They live at <strong>Events</strong> &rarr; <strong>Registration Settings</strong>.</p>
<ol>
    <li>In Mailchimp, create the audience <strong>PI/PTV Event Marketing</strong>.</li>
    <li>Copy its Audience ID (Audience &rarr; Settings &rarr; Audience name and defaults) into <strong>Event marketing Mailchimp list ID</strong>.</li>
    <li>Create the standard marketing database notice template (for example <code>event-marketing-database-notice</code>) in the <a href="../pi-transactional/editing-templates.php">Template Editor</a> and select it as the <strong>Marketing notice template</strong>. Suggested content:</li>
</ol>
' . render_code_block('You have been added to the Policing Insight and PolicingTV event invitational
database so you can be invited to future events.
Unsubscribe (link to *|EVENT_LIST_UNSUB_URL|*) if you do not wish to be
notified of future events.', 'text') . '
' . render_info_box('Exclude the Unsubscribe Link from Click Tracking', '
<p>Make sure the unsubscribe link in the marketing notice template is excluded from Mandrill click-tracking, otherwise the link is rewritten and the signed URL may be followed by scanners.</p>
', 'warning') . '
<ol start="4">
    <li>Optionally select an <strong>Unsubscribe page</strong>: the page a person is redirected to after confirming an unsubscribe. If left empty, a standard confirmation page is shown.</li>
</ol>
<p>The Mailchimp API key is reused from <strong>Marketing Emails</strong> &rarr; <strong>Mailchimp Settings</strong>, and the Mandrill key from the Transactional Emails settings. No keys are entered in this feature.</p>

<h2>Step 1: Create the Confirmation Email Template</h2>
<p>Each event has its own confirmation (welcome/joining details) email. Create it without leaving the Admin Panel:</p>
<ol>
    <li>Go to <strong>Transactional Emails</strong> &rarr; <strong>Template Editor</strong>.</li>
    <li>Use <strong>Create New Template</strong> with <em>Copy content from</em> set to a previous webinar template (for example <code>sas-webinar-2</code>).</li>
    <li>Edit the copy for the new event.</li>
</ol>
<p>Templates created this way are labelled <code>wp-admin-created</code> and can be deleted from the Admin Panel later; templates created directly in Mandrill are locked.</p>
<p>Merge variables available in the template: <code>*|FIRST_NAME|*</code>, <code>*|LAST_NAME|*</code> and <code>*|EVENT_LIST_UNSUB_URL|*</code>.</p>
' . render_info_box('Two Separate Emails', '
<p>This template is the event confirmation only. The "added to the event marketing database" notice is the separate standard template configured in Registration Settings, and it is only sent to people genuinely newly added to the marketing list.</p>
', 'highlight') . '

<h2>Step 2: Create the Event</h2>
<ol>
    <li>Go to <strong>Events</strong> &rarr; <strong>Event Registrations</strong> &rarr; <strong>Add New Event</strong>.</li>
    <li>Enter a title. The post slug becomes the <strong>event key</strong> used in the shortcode and in the submissions table, so check it before publishing.</li>
    <li>Complete the event fields (see below).</li>
    <li>Publish. Registration only works on published events.</li>
</ol>

<h3>Event Fields</h3>
<h4>Required</h4>
<ul>
    <li><strong>Registration open</strong>: turn off to close registration without unpublishing the event.</li>
    <li><strong>Mandrill template</strong>: the confirmation email template from Step 1. A searchable dropdown of Mandrill templates when the list can be fetched, a free text field otherwise. A "View / edit this template" link opens the template in the Template Editor.</li>
    <li><strong>Consent label</strong>: the wording of the consent checkbox. Sponsor names vary per event, which is why this is set per event.</li>
</ul>
<h4>Optional</h4>
<ul>
    <li><strong>Skip marketing list</strong>: registrants for this event are not added to the Mailchimp list.</li>
    <li><strong>Success message</strong>: shown above the success content after registering.</li>
    <li><strong>From name</strong>, <strong>From email</strong>, <strong>Subject</strong>: overrides for the confirmation email; the template defaults are used when empty.</li>
</ul>

<h2>Step 3: Build the Landing Page</h2>
<p>Create the landing page and add the shortcodes. The <strong>Shortcode</strong> column in the Event Registrations list table shows the exact form shortcode for each event, ready to copy.</p>
' . render_code_block('[pi-event-form-hide-on-success event="sas-webinar-3"]
  ... event blurb shown before registering ...
[/pi-event-form-hide-on-success]

[pi-event-form event="sas-webinar-3"]

[pi-event-form-success event="sas-webinar-3"]
  ... content shown only after successful registration (e.g. joining details) ...
[/pi-event-form-success]', 'text') . '
<ul>
    <li><code>[pi-event-form]</code>: renders the registration form. Required.</li>
    <li><code>[pi-event-form-success]</code>: wraps content shown only after a successful registration, such as joining details. Optional.</li>
    <li><code>[pi-event-form-hide-on-success]</code>: wraps content hidden after a successful registration, such as the pre-registration blurb. Optional.</li>
</ul>
<p>The form fields are a fixed standard set (first name, last name, job title, department, organisation, country, email, consent checkbox); only the consent wording varies per event.</p>

<h2>Sending a Promo Email to the List</h2>
<p>Promotional emails to the marketing list use the existing Marketing Emails system, nothing specific to this feature:</p>
<ol>
    <li>Go to <strong>Marketing Emails</strong> &rarr; <strong>Email Templates</strong> &rarr; <strong>Add New</strong>.</li>
    <li>In the sidebar <strong>Mailchimp settings</strong>, choose <em>PI/PTV Event Marketing</em> as the target list.</li>
    <li>Compose with the standard blocks and an <strong>Email richtext</strong> block for the event-specific copy.</li>
    <li>Use the <strong>Process Mailchimp</strong> meta box to create the template and campaign, then review and send from Mailchimp.</li>
</ol>';

render_doc_page([
    'title' => 'Creating Events',
    'section' => 'pi-events',
    'current_page' => 'creating-events',
    'nav_title' => 'Event Registration',
    'intro' => 'How to set up a new webinar or event: create the confirmation email template, create the event, and build the landing page with the registration shortcodes.',
    'content' => $content,
    'last_updated' => 'August 2026'
]);
