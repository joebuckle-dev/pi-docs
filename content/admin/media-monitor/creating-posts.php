<?php 
$page_title = 'Media Monitor - Creating Posts';
$last_updated = 'March 17, 2026';
require_once '../../../includes/header.php'; 
require_once '../../../includes/navigation.php';

// Set up navigation for this section
require_once '_nav.php';
?>

<div class="doc-layout">
    <?php render_doc_nav($nav_items, 'creating-posts', 'Media Monitor', '../../../'); ?>
    
    <div class="doc-content">
        <h1>Creating Media Monitor Posts</h1>

        <div class="highlight">
            <h2>Quick Start</h2>
            <p>Learn how to create new Media Monitor posts with all required fields and quality checks.</p>
        </div>

        <h2>Step-by-Step Creation Process</h2>

        <h3>1. Start a New Post</h3>
        <ol>
            <li>Go to <strong>Media Monitor</strong> → <strong>Add New</strong> in the Admin Panel menu</li>
            <li>You'll see the standard post editor with additional Media Monitor fields</li>
        </ol>

        <h3>2. Fill Required Fields</h3>
        
        <div class="feature-box">
            <h4>Essential Fields Checklist ✓</h4>
            <ul>
                <li><strong>Title</strong> - Descriptive headline for the media item</li>
                <li><strong>URL</strong> - Link to the original source article</li>
                <li><strong>Source</strong> - Media outlet (BBC, Guardian, etc.)</li>
                <li><strong>Subject</strong> - Content category or police force</li>
                <li><strong>Access at Source</strong> - How users can access the original content</li>
            </ul>
        </div>

        <h3>3. Enter the Title</h3>
        <ul>
            <li>Use a clear, descriptive headline</li>
            <li>Keep it concise but informative</li>
            <li>Avoid promotional language</li>
        </ul>

        <h3>4. Add the External URL</h3>
        <ol>
            <li>Paste the full URL to the original article</li>
            <li>Click the <strong>"Check"</strong> button to verify it's not a duplicate</li>
            <li>Wait for the validation result:
                <ul>
                    <li><span style="color: green;">Green</span> = URL is available</li>
                    <li><span style="color: orange;">Amber</span> = Found in draft posts (warning)</li>
                    <li><span style="color: red;">Red</span> = Duplicate found (must change)</li>
                </ul>
            </li>
        </ol>

        <div class="warning">
            <p><strong>Important:</strong> You must check the URL and resolve any red (duplicate) warnings before publishing.</p>
        </div>

        <h3>5. Select Access at Source</h3>
        <p>Choose how visitors can access the original content:</p>

        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr style="background: #f8f9fa;">
                <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">Option</th>
                <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">When to Use</th>
            </tr>
            <tr>
                <td style="border: 1px solid #dee2e6; padding: 12px;"><strong>Open</strong></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Article is free to read for anyone</td>
            </tr>
            <tr style="background: #f8f9fa;">
                <td style="border: 1px solid #dee2e6; padding: 12px;"><strong>Subscription</strong></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Requires paid subscription to original site</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dee2e6; padding: 12px;"><strong>Registration</strong></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Requires free account/registration to view</td>
            </tr>
        </table>

        <h3>6. Choose Source and Subject</h3>
        <ul>
            <li><strong>Source</strong>: Select the media outlet from the dropdown (see <a href="managing-taxonomies.php">Managing Taxonomies</a> to add new sources)</li>
            <li><strong>Subject</strong>: Choose relevant categories or police forces (see <a href="managing-taxonomies.php">Managing Taxonomies</a> for details)</li>
        </ul>

        <h2>Pre-Publish Quality Checklist</h2>

        <div class="alert-box alert-warning">
            <h3>Before You Publish ✓</h3>
            <ul>
                <li>Title is clear and descriptive</li>
                <li>URL has been checked and shows green (available)</li>
                <li>Access at Source is correctly selected</li>
                <li>Source media outlet is selected</li>
                <li>At least one Subject category is selected</li>
                <li>Content is relevant to policing/law enforcement</li>
            </ul>
        </div>

        <h2>Publishing Your Post</h2>
        <ol>
            <li>Review all fields using the checklist above</li>
            <li>Choose <strong>Publish</strong> for immediate publication</li>
            <li>Or choose <strong>Save Draft</strong> to finish later</li>
        </ol>

        <div class="feature-box">
            <h3>What Happens After Publishing</h3>
            <ul>
                <li>Post appears in the Media Monitor archive for subscribers</li>
                <li>URL is marked as used to prevent future duplicates</li>
                <li>Content becomes searchable and filterable</li>
                <li>Automatic quality notifications are sent if needed</li>
            </ul>
        </div>

        <h2>Common Issues</h2>

        <h3>URL Checker Shows Red (Duplicate)</h3>
        <ul>
            <li>The URL is already used by another published post</li>
            <li>Check if it's a legitimate duplicate or similar URL</li>
            <li>Consider if this is an update to an existing story</li>
            <li>Use a different URL or edit the existing post instead</li>
        </ul>

        <h3>Missing Source or Subject Options</h3>
        <ul>
            <li>See <a href="managing-taxonomies.php">Managing Taxonomies</a> to add new sources</li>
            <li>Contact an administrator if you need new categories</li>
        </ul>

        <h2>See Also</h2>
        <ul>
            <li><a href="managing-taxonomies.php">Managing Taxonomies</a> - Adding sources and categories</li>
            <li><a href="url-checker.php">URL Checker</a> - Detailed guide to URL validation</li>
            <li><a href="../media-monitor.php">Media Monitor Overview</a> - General information</li>
        </ul>
    </div>
</div>

<?php require_once '../../../includes/footer.php'; ?>