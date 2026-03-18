<?php 
$page_title = 'Media Monitor - Managing Taxonomies';
$last_updated = 'March 17, 2026';
require_once '../../../includes/header.php'; 
require_once '../../../includes/navigation.php';

// Set up navigation for this section
require_once '_nav.php';
?>

<div class="doc-layout">
    <?php render_doc_nav($nav_items, 'managing-taxonomies', 'Media Monitor', '../../../'); ?>
    
    <div class="doc-content">
        <h1>Managing Media Monitor Taxonomies</h1>

        <div class="highlight">
            <h2>What Are Taxonomies?</h2>
            <p>Taxonomies are organised categories used to classify and filter Media Monitor content. They help users find specific types of content quickly.</p>
        </div>

        <h2>Overview of Media Monitor Taxonomies</h2>

        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr style="background: #f8f9fa;">
                <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">Taxonomy</th>
                <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">Purpose</th>
                <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">Examples</th>
            </tr>
            <tr>
                <td style="border: 1px solid #dee2e6; padding: 12px;"><strong>Sources</strong></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Media outlets and publications</td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">BBC, Guardian, Sky News, Local papers</td>
            </tr>
            <tr style="background: #f8f9fa;">
                <td style="border: 1px solid #dee2e6; padding: 12px;"><strong>Subjects</strong></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Content categories and police forces</td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Crime, Traffic, Metropolitan Police</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dee2e6; padding: 12px;"><strong>Topics</strong></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Specific subject matter themes</td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Fraud, Terrorism, Community Policing</td>
            </tr>
            <tr style="background: #f8f9fa;">
                <td style="border: 1px solid #dee2e6; padding: 12px;"><strong>Regions</strong></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Geographical areas</td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">London, Scotland, North West</td>
            </tr>
        </table>

        <h2>Managing Sources</h2>

        <h3>Adding New Media Sources</h3>
        <ol>
            <li>Go to <strong>Media Monitor</strong> → <strong>Sources</strong> in the Admin Panel</li>
            <li>Click <strong>Add New Source</strong></li>
            <li>Fill in the required fields:
                <ul>
                    <li><strong>Name</strong>: Official name of the media outlet</li>
                    <li><strong>Slug</strong>: URL-friendly version (usually auto-generated)</li>
                    <li><strong>Description</strong>: Brief description of the outlet (optional)</li>
                </ul>
            </li>
            <li>Click <strong>Add New Source</strong></li>
        </ol>

        <div class="feature-box">
            <h4>Source Naming Best Practices</h4>
            <ul>
                <li>Use official publication names: "BBC News", not "BBC"</li>
                <li>For local papers, include location: "Manchester Evening News"</li>
                <li>Be consistent with naming conventions</li>
                <li>Check existing sources to avoid duplicates</li>
            </ul>
        </div>

        <h3>Editing Existing Sources</h3>
        <ol>
            <li>Go to <strong>Media Monitor</strong> → <strong>Sources</strong></li>
            <li>Find the source you want to edit</li>
            <li>Click <strong>Edit</strong> under the source name</li>
            <li>Make your changes and click <strong>Update</strong></li>
        </ol>

        <h2>Managing Subjects</h2>

        <div class="highlight">
            <h3>Understanding Subjects Structure</h3>
            <p>Subjects are organised hierarchically with main categories and sub-categories. This includes both content topics and specific police forces.</p>
        </div>

        <h3>Subject Categories Include:</h3>
        <ul>
            <li><strong>Content Categories</strong>: Crime, Traffic, Court Cases, Policy</li>
            <li><strong>Police Forces</strong>: Metropolitan Police, Greater Manchester Police, etc.</li>
            <li><strong>Specialist Units</strong>: Counter-terrorism, Fraud, Cyber Crime</li>
            <li><strong>General Topics</strong>: Training, Equipment, Community Relations</li>
        </ul>

        <h3>Adding New Subject Categories</h3>
        <ol>
            <li>Go to <strong>Media Monitor</strong> → <strong>Subjects</strong></li>
            <li>Click <strong>Add New Subject</strong></li>
            <li>Choose appropriate parent category if applicable</li>
            <li>Fill in name and description</li>
            <li>Click <strong>Add New Subject</strong></li>
        </ol>

        <div class="warning">
            <p><strong>Important:</strong> The Subjects taxonomy has an overview structure that separates police forces from general content categories. Maintain this organisation when adding new items.</p>
        </div>

        <h2>Managing Topics</h2>

        <h3>Understanding Topics</h3>
        <p>Topics provide more granular classification within broader subject areas. They help users find very specific content themes.</p>

        <h3>Adding New Topics</h3>
        <ol>
            <li>Go to <strong>Media Monitor</strong> → <strong>Topics</strong></li>
            <li>Click <strong>Add New Topic</strong></li>
            <li>Enter a descriptive name</li>
            <li>Add description explaining what content should use this topic</li>
            <li>Click <strong>Add New Topic</strong></li>
        </ol>

        <div class="warning">
            <p><strong>Note:</strong> Topics also have an overview structure. Consider how new topics fit within the existing organisational framework.</p>
        </div>

        <h2>Managing Regions</h2>

        <h3>Regional Organisation</h3>
        <p>Regions help categorise content by geographical area, useful for location-specific policing news.</p>

        <h3>Adding New Regions</h3>
        <ol>
            <li>Go to <strong>Media Monitor</strong> → <strong>Regions</strong></li>
            <li>Click <strong>Add New Region</strong></li>
            <li>Use consistent geographical naming</li>
            <li>Consider hierarchy (e.g., England > London > Westminster)</li>
            <li>Click <strong>Add New Region</strong></li>
        </ol>

        <h2>Best Practices for Taxonomy Management</h2>

        <div class="feature-box">
            <h3>Consistency Guidelines</h3>
            <ul>
                <li><strong>Check existing terms</strong> before adding new ones</li>
                <li><strong>Use standard spelling</strong> and official names</li>
                <li><strong>Maintain hierarchy</strong> - use parent/child relationships appropriately</li>
                <li><strong>Regular review</strong> - periodically clean up unused or duplicate terms</li>
                <li><strong>Document decisions</strong> - note why specific terms were chosen</li>
            </ul>
        </div>

        <h2>Finding and Organising Taxonomy Terms</h2>

        <h3>Viewing All Terms</h3>
        <ul>
            <li>Each taxonomy has its own admin page under <strong>Media Monitor</strong></li>
            <li>Use the search box to find specific terms quickly</li>
            <li>Sort by name, count, or date created</li>
            <li>Use bulk actions for multiple changes</li>
        </ul>

        <h3>Usage Statistics</h3>
        <p>Each taxonomy term shows how many posts use it. This helps identify:</p>
        <ul>
            <li>Popular categories that might need sub-categories</li>
            <li>Unused terms that could be removed</li>
            <li>Inconsistent usage patterns</li>
        </ul>

        <h2>Common Taxonomy Issues</h2>

        <h3>Duplicate or Similar Terms</h3>
        <ul>
            <li>Check for variations in spelling or naming</li>
            <li>Merge similar terms by editing posts to use the preferred term</li>
            <li>Delete unused duplicates</li>
        </ul>

        <h3>Missing Categories</h3>
        <ul>
            <li>Regular content creators may request new categories</li>
            <li>Evaluate if the request fits existing structure</li>
            <li>Consider if a sub-category is more appropriate</li>
        </ul>

        <h2>See Also</h2>
        <ul>
            <li><a href="creating-posts.php">Creating Posts</a> - How to use taxonomies when creating content</li>
            <li><a href="../media-monitor.php">Media Monitor Overview</a> - General system information</li>
            <li><a href="developer-notes.php">Developer Notes</a> - Technical taxonomy implementation</li>
        </ul>
    </div>
</div>

<?php require_once '../../../includes/footer.php'; ?>