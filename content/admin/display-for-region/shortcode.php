<?php
require_once '../../../includes/templates.php';

$content = <<<'HTML'
<h2>How to Use It</h2>
<p>Use this simple shortcode to wrap your content:</p>
HTML;

$content .= render_info_box(
    'Basic Format',
    '<pre><code>[display-for-region locations="COUNTRY_CODES"]
Your content here
[/display-for-region]</code></pre>',
    'highlight'
);

$content .= <<<'HTML'

<h2>Two Simple Rules:</h2>
<ol>
    <li><strong>locations</strong> - Which countries should see this content</li>
    <li><strong>exclude</strong> - Which countries should NOT see it (optional)</li>
</ol>

<h2>Copy & Paste Examples</h2>

<h3>Show to One Country</h3>
<pre><code>[display-for-region locations="GB"]
This only shows to people in the UK
[/display-for-region]</code></pre>

<h3>Show to Multiple Countries</h3>
<pre><code>[display-for-region locations="GB,US,CA"]
This shows to UK, USA, and Canada
[/display-for-region]</code></pre>

<h3>Show to Whole Regions</h3>
<pre><code>[display-for-region locations="Europe"]
This shows to all European countries
[/display-for-region]</code></pre>

<h3>Exclude Countries</h3>
<pre><code>[display-for-region locations="Europe" exclude="GB"]
This shows to Europe but NOT the UK
[/display-for-region]</code></pre>
HTML;

$content .= render_info_box(
    'Real-World Example: Different Prices',
    '<pre><code>[display-for-region locations="GB"]
Price: £99
[/display-for-region]

[display-for-region locations="US,CA"]
Price: $120
[/display-for-region]

[display-for-region locations="FR,DE,ES"]
Price: €110
[/display-for-region]</code></pre>',
    'feature-box'
);

$content .= <<<'HTML'

<h2>Available Regions</h2>
<p>Instead of listing individual countries, you can use these regions:</p>

<table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
    <tr style="background: #f8f9fa;">
        <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">Region Name</th>
        <th style="border: 1px solid #dee2e6; padding: 12px; text-align: left;">What It Includes</th>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 12px;"><code>Europe</code></td>
        <td style="border: 1px solid #dee2e6; padding: 12px;">All European countries</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 12px;"><code>North America</code></td>
        <td style="border: 1px solid #dee2e6; padding: 12px;">USA, Canada, Mexico</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 12px;"><code>South America</code></td>
        <td style="border: 1px solid #dee2e6; padding: 12px;">Brazil, Argentina, Chile, etc.</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 12px;"><code>Asia</code></td>
        <td style="border: 1px solid #dee2e6; padding: 12px;">China, Japan, India, etc.</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 12px;"><code>Africa</code></td>
        <td style="border: 1px solid #dee2e6; padding: 12px;">All African countries</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 12px;"><code>Middle East</code></td>
        <td style="border: 1px solid #dee2e6; padding: 12px;">Saudi Arabia, UAE, Israel, etc.</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 12px;"><code>Oceania</code></td>
        <td style="border: 1px solid #dee2e6; padding: 12px;">Australia, New Zealand, Pacific Islands</td>
    </tr>
</table>

<h2>All Country Codes</h2>
<p class="warning"><strong>Important:</strong> Use these 2-letter codes for countries</p>


