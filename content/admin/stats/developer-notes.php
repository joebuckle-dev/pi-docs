<?php
require_once '../../../includes/templates.php';

$content = <<<'HTML'
HTML;

$content .= render_info_box(
    'For developers and administrators',
    '<p>The Stats module ships two WP-CLI commands under <code>wp pi-stats</code> for testing the Popular Posts viewer-segment feature and managing its cache. They are read-only against your view data (they never write or alter view counts) and load only under WP-CLI, so they add no weight to normal page loads.</p>',
    'highlight'
);

$content .= <<<'HTML'

<h2>WP-CLI commands</h2>
<p>Both commands operate on the <strong>current blog</strong>. On multisite, pass <code>--url=</code> to target a specific subsite; otherwise the main site&rsquo;s tables are used.</p>

<h3><code>wp pi-stats segments</code></h3>
<p>Tests the Popular Posts viewer-segment filters against live data for a date range. It prints:</p>
<ul>
    <li><strong>Raw capture breakdown</strong> &mdash; total pageviews grouped by segment, read straight from the per-segment capture table, plus the earliest captured date (useful for confirming <em>when</em> capture began after go-live).</li>
    <li><strong>Per-segment read results</strong> &mdash; each filter (<em>(all traffic)</em>, <em>logged_in</em>, <em>org</em>, and so on) run through the same totals / most-viewed / daily-series methods the admin screen uses, tabled as views, top post and active-day count.</li>
    <li><strong>Per-post drill-down</strong> (optional, with <code>--post_id</code>) &mdash; the same per-segment comparison for a single post.</li>
</ul>
<p>It flushes the panel cache first (unless <code>--no-flush</code>) so the numbers are live, and clamps the range exactly as the screen does.</p>

<h4>Options</h4>
<ul>
    <li><code>--from=&lt;date&gt;</code> &mdash; range start (Y-m-d). When omitted, derived from <code>--to</code> and <code>--days</code>.</li>
    <li><code>--to=&lt;date&gt;</code> &mdash; range end (Y-m-d). Default: today.</li>
    <li><code>--days=&lt;n&gt;</code> &mdash; window size (days) ending at <code>--to</code> when <code>--from</code> is omitted. Default: 1 (today).</li>
    <li><code>--post_id=&lt;id&gt;</code> &mdash; also print the per-segment drill-down for this post.</li>
    <li><code>--limit=&lt;n&gt;</code> &mdash; top-N for the most-viewed probe. Default: 10.</li>
    <li><code>--no-flush</code> &mdash; do not flush the panel cache first (report whatever is currently cached).</li>
</ul>

<h4>Examples</h4>
<pre><code>wp pi-stats segments --url=http://localhost/
wp pi-stats segments --days=7 --post_id=123</code></pre>
<p>Right after enabling the segment feature, this is how you confirm capture is working: run it and check that &ldquo;Captured data since&rdquo; is set and the logged-in segments start showing counts.</p>

<h3><code>wp pi-stats flush</code></h3>
<p>Invalidates the Popular Posts panel cache so the admin screens recompute on the next load. By default this is a <strong>scoped</strong> invalidation (a cache-namespace version bump) that only affects pi-stats panels &mdash; safe on a box also running W3TC or WP Super Cache.</p>

<h4>Options</h4>
<ul>
    <li><code>--hard</code> &mdash; also run <code>wp_cache_flush()</code>, which clears the <strong>entire</strong> site object cache (affects other caches too). Use with care.</li>
    <li><code>--warm</code> &mdash; re-populate the default panels afterwards (runs the cache warmer).</li>
</ul>

<h4>Examples</h4>
<pre><code>wp pi-stats flush --url=http://localhost/
wp pi-stats flush --hard --warm</code></pre>
HTML;

$content .= render_info_box(
    'Scoped vs hard flush',
    '<p>The default flush is a version bump that orphans the module&rsquo;s own cached panels only; other plugins&rsquo; caches are untouched. Reach for <code>--hard</code> only when you specifically need the whole object cache cleared.</p>',
    'feature-box'
);

render_doc_page([
    'title' => 'Stats Developer Notes',
    'section' => 'stats',
    'current_page' => 'developer-notes',
    'nav_title' => 'Stats',
    'intro' => 'WP-CLI commands for testing the Popular Posts segment filters and managing the panel cache.',
    'content' => $content,
    'last_updated' => 'July 2026'
]);
