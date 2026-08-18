<?php
require_once '../../../includes/templates.php';

// Build content
$content = '
<h2>Overview</h2>
<p>The <strong>Popular Posts</strong> screen shows view and comment statistics drawn from the WordPress Popular Posts data, presented in the Stats interface. It is read-only. Recording is handled by the Popular Posts plugin; this screen only displays it.</p>

<figure class="doc-screenshot">
    <img src="images/stats-popular-posts-view.png" alt="The Popular Posts screen showing the range totals, the Most viewed and Most commented tabs, and the Trending now and Hall of fame lists" />
    <figcaption>The Popular Posts screen: range totals, the Most viewed / Most commented tabs, and the Trending now and Hall of fame lists.</figcaption>
</figure>

<h2>Choosing a date range</h2>
<p>Use the <strong>From</strong> / <strong>To</strong> fields, or a preset (Last 7 / 30 / 90 days), to set the period. The range drives the <em>Most viewed</em> and <em>Most commented</em> lists and the totals shown at the top.</p>

<figure class="doc-screenshot">
    <img src="images/stats-popular-posts-date-range.png" alt="The date range and filter controls: From and To date fields, the preset selector, post type, result count, and the published-in-range checkbox" />
    <figcaption>Set the period with the From / To dates or a preset, then refine with the post type, count and freshness filters.</figcaption>
</figure>

<h3>Filters</h3>
<ul>
    <li><strong>Post type</strong>: limit the range lists to Posts or Pages (default: both).</li>
    <li><strong>Show</strong>: how many entries to list (Top 10 up to Top 100).</li>
    <li><strong>Min hits</strong>: hide posts below this many views (0 = show all). This also trims the Daily overview to days with qualifying activity.</li>
    <li><strong>Published from / Published to</strong>: restrict to content <em>published</em> within these dates, independent of the view window (for excluding old archive content).</li>
    <li><strong>Segment</strong>: filter the view counts by the viewer&rsquo;s subscription segment at the moment they viewed. <em>All traffic</em> (the default) is unchanged. The other choices are <em>Logged in (all users)</em>, <em>Logged in - Registered (no sub)</em>, <em>Logged in - Org sub</em>, <em>Logged in - Individual (Paid)</em>, <em>Logged in - Individual (FREE)</em> and <em>Logged out only</em>. This control only appears in Popular&nbsp;Posts mode (not Google&nbsp;Analytics mode).</li>
</ul>

' . render_info_box('About the Segment filter', '
<p>When you pick a segment, the view counts switch to a separate, <strong>human-only</strong> source that records each view stamped with the viewer&rsquo;s segment as it was at that moment (later tier changes never re-bucket old views). Because that source is <strong>captured going forward</strong> &mdash; from when the feature was enabled &mdash; it holds <strong>no history</strong> and will <strong>not</strong> match the <em>All traffic</em> totals, which keep the full Popular&nbsp;Posts history. A note appears on screen whenever a segment is active to remind you of this. <em>All traffic</em> continues to behave exactly as before.</p>
', 'highlight') . '

<h2>Daily overview</h2>
<p>A bar-per-day chart of activity across the selected range, newest day first. Only days that had activity are listed (empty days are omitted), so a long or sparse range doesn\'t show a wall of zeros.</p>

<h2>The lists</h2>
<ul>
    <li><strong>Most viewed (selected range)</strong>: top content by total views in the chosen period.</li>
    <li><strong>Most commented (selected range)</strong>: top content by approved comments in the period.</li>
    <li><strong>Trending now (last hour)</strong>: the posts with the most views in the last hour.</li>
    <li><strong>Hall of fame (all time)</strong>: the posts with the highest all-time view counts.</li>
</ul>

' . render_info_box('Trending &amp; Hall of Fame', '
<p>These two lists always show <strong>posts only</strong> (not pages), a fixed Top&nbsp;10, and ignore the date range and filters; they are a live snapshot and an all-time snapshot respectively.</p>
', 'highlight') . '

<h2>Popular Posts vs Google Analytics</h2>
<p>When Google Analytics is configured (under <strong>Stats &rsaquo; Settings</strong>), a <strong>Popular Posts / Google Analytics</strong> switch appears at the top of the screen. Each mode shows only the panels its source can fill:</p>
<ul>
    <li><strong>Popular Posts</strong> (default): the full picture above, sourced from WordPress Popular Posts.</li>
    <li><strong>Google Analytics</strong>: a leaner, GA-sourced view: <strong>Totals</strong> (GA views), <strong>Daily overview</strong> (GA views per day) and <strong>Most viewed</strong> (ranked by GA views). Most&nbsp;commented, Trending&nbsp;now, Hall&nbsp;of&nbsp;fame and the Bots column are hidden; GA can&rsquo;t provide them.</li>
</ul>
<p>GA mode is &ldquo;posts only&rdquo; (each GA page is matched back to a post by URL) and makes a live, cached call to Google, so it&rsquo;s a little slower than the instant Popular&nbsp;Posts mode.</p>

' . render_info_box('GA numbers look lower: this is expected behaviour', '
<p>Google Analytics almost always reports fewer views than Popular Posts, because it filters bots its own way and only counts visitors who run Google&rsquo;s JavaScript after accepting the consent banner. See <a href="google-analytics.php">Google Analytics comparison</a> for the full explanation.</p>
', 'highlight') . '

<h2>Stats for a specific post</h2>
<p>Use the <strong>"Stats for a specific post"</strong> search box to find any post or page by title. Selecting one shows that item\'s day-by-day views and its view and comment totals for the selected range, with links to edit or view it. Use <strong>Back to lists</strong> to return.</p>

<figure class="doc-screenshot">
    <img src="images/stats-popular-posts-single-post-search.png" alt="The Stats for a specific post search box with a list of matching post titles appearing as the user types" />
    <figcaption>Start typing a title to find a single post or page, then select it to see its day-by-day views and totals.</figcaption>
</figure>

' . render_info_box('Always up to date', '
<p>Single-post lookups are calculated live every time (never cached), so the figures for a specific post over a specific period are always accurate.</p>
', 'feature-box') . '

<h2>Performance</h2>
<p>The range lists are cached for a few minutes and kept warm in the background, so everyday use stays fast even on very large datasets. Extremely wide date ranges are capped to keep queries responsive. Use <em>Hall of fame</em> for all-time figures.</p>';

// Render the page
render_doc_page([
    'title' => 'Popular Posts',
    'section' => 'stats',
    'current_page' => 'popular-posts',
    'nav_title' => 'Stats',
    'intro' => 'View counts, comments, trending and all-time leaders from Popular Posts data.',
    'content' => $content,
    'last_updated' => 'June 2026'
]);