<h3>All Country Codes (A-Z)</h3>
<table style="width: 100%; border-collapse: collapse; margin: 10px 0; font-size: 14px;">
    <tr style="background: #f8f9fa;">
        <th style="border: 1px solid #dee2e6; padding: 8px; width: 10%;">Code</th>
        <th style="border: 1px solid #dee2e6; padding: 8px; width: 23%;">Country</th>
        <th style="border: 1px solid #dee2e6; padding: 8px; width: 10%;">Code</th>
        <th style="border: 1px solid #dee2e6; padding: 8px; width: 23%;">Country</th>
        <th style="border: 1px solid #dee2e6; padding: 8px; width: 10%;">Code</th>
        <th style="border: 1px solid #dee2e6; padding: 8px; width: 24%;">Country</th>
    </tr>
    <!-- A-C -->
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AD</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Andorra</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Bolivia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Cyprus</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">UAE</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Brazil</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Czech Republic</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AF</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Afghanistan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BS</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Bahamas</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>DE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Germany</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Antigua & Barbuda</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Bhutan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>DJ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Djibouti</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Anguilla</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Botswana</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>DK</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Denmark</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AL</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Albania</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Belarus</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>DM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Dominica</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Armenia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Belize</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>DO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Dominican Republic</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Angola</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Canada</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>DZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Algeria</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Argentina</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CD</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">DR Congo</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>EC</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Ecuador</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Austria</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CF</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Central African Rep.</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>EE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Estonia</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AU</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Australia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Congo</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>EG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Egypt</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>AZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Azerbaijan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CH</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Switzerland</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ER</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Eritrea</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Bosnia & Herzegovina</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Côte d'Ivoire</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ES</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Spain</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BB</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Barbados</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CL</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Chile</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ET</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Ethiopia</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BD</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Bangladesh</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Cameroon</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>FI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Finland</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Belgium</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">China</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>FJ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Fiji</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BF</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Burkina Faso</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Colombia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>FM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Micronesia</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Bulgaria</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Costa Rica</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>FR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">France</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BH</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Bahrain</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CU</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Cuba</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Gabon</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Burundi</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CV</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Cape Verde</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GB</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">United Kingdom</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BJ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Benin</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Curaçao</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GD</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Grenada</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>BN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Brunei</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>CX</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Christmas Island</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Georgia</td>
    </tr>
    <!-- Continue with remaining countries... -->
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GH</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Ghana</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LB</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Lebanon</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Palau</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Greece</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LC</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Saint Lucia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Paraguay</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Guatemala</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Liechtenstein</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>QA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Qatar</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Guinea-Bissau</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LK</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Sri Lanka</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>RO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Romania</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>GY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Guyana</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Liberia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>RS</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Serbia</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>HK</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Hong Kong</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LS</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Lesotho</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>RU</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Russia</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>HN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Honduras</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Lithuania</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>RW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Rwanda</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>HR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Croatia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LU</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Luxembourg</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Saudi Arabia</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>HT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Haiti</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LV</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Latvia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SB</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Solomon Islands</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>HU</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Hungary</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Libya</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SC</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Seychelles</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ID</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Indonesia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Morocco</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SD</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Sudan</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>IE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Ireland</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MC</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Monaco</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Sweden</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>IL</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Israel</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MD</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Moldova</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Singapore</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>IN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">India</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ME</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Montenegro</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Slovenia</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>IQ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Iraq</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Madagascar</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SK</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Slovakia</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>IR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Iran</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MH</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Marshall Islands</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SL</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Sierra Leone</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>IS</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Iceland</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MK</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">North Macedonia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">San Marino</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>IT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Italy</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ML</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Mali</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Senegal</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>JM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Jamaica</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Myanmar</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Somalia</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>JO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Jordan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Mongolia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Suriname</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>JP</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Japan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Macau</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SS</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">South Sudan</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Kenya</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Mauritania</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ST</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">São Tomé & Príncipe</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Kyrgyzstan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Malta</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SV</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">El Salvador</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KH</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Cambodia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MU</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Mauritius</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Syria</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Kiribati</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MV</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Maldives</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>SZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Eswatini</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Comoros</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Malawi</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TD</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Chad</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Saint Kitts & Nevis</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MX</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Mexico</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Togo</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KP</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">North Korea</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Malaysia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TH</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Thailand</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">South Korea</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>MZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Mozambique</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TJ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Tajikistan</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Kuwait</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Namibia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TL</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">East Timor</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Cayman Islands</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Niger</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Turkmenistan</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>KZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Kazakhstan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Nigeria</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Tunisia</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>LA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Laos</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Nicaragua</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Tonga</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NL</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Netherlands</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PL</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Poland</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Turkey</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NO</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Norway</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Portugal</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TT</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Trinidad & Tobago</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NP</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Nepal</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PS</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Palestine</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TV</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Tuvalu</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NR</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Nauru</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Taiwan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>VE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Venezuela</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>NZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">New Zealand</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>TZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Tanzania</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>VG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">British Virgin Islands</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>OM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Oman</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>UA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Ukraine</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>VI</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">US Virgin Islands</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Panama</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>UG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Uganda</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>VN</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Vietnam</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Peru</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>US</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">United States</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>VU</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Vanuatu</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PG</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Papua New Guinea</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>UY</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Uruguay</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>WS</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Samoa</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PH</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Philippines</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>UZ</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Uzbekistan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>YE</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Yemen</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>PK</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Pakistan</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>VA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Vatican City</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ZA</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">South Africa</td>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ZM</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Zambia</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>ZW</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">Zimbabwe</td>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>VC</code></td><td style="border: 1px solid #dee2e6; padding: 8px;">St Vincent & Grenadines</td>
    </tr>
</table>

<h3>Special Codes</h3>
<table style="width: 100%; border-collapse: collapse; margin: 10px 0;">
    <tr style="background: #f8f9fa;">
        <th style="border: 1px solid #dee2e6; padding: 8px; width: 20%;">Code</th>
        <th style="border: 1px solid #dee2e6; padding: 8px; width: 80%;">Description</th>
    </tr>
    <tr>
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>XX</code></td>
        <td style="border: 1px solid #dee2e6; padding: 8px;">Unknown country (visitor location cannot be determined)</td>
    </tr>
    <tr style="background: #f8f9fa;">
        <td style="border: 1px solid #dee2e6; padding: 8px;"><code>T1</code></td>
        <td style="border: 1px solid #dee2e6; padding: 8px;">Tor network users</td>
    </tr>
</table>

<h2>Testing Your Content</h2>
HTML;

$content .= render_info_box(
    'How to Test Different Regions',
    '<ol>
        <li>Use a VPN service to simulate different countries</li>
        <li>Ask colleagues in other countries to verify</li>
        <li>Use online proxy services for quick tests</li>
        <li>Check server logs to confirm detection is working</li>
    </ol>',
    'feature-box'
);

$content .= <<<'HTML'

<h2>Common Issues</h2>

<h3>Content Not Showing</h3>
<ul>
    <li>Check country code is correct (2 letters, uppercase)</li>
    <li>Ensure no spaces after commas in lists</li>
    <li>Test with a different location/VPN</li>
</ul>
HTML;

render_doc_page([
    'title' => 'Display for Region Shortcode Usage',
    'section' => 'display-for-region',
    'current_page' => 'shortcode',
    'nav_title' => 'Display for Region',
    'content' => $content,
    'last_updated' => 'March 17, 2026'
]);