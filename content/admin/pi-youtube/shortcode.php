<?php
require_once '../../../includes/templates.php';

$content = <<<'HTML'
<h2>Usage</h2>
<p>Add the shortcode where the video should appear. The only required attribute is <code>src</code>:</p>
HTML;

$content .= render_info_box(
    'Basic Format',
    '<pre><code>[pi-youtube src="https://www.youtube.com/embed/VIDEO_ID"]</code></pre>
    <p>No <code>width</code>, <code>height</code> or aspect-ratio attributes are required. The player fills the container width and enforces a 16:9 ratio.</p>',
    'highlight'
);

$content .= <<<'HTML'

<h2>Examples</h2>

<h3>Minimal</h3>
<pre><code>[pi-youtube src="https://www.youtube.com/embed/dQw4w9WgXcQ"]</code></pre>

<h3>With a caption</h3>
<pre><code>[pi-youtube src="https://www.youtube.com/embed/dQw4w9WgXcQ" caption="Chief Constable's briefing"]</code></pre>

<h2>Required Attribute</h2>
<table>
    <thead>
        <tr><th>Attribute</th><th>Description</th><th>Default</th></tr>
    </thead>
    <tbody>
        <tr><td><code>src</code></td><td>The YouTube embed URL of the video.</td><td>n/a</td></tr>
    </tbody>
</table>

<h2>Optional Attributes</h2>
<p>None of these affect sizing; the player is always rendered at full width in 16:9. Set an attribute only to apply its specific effect.</p>
<table>
    <thead>
        <tr><th>Attribute</th><th>Description</th><th>Default</th></tr>
    </thead>
    <tbody>
        <tr><td><code>caption</code></td><td>Text rendered centred below the video.</td><td>None</td></tr>
        <tr><td><code>lightcaption</code></td><td>Set to <code>true</code> for a normal-weight caption instead of bold.</td><td>Bold caption</td></tr>
        <tr><td><code>smallcaption</code></td><td>Set to <code>true</code> to render the caption in smaller text.</td><td>Normal size</td></tr>
    </tbody>
</table>
HTML;

$content .= render_info_box(
    'width and height',
    '<p>The shortcode accepts <code>width</code> and <code>height</code> attributes, but they are not required. When omitted, the player uses a responsive 16:9 layout that fills the available width. Omitting them is the recommended configuration for all embeds.</p>',
    'feature-box'
);

render_doc_page([
    'title' => 'YouTube Embed: Shortcode Usage',
    'section' => 'pi-youtube',
    'current_page' => 'shortcode',
    'nav_title' => 'YouTube Embed',
    'content' => $content,
    'last_updated' => 'July 7, 2026'
]);
