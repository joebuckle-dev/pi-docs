<?php 
$page_title = 'Media Monitor Help';
$last_updated = 'March 17, 2026';
require_once '../../includes/header.php'; 
require_once '../../includes/navigation.php';

// Set up navigation for this section
require_once 'media-monitor/_nav.php';
?>

<div class="doc-layout">
    <?php render_doc_nav($nav_items, 'overview', 'Media Monitor', '../../'); ?>
    
    <div class="doc-content">
        <h1>Media Monitor Help</h1>

        <div class="highlight">
            <h2>What is Media Monitor?</h2>
            <p>A system for tracking and managing external media content within the Admin Panel.</p>
        </div>

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
            <li><strong>URL Validation</strong>: Automatic checking for duplicate URLs</li>
            <li><strong>Access Control</strong>: Integration with subscription plans</li>
            <li><strong>Search Integration</strong>: Find media items quickly</li>
            <li><strong>Categorisation</strong>: Organise content with taxonomies</li>
        </ul>

        <div class="feature-box">
            <h3>Getting Started</h3>
            <ol>
                <li>Navigate to <strong>Media Monitor</strong> in the Admin Panel menu</li>
                <li>Click <strong>Add New</strong> to create a new media monitor post</li>
                <li>Fill in the required fields and check your URL</li>
                <li>Categorise and publish your post</li>
            </ol>
        </div>

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
        </ul>
    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>