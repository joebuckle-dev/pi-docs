<?php
require_once '../../../includes/templates.php';

// Build content
$content = '
<h2>Overview</h2>
<p>The <strong>Tracking vs Popular Posts</strong> screen compares per-post view counts from two independent sources for the selected period, so you can see where they agree and where they diverge:</p>
<ul>
    <li><strong>Popular Posts views</strong>: counts recorded by the WordPress Popular Posts plugin.</li>
    <li><strong>pi-track views</strong>: page-view events recorded by pi-track-content.</li>
</ul>

<h2>Reading the table</h2>
<ul>
    <li><strong>ID</strong>: the post ID.</li>
    <li><strong>Post</strong>: the title, with quick Edit / View links.</li>
    <li><strong>Popular Posts views</strong> and <strong>pi-track views</strong>: the two source counts for the range.</li>
    <li><strong>&Delta;</strong>: the difference (Popular Posts minus pi-track); shown green when positive, red when negative.</li>
    <li><strong>&Delta; %</strong>: that difference as a percentage of the larger of the two counts.</li>
    <li><strong>GA</strong>: shown only when Google Analytics is configured. Loaded on demand (see below).</li>
    <li><strong>Bots</strong>: shown only when the bot tracker is active. Verified crawler hits for that post in the range: a <em>separate</em> tally, not included in the view columns. Click a count for the breakdown by bot source.</li>
</ul>
<p>Click a column heading to sort by it. Only posts that pi-track-content has recorded activity for appear in the list.</p>

<h2>The Google Analytics column</h2>
<p>Google Analytics is an external source and slower to query, so it is <strong>never fetched automatically</strong>. It loads on demand:</p>
<ul>
    <li><strong>Load</strong> (per row): fetch that post&rsquo;s GA views for the range; the button is replaced by the number.</li>
    <li><strong>Load GA for this page</strong>: fetch every visible row in one batched call.</li>
    <li><strong>Test GA connection</strong>: check the GA credentials and report any problem.</li>
</ul>
<p>Results are cached for around 20 minutes. GA matches a post by its <strong>URL</strong>, so a post whose slug has changed (or a non-standard URL) may not resolve and shows a dash.</p>

<h2>Date range</h2>
<p>Use the <strong>From</strong> / <strong>To</strong> fields or a preset to set the period; both source counts are recalculated for that range.</p>

<h2>Drilling into a post</h2>
<p>Click a post title, or use the <strong>"Drill down to a post"</strong> search, to open a day-by-day breakdown comparing the two sources for that single post across the range.</p>

' . render_info_box('Why the numbers differ', '
<p>The systems count views in different ways, so some divergence is normal: Popular Posts counts the most (no bot filtering, no refresh de-duplication), pi-track is cleaner, and Google Analytics counts the fewest. Large, consistent gaps (or one internal source showing zero while the other does not) can still indicate a tracking issue worth investigating. For the full explanation (including how GA handles bots), see <a href="google-analytics.php">Google Analytics comparison</a>.</p>
', 'highlight');

// Render the page
render_doc_page([
    'title' => 'Tracking vs Popular Posts',
    'section' => 'stats',
    'current_page' => 'tracking-vs-popular-posts',
    'nav_title' => 'Stats',
    'intro' => 'Compare pi-track-content and Popular Posts view counts, per post.',
    'content' => $content,
    'last_updated' => 'June 2026'
]);
