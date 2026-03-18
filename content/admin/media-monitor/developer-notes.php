<?php 
$page_title = 'Media Monitor - Developer Notes';
$last_updated = 'March 17, 2026';
require_once '../../../includes/header.php'; 
require_once '../../../includes/navigation.php';

// Set up navigation for this section
require_once '_nav.php';
?>

<div class="doc-layout">
    <?php render_doc_nav($nav_items, 'developer-notes', 'Media Monitor', '../../../'); ?>
    
    <div class="doc-content">
        <h1>Media Monitor Developer Notes</h1>

        <div class="highlight">
            <h2>Technical Implementation Details</h2>
            <p>Technical information for developers working with the Media Monitor system architecture and integrations.</p>
        </div>

        <h2>URL Checker Implementation</h2>

        <h3>Custom ACF Field Type</h3>
        <p><strong>File:</strong> <code>/wp-content/themes/policing-insight/setup/acf/acf-media-monitor-url.php</code></p>

        <h4>Core Functionality</h4>
        <ul>
            <li><strong>Custom Field Class:</strong> <code>acf_field_media_monitor_url</code></li>
            <li><strong>AJAX Validation:</strong> Real-time duplicate checking</li>
            <li><strong>Database Queries:</strong> Direct wpdb queries for performance</li>
            <li><strong>Status Handling:</strong> EXISTS, EXISTS_DRAFT, NOT_EXISTS responses</li>
        </ul>

        <h4>Key SQL Query</h4>
        <pre><code>SELECT p.ID, p.post_title, p.post_status, p.post_parent, p.post_name
FROM {$wpdb->posts} p 
INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id 
WHERE p.post_type = 'media-monitor' 
AND {$status_condition}
AND p.post_name NOT LIKE '%%autosave-v1%%'
AND p.post_name NOT LIKE '%%revision%%'
AND p.post_parent = 0
AND pm.meta_key = 'url' 
AND pm.meta_value = %s 
AND p.ID != %d
AND p.ID != %d</code></pre>

        <h4>Performance Optimizations</h4>
        <ul>
            <li><strong>Autosave Exclusion:</strong> Filters out WordPress autosaves to prevent false positives</li>
            <li><strong>Revision Filtering:</strong> Excludes post revisions from duplicate checks</li>
            <li><strong>Parent Post Handling:</strong> Only checks parent posts, not children</li>
            <li><strong>Prepared Statements:</strong> Uses wpdb prepare for SQL injection prevention</li>
        </ul>

        <h3>JavaScript Integration</h3>
        <p><strong>File:</strong> <code>/wp-content/themes/policing-insight/setup/acf/acf-media-monitor-url.js</code></p>

        <h4>AJAX Workflow</h4>
        <ol>
            <li>User clicks "Check" button</li>
            <li>JavaScript makes AJAX call to <code>check_media_monitor_url</code></li>
            <li>Server validates URL and returns status</li>
            <li>JavaScript updates UI with appropriate styling and messages</li>
        </ol>

        <h4>Status Responses</h4>
        <ul>
            <li><strong>NOT_EXISTS:</strong> Green styling, URL available</li>
            <li><strong>EXISTS_DRAFT:</strong> Amber warning, found in draft posts</li>
            <li><strong>EXISTS:</strong> Red error, duplicate found in published posts</li>
        </ul>

        <h2>Access at Source Field Implementation</h2>

        <h3>Meta Field Configuration</h3>
        <p><strong>Meta Key:</strong> <code>access_at_source</code></p>

        <h4>Available Options</h4>
        <ul>
            <li><strong>Open:</strong> Free access to original content</li>
            <li><strong>Subscription:</strong> Requires paid subscription at source</li>
            <li><strong>Registration:</strong> Requires free registration at source</li>
        </ul>

        <h3>Frontend Integration</h3>
        <p>This field affects subscriber access control and display logic in the frontend templates.</p>

        <h2>Cross-Site Content Injection (PolicingTV)</h2>

        <h3>Multi-Site Architecture</h3>
        <p>Media Monitor content can be injected from the secondary site (PolicingTV) into the main platform.</p>

        <h4>Implementation Details</h4>
        <ul>
            <li><strong>Blog Switching:</strong> Uses WordPress <code>switch_to_blog()</code> function</li>
            <li><strong>Content Synchronisation:</strong> Automated content replication between sites</li>
            <li><strong>Taxonomy Mapping:</strong> Ensures consistent categorisation across sites</li>
            <li><strong>URL Handling:</strong> Maintains source attribution and duplicate prevention</li>
        </ul>

        <h4>Key Functions</h4>
        <pre><code>// Example cross-site content retrieval
