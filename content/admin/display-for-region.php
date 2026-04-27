<?php
require_once '../../includes/templates.php';

$content = <<<'HTML'
HTML;

$content .= render_info_box(
    'What does this feature do?',
    '<p>It shows different content to people from different countries.</p>
    <p><strong>Example:</strong> Show UK pricing to UK visitors, EU pricing to EU visitors, etc.</p>',
    'highlight'
);

$content .= <<<'HTML'

<h2>Overview</h2>
<p>This feature enables location-based content delivery for international audiences:</p>
<ul>
    <li>Show country-specific pricing</li>
    <li>Display local contact information</li>
    <li>Provide region-appropriate content</li>
    <li>Customise messages based on visitor location</li>
</ul>

<h2>How It Works</h2>
<ol>
    <li>The system detects the visitor's country using GeoIP</li>
    <li>You wrap content in shortcodes for specific countries/regions</li>
    <li>Only visitors from those locations see the content</li>
    <li>You can include or exclude specific countries</li>
</ol>

<h2>Key Features</h2>
<ul>
    <li><strong>Country Detection</strong>: Automatic visitor location identification</li>
    <li><strong>Region Support</strong>: Target entire regions (Europe, Asia, etc.)</li>
    <li><strong>Flexible Rules</strong>: Include or exclude specific countries</li>
    <li><strong>Simple Shortcode</strong>: Easy to use in any post or page</li>
</ul>

<h2>Quick Example</h2>
<pre><code>[display-for-region locations="GB"]
Price: £99
[/display-for-region]

[display-for-region locations="US,CA"]
Price: $120
[/display-for-region]</code></pre>
HTML;

$content .= render_info_box(
    'Getting Started',
    '<ol>
        <li>Ensure the feature is activated in the Admin Panel</li>
        <li>Create your country-specific content</li>
        <li>Wrap it in the <code>[display-for-region]</code> shortcode</li>
        <li>Test with a VPN or proxy</li>
    </ol>',
    'feature-box'
);

render_doc_page([
    'title' => 'Display for Region',
    'section' => 'display-for-region',
    'current_page' => 'overview',
    'nav_title' => 'Display for Region',
    'content' => $content,
    'last_updated' => 'March 17, 2026'
]);