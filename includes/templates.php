<?php
/**
 * Documentation page template functions
 * 
 * These functions provide reusable templates for documentation pages,
 * reducing boilerplate and ensuring consistency.
 */

/**
 * Render a complete documentation page
 * 
 * @param array $config Page configuration array with:
 *   - title: Page title
 *   - section: Section identifier (e.g., 'media-monitor')
 *   - current_page: Current page ID for navigation highlighting
 *   - nav_title: Navigation section title
 *   - content: Main page content (HTML)
 *   - last_updated: Last updated date (optional)
 *   - intro: Introduction paragraph (optional)
 */
function render_doc_page($config) {
    // Extract configuration
    $title = $config['title'] ?? 'Documentation';
    $section = $config['section'] ?? '';
    $current_page = $config['current_page'] ?? 'overview';
    $nav_title = $config['nav_title'] ?? $title;
    $content = $config['content'] ?? '';
    $last_updated = $config['last_updated'] ?? date('F Y');
    $intro = $config['intro'] ?? '';
    
    // Determine if we're in a subpage
    $is_subpage = strpos($_SERVER['PHP_SELF'], "/$section/") !== false;
    $back_path = $is_subpage ? '../../../' : '../../';
    
    // Set up globals for header
    global $page_title;
    $page_title = $title . ' - Documentation';
    $GLOBALS['last_updated'] = $last_updated;
    
    // Include header
    $header_path = $is_subpage ? '../../../includes/header.php' : '../../includes/header.php';
    $nav_path = $is_subpage ? '../../../includes/navigation.php' : '../../includes/navigation.php';
    $footer_path = $is_subpage ? '../../../includes/footer.php' : '../../includes/footer.php';
    
    require_once $header_path;
    require_once $nav_path;
    
    // Load navigation items
    $nav_file = $is_subpage ? '_nav.php' : $section . '/_nav.php';
    if (file_exists($nav_file)) {
        require_once $nav_file;
    }
    
    ?>
    <div class="doc-layout">
        <?php 
        if (isset($nav_items)) {
            render_doc_nav($nav_items, $current_page, $nav_title, $back_path); 
        }
        ?>
        
        <div class="doc-content">
            <h1><?php echo htmlspecialchars($title); ?></h1>
            
            <?php if ($intro): ?>
                <div class="intro">
                    <p><?php echo $intro; ?></p>
                </div>
            <?php endif; ?>
            
            <?php echo $content; ?>
        </div>
    </div>
    
    <?php require_once $footer_path; ?>
    <?php
}

/**
 * Render a feature list
 * 
 * @param array $features Array of features with 'icon', 'title', and 'description'
 * @return string HTML output
 */
function render_feature_list($features) {
    $html = '<ul>';
    foreach ($features as $feature) {
        $icon = $feature['icon'] ?? '';
        $title = htmlspecialchars($feature['title']);
        $desc = htmlspecialchars($feature['description']);
        
        $html .= "<li><strong>{$icon} {$title}</strong>: {$desc}</li>";
    }
    $html .= '</ul>';
    return $html;
}

/**
 * Render a quick links section
 * 
 * @param array $links Array of links with 'url', 'title', and 'description'
 * @return string HTML output
 */
function render_quick_links($links) {
    $html = '<div class="feature-box">';
    $html .= '<h3>Available Documentation</h3>';
    $html .= '<ul>';
    
    foreach ($links as $link) {
        $url = htmlspecialchars($link['url']);
        $title = htmlspecialchars($link['title']);
        $desc = htmlspecialchars($link['description']);
        
        $html .= "<li><a href=\"{$url}\">{$title}</a> - {$desc}</li>";
    }
    
    $html .= '</ul>';
    $html .= '</div>';
    return $html;
}

/**
 * Render code block
 * 
 * @param string $code Code content
 * @param string $language Language for syntax highlighting (optional)
 * @return string HTML output
 */
function render_code_block($code, $language = '') {
    $html = '<div class="code-block">';
    $html .= '<pre><code';
    if ($language) {
        $html .= ' class="language-' . htmlspecialchars($language) . '"';
    }
    $html .= '>' . htmlspecialchars($code) . '</code></pre>';
    $html .= '</div>';
    return $html;
}

/**
 * Render a highlighted box
 * 
 * @param string $title Box title
 * @param string $content Box content
 * @param string $type Box type: 'highlight', 'warning', 'feature-box'
 * @return string HTML output
 */
function render_info_box($title, $content, $type = 'feature-box') {
    $html = '<div class="' . htmlspecialchars($type) . '">';
    if ($title) {
        $html .= '<h3>' . htmlspecialchars($title) . '</h3>';
    }
    $html .= $content;
    $html .= '</div>';
    return $html;
}
?>