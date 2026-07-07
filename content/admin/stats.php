<?php
require_once '../../includes/templates.php';

// Documentation links to the reporting screens
$links = [
    ['url' => 'stats/popular-posts.php', 'title' => 'Popular Posts', 'description' => 'Most viewed, commented, trending and all-time leaders'],
    ['url' => 'stats/tracking-vs-popular-posts.php', 'title' => 'Tracking vs Popular Posts', 'description' => 'Compare the view-count sources per post'],
    ['url' => 'stats/google-analytics.php', 'title' => 'Google Analytics comparison', 'description' => 'Why GA differs from Popular Posts, and how bots are handled']
];

// Build content
$content = '
<h2>Overview</h2>
<p>The <strong>Stats</strong> menu gathers the site\'s view and engagement reporting into one place. It consolidates several reporting screens that previously lived under other menus, and adds two purpose-built views.</p>

<h2>Reporting screens</h2>
<ul>
    <li><strong>Popular Posts</strong>: most viewed and most commented content, plus what is trending now and the all-time leaders, drawn from WordPress Popular Posts data.</li>
    <li><strong>Tracking vs Popular Posts</strong>: a per-post comparison of pi-track-content view counts against Popular Posts view counts for the selected period.</li>
</ul>

<h2>Documentation</h2>
' . render_quick_links($links) . '

' . render_info_box('Read-only reporting', '
<p>These screens only display data; they never change how views are recorded. Recording is handled by the Popular Posts plugin and by pi-track-content respectively.</p>
', 'highlight');

// Render the page
render_doc_page([
    'title' => 'Stats Help',
    'section' => 'stats',
    'current_page' => 'overview',
    'nav_title' => 'Stats',
    'intro' => 'View and engagement reporting for the site, gathered under one menu.',
    'content' => $content,
    'last_updated' => 'June 2026'
]);
