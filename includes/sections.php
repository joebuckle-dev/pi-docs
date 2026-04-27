<?php
// Documentation sections configuration
$documentation_sections = [
    'admin' => [
        'icon' => '🎛️',
        'title' => 'Admin Features',
        'items' => [
            'media-monitor' => [
                'title' => 'Media Monitor',
                'url' => '/docs/content/admin/media-monitor.php',
                'description' => 'Managing media monitoring posts',
                'icon' => '📰',
                'subitems' => [
                    'creating-posts' => [
                        'title' => 'Creating Posts',
                        'url' => '/docs/content/admin/media-monitor/creating-posts.php',
                        'description' => 'Step-by-step post creation guide'
                    ],
                    'managing-taxonomies' => [
                        'title' => 'Managing Taxonomies',
                        'url' => '/docs/content/admin/media-monitor/managing-taxonomies.php',
                        'description' => 'Sources, Subjects, Regions, and Topics'
                    ],
                    'url-checker' => [
                        'title' => 'URL Checker',
                        'url' => '/docs/content/admin/media-monitor/url-checker.php',
                        'description' => 'Duplicate URL detection guide'
                    ],
                    'developer-notes' => [
                        'title' => 'Developer Notes',
                        'url' => '/docs/content/admin/media-monitor/developer-notes.php',
                        'description' => 'Technical implementation details'
                    ]
                ]
            ],
            'display-for-region' => [
                'title' => 'Display for Region',
                'url' => '/docs/content/admin/display-for-region.php',
                'description' => 'Show content based on visitor country',
                'icon' => '🌍',
                'subitems' => [
                    'shortcode' => [
                        'title' => 'Shortcode Usage',
                        'url' => '/docs/content/admin/display-for-region/shortcode.php',
                        'description' => 'Complete guide with country codes'
                    ],
                    'developer-notes' => [
                        'title' => 'Developer Notes',
                        'url' => '/docs/content/admin/display-for-region/developer-notes.php',
                        'description' => 'Technical implementation details'
                    ]
                ]
            ],
            'pi-subscriptions' => [
                'title' => 'Subscriptions',
                'url' => '/docs/content/admin/pi-subscriptions.php',
                'description' => 'Subscription management and testing',
                'icon' => '💳',
                'subitems' => [
                    'webhook-testing' => [
                        'title' => 'Webhook Testing',
                        'url' => '/docs/content/admin/pi-subscriptions/webhook-testing.php',
                        'description' => 'Test webhooks and email notifications'
                    ],
                    'developer-notes' => [
                        'title' => 'Developer Notes',
                        'url' => '/docs/content/admin/pi-subscriptions/developer-notes.php',
                        'description' => 'Technical implementation details'
                    ]
                ]
            ],
            'pi-transactional' => [
                'title' => 'Transactional Emails',
                'url' => '/docs/content/admin/pi-transactional.php',
                'description' => 'Edit transactional email templates',
                'icon' => '📧',
                'subitems' => [
                    'editing-templates' => [
                        'title' => 'Editing Templates',
                        'url' => '/docs/content/admin/pi-transactional/editing-templates.php',
                        'description' => 'Step-by-step guide to editing transactional templates'
                    ],
                    'developer-notes' => [
                        'title' => 'Developer Notes',
                        'url' => '/docs/content/admin/pi-transactional/developer-notes.php',
                        'description' => 'Technical implementation details'
                    ]
                ]
            ]
        ]
    ]
];

// Function to render documentation grid (new modern view)
function render_documentation_grid($sections) {
    echo '<div class="doc-grid">';
    
    foreach ($sections as $section_key => $section) {
        // Skip empty sections
        if (empty($section['items'])) {
            continue;
        }
        
        echo '<div class="doc-section">';
        echo '<h2 class="doc-section-title">' . $section['icon'] . ' ' . $section['title'] . '</h2>';
        echo '<div class="doc-cards">';
        
        foreach ($section['items'] as $item_key => $item) {
            $icon = isset($item['icon']) ? $item['icon'] : '📄';
            echo '<div class="doc-card">';
            echo '<a href="' . $item['url'] . '" class="doc-card-link">';
            echo '<div class="doc-card-icon">' . $icon . '</div>';
            echo '<div class="doc-card-content">';
            echo '<h3>' . $item['title'] . '</h3>';
            echo '<p>' . $item['description'] . '</p>';
            
            if (!empty($item['subitems'])) {
                echo '<div class="doc-card-subitems">';
                $count = count($item['subitems']);
                $dev_count = count(array_filter($item['subitems'], function($subitem, $key) {
                    return strpos($key, 'developer') !== false;
                }, ARRAY_FILTER_USE_BOTH));
                $regular_count = $count - $dev_count;
                
                echo '<span class="subitem-count">' . $regular_count . ' guide' . ($regular_count !== 1 ? 's' : '') . '</span>';
                if ($dev_count > 0) {
                    echo '<span class="subitem-dev-count">+ dev notes</span>';
                }
                echo '</div>';
            }
            
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
        
        echo '</div>';
        echo '</div>';
    }
    
    echo '</div>';
}

// Function to render documentation tree (classic view)
function render_documentation_tree($sections) {
    echo '<div class="tree">';
    echo '<ul>';
    
    foreach ($sections as $section_key => $section) {
        echo '<li>';
        echo $section['icon'] . ' ' . $section['title'];
        
        if (!empty($section['items'])) {
            echo '<ul>';
            foreach ($section['items'] as $item_key => $item) {
                echo '<li class="tree-parent">';
                echo '<a href="' . $item['url'] . '">' . $item['title'] . '</a>';
                if (!empty($item['description'])) {
                    echo '<small>' . $item['description'] . '</small>';
                }
                
                // Render subitems if they exist
                if (!empty($item['subitems'])) {
                    echo '<ul>';
                    foreach ($item['subitems'] as $subitem_key => $subitem) {
                        $is_developer = strpos($subitem_key, 'developer') !== false;
                        $class = $is_developer ? 'tree-developer' : '';
                        echo '<li class="' . $class . '">';
                        echo '<a href="' . $subitem['url'] . '">' . $subitem['title'] . '</a>';
                        if (!empty($subitem['description'])) {
                            echo '<small>' . $subitem['description'] . '</small>';
                        }
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                
                echo '</li>';
            }
            echo '</ul>';
        }
        
        echo '</li>';
    }
    
    echo '</ul>';
    echo '</div>';
}
?>