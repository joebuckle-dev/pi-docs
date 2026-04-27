<?php
require_once '../../../includes/templates.php';

// Build content
$content = '
<h2>Overview</h2>
<p>Media Monitor uses four custom taxonomies to organise content effectively. These taxonomies help categorise and filter media items for better content management.</p>

<h2>Available Taxonomies</h2>

<h3>1. Sources</h3>
<p>The origin or publisher of the media content.</p>
<ul>
    <li><strong>Purpose</strong>: Track which outlets are covering policing topics</li>
    <li><strong>Examples</strong>: BBC News, The Guardian, Police Professional</li>
    <li><strong>Usage</strong>: Filter posts by specific media outlets</li>
</ul>

<h3>2. Subjects</h3>
<p>The main topic or theme of the media item.</p>
<ul>
    <li><strong>Purpose</strong>: Categorise content by subject matter</li>
    <li><strong>Examples</strong>: Crime Prevention, Technology, Training</li>
    <li><strong>Usage</strong>: Group related content together</li>
</ul>

<h3>3. Regions</h3>
<p>Geographic areas covered in the content.</p>
<ul>
    <li><strong>Purpose</strong>: Track regional coverage and trends</li>
    <li><strong>Examples</strong>: London, West Midlands, Scotland</li>
    <li><strong>Usage</strong>: Find content relevant to specific areas</li>
</ul>

<h3>4. Topics</h3>
<p>Specific issues or events discussed.</p>
<ul>
    <li><strong>Purpose</strong>: Detailed tagging for precise filtering</li>
    <li><strong>Examples</strong>: Budget Cuts, New Legislation, Public Safety</li>
    <li><strong>Usage</strong>: Track specific issues over time</li>
</ul>

<h2>Managing Taxonomies</h2>

<h3>Adding New Terms</h3>
<ol>
    <li>Navigate to <strong>Media Monitor → [Taxonomy Name]</strong></li>
    <li>Enter the term name and slug</li>
    <li>Add optional description</li>
    <li>Set parent term if creating hierarchy</li>
    <li>Click <strong>Add New [Taxonomy]</strong></li>
</ol>

<h3>Editing Existing Terms</h3>
<ol>
    <li>Go to the taxonomy management page</li>
    <li>Hover over the term and click <strong>Edit</strong></li>
    <li>Update name, slug, or description</li>
    <li>Click <strong>Update</strong> to save changes</li>
</ol>

<h3>Deleting Terms</h3>
' . render_info_box('Warning', '
<p>Deleting a term removes it from all associated posts. Consider merging terms instead if content should be preserved.</p>
', 'warning') . '

<p>To delete a term:</p>
<ol>
    <li>Navigate to the taxonomy page</li>
    <li>Hover over the term</li>
    <li>Click <strong>Delete</strong></li>
    <li>Confirm the deletion</li>
</ol>

<h2>Best Practices</h2>

<h3>Naming Conventions</h3>
<ul>
    <li>Use clear, consistent naming</li>
    <li>Avoid duplicates with slightly different names</li>
    <li>Consider future growth when creating hierarchies</li>
    <li>Use title case for proper names</li>
</ul>

<h3>Organisation Tips</h3>
<ul>
    <li><strong>Sources</strong>: Use official publication names</li>
    <li><strong>Subjects</strong>: Keep broad for flexibility</li>
    <li><strong>Regions</strong>: Follow standard geographic divisions</li>
    <li><strong>Topics</strong>: Be specific but not too granular</li>
</ul>

' . render_info_box('Tip', '
<p>Regular taxonomy maintenance ensures consistent categorisation. Review and consolidate terms quarterly to prevent taxonomy sprawl.</p>
', 'feature-box');

// Render the page
render_doc_page([
    'title' => 'Managing Taxonomies',
    'section' => 'media-monitor',
    'current_page' => 'managing-taxonomies',
    'nav_title' => 'Media Monitor',
    'intro' => 'Learn how to effectively use and manage the four custom taxonomies in Media Monitor.',
    'content' => $content,
    'last_updated' => 'March 17, 2026'
]);