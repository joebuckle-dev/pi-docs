<?php
/**
 * Navigation helper functions for documentation
 */

/**
 * Render navigation sidebar
 * @param array $nav_items Array of navigation items with 'title' and 'url' keys
 * @param string $current_page Current page identifier to highlight active item
 * @param string $parent_title Title for the navigation section
 * @param string $back_url URL for back link
 */
function render_doc_nav($nav_items, $current_page = '', $parent_title = '', $back_url = '../../') {
    ?>
    <nav class="doc-nav">
        <a href="<?php echo $back_url; ?>" class="doc-nav-back">← Back to Documentation</a>
        
        <?php if ($parent_title): ?>
            <div class="doc-nav-title"><?php echo $parent_title; ?></div>
        <?php endif; ?>
        
        <div class="doc-nav-links">
            <?php foreach ($nav_items as $item): ?>
                <?php
                $classes = ['doc-nav-link'];
                if ($current_page === $item['id']) $classes[] = 'active';
                if ($item['id'] === 'overview') $classes[] = 'nav-parent';
                if (strpos($item['id'], 'developer') !== false) $classes[] = 'nav-developer';
                ?>
                <a href="<?php echo $item['url']; ?>" 
                   class="<?php echo implode(' ', $classes); ?>">
                    <?php echo $item['title']; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </nav>
    <?php
}

/**
 * Get navigation items for a section from the sections configuration
 */
function get_section_nav_items($section_key, $item_key = '') {
    require_once dirname(__DIR__) . '/includes/sections.php';
    global $documentation_sections;
    
    $nav_items = [];
    
    if (isset($documentation_sections[$section_key]['items'])) {
        if ($item_key && isset($documentation_sections[$section_key]['items'][$item_key])) {
            // Get parent item
            $parent = $documentation_sections[$section_key]['items'][$item_key];
            $nav_items[] = [
                'id' => $item_key,
                'title' => $parent['title'] . ' Overview',
                'url' => $parent['url']
            ];
            
            // Get subitems
            if (isset($parent['subitems'])) {
                foreach ($parent['subitems'] as $subkey => $subitem) {
                    $nav_items[] = [
                        'id' => $subkey,
                        'title' => $subitem['title'],
                        'url' => $subitem['url']
                    ];
                }
            }
        } else {
            // Get all items in section
            foreach ($documentation_sections[$section_key]['items'] as $key => $item) {
                $nav_items[] = [
                    'id' => $key,
                    'title' => $item['title'],
                    'url' => $item['url']
                ];
            }
        }
    }
    
    return $nav_items;
}

/**
 * Get navigation items for a specific documentation item and its sub-items
 * Automatically handles relative URLs based on current page location
 */
function get_doc_nav_items($section_key, $item_key, $current_location = 'overview') {
    require_once dirname(__DIR__) . '/includes/sections.php';
    global $documentation_sections;
    
    if (!isset($documentation_sections[$section_key]['items'][$item_key])) {
        return [];
    }
    
    $item = $documentation_sections[$section_key]['items'][$item_key];
    $nav_items = [];
    
    // Add overview page (parent item)
    if ($current_location === 'overview') {
        $overview_url = basename($item['url']);
    } else {
        $overview_url = '../' . basename($item['url']);
    }
    
    $nav_items[] = [
        'id' => 'overview',
        'title' => 'Overview', 
        'url' => $overview_url
    ];
    
    // Add sub-items
    if (isset($item['subitems'])) {
        foreach ($item['subitems'] as $subkey => $subitem) {
            if ($current_location === 'overview') {
                // From overview page, link to subfolder/file
                $subitem_url = $item_key . '/' . basename($subitem['url']);
            } else {
                // From subpage, link to sibling file
                $subitem_url = basename($subitem['url']);
            }
                
            $nav_items[] = [
                'id' => $subkey,
                'title' => $subitem['title'],
                'url' => $subitem_url
            ];
        }
    }
    
    return $nav_items;
}
?>