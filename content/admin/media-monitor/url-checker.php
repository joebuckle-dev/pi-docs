<?php 
$page_title = 'Media Monitor URL Checker - Help';
$last_updated = 'March 17, 2026';
require_once '../../../includes/header.php'; 
require_once '../../../includes/navigation.php';

// Set up navigation for this section
require_once '_nav.php';
?>

<div class="doc-layout">
    <?php render_doc_nav($nav_items, 'url-checker', 'Media Monitor', '../../../'); ?>
    
    <div class="doc-content">
        <h1>Media Monitor URL Checker</h1>

<h2>What does it do?</h2>
<p>The URL checker makes sure you don't accidentally use the same URL twice in Media Monitor.</p>

<h2>How to use it</h2>
<ol>
    <li>Type or paste your URL in the field</li>
    <li>Click the <strong>Check</strong> button</li>
    <li>Look at the color:</li>
</ol>

<h2>What the colors mean</h2>

<div class="alert-box alert-success">
    <h3>✅ GREEN = Good to go!</h3>
    <p>The URL is available. You can save your post.</p>
</div>

<div class="alert-box alert-warning">
    <h3>⚠️ AMBER = Check first</h3>
    <p>Someone saved this URL in a draft. Click the link to see if it's:</p>
    <ul>
        <li>An old draft that can be deleted</li>
        <li>Someone else working on the same story</li>
    </ul>
</div>

<div class="alert-box alert-error">
    <h3>❌ RED = Already used!</h3>
    <p>This URL is already published. You should:</p>
    <ul>
        <li>Use a different URL, or</li>
        <li>Edit the existing post instead</li>
    </ul>
</div>

<h2>Common situations</h2>

<h3>I'm editing a post and it shows green</h3>
<p>That's correct! The system knows you're editing and the URL belongs to this post.</p>

<h3>The Check button doesn't work</h3>
<p>Try refreshing the page. If it still doesn't work, contact support.</p>

<h3>I get a warning when I publish</h3>
<p>The system checks again when you publish. If you see a warning, check if someone else published the same URL while you were editing.</p>
    </div>
</div>

<?php require_once '../../../includes/footer.php'; ?>