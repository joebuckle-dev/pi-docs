<?php
require_once '../../../includes/templates.php';

// Build content
$content = '
<h2>Getting Started</h2>
<p>Creating a Media Monitor post allows you to track and categorise external media content.</p>

' . render_info_box('Prerequisites', '
<ul>
    <li>Editor or Administrator role</li>
    <li>Access to Media Monitor section</li>
    <li>External URL to track</li>
</ul>
', 'highlight') . '

<h2>Step-by-Step Guide</h2>

<h3>1. Access Media Monitor</h3>
<p>Navigate to <strong>Media Monitor → Add New</strong> in the WordPress admin menu.</p>

<h3>2. Enter Post Details</h3>
<ul>
    <li><strong>Title</strong>: Enter a descriptive title for the media item</li>
    <li><strong>External URL</strong>: Paste the full URL of the external content</li>
    <li><strong>Description</strong>: Add context or summary of the media item</li>
</ul>

<h3>3. Check for Duplicates</h3>
<p>Click the <strong>"Check"</strong> button next to the URL field to verify:</p>
<ul>
    <li>✓ Green message = URL is unique, proceed</li>
    <li>✗ Red message = Duplicate found, review existing post</li>
</ul>

<h3>4. Categorise Your Post</h3>
<p>Use the sidebar to:</p>
<ul>
    <li>Select appropriate <strong>Categories</strong></li>
    <li>Add relevant <strong>Tags</strong></li>
    <li>Assign to correct <strong>Regions</strong></li>
    <li>Choose applicable <strong>Topics</strong></li>
</ul>

<h3>5. Set Publishing Options</h3>
<ul>
    <li><strong>Publish Date</strong>: Current date or schedule for future</li>
    <li><strong>Author</strong>: Defaults to current user</li>
    <li><strong>Status</strong>: Publish, Draft, or Pending Review</li>
</ul>

<h3>6. Publish Your Post</h3>
<p>Click <strong>"Publish"</strong> to make the post live, or <strong>"Save Draft"</strong> to continue later.</p>

' . render_info_box('Tips', '
<ul>
    <li>Use clear, descriptive titles that summarise the content</li>
    <li>Always check URLs to avoid duplicates</li>
    <li>Apply multiple categories and tags for better organisation</li>
    <li>Include key quotes or summaries in the description</li>
</ul>
', 'feature-box') . '

<h2>Common Issues</h2>

<h3>URL Check Not Working</h3>
<p>If the URL checker isn\'t responding:</p>
<ol>
    <li>Ensure JavaScript is enabled</li>
    <li>Check for browser console errors</li>
    <li>Try refreshing the page</li>
</ol>

<h3>Cannot Publish</h3>
<p>If the Publish button is disabled:</p>
<ul>
    <li>Verify all required fields are filled</li>
    <li>Check your user permissions</li>
    <li>Ensure URL validation passed</li>
</ul>';

// Render the page
render_doc_page([
    'title' => 'Creating Posts',
    'section' => 'media-monitor',
    'current_page' => 'creating-posts',
    'nav_title' => 'Media Monitor',
    'intro' => 'Learn how to create and publish Media Monitor posts to track external content.',
    'content' => $content,
    'last_updated' => 'March 17, 2026'
]);