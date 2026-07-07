<?php
require_once '../../../includes/templates.php';

// Build content
$content = '
<h2>Overview</h2>
<p>When the Google Analytics module is configured (under <strong>Stats &rsaquo; Settings</strong>), the Stats screens can compare the site\'s internal view counts against <strong>Google Analytics (GA4)</strong>. GA appears in two places:</p>
<ul>
    <li><strong>Tracking vs Popular Posts</strong>: an extra <strong>GA</strong> column you load on demand per post (or for the whole page).</li>
    <li><strong>Popular Posts</strong>: a <strong>Popular Posts / Google Analytics</strong> mode switch that re-sources the screen from GA.</li>
</ul>

' . render_info_box('Summary', '
<p>Google Analytics almost always reports <strong>fewer</strong> views than Popular Posts or Content Tracking. This is expected. It is not a bug and not a sign that tracking is broken. Each system counts a <strong>different audience</strong> in a different way, so the numbers will never match.</p>
', 'highlight') . '

<h2>Why Google Analytics is lower</h2>
<p>The internal counters and Google Analytics are measuring different things. From the loosest count to the strictest:</p>

<table class="doc-table">
    <thead>
        <tr><th>Source</th><th>How it counts</th><th>Bots</th><th>Refreshes</th></tr>
    </thead>
    <tbody>
        <tr><td><strong>Popular Posts</strong></td><td>JavaScript beacon on every page load</td><td>No filtering</td><td>Counted every time</td></tr>
        <tr><td><strong>Content Tracking</strong></td><td>Image pixel (works without JavaScript)</td><td>Bots filtered / verified bots diverted</td><td>De-duplicated within 30 seconds</td></tr>
        <tr><td><strong>Google Analytics</strong></td><td>Google&rsquo;s JavaScript tag</td><td>Google&rsquo;s own bot filtering</td><td>Counted (sessionised)</td></tr>
    </tbody>
</table>

<p>Google Analytics ends up lowest because several things stack up:</p>
<ul>
    <li><strong>It needs JavaScript <em>and</em> consent.</strong> GA only records a visit once the visitor&rsquo;s browser runs Google&rsquo;s tag, which happens <em>after</em> they accept the cookie/consent banner. Anyone who declines the banner, or uses an <strong>ad / tracking blocker</strong> (very common), is invisible to GA but is still a real person the site served.</li>
    <li><strong>Google removes bots its own way.</strong> GA4 automatically excludes traffic from known bots and spiders using Google&rsquo;s own list. That is good, but it means GA and the internal counters are stripping out <em>different</em> sets of bots, so they can&rsquo;t line up exactly.</li>
    <li><strong>Sampling &amp; thresholding.</strong> On larger data sets GA may sample, and it hides very small counts for privacy, so low numbers can fluctuate.</li>
    <li><strong>Limited history.</strong> GA4 keeps detailed data for roughly 14 months, so it can&rsquo;t provide true &ldquo;all-time&rdquo; figures.</li>
</ul>

' . render_info_box('Why GA mode shows fewer panels', '
<p>On the Popular Posts screen, <strong>Google Analytics mode</strong> deliberately hides Most&nbsp;commented, Trending&nbsp;now, Hall&nbsp;of&nbsp;fame and the Bots column. GA has no comment data, no reliable &ldquo;last hour&rdquo; in standard reporting, only ~14&nbsp;months of history, and it handles bots itself, so those panels can&rsquo;t be filled honestly from GA.</p>
', 'highlight') . '

<h2>Posts-only matching</h2>
<p>Google Analytics reports by <strong>page URL</strong>, while the site counts by post. GA figures in Stats are therefore <strong>&ldquo;posts only&rdquo;</strong>: each GA page is matched back to a WordPress post by its URL. A post whose slug has changed (GA still holds the old URL), or a non-post page such as the home page or an archive, won&rsquo;t match and is left out. This keeps the GA totals consistent with the GA &ldquo;Most viewed&rdquo; list, but means the GA view of the site is a subset.</p>

<h2>What about the &ldquo;Bots&rdquo; column?</h2>
' . render_info_box('Don&rsquo;t subtract it', '
<p>The <strong>Bots</strong> figure is a <em>separate</em> tally of verified crawlers (confirmed by reverse-DNS and known-bot user agents). It is <strong>not</strong> included in the view columns: Content&nbsp;Tracking already diverts verified bots out of its count, and classic crawlers don&rsquo;t run JavaScript so they never reach the Popular&nbsp;Posts beacon. Subtracting the Bots number from a view count would therefore double-remove. Treat it as visibility into crawler activity, not a correction factor.</p>
', 'warning') . '

<h2>Which number should I quote?</h2>
<ul>
    <li><strong>&ldquo;How many real people saw this?&rdquo;</strong> &rarr; <strong>Content Tracking</strong> is the best proxy: bot-filtered, de-duplicated, and not blocked by consent or ad-blockers.</li>
    <li><strong>&ldquo;What will match Google&rsquo;s own reports?&rdquo;</strong> &rarr; <strong>Google Analytics</strong>: a deliberately conservative, consent-and-bot-filtered subset.</li>
    <li><strong>&ldquo;What&rsquo;s the raw popularity ranking?&rdquo;</strong> &rarr; <strong>Popular Posts</strong>: loosest, good for relative ordering but inflated by bots and refreshes.</li>
</ul>

' . render_info_box('Talking to a client', '
<p>Expect <strong>Popular Posts &gt; Content Tracking &gt; Google Analytics</strong>. Frame GA as &ldquo;how Google sees it&rdquo;, not as the &ldquo;true&rdquo; number the others are wrong against. The comparison exists so you can <em>explain</em> the gap rather than have one figure quietly contradict another.</p>
', 'feature-box');

// Render the page
render_doc_page([
    'title' => 'Google Analytics comparison',
    'section' => 'stats',
    'current_page' => 'google-analytics',
    'nav_title' => 'Stats',
    'intro' => 'How Google Analytics fits into the Stats screens, and why its numbers differ from Popular Posts.',
    'content' => $content,
    'last_updated' => 'June 2026'
]);
