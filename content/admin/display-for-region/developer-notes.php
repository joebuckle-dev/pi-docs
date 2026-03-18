<?php 
$page_title = 'Display for Region - Developer Notes';
$last_updated = 'March 17, 2026';
require_once '../../../includes/header.php'; 
require_once '../../../includes/navigation.php';

// Set up navigation for this section
require_once '_nav.php';
?>

<div class="doc-layout">
    <?php render_doc_nav($nav_items, 'developer-notes', 'Display for Region', '../../../'); ?>
    
    <div class="doc-content">
        <h1>Developer Notes</h1>

        <div class="highlight">
            <h2>Technical Implementation Details</h2>
            <p>Technical information for developers working with the Display for Region feature.</p>
        </div>

        <h2>System Requirements</h2>
        <div class="warning">
            <p><strong>Important:</strong> This feature uses Cloudflare country detection. Your site must be using Cloudflare for this to work properly.</p>
        </div>

        <h2>How Country Detection Works</h2>
        <ul>
            <li>Uses Cloudflare's CF-IPCountry header</li>
            <li>Fallback to MaxMind GeoIP database if available</li>
            <li>Returns XX for unknown locations</li>
            <li>Special handling for Tor networks (T1 code)</li>
        </ul>

        <h2>Implementation Notes</h2>
        <ul>
            <li>Country codes are cached per visitor session</li>
            <li>Shortcode processing happens during content rendering</li>
            <li>Region mappings are stored in plugin configuration</li>
            <li>Performance impact is minimal due to header-based detection</li>
        </ul>

        <h2>Testing</h2>
        <div class="feature-box">
            <h3>Development Testing</h3>
            <ul>
                <li>Use VPN services to test different countries</li>
                <li>Check browser developer tools for CF-IPCountry header</li>
                <li>Test with Cloudflare development mode enabled</li>
                <li>Verify caching behaviour with different visitor sessions</li>
            </ul>
        </div>

        <h2>Troubleshooting</h2>
        <ul>
            <li><strong>Content not showing:</strong> Verify Cloudflare is active</li>
            <li><strong>Wrong country detected:</strong> Check CF-IPCountry header value</li>
            <li><strong>Caching issues:</strong> Clear both WordPress and Cloudflare cache</li>
        </ul>
    </div>
</div>

<?php require_once '../../../includes/footer.php'; ?>