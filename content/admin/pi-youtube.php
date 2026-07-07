<?php
require_once '../../includes/templates.php';

$content = <<<'HTML'
HTML;

$content .= render_info_box(
    'Summary',
    '<p>Embeds a YouTube video via the <code>[pi-youtube]</code> shortcode. Only the <code>src</code> attribute is required.</p>
    <p>The player renders at 100% width with a fixed 16:9 aspect ratio, so <code>width</code> and <code>height</code> do not need to be specified.</p>',
    'highlight'
);

$content .= <<<'HTML'

<h2>Overview</h2>
<p>The <code>[pi-youtube]</code> shortcode outputs a responsive YouTube player:</p>
<ul>
    <li>Requires only the video embed URL</li>
    <li>Scales to the full width of its container</li>
    <li>Maintains a 16:9 aspect ratio at all widths</li>
    <li>Renders correctly on desktop, tablet and mobile without additional configuration</li>
</ul>

<h2>Quick Example</h2>
<pre><code>[pi-youtube src="https://www.youtube.com/embed/dQw4w9WgXcQ"]</code></pre>
<p>No <code>width</code>, <code>height</code> or aspect-ratio attributes are required. The shortcode enforces 16:9.</p>

<h2>Finding the Embed URL</h2>
<ol>
    <li>Open the video on YouTube</li>
    <li>Select <strong>Share</strong>, then <strong>Embed</strong></li>
    <li>Copy the URL from the <code>src="..."</code> attribute. Format: <code>https://www.youtube.com/embed/VIDEO_ID</code></li>
    <li>Pass it as the <code>src</code> attribute of the shortcode</li>
</ol>
HTML;

$content .= render_info_box(
    'Usage',
    '<ol>
        <li>Copy the video embed URL from YouTube</li>
        <li>Insert <code>[pi-youtube src="...URL..."]</code> at the target location</li>
        <li>Preview the post to confirm the player renders at full width in 16:9</li>
    </ol>',
    'feature-box'
);

render_doc_page([
    'title' => 'YouTube Embed',
    'section' => 'pi-youtube',
    'current_page' => 'overview',
    'nav_title' => 'YouTube Embed',
    'content' => $content,
    'last_updated' => 'July 7, 2026'
]);
