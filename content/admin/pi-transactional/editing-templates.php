<?php
require_once '../../../includes/templates.php';

$content = render_info_box('Quick Summary', '
<p>Editing a transactional template is a two-step process: <strong>(1)</strong> choose the template you want to edit from the dropdown, then <strong>(2)</strong> update the sender details, subject and content, and click <strong>Update Template</strong>.</p>
', 'highlight') . '

<h2>Step 1: Select a Template</h2>

<p>From the Admin Panel sidebar, go to <strong>Transactional Emails</strong> &rarr; <strong>Template Editor</strong>.</p>

<ol>
    <li>Click the <strong>Select Template</strong> dropdown near the top of the page.</li>
    <li>Choose the template you want to edit from the list.</li>
</ol>

<figure class="doc-screenshot">
    <img src="images/select-template.png" alt="Select Template dropdown showing the list of available transactional templates" />
    <figcaption>Step 1: Open the Template Editor and choose a template from the dropdown.</figcaption>
</figure>

<p>The dropdown contains every transactional template configured for the site, for example:</p>
<ul>
    <li>Capita Webinar / Capita Webinar (Follow Up) / Capita Webinar (Video Notification)</li>
    <li>Forgot Password</li>
    <li>Hexagon Webinar</li>
    <li>Organisation Subscription Enquiry</li>
    <li>Password Reminder / Password Reminder (Admin)</li>
    <li>Policing Insight Welcome / Policing TV Welcome</li>
    <li>SAS Webinar / SAS Webinar 2 / SAS Webinar (Follow Up) / SAS Webinar (Invite Next Event) / SAS Webinar (Reminder)</li>
    <li>Subscription Renewal Failed</li>
    <li>Subscription Renewal Notice (Card Expired) / Subscription Renewal Notice (Card Valid)</li>
    <li>Subscription Renewal Succeeded</li>
</ul>

<p>Once a template is selected, the editor opens below the dropdown and is pre-filled with the current values for that template.</p>

' . render_info_box('Tip', '
<p>If you save a template successfully you will see a green <strong>Template updated successfully!</strong> message at the top of the page.</p>
', 'feature-box') . '

<h2>Step 2: Edit the Template Fields</h2>

<p>The editor presents the template in a simple form. Update only the fields you need to change and leave the rest as they are.</p>

<figure class="doc-screenshot">
    <img src="images/template-editor-form.png" alt="Template editor form showing Template Name, From Email, From Name, Subject, HTML Content and Text Version fields" />
    <figcaption>Step 2: The editor form with all the fields you can update for the selected template.</figcaption>
</figure>

<h3>Template Name</h3>
<p>A second dropdown that lets you switch to a different template without leaving the editor. If you have unsaved changes, you will be warned before switching so you do not lose your work.</p>

<h3>From Email</h3>
<p>The email address that the message appears to come from (for example, <code>enquiries@policinginsight.com</code>). Recipients will see this in their inbox.</p>

<h3>From Name</h3>
<p>The sender name shown alongside the From Email (for example, <code>Policing Insight</code>).</p>

<h3>Subject</h3>
<p>The subject line of the email. You can include merge tags here too, so the subject can be personalised.</p>

<h3>HTML Content</h3>
<p>The main body of the email. The editor offers two views, accessible via the tabs in the top-right corner:</p>
<ul>
    <li><strong>Visual</strong> &mdash; a familiar word-processor-style editor with controls for paragraph styles, bold, italic, underline, alignment, lists, links, images, font family, font size and full-screen editing.</li>
    <li><strong>Code</strong> &mdash; the raw HTML, useful for fine-grained adjustments and for pasting in HTML supplied by a designer.</li>
</ul>

' . render_info_box('Merge Tags', '
<p>Personalised values are written using double curly braces, for example <code>{{FIRST_NAME}}</code> and <code>{{LAST_NAME}}</code>. These are replaced with the recipient\'s details when the email is sent. Keep the curly braces and the variable name exactly as they are &mdash; any change will stop the merge tag working.</p>
', 'highlight') . '

<h3>Text Version</h3>
<p>A plain text version of the email used by mail clients that do not display HTML. If you make a substantial change to the HTML content, update the text version to match.</p>

<h3>Save Your Changes</h3>
<p>When you are happy with your edits, click the blue <strong>Update Template</strong> button at the bottom of the form. The page will reload and show the success message at the top.</p>

' . render_info_box('Switching templates with unsaved changes', '
<p>If you change the <strong>Template Name</strong> dropdown before saving, the editor will warn you that you have unsaved changes. Click <strong>Update Template</strong> first if you want to keep them.</p>
', 'warning') . '

<h2>Common Issues</h2>

<ul>
    <li><strong>Changes are not appearing in test emails?</strong> Make sure you clicked <strong>Update Template</strong> and saw the green success message. Browser caches and email previews can show stale content &mdash; send a fresh test email.</li>
    <li><strong>A merge tag is showing as <code>{{FIRST_NAME}}</code> in the delivered email?</strong> Double-check the spelling and that the curly braces are doubled. Single braces or extra spaces will prevent the substitution.</li>
    <li><strong>Layout looks broken in the recipient\'s inbox?</strong> Switch to the <strong>Code</strong> view and check the HTML for unclosed tags or missing inline styles. Some email clients ignore CSS that is not inline.</li>
</ul>
';

render_doc_page([
    'title' => 'Editing Templates',
    'section' => 'pi-transactional',
    'current_page' => 'editing-templates',
    'nav_title' => 'Transactional Emails',
    'intro' => 'A two-step guide to selecting a transactional template and updating its sender details, subject line and content.',
    'content' => $content,
    'last_updated' => 'April 2026'
]);
