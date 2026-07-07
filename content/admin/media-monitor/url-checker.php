<?php
require_once '../../../includes/templates.php';

$content = <<<'HTML'
<h2>What does it do?</h2>
<p>The URL checker prevents the same URL being used more than once in Media Monitor.</p>

<h2>How to use it</h2>
<ol>
    <li>Type or paste your URL in the field</li>
    <li>Click the <strong>Check</strong> button</li>
    <li>Look at the color:</li>
</ol>

<h2>What the colors mean</h2>

<div class="alert-box alert-success">
    <h3>✅ GREEN = Available</h3>
    <p>The URL is available. You can save your post.</p>
</div>

<div class="alert-box alert-warning">
    <h3>⚠️ AMBER = In a draft</h3>
    <p>This URL exists in a draft post. Open the link to determine whether it is:</p>
    <ul>
        <li>An old draft that can be deleted</li>
        <li>Another editor working on the same story</li>
    </ul>
</div>

<div class="alert-box alert-error">
    <h3>❌ RED = Already published</h3>
    <p>This URL is already published. Options:</p>
    <ul>
        <li>Use a different URL, or</li>
        <li>Edit the existing post instead</li>
    </ul>
</div>

<h2>Common situations</h2>

<h3>I'm editing a post and it shows green</h3>
<p>When editing an existing post, the system recognises that the URL belongs to the current post.</p>

<h3>The Check button doesn't work</h3>
<p>Try refreshing the page. If it still doesn't work, contact support.</p>

<h3>I get a warning when I publish</h3>
<p>The system checks again when you publish. If you see a warning, check if someone else published the same URL while you were editing.</p>
HTML;

render_doc_page([
    'title' => 'Media Monitor URL Checker',
    'section' => 'media-monitor',
    'current_page' => 'url-checker',
    'nav_title' => 'Media Monitor',
    'content' => $content,
    'last_updated' => 'March 17, 2026'
]);