switch_to_blog($policing_tv_blog_id);
$posts = get_posts([
    'post_type' => 'media-monitor',
    'numberposts' => -1,
    'meta_query' => [
        [
            'key' => 'sync_status',
            'value' => 'pending',
            'compare' => '='
        ]
    ]
]);
restore_current_blog();</code></pre>

        <h3>Data Synchronisation Process</h3>
        <ol>
            <li><strong>Content Creation:</strong> Posts created on PolicingTV site</li>
            <li><strong>Sync Trigger:</strong> Automated or manual sync process initiated</li>
            <li><strong>Validation:</strong> URL duplicate checking across both sites</li>
            <li><strong>Content Transfer:</strong> Post data and meta fields copied</li>
            <li><strong>Taxonomy Sync:</strong> Categories and tags matched/created</li>
            <li><strong>Status Update:</strong> Sync status tracked for monitoring</li>
        </ol>

        <h2>Database Schema Extensions</h2>

        <h3>Custom Meta Fields</h3>
        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr style="background: #f8f9fa;">
                <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">Meta Key</th>
                <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">Purpose</th>
                <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">Type</th>
            </tr>
            <tr>
                <td style="border: 1px solid #dee2e6; padding: 12px;"><code>url</code></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">External source URL</td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">string</td>
            </tr>
            <tr style="background: #f8f9fa;">
                <td style="border: 1px solid #dee2e6; padding: 12px;"><code>access_at_source</code></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Access requirements</td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">select</td>
            </tr>
            <tr>
                <td style="border: 1px solid #dee2e6; padding: 12px;"><code>sync_status</code></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Cross-site sync tracking</td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">string</td>
            </tr>
            <tr style="background: #f8f9fa;">
                <td style="border: 1px solid #dee2e6; padding: 12px;"><code>source_site_id</code></td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">Originating site identifier</td>
                <td style="border: 1px solid #dee2e6; padding: 12px;">integer</td>
            </tr>
        </table>

        <h3>Index Recommendations</h3>
        <p>For optimal performance with large datasets (10,000+ posts):</p>
        <pre><code>-- Recommended database indexes
ALTER TABLE wp_postmeta ADD INDEX idx_meta_key_value (meta_key, meta_value(255));
ALTER TABLE wp_posts ADD INDEX idx_post_type_status (post_type, post_status);
ALTER TABLE wp_posts ADD INDEX idx_post_name_type (post_name, post_type);</code></pre>

        <h2>Integration Points</h2>

        <h3>WordPress Hooks Used</h3>
        <ul>
            <li><strong><code>transition_post_status</code>:</strong> Triggers URL checking on publish</li>
            <li><strong><code>wp_ajax_check_media_monitor_url</code>:</strong> AJAX URL validation</li>
            <li><strong><code>acf/load_field</code>:</strong> Dynamic field loading</li>
            <li><strong><code>admin_notices</code>:</strong> Display validation messages</li>
        </ul>

        <h3>ACF Integration</h3>
        <ul>
            <li><strong>Field Registration:</strong> Custom field type registration with ACF</li>
            <li><strong>Admin Interface:</strong> Seamless integration with WordPress admin</li>
            <li><strong>Field Validation:</strong> Real-time validation feedback</li>
            <li><strong>CSS/JS Assets:</strong> Custom styling and behaviour</li>
        </ul>

        <h2>Error Handling and Logging</h2>

        <h3>URL Validation Errors</h3>
        <ul>
            <li><strong>Database Connection:</strong> Graceful fallback for DB errors</li>
            <li><strong>Invalid URLs:</strong> Format validation and user feedback</li>
            <li><strong>Timeout Handling:</strong> AJAX request timeout management</li>
            <li><strong>Permission Errors:</strong> User capability checking</li>
        </ul>

        <h3>Debug Information</h3>
        <p>When debug mode is enabled, the URL checker provides detailed information:</p>
        <ul>
            <li>SQL query execution details</li>
            <li>Post IDs and titles of conflicting content</li>
            <li>Post status and parent relationships</li>
            <li>User permission context</li>
        </ul>

        <h2>Performance Considerations</h2>

        <h3>Large Dataset Optimisation</h3>
        <ul>
            <li><strong>Query Limits:</strong> Consider pagination for very large result sets</li>
            <li><strong>Caching Strategy:</strong> Implement transient caching for repeated URL checks</li>
            <li><strong>Database Indexing:</strong> Ensure proper indexes on frequently queried fields</li>
            <li><strong>Memory Management:</strong> Optimise queries to reduce memory usage</li>
        </ul>

        <h3>Recommended Caching</h3>
        <pre><code>// Example caching implementation
$cache_key = 'media_monitor_url_' . md5($url);
$result = get_transient($cache_key);

if (false === $result) {
    $result = $this->check_url_in_database($url);
    set_transient($cache_key, $result, HOUR_IN_SECONDS);
}

return $result;</code></pre>

        <h2>Security Considerations</h2>

        <h3>SQL Injection Prevention</h3>
        <ul>
            <li>All database queries use <code>wpdb->prepare()</code></li>
            <li>User input is sanitised before processing</li>
            <li>Capability checks for admin functions</li>
        </ul>

        <h3>AJAX Security</h3>
        <ul>
            <li>WordPress nonce verification</li>
            <li>User permission validation</li>
            <li>Input sanitisation and validation</li>
        </ul>

        <h2>Future Development</h2>

        <h3>Potential Enhancements</h3>
        <ul>
            <li><strong>Bulk URL Validation:</strong> Check multiple URLs simultaneously</li>
            <li><strong>URL Normalization:</strong> Handle URL variations (www, https, trailing slashes)</li>
            <li><strong>Historical Tracking:</strong> Maintain audit log of URL changes</li>
            <li><strong>Integration APIs:</strong> External system integration for automated content import</li>
        </ul>

        <h2>Troubleshooting</h2>

        <h3>Common Issues</h3>
        <ul>
            <li><strong>False Positives:</strong> Usually caused by autosaves, fixed in current implementation</li>
            <li><strong>Performance Issues:</strong> Check database indexes and query optimization</li>
            <li><strong>Cross-site Sync Failures:</strong> Verify network connectivity and permissions</li>
            <li><strong>AJAX Failures:</strong> Check JavaScript console and server logs</li>
        </ul>
    </div>
</div>

<?php require_once '../../../includes/footer.php'; ?>