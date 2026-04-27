<?php
require_once '../../includes/templates.php';

// Define key features
$features = [
    ['title' => 'URL Validation', 'description' => 'Automatic checking for duplicate URLs'],
    ['title' => 'Access Control', 'description' => 'Integration with subscription plans'],
    ['title' => 'Search Integration', 'description' => 'Find media items quickly'],
    ['title' => 'Categorisation', 'description' => 'Organise content with taxonomies']
];

// Build content
$content = '
<h2>Overview</h2>
<p>Media Monitor is a custom post type designed for tracking media mentions and external content. Each post can include:</p>
<ul>
    <li>Title and description</li>
    <li>External URL (with duplicate checking)</li>
    <li>Categories and tags for organisation</li>
    <li>Publishing date and author</li>
</ul>

<h2>Key Features</h2>
<ul>
' . implode("\n", array_map(function($f) {
    return "    <li><strong>{$f['title']}</strong>: {$f['description']}</li>";
}, $features)) . '
</ul>

' . render_info_box('Getting Started', '
<ol>
    <li>Navigate to <strong>Media Monitor</strong> in the Admin Panel menu</li>
    <li>Click <strong>Add New</strong> to create a new media monitor post</li>
    <li>Fill in the required fields and check your URL</li>
    <li>Categorise and publish your post</li>
</ol>
', 'feature-box') . '

<h2>Common Tasks</h2>

<h3>Creating a New Media Monitor Post</h3>
<ol>
    <li>Go to Media Monitor → Add New</li>
    <li>Enter a descriptive title</li>
    <li>Add the external URL</li>
    <li>Click "Check" to verify the URL is not a duplicate</li>
    <li>Add description and categories</li>
    <li>Publish when ready</li>
</ol>

<h3>Managing Existing Posts</h3>
<ul>
    <li>Use the search box to find specific posts</li>
    <li>Filter by category or date</li>
    <li>Bulk actions for multiple posts</li>
</ul>';

// Render the page
render_doc_page([
    'title' => 'Media Monitor Help',
    'section' => 'media-monitor',
    'current_page' => 'overview',
    'nav_title' => 'Media Monitor',
    'intro' => 'A system for tracking and managing external media content within the Admin Panel.',
    'content' => $content,
    'last_updated' => 'March 17, 2026'
]